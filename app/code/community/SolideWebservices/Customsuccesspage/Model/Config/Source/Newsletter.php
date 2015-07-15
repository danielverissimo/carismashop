<?php
/**
 * @category	Solide Webservices
 * @package     CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Model_Config_Source_Newsletter {

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
			'intro_text' 	=> Mage::helper('customsuccesspage')->__('Below Intro Text'),
			'bottom' 		=> Mage::helper('customsuccesspage')->__('Bottom Success Page (besides continue button)'),
		);
	}

}
