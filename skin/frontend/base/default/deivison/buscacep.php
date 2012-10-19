<?
/*=========================================================================================================================================================
 *
 *  PROJETO OSC MAGENTO BRASIL - VERSÃO FINAL V3.0
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *  O módulo One Step Checkout normatizado para a localização brasileira.
 *  site do projeto: http://onestepcheckout.com.br/
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 *
 *
 *  Mmantenedores do Projeto:
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 *  Deivison Arthur Lemos Serpa
 *  deivison.arthur@gmail.com
 *  www.deivison.com.br
 *  (21)9203-8986
 *
 *  Denis Colli Spalenza
 *  http://www.xpdev.com.br
 *
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
 *
 *
 *  GOSTOU DO MÓDULO?
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *  Se você gostou, se foi útil para você, se fez você economizar aquela grana pois estava prestes a pagar caro por aquele módulo pago, pois não achava uma
 *  solução gratuita que te atendesse e queira prestigiar o trabalho feito efetuando uma doação de qualquer valor, não vou negar e vou ficar grato! você
 *  pode fazer isso visitando a página do projeto em: http://onestepcheckout.com.br/
 *  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
 *
/*=========================================================================================================================================================
 */


///////////////////////////////////////////////////
//INCUI A CLASSE PHPQUERY
//(http://code.google.com/p/phpquery)
///////////////////////////////////////////////////
include('phpQuery-onefile.php');

///////////////////////////////////////////////////
//MONTA O CURL
///////////////////////////////////////////////////
function simple_curl($url,$post=array(),$get=array()){
	$url = explode('?',$url,2);
	if(count($url)===2){
		$temp_get = array();
		parse_str($url[1],$temp_get);
		$get = array_merge($get,$temp_get);
	}

	$ch = curl_init($url[0]."?".http_build_query($get));
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query($post));
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0);     /*Se der erro coloque 1*/
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec ($ch);
}
if(!isset($_GET['cep']) OR empty($_GET['cep'])){
    exit;
}
///////////////////////////////////////////////////
//MONTA URL A SER EXPLORADA
///////////////////////////////////////////////////
$html = simple_curl('http://m.correios.com.br/movel/buscaCepConfirma.do',array(
	'cepEntrada'=>$_GET['cep'],
	'tipoCep'=>'',
	'cepTemp'=>'',
	'metodo'=>'buscarCep'
));

///////////////////////////////////////////////////
//INICIA O PHPQUERY
///////////////////////////////////////////////////
phpQuery::newDocumentHTML($html, $charset = 'utf-8');

///////////////////////////////////////////////////
//CAPTURA ATRAVES DO PHPQUERY OS RESULTADOS
///////////////////////////////////////////////////
$dados =
  array(
  	'logradouro'=> trim(pq('.caixacampobranco .resposta:contains("Logradouro: ") + .respostadestaque:eq(0)')->html()),
  	'bairro'=> trim(pq('.caixacampobranco .resposta:contains("Bairro: ") + .respostadestaque:eq(0)')->html()),
  	'cidade/uf'=> trim(pq('.caixacampobranco .resposta:contains("Localidade / UF: ") + .respostadestaque:eq(0)')->html()),
  	'cep'=> trim(pq('.caixacampobranco .resposta:contains("CEP: ") + .respostadestaque:eq(0)')->html())
  );

///////////////////////////////////////////////////
//SEPARA A CIDADE DA UF DO RESULTADO ACIMA
///////////////////////////////////////////////////
  $dados['cidade/uf'] = explode('/',$dados['cidade/uf']);
  $dados['cidade'] = trim(@$dados['cidade/uf'][0]);
  $dados['uf'] = trim(@$dados['cidade/uf'][1]);
  unset($dados['cidade/uf']);

///////////////////////////////////////////////////
//REMOVE OUTRAS INFORMAÇÕES QUE VEM JUNTO AO LOGADOURO EXE:
//LADO DA RUA COMO PODE SER VISTO NESSE LINK
//(http://m.correios.com.br/movel/buscaCepConfirma.do?cepEntrada=21061020&metodo=buscarCep)
///////////////////////////////////////////////////
  $logradouro = explode('-',@$dados['logradouro']);
  $dados['logradouro'] = trim(@$logradouro[0]);
  unset($logradouro);

///////////////////////////////////////////////////
//var_dump($dados);   //para testar
///////////////////////////////////////////////////

