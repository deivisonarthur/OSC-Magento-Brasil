/*==============================================================================
 *
 *  OSC-Magento-Brasil - Por Deivison Arthur / www.deivison.com.br
 *
 * =============================================================================
 */



        $j(document).ready(function(){

             //descomente para colocar o "-" no CEP porém se estiver trabalhando com o módulo Matrix Rates não trabalha com o "-"
            /*
            $j('input[name*="[postcode]"]').keydown( function(e){
                if (e.keyCode != 8){
                  length = this.value.length;
                  if (length == 5)
                      this.value += "-";
                }
            });
            */

            $j('input[name*="[fax]"]').mask("(99)9999-9999");
            $j('input[name*="[telephone]"]').mask("(99)9999-9999");


        });




        /********************* Busca de CEP na base dos correios por Ajax *********************/
        /********************* Busca de CEP na base dos correios por Ajax *********************/
        /********************* Busca de CEP na base dos correios por Ajax *********************/

        function XMLHTTPRequest() {
            if (window.XMLHttpRequest) {
                xhr = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
            return xhr;
        }

        var ajax = XMLHTTPRequest();

        function buscarEndereco(host, quale) {


    			$j.ajax({
    				url: host + 'frontend/base/default/deivison/buscacep.php?cep=' + document.getElementById(quale+':postcode').value.replace(/\+/g, ''),
    				type:'GET',
    				dataType: 'html',
    				success:function(respostaCEP){
    					//alert(respostaCEP); //para testes

                        var r = respostaCEP;

                        street_1 = r.substring(0, (i = r.indexOf(':')));
                        document.getElementById(quale+':street1').value = unescape(street_1.replace(/\+/g," "));

                        r = r.substring(++i);
                        street_4 = r.substring(0, (i = r.indexOf(':')));
                        document.getElementById(quale+':street4').value = unescape(street_4.replace(/\+/g," "));

                        r = r.substring(++i);
                        city = r.substring(0, (i = r.indexOf(':')));
                        document.getElementById(quale+':city').value = unescape(city.replace(/\+/g," "));

                        r = r.substring(++i);
                        region = r.substring(0, (i = r.indexOf(':')));

                        document.getElementById(quale+':region').selectedIndex = unescape(region.replace(/\+/g," "));

                        document.getElementById(quale+':region_id').selectedIndex = unescape(region.replace(/\+/g," "));
    				}
    			});

        };




        /********************* Valida CPF e CNPJ *********************/
        /********************* Valida CPF e CNPJ *********************/
        /********************* Valida CPF e CNPJ *********************/

    	// Adicionar classe de validacao de cpf e cnpj ao Taxvat
    	//$j('#billing:taxvat"]').addClassName('validar_cpf'); //removido e colocado na mão
                                                
        function validaCPF(cpf,pType){
        	var cpf_filtrado = "", valor_1 = " ", valor_2 = " ", ch = "";
        	var valido = false;

        	for (i = 0; i < cpf.length; i++){
              ch = cpf.substring(i, i + 1);
            	if (ch >= "0" && ch <= "9"){
                	cpf_filtrado = cpf_filtrado.toString() + ch.toString()
                	valor_1 = valor_2;
                	valor_2 = ch;
        	    }
        	    if ((valor_1 != " ") && (!valido)) valido = !(valor_1 == valor_2);
        	}

        	if (!valido) cpf_filtrado = "12345678912";
        	if (cpf_filtrado.length < 11){
        	    for (i = 1; i <= (11 - cpf_filtrado.length); i++){cpf_filtrado = "0" + cpf_filtrado;}
        	}

        	if(pType <= 1){
        	    if ( ( cpf_filtrado.substring(9,11) == checkCPF( cpf_filtrado.substring(0,9) ) ) && ( cpf_filtrado.substring(11,12)=="") ){return true;}
        	}

        	if((pType == 2) || (pType == 0)){
            	if (cpf_filtrado.length >= 14){
            	    if ( cpf_filtrado.substring(12,14) == checkCNPJ( cpf_filtrado.substring(0,12) ) ){  return true;}
            	}
        	}

    	return false;
    	}



      	function checkCNPJ(vCNPJ){
      	var mControle = "";
      	var aTabCNPJ = new Array(5,4,3,2,9,8,7,6,5,4,3,2);
      	for (i = 1 ; i <= 2 ; i++){
        	mSoma = 0;
        	for (j = 0 ; j < vCNPJ.length ; j++)
        	mSoma = mSoma + (vCNPJ.substring(j,j+1) * aTabCNPJ[j]);
        	if (i == 2 ) mSoma = mSoma + ( 2 * mDigito );
        	mDigito = ( mSoma * 10 ) % 11;
        	if (mDigito == 10 ) mDigito = 0;
        	mControle1 = mControle ;
        	mControle = mDigito;
        	aTabCNPJ = new Array(6,5,4,3,2,9,8,7,6,5,4,3);
      	}

      	return( (mControle1 * 10) + mControle );
      	}



      	function checkCPF(vCPF){
      	var mControle = ""
      	var mContIni = 2, mContFim = 10, mDigito = 0;
      	for (j = 1 ; j <= 2 ; j++){
        	mSoma = 0;
        	for (i = mContIni ; i <= mContFim ; i++)
        	mSoma = mSoma + (vCPF.substring((i-j-1),(i-j)) * (mContFim + 1 + j - i));
        	if (j == 2 ) mSoma = mSoma + ( 2 * mDigito );
        	mDigito = ( mSoma * 10 ) % 11;
        	if (mDigito == 10) mDigito = 0;
        	mControle1 = mControle;
        	mControle = mDigito;
        	mContIni = 3;
        	mContFim = 11;
      	}

      	return( (mControle1 * 10) + mControle );
      	}



