<?php
class DeivisonArthur_OnepageCheckout_Helper_Url extends Mage_Checkout_Helper_Url
{
    public function getCheckoutUrl()
    {
        return $this->_getUrl('onepagecheckout', array('_secure'=>true));
    }
}
