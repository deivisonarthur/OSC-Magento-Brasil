<?php
class IWD_OnepageCheckout_Block_Links extends Mage_Checkout_Block_Links
{
    public function addCheckoutLink()
    {
		if ($this->helper('onepagecheckout')->isOnepageCheckoutEnabled()) 
        {
        	$parent = $this->getParentBlock();
			if ($parent)
            	$parent->addLink($this->helper('checkout')->__('Checkout'), 'onepagecheckout', $this->helper('checkout')->__('Checkout'), true, array('_secure'=> true), 60, null, 'class="top-link-checkout"');

			return $this;
        }
        else
            return parent::addCheckoutLink();
    }
}