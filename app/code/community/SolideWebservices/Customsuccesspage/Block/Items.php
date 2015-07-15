<?php
/**
 * @category	Solide Webservices
 * @package		CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Block_Items extends Mage_Sales_Block_Order_View {

	/**
	* Retrieve current order model instance
	*
	* @return Mage_Sales_Model_Order
	*/
	public function getOrder() {
		return Mage::helper('customsuccesspage')->returnOrder();
	}

}
