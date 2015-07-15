<?php
/**
 * @category	Solide Webservices
 * @package     CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Block_Page_Html_Opengraph extends Mage_Page_Block_Html_Head {


	/* add dynamic css based on backend settings to HEAD */
	protected function _prepareLayout() {
		parent::_prepareLayout();
		if($this->helper('customsuccesspage')->isEnabled() && $this->helper('customsuccesspage')->addOpenGraph()) {
			if($head_block = $this->getLayout()->getBlock('head')) {
				$opengraph_block = $this->getLayout()->createBlock('Mage_Core_Block_Template', 'customsuccesspage_opengraph')->setTemplate('customsuccesspage/opengraph.phtml');
				$head_block->setChild('customsuccesspage_opengraph', $opengraph_block);
			}
		}
	}

}
