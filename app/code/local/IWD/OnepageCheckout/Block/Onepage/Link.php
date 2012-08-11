<?php

class IWD_OnepageCheckout_Block_Onepage_Link extends Mage_Core_Block_Template
{
    public function isOnepageCheckoutAllowed()
    {
        return $this->helper('onepagecheckout')->isOnepageCheckoutEnabled();
    }

    public function checkEnable()
    {
        return Mage::getSingleton('checkout/session')->getQuote()->validateMinimumAmount();
    }

    public function getOnepageCheckoutUrl()
    {
    	$url	= $this->getUrl('onepagecheckout', array('_secure' => true));
        return $url;
    }
}
