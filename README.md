Módulo OSC-Magento-Brasil – Normatização do módulo para o padrão brasileiro
=================
O projeto OCS-MAgento-Brasil é uma iniciativa para traduzir e adaptar o módulo free de OSC(One Step Checkout) para Magento chamado IWD OnePageCheckout. O módulo irá traduzir, adicionar estados, formatar, validar campos e adicionar novos campos. Iremos tratar os principais campos, como: Rua, Bairro, Cidade, Estado, Cep com busca por Ajax com busca nos Correios, CPF/CNPJ, IE(Inscrição Estadual), tipo pessoa, Telefone, Celular,…

Importante!
=================
#####################################################################
#     Faça sempre backup antes de realizar qualquer modificação!    #
#####################################################################


Oque esse módulo irá fazer?
=================

Com o módulo OSC-Magento-Brasil irá se ter o meio mais famoso de checkout do Magento conhecido por OSC(One Step Checkout) e iremos fazer outros ajustes, como:

* Tradução dos Campos do formulário. (feito!)
* Inclusão dos estados brasileiros. (feito!)
* Remodelação do campo endereço do magento de 4 linhas. Dividindo e formatando para Endereço, Número, Bairro e Cidade. (feito!)
* Utilização do campo taxvat por padrão como campo de CPF/CNPJ. (feito!)
* Busca do endereço por ajax direto do site dos Correios. (feito!)
* Formatação dos campos por máscara. Exe: Telefone com 9 ou 8 dígitos (99) ?9999-9999. (feito!)
* Inclusão do campo tipo pessoa (Física ou Jurídica) (feito!)
* IE(Inscrição Estadual) para gereção da NFE (feito!)
* Inclusão do campo RG(Identidade) (feito!)
* Opção de desligar todos os campos (feito!)
* Opção de atribuição de obrigatório em todos os campos (feito!)
* E outras coisas mais

Também pretendo implementar opções de segurança, como:

