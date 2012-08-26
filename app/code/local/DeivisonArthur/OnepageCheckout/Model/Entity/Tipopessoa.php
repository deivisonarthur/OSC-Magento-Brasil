<?php
class DeivisonArthur_OnepageCheckout_Model_Entity_Tipopessoa extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
	public function getAllOptions()
	{
		if ($this->_options === null) {
			$this->_options = array();
			$this->_options[] = array(
                    'value' => '',
                    'label' => 'Escolha a opcao'
			);
			$this->_options[] = array(
                    'value' => 1,
                    'label' => 'Fisica'
			);
			$this->_options[] = array(
                    'value' => 2,
                    'label' => 'Juridica'
			);
			$this->_options[] = array(
                    'value' => 3,
                    'label' => 'Outro'
			);
			
		}

		return $this->_options;
	}
}