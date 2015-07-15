<?php
/**
 * @category	Solide Webservices
 * @package     CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Model_Config_Source_Cmsblocksize {

	/**
	 * Retrieve an array of possible options
	 *
	 * @return array
	 */
	public function toOptionArray($includeEmpty = false, $emptyText = '-- Please Select --') {
		$options = array();

		if ($includeEmpty) {
			$options[] = array(
				'value' => '',
				'label' => Mage::helper('customsuccesspage')->__($emptyText),
			);
		}

		foreach($this->getOptions() as $value => $label) {
			$options[] = array(
				'value' => $value,
				'label' => Mage::helper('customsuccesspage')->__($label),
			);
		}

		return $options;
	}

	/**
	 * Retrieve an array of possible options
	 *
	 * @return array
	 */
	public function getOptions() {
		return array(
			'half' 		=> Mage::helper('customsuccesspage')->__('Half Width (50% column)'),
			'third' 	=> Mage::helper('customsuccesspage')->__('Third Width (33% row)'),
			'full' 		=> Mage::helper('customsuccesspage')->__('Full Width (100% column)'),
		);
	}

}