* Detecção de utilização de proxy com envio de email ao administrador
* Detecção de compras suspeitas com envio de email ao administrador (Irá verificar por Geolocalização local onde foi feito a compra e bater com o local de entrega)
* Integração com o sistema de detecção de fraude Maxmind (http://www.maxmind.com)

veja mais dicas sobre análise de risco e fraude no Magento em:
http://www.deivison.com.br/blog/2012/07/25/modulo-de-analise-de-risco-e-fraude-no-magento-sem-mensalidade/

Observações Importantes!
=================
Por motivos de segurança, recomendamos que faça sempre o download desse módulo diretamente no Github ou aqui no site do projeto. Atualmente na web, muitas pessoas mau intencionadas pegam templates e projetos Open Source, descompactam, inserem scripts maliciosos em js criptografados e redistribuem na web! Outra modalidade de pessoas mau intencionadas são as que pegam o projeto Open Source feito na integra, não realizam nenhuma alteração e redistribuem na web como se fosse a pessoa responsável ou participante no projeto, sem que ao menos terem adicionado uma linha sequer ao projeto!

Dessa forma prestigiaram e incentivaram os mantenedores do projeto e terão a garantia de não pegar o módulos com scripts maliciosos!

Projeto 100% auditado pelos mantenedores no Github!

Considerações finais do projeto
=================
Realmente fazer essas customizações, nos deu muito trabalho e noites viradas, mas acreditamos ter valido a pena!
Foi fundamental para o desenvolvimentos desse módulo nossas buscas incessantes de aperfeiçoamento em desenvolvimento no Magento e da ratificação da real necessidade de termos um módulo padronizado para o Brasil. E assim nos livrar do POG a cada instalação de um e-commerce! rs
Um cuidado e observação nossa, foi desenvolver o módulo para trabalhar de forma genérica para assim atender as necessidades básicas descritas por nós e por emails e comentários enviados.

Procuramos fazer todas as customizações seguindo as rigorosas padronizações do Zend, assim acreditamos ter criado um módulo robusto e que irá suprir e contribuir muito para a comunidade.

Pensei por diversas vezes em colocar ou não esse módulo FREE! Por um lado eu poderia ter criptografado o módulo com o Ioncube e ter ganhado um bom dinheiro com ele, pois como podemos ver esse mesmo módulo sem customização nehuma é vendido pelos grandes cases em Magento de R$500 a R$1.200 reais. Mas por outro lado, pesou muito a contribuiçao e a nossa mente Open Source, onde acreditamos que o maior valor adquirido foi o conhecimento e a possibilidade do aumento infinito intelectual ao projeto!


PS: Coloquei o projeto como sendo versão final, mas na verdade sei que será somente o começo né rsrs, pois sei oque o volume que receberei de dicas e acertos vai ser muito grande! Na verdade a versão final representará o ponto que irei pegar bem menos para mexer no projeto e deixarei o projeto aberto mais a contribuições da comunidade pelo Github.


Release da versão Final 3.0
=================
1 Controle do conflito na duplicidade dos dados instalados (Ou seja, antes caso opta-se por reinstalar o módulos estava dando o erro no bd de campos duplicados. Acontecia isso com os estados e com os novos campos, caso já os tinha no bd. Já nessa versão o sistema faz a verificação da existencia no bd de todos os campos e dos estados.)
2 Controle de todos os campos pela ADM por exibir ou não e/ou de serem ou não obrigatório.
3 Campos configuráveis no registro dos usuários: CFP/CNPJ, Empresa, IE e Identidade.
4 Campos configuráveis do reponsável pelo recebimento no envio: CFP/CNPJ, IE, Identidade e Celular.
5 Opção de habilitar ou desabilitar a biblioteca Jquery.
6 Opção de habilitar ou desabilitar a Formatação do campo CEP (Pois componentes como o Matrix Rates não permitem o "-", apenas os números).
7 Opção de escolha do campo CPF/CNPJ pelo taxvat ou não.
8 Exibição de todos os campos nos dados da ordem de serviço.
9 Escolha da exibição do link de login pelo box OSC ou pela tela nativa do Magento.

Release da versão Beta 2.0
=================
* Adicionado formatação dos campos telephone e fax com 8 ou 9 digitos por Expreg onde também altera o maxlength. E adicionado formatação do campo taxvat(CPF/CNPJ)

Site e comunidade do projeto:
=================
http://onestepcheckout.com.br/

Demostração online do projeto:
=================
http://onestepcheckout.com.br/final3/dddddd.html

Tutorial para instalação e tratamentos de erros:
=================
#########################################################################################################################
http://www.deivison.com.br/blog/2012/08/11/osc-magento-brasil-magento-one-step-checkout-free-e-normatizado-para-o-brasil/
#########################################################################################################################  

Desenvolvedores e mantenedores do projeto Módulo OSC-Magento-Brasil:
=================
* Deivison Arthur Lemos Serpa 
http://www.deivison.com.br
* Denis Colli Spalenza 
http://www.xpdev.com.br

Versão do projeto:
=================
O módulo ainda encontra-se em fase de desenvolvimento! Ou seja, Estágio Final – v 3.0 para testes e homologação!

Créditos:
=================
* Projeto base de OSC utilizado: http://www.interiorwebdesign.com/magento/magento-one-step-checkout-module.html
* Instação dos estados por Alex Braga: http://www.alexbraga.net
* Script base para implementação da busca do CEP por Ajax: http://www.pinceladasdaweb.com.br/blog/2012/01/31/webservice-consulta-de-cep-diretamente-ao-site-dos-correios/
* Traduções pt-BR do Magento: http://www.cerebrum.com.br/index.php/magento-portugues-download-traducao-brasil-cielo-redecard-american-express.html

Logs:
=================
Projeto iniciado dia: 11/08/2012 ás 19h
Estágio do projeto:  Versão Final 3.0 (testes e homologação)
Link do demo: http://onestepcheckout.com.br/final3

Gostou do módulo?
=================

Se você gostou, se foi útil para você, se fez você economizar aquela grana pois estava prestes a pagar caro por aquele módulo pago, pois não achava um solução gratuita que te atendesse e queira prestigiar o trabalho feito efetuando uma doação de qualquer valor, não vou negar e vou ficar grato, você pode fazer isso utilizando o Pagseguro no site ofical do projeto:
http://onestepcheckout.com.br/
