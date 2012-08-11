<?php
class IWD_OnepageCheckout_Block_Widget_Gender extends Mage_Customer_Block_Widget_Gender
{
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('onepagecheckout/widget/gender.phtml');
    }
}
