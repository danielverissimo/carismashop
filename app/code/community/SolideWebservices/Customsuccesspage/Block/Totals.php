<?php
/**
 * @category	Solide Webservices
 * @package		CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Block_Totals extends Mage_Sales_Block_Order_Totals {

	/**
	* Retrieve current order model instance
	*
	* @return Mage_Sales_Model_Order
	*/
	public function getOrder() {
		return Mage::helper('customsuccesspage')->returnOrder();
	}

}
