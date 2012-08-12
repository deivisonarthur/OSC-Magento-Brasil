<?php

$installer = $this;

$installer->startSetup(); //inicia a instalação

$tabela = $this->getTable('directory/country_region'); //pega o nome da tabela que contém os estados no magento

//adiciona os estados na tabela com os nomes dos estados
$installer->run("
INSERT INTO `{$tabela}` (`country_id`, `code`, `default_name`) VALUES
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
");

/*==============================================================================
 *
 *  Busca o id do primeiro estado brasileiro
 *
 * =============================================================================
 */

$sql = "SELECT region_id, code FROM {$tabela} WHERE code = 'AC' and country_id = 'BR'"; //faz uma busca pelo id do priemiro estado brasileiro que foi cadastrado no passo anterior
$connection = Mage::getSingleton('core/resource')->getConnection('core_read');
$estado = $connection->fetchAll($sql);
$id_acre = $estado[0]['region_id']; //priemiro id dos estados

$tabela_nome = $this->getTable('directory/country_region_name'); //pega o nome da tabela que contém os nomes dos estados no magento. Essa tabela pode conter traduções dos nomes dos estados

$comando =  "INSERT INTO `{$tabela_nome}` (`locale`, `region_id`, `name`) VALUES
('pt_BR', '". $id_acre ."', 'Acre'),
('pt_BR', '". ($id_acre+1) ."', 'Alagoas'),
('pt_BR', '". ($id_acre+2) ."', 'Amapa'),
('pt_BR', '". ($id_acre+3) ."', 'Amazonas'),
('pt_BR', '". ($id_acre+4) ."', 'Bahia'),
('pt_BR', '". ($id_acre+5) ."', 'Ceara'),
('pt_BR', '". ($id_acre+6) ."', 'Espirito Santo'),
('pt_BR', '". ($id_acre+7) ."', 'Goias'),
('pt_BR', '". ($id_acre+8) ."', 'Maranhao'),
('pt_BR', '". ($id_acre+9) ."', 'Mato Grosso'),
('pt_BR', '". ($id_acre+10) ."', 'Mato Grosso do Sul'),
('pt_BR', '". ($id_acre+11) ."', 'Minas Gerais'),
('pt_BR', '". ($id_acre+12) ."', 'Para'),
('pt_BR', '". ($id_acre+13) ."', 'Paraiba'),
('pt_BR', '". ($id_acre+14) ."', 'Paraná'),
('pt_BR', '". ($id_acre+15) ."', 'Pernambuco'),
('pt_BR', '". ($id_acre+16) ."', 'Piaui'),
('pt_BR', '". ($id_acre+17) ."', 'Rio de Janeiro'),
('pt_BR', '". ($id_acre+18) ."', 'Rio Grande do Norte'),
('pt_BR', '". ($id_acre+19) ."', 'Rio Grande do Sul'),
('pt_BR', '". ($id_acre+20) ."', 'Rondonia'),
('pt_BR', '". ($id_acre+21) ."', 'Roraima'),
('pt_BR', '". ($id_acre+22) ."', 'Santa Catarina'),
('pt_BR', '". ($id_acre+23) ."', 'Sao Paulo'),
('pt_BR', '". ($id_acre+24) ."', 'Sergipe'),
('pt_BR', '". ($id_acre+25) ."', 'Tocantins'),
('pt_BR', '". ($id_acre+26) ."', 'Distrito Federal');";

//adiciona os estados
$installer->run($comando);

$installer->endSetup();