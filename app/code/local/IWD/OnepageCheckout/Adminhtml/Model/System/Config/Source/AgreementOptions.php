<?php
class IWD_OnepageCheckout_Adminhtml_Model_System_Config_Source_AgreementOptions
{
    public function toOptionArray()
    {
    	$help_obj	= Mage::helper('onepagecheckout');
    	$options	= array(
            array('value' => 'standard','label' => $help_obj->__('Standard')),
            array('value' => 'minimal',	'label' => $help_obj->__('Minimal'))
        );
        return $options; 
    }
}
