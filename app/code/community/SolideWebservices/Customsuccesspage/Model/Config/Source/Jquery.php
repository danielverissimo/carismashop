<?php
/**
 * @category	Solide Webservices
 * @package     CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Model_Config_Source_Jquery {

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
			'2.1.3' 	=> Mage::helper('customsuccesspage')->__('Version 2.1.3'),
			'1.11.2' 	=> Mage::helper('customsuccesspage')->__('Version 1.11.2'),
			'1.10.2' 	=> Mage::helper('customsuccesspage')->__('Version 1.10.2'),
		);
	}

}
