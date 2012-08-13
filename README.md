Cuidado! Atenção!!!
=================
Por motivo de segurança do seu projeto, recomendamos que se for usar esse módulo, que faça o download do mesmo diretamente no Github e não peguem arquivos distribuido na web por arquivos zipados! Lembre-se esse arquivos trabalha diretamente pagamentos e com dados sigilosos de seus clientes.
Dessa forma evita que pessoas mau intencionadas peguem o módulo que é FREE e coloquem scripts para hakear seu projeto!
Link para download em: https://github.com/deivisonarthur/OSC-Magento-Brasil/zipball/master

Módulo OSC-Magento-Brasil - Normatização do módulo para o padrão brasileiro
=================
O projeto OCS-MAgento-Brasil é uma iniciativa para traduzir e adaptar o módulo free de OSC(One Step Checkout) para Magento chamado IWD OnePageCheckout.
O módulo irá traduzir, adicionar estados, formatar, validar campos e adicionar novos campos.
Iremos tratar os principais campos, como: Rua, Bairro, Cidade, Estado, Cep com busca por Ajax com busca nos Correios, CPF/CNPJ, IE(Inscrição Estadual), tipo pessoa, Telefone, Celular,...

Oque esse módulo irá fazer?
=================
Com o módulo OSC-Magento-Brasil irá se ter o meio mais famoso de checkout do Magento conhecido por OSC(One Step Checkout) e iremos fazer outros ajustes, como:

* Tradução dos Campos do formulário. (feito!)
* Inclusão dos estados brasileiros. (feito!)
* Remodelação do campo endereço do magento de 4 linhas. Dividindo e formatando para Endereço, Número, Bairro e Cidade. (feito!)
* Utilização do campo taxvat por padrão como campo de CPF/CNPJ. (feito!)
* Busca do endereço por ajax direto do site dos Correios. (feito!)
* Formatação dos campos por máscara. Exe: Telefone com 9 ou 8 dígitos (99) ?9999-9999. (feito!)

Para segunda etapa irei implementar outros campos, como:
* Inclusão do campo tipo pessoa (Física ou Jurídica)
* IE(Inscrição Estadual) para gereção da NFE
* Inclusão do campo RG(Identidade)
* Inclusão do campo Orgão Emissor do RG
* Opção de desligar campos
* Como chegou a nossa loja virtual?

Também pretendo implementar opções de segurança, como:
* Detecção de utilização de proxy com envio de email ao administrador
* Detecção de compras suspeitas com envio de email ao administrador (Irá verificar por Geolocalização local onde foi feito a compra e bater com o local de entrega)
* Integração com o sistema de detecção de fraude Maxmind (http://www.maxmind.com)
veja mais dicas sobre análise de risco e fraude no Magento em: http://www.deivison.com.br/blog/2012/07/25/modulo-de-analise-de-risco-e-fraude-no-magento-sem-mensalidade/

Desenvolvedores e mantenedores do projeto Módulo OSC-Magento-Brasil:
=================
* Deivison Arthur Lemos Serpa
http://www.deivison.com.br
* Denis Colli Spalenza
http://www.xpdev.com.br

Versão BETA do projeto
=================
O módulo ainda encontra-se em fase de desenvolvimento! Ou seja, Ainda em estágio Beta - v 1.0.0!

Peço por gentileza que não copiem o projeto e saem distribuindo zipado pela web! Porque isso?
=================
Por vários fatores!

1 - Pois fazendo dessa forma automaticamente estará removendo os méritos dos desenvolvedores e responsáveis pelo projeto.
2 - Pegando o módulo diretamente no GITHUB, estarão pegando o componente atualizado e certificado que iram pegar os fontes diretamente com os mantenedores do projeto.
3 - Dessa forma aumentaram a segurança dos seus projetos! Pois existem muitas pessoas mau intencionadas que pegam projetos open source, editam e colocam códigos maliciosos para se infiltrar nos projetos. Por isso recomendamos pegarem módulos diretamente no GITHUB com os mantenedores do projeto!

Créditos
=================
* Projeto base de OSC utilizado:
http://www.interiorwebdesign.com/magento/magento-one-step-checkout-module.html
* Script base para implementação da busca do CEP por Ajax:
http://www.pinceladasdaweb.com.br/blog/2012/01/31/webservice-consulta-de-cep-diretamente-ao-site-dos-correios/
* Traduções pt-BR do Magento:
http://www.cerebrum.com.br/index.php/magento-portugues-download-traducao-brasil-cielo-redecard-american-express.html