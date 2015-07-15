<?php
/**
 * @category	Solide Webservices
 * @package     CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Helper_Data extends Mage_Core_Helper_Abstract {

	/**
	 * Determine whether the extension is enabled
	 *
	 * @return bool
	*/
	public function isEnabled() {
		return Mage::getStoreConfig('customsuccesspage/configuration/enabled');
	}

	/**
	 * Determine whether the extension is enabled
	 *
	 * @return bool
	*/
	public function addOpenGraph() {
		return Mage::getStoreConfig('customsuccesspage/social/social_opengraph');
	}

	/**
	 * Return latest order
	 *
	 * @return order
	*/
	public function returnOrder() {
		$orderId = Mage::getSingleton('checkout/session')->getLastRealOrderId();
		$_order = Mage::getModel('sales/order')->loadByIncrementId($orderId);

		return $_order;
	}

	/**
	 * Sort the sections
	 *
	 * @return csp sections
	*/
	public function sortSections() {
		$sections = array(
			'csp.items.ordered' => Mage::getStoreConfig('customsuccesspage/ordered/items_ordered_sort'),
			'csp.related.products' => Mage::getStoreConfig('customsuccesspage/related/related_products_sort'),
			'csp.cms.blocks' => Mage::getStoreConfig('customsuccesspage/cms_blocks/cms_blocks_sort'),
		);

		asort($sections);

		return $sections;
	}

	/**
	 * Enrich share text
	 *
	 * @return csp sections
	*/
	public function enrichShareText($scope, $id) {
		if($scope=='website'){
			$shareText = Mage::getStoreConfig('customsuccesspage/social/social_global_share_text');
			$shareText = str_replace('{{website}}', Mage::getStoreConfig('general/store_information/name'), $shareText);

			return urlencode($shareText);

		} elseif($scope=='product') {
			$shareText = Mage::getStoreConfig('customsuccesspage/social/social_items_ordered_share_text');
			$shareText = str_replace('{{website}}', Mage::getStoreConfig('general/store_information/name'), $shareText);
			$obj = Mage::getModel('catalog/product');
			$_product = $obj->load($id);
			$shareText = str_replace('{{product_name}}', $_product->getName(), $shareText);

			return urlencode($shareText);

		} elseif($scope=='intro' || 'cmsblock') {

			if($scope=='intro'){
				$shareText = $id;
			} elseif($scope=='cmsblock'){
				$shareText = Mage::getModel('cms/block')->load(Mage::getStoreConfig($id))->getContent();
			}

			$orderId = Mage::getSingleton('checkout/session')->getLastRealOrderId();
			$_order = Mage::getModel('sales/order')->loadByIncrementId($orderId);
			$shareText = str_replace('{{website}}', Mage::getStoreConfig('general/store_information/name'), $shareText);
			$shareText = str_replace('{{order_date}}', $_order->getCreatedAtStoreDate()->toString(Varien_Date::DATETIME_INTERNAL_FORMAT), $shareText);
			$shareText = str_replace('{{order_number}}', $orderId, $shareText);
			$shareText = str_replace('{{customer_firstname}}', $_order->getCustomerFirstname(), $shareText);
			$shareText = str_replace('{{customer_middlename}}', $_order->getCustomerMiddlename(), $shareText);
			$shareText = str_replace('{{customer_lastname}}', $_order->getCustomerLastname(), $shareText);
			$shareText = str_replace('{{customer_fullname}}', $_order->getCustomerName(), $shareText);

			$shipmentCollection = Mage::getResourceModel('sales/order_shipment_collection')
				->setOrderFilter($_order)
				->load();

			foreach ($shipmentCollection as $shipment){
				foreach($shipment->getAllTracks() as $tracknum){
					$tracknums[]=$tracknum->getNumber();
				}
			}
			$shareText = str_replace('{{order_trackingnumber}}', implode(' ', $tracknums), $shareText);

			return $shareText;

		}

	}

}
