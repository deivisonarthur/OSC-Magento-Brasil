Módulo OSC-Magento-Brasil – Normatização do módulo para o padrão brasileiro
=================
O projeto OCS-MAgento-Brasil é uma iniciativa para traduzir e adaptar o módulo free de OSC(One Step Checkout) para Magento chamado IWD OnePageCheckout. O módulo irá traduzir, adicionar estados, formatar, validar campos e adicionar novos campos. Iremos tratar os principais campos, como: Rua, Bairro, Cidade, Estado, Cep com busca por Ajax com busca nos Correios, CPF/CNPJ, IE(Inscrição Estadual), tipo pessoa, Telefone, Celular,…

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

veja mais dicas sobre análise de risco e fraude no Magento em:
http://www.deivison.com.br/blog/2012/07/25/modulo-de-analise-de-risco-e-fraude-no-magento-sem-mensalidade/

Site e comunidade do projeto:
=================
http://onestepcheckout.com.br/

Demostração online do projeto:
=================
http://www.deivison.com.br/demos/shop2/teste.html

Observação Importante!
=================
Por motivos de segurança, recomendamos que faça sempre o download desse módulo diretamente no Github. Dessa forma prestigiaram e incentivaram os mantenedores do projeto e terão a garantia de não pegar scripts maliciosos nesse módulo.

Atualmente na web, muitas pessoas mau intencionadas pegam templates e módulos free, descompactam, inserem scripts maliciosos e redistribuem na web.

Projeto 100% auditado pelos mantenedores no Github!

Desenvolvedores e mantenedores do projeto Módulo OSC-Magento-Brasil:
=================
* Deivison Arthur Lemos Serpa 
http://www.deivison.com.br
* Denis Colli Spalenza 
http://www.xpdev.com.br

Versão do projeto:
=================
O módulo ainda encontra-se em fase de desenvolvimento! Ou seja, Estágio Beta – v 1.0.0 para realização de testes e correções!

Créditos:
=================
* Projeto base de OSC utilizado: http://www.interiorwebdesign.com/magento/magento-one-step-checkout-module.html
* Script base para implementação da busca do CEP por Ajax: http://www.pinceladasdaweb.com.br/blog/2012/01/31/webservice-consulta-de-cep-diretamente-ao-site-dos-correios/
* Traduções pt-BR do Magento: http://www.cerebrum.com.br/index.php/magento-portugues-download-traducao-brasil-cielo-redecard-american-express.html

Logs:
=================
Projeto iniciado dia: 11/08/2012 ás 19h
Estágio do projeto:  Versão Beta (Em desenvolvimento)
Previsão do lançamento Beta: 20/08/2012 (ou quanto antes!)
Link do demo: http://www.deivison.com.br/demos/shop2

Gostou do módulo?
=================

Se você gostou, se foi útil para você, se fez você economizar aquela grana pois estava prestes a pagar caro por aquele módulo pago, pois não achava um solução gratuita que te atendesse e queira prestigiar o trabalho feito efetuando uma doação de qualquer valor, não vou negar e vou ficar grato, você pode fazer isso utilizando o Pagseguro no link do artigo ofical do projeto:
http://www.deivison.com.br/blog/2012/08/11/osc-magento-brasil-magento-one-step-checkout-free-e-normatizado-para-o-brasil/
