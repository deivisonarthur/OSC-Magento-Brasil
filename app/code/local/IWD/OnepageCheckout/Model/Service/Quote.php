<?php
class IWD_OnepageCheckout_Model_Service_Quote extends Mage_Sales_Model_Service_Quote
{
    protected function _validate()
    {
        $helper = Mage::helper('sales');
        if (!$this->getQuote()->isVirtual())
        {
            $address = $this->getQuote()->getShippingAddress();
            $addrValidator = Mage::getSingleton('onepagecheckout/type_geo')->validateAddress($address);
            if ($addrValidator !== true)
                Mage::throwException($helper->__('Please check shipping address information. %s', implode(' ', $addrValidator)));

            $ship_method = $address->getShippingMethod();
            $rate = $address->getShippingRateByCode($ship_method);
            if (!$this->getQuote()->isVirtual() && (!$ship_method || !$rate))
                Mage::throwException($helper->__('Please specify a shipping method.'));
        }

        $addrValidator = Mage::getSingleton('onepagecheckout/type_geo')->validateAddress($this->getQuote()->getBillingAddress());

        if ($addrValidator !== true)
            Mage::throwException($helper->__('Please check billing address information. %s', implode(' ', $addrValidator)));

        if (!($this->getQuote()->getPayment()->getMethod()))
			Mage::throwException($helper->__('Please select a valid payment method.'));

        return $this;
    }
}
