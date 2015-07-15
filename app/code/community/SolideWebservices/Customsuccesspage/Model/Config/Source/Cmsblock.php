<?php
/**
 * @category	Solide Webservices
 * @package     CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Model_Config_Source_Cmsblock {

	/**
	 * Retrieve an array of possible options
	 *
	 * @return array
	 */
	public function toOptionArray($includeEmpty = false, $emptyText = 'None') {
		$options = array();

		if ($includeEmpty) {
			$options[] = array(
				'value' => '',
				'label' => Mage::helper('customsuccesspage')->__($emptyText),
			);
		}

		$collection = Mage::getModel('cms/block')->getCollection();
		if($collection->count()) {
			$options[] = array('value' => 'none', 'label' => Mage::helper('customsuccesspage')->__($emptyText));
			$options[] = array('value' => 'summary', 'label' => Mage::helper('customsuccesspage')->__('CSP: Order Summary'));
			$options[] = array('value' => 'form', 'label' => Mage::helper('customsuccesspage')->__('CSP: Feedback Form'));
			$blocks = $collection->getData();
			foreach($blocks as $block) {
				$options[] = array('value' => $block['block_id'], 'label'=>Mage::helper('customsuccesspage')->__($block['title']));
			}
		} else {
			$options[] = array('value' => 0, 'label'=>Mage::helper('customsuccesspage')->__('-- No CMS Block(s) available --'));
		}

		return $options;
	}

}
