Módulo OSC-Magento-Brasil - Normatização do módulo para o padrão brasileiro
=================
O projeto OCS-MAgento-Brasil é uma iniciativa para traduzir e adaptar o módulo free OSC(One Step Checkout) para Magento chamado IWD OnePageCheckout. O módulo irá traduzir, adicionar estados, formatar, validar campos e adicionar novos campos. Irei tratar principalmente os campos: Rua, Bairro, Cidade, Estado, Cep com busca por Ajax com busca nos Correios, CPF/CNPJ, IE(Inscrição Estadual), tipo pessoa, Telefone, Celular,...

Oque esse módulo irá fazer?
=================
Com o módulo Normatiza Brasil será introduzido no cadastro de usuário do Magento novos campos como:

* Tradução dos Campos do formulário
* Formatação dos campos por máscara. Exe: Telefone com 9 ou 8 dígitos (99) ?9999-9999
* Inclusão dos estados brasileiros
* Inclusão do campo tipo pessoa (Física ou Jurídica)
* Remodelação do campo endereço do magento de 4 linhas. Dividindo e formatando para Endereço, Número, Bairro e Cidade.
* Utilização do campo taxvat por padrão como campo de CPF/CNPJ
* Inclusão do campo IE(Inscrição Estadual) para gereção da NFE
* Busca do endereço por ajax direto do site dos Correios
* Opção de desligar campos

Para segunda etapa irei implementar outros campos como:
* Como chegou a nossa loja virtual?
* RG(Identidade)
* Orgão Emissor do RG

Também pretendo implementar opções de segurança como:
* Detecção de utilização de proxy com envio de email ao administrador
* Detecção de compras suspeitas com envio de email ao administrador (Irá verificar por Geolocalização local onde foi feito a compra e bater com o local de entrega)
* Integração com o sistema de detecção de fraude Maxmind (http://www.maxmind.com)


Atenção!!!
=================
O módulo ainda encontra-se em fase de desenvolvimento! Ou seja, ainda não funiona e foi colocado no Git para colaborações de desenvolvedores ao projeto!