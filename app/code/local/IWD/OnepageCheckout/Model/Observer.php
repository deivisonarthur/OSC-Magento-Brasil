<?php
class IWD_OnepageCheckout_Model_Observer
{
    public function addHistoryComment($data)
    {
        $comment	= Mage::getSingleton('customer/session')->getOrderCustomerComment();
        $comment	= trim($comment); 
        if (!empty($comment))
			$data['order']->addStatusHistoryComment($comment)->setIsVisibleOnFront(true)->setIsCustomerNotified(false);
    }

    public function removeHistoryComment()
    {
        Mage::getSingleton('customer/session')->setOrderCustomerComment(null);
    }
    
	public function setEmptyCartTemplate()
	{
		if (Mage::helper('onepagecheckout')->isOnepageCheckoutEnabled())
		{
			$cartHelper = Mage::helper('checkout/cart');
			$layout = Mage::getSingleton('core/layout');
	 
	        if (!$cartHelper->getItemsCount()){
				$layout->getBlock('checkout.cart')->setTemplate('onepagecheckout/cart/noItems.phtml');
			}
		}
    }    
}
