<?
/////////////////////////////////////////////////////////////////////////////
//
// Consulta de CEP usando AJAX para o Site do correios e magento
//
// Adaptado por: Deivison Arthur - Visite meu site: www.deivison.com.br
//
// baseado no script da Pinceladas na Web
//
/////////////////////////////////////////////////////////////////////////////


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
	curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	return curl_exec ($ch);
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
  $dados['cidade'] = trim($dados['cidade/uf'][0]);
  $dados['uf'] = trim($dados['cidade/uf'][1]);
  unset($dados['cidade/uf']);

///////////////////////////////////////////////////
//REMOVE OUTRAS INFORMAÇÕES QUE VEM JUNTO AO LOGADOURO EXE:
//LADO DA RUA COMO PODE SER VISTO NESSE LINK
//(http://m.correios.com.br/movel/buscaCepConfirma.do?cepEntrada=21061020&metodo=buscarCep)
///////////////////////////////////////////////////
  $logradouro = explode('-',$dados['logradouro']);
  $dados['logradouro'] = trim($logradouro[0]);
  unset($logradouro);

///////////////////////////////////////////////////
//var_dump($dados);   //para testar
///////////////////////////////////////////////////

if ( isset($dados) ) {

///////////////////////////////////////////////////
//MONTA SWITC PARA SELECIONAR NO COMBO DO MAGENTO
///////////////////////////////////////////////////
        switch ( $dados['uf'] ){
            case "AC": $estado = 1; $num = 485; break;
            case "AL": $estado = 2; $num = 487; break;
            case "AP": $estado = 3; $num = 486; break;
            case "AM": $estado = 4; $num = 488; break;
            case "BA": $estado = 5; $num = 489; break;
            case "CE": $estado = 6; $num = 490; break;
            case "ES": $estado = 6; $num = 492; break;
            case "GO": $estado = 7; $num = 493; break;
            case "MA": $estado = 8; $num = 494; break;
            case "MT": $estado = 10; $num = 495; break;
            case "MS": $estado = 11; $num = 496; break;
            case "MG": $estado = 12; $num = 497; break;
            case "PA": $estado = 13; $num = 498; break;
            case "PB": $estado = 14; $num = 499; break;
            case "PR": $estado = 15; $num = 500; break;
            case "PE": $estado = 16; $num = 501; break;
            case "PI": $estado = 17; $num = 502; break;
            case "RJ": $estado = 18; $num = 503; break;
            case "RN": $estado = 19; $num = 504; break;
            case "RS": $estado = 20; $num = 505; break;
            case "RO": $estado = 21; $num = 506; break;
            case "RR": $estado = 22; $num = 507; break;
            case "SC": $estado = 23; $num = 508; break;
            case "SP": $estado = 24; $num = 509; break;
            case "SE": $estado = 25; $num = 510; break;
            case "TO": $estado = 26; $num = 511; break;
            case "DF": $estado = 27; $num = 491; break;
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
        $texto = $dados['logradouro'].":".$dados['bairro'].":".$dados['cidade'].":".$estado.":".$num.";";
        echo $texto;

}else {
        $texto = false;
        echo $texto;
};
?>