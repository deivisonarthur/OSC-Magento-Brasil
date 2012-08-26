<?php
class DeivisonArthur_OnepageCheckout_Block_Widget_Taxvat extends Mage_Customer_Block_Widget_Taxvat
{
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('onepagecheckout/widget/taxvat.phtml');
    }
}
