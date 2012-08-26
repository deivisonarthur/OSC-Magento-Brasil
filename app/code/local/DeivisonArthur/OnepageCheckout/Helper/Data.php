<?php

class DeivisonArthur_OnepageCheckout_Helper_Data extends Mage_Core_Helper_Abstract
{
    protected $_agree = null;

    public function isOnepageCheckoutEnabled()
    {
        return (bool)Mage::getStoreConfig('onepagecheckout/general/enabled');
    }

    public function isGuestCheckoutAllowed()
    {
        return Mage::getStoreConfig('onepagecheckout/general/guest_checkout');
    }

    public function isShippingAddressAllowed()
    {
    	return Mage::getStoreConfig('onepagecheckout/general/shipping_address');
    }

    public function getAgreeIds()
    {
        if (is_null($this->_agree))
        {
            if (Mage::getStoreConfigFlag('onepagecheckout/agreements/enabled'))
            {
                $this->_agree = Mage::getModel('checkout/agreement')->getCollection()
                    												->addStoreFilter(Mage::app()->getStore()->getId())
                    												->addFieldToFilter('is_active', 1)
                    												->getAllIds();
            }
            else
            	$this->_agree = array();
        }
        return $this->_agree;
    }
    
    public function isSubscribeNewAllowed()
    {
        if (!Mage::getStoreConfig('onepagecheckout/general/newsletter_checkbox'))
            return false;

        $cust_sess = Mage::getSingleton('customer/session');
        if (!$cust_sess->isLoggedIn() && !Mage::getStoreConfig('newsletter/subscription/allow_guest_subscribe'))
            return false;

		$subscribed	= $this->getIsSubscribed();
		if($subscribed)
			return false;
		else
			return true;
    }
    
    public function getIsSubscribed()
    {
        $cust_sess = Mage::getSingleton('customer/session');
        if (!$cust_sess->isLoggedIn())
            return false;

        return Mage::getModel('newsletter/subscriber')->getCollection()
            										->useOnlySubscribed()
            										->addStoreFilter(Mage::app()->getStore()->getId())
            										->addFieldToFilter('subscriber_email', $cust_sess->getCustomer()->getEmail())
            										->getAllIds();
    }
}