if ( isset($dados) ) {

///////////////////////////////////////////////////
//MONTA SWITC PARA SELECIONAR NO COMBO DO MAGENTO
///////////////////////////////////////////////////
        switch ( $dados['uf'] ){
            case "AC": $uf = 'Acre'; $estado = 1; $num = 485; break;
            case "AL": $uf = 'Alagoas'; $estado = 2; $num = 487; break;
            case "AP": $uf = 'Amapa'; $estado = 3; $num = 486; break;
            case "AM": $uf = 'Amazonas'; $estado = 4; $num = 488; break;
            case "BA": $uf = 'Bahia'; $estado = 5; $num = 489; break;
            case "CE": $uf = 'Ceara'; $estado = 6; $num = 490; break;
            case "ES": $uf = 'Espirito Santo'; $estado = 6; $num = 492; break;
            case "GO": $uf = 'Goias'; $estado = 7; $num = 493; break;
            case "MA": $uf = 'Maranhao'; $estado = 8; $num = 494; break;
            case "MT": $uf = 'Mato Grosso'; $estado = 10; $num = 495; break;
            case "MS": $uf = 'Mato Grosso do Sul'; $estado = 11; $num = 496; break;
            case "MG": $uf = 'Minas Gerais'; $estado = 12; $num = 497; break;
            case "PA": $uf = 'Para'; $estado = 13; $num = 498; break;
            case "PB": $uf = 'Paraiba'; $estado = 14; $num = 499; break;
            case "PR": $uf = 'Parana'; $estado = 15; $num = 500; break;
            case "PE": $uf = 'Pernambuco'; $estado = 16; $num = 501; break;
            case "PI": $uf = 'Piaui'; $estado = 17; $num = 502; break;
            case "RJ": $uf = 'Rio de Janeiro'; $estado = 18; $num = 503; break;
            case "RN": $uf = 'Rio Grande do Norte'; $estado = 19; $num = 504; break;
            case "RS": $uf = 'Rio Grande do Sul'; $estado = 20; $num = 505; break;
            case "RO": $uf = 'Rondonia'; $estado = 21; $num = 506; break;
            case "RR": $uf = 'Roraima'; $estado = 22; $num = 507; break;
            case "SC": $uf = 'Santa Catarina'; $estado = 23; $num = 508; break;
            case "SP": $uf = 'Sao Paulo'; $estado = 24; $num = 509; break;
            case "SE": $uf = 'Sergipe'; $estado = 25; $num = 510; break;
            case "TO": $uf = 'Tocantins'; $estado = 26; $num = 511; break;
            case "DF": $uf = 'Distrito Federal'; $estado = 27; $num = 491; break;
        }
/*
            ('BR', 'AC', 'Acre'),
            ('BR', 'AL', 'Alagoas'),
            ('BR', 'AP', 'Amapa'),
            ('BR', 'AM', 'Amazonas'),
            ('BR', 'BA', 'Bahia'),
            ('BR', 'CE', 'Ceara'),
            ('BR', 'ES', 'Espirito Santo'),
            ('BR', 'GO', 'Goias'),
            ('BR', 'MA', 'Maranhao'),
            ('BR', 'MT', 'Mato Grosso'),
            ('BR', 'MS', 'Mato Grosso do Sul'),
            ('BR', 'MG', 'Minas Gerais'),
            ('BR', 'PA', 'Para'),
            ('BR', 'PB', 'Paraiba'),
            ('BR', 'PR', 'Parana'),
            ('BR', 'PE', 'Pernambuco'),
            ('BR', 'PI', 'Piaui'),
            ('BR', 'RJ', 'Rio de Janeiro'),
            ('BR', 'RN', 'Rio Grande do Norte'),
            ('BR', 'RS', 'Rio Grande do Sul'),
            ('BR', 'RO', 'Rondonia'),
            ('BR', 'RR', 'Roraima'),
            ('BR', 'SC', 'Santa Catarina'),
            ('BR', 'SP', 'Sao Paulo'),
            ('BR', 'SE', 'Sergipe'),
            ('BR', 'TO', 'Tocantins'),
            ('BR', 'DF', 'Distrito Federal');
*/
<<<<<<< HEAD
        $texto = $dados['logradouro'].":".$dados['bairro'].":".$dados['cidade'].":".@$estado.":".@$num.";";
=======
        $texto = $dados['logradouro'].":".$dados['bairro'].":".$dados['cidade'].":".$uf.":".$num.":".@$estado.";";
>>>>>>> OSC PRO 4.0.1 Final
        echo $texto;

}else {
        $texto = false;
        echo $texto;
};
?>