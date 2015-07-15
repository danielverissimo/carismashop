<?php
/**
 * @category	Solide Webservices
 * @package     CustomSuccessPage
 */

class SolideWebservices_Customsuccesspage_Model_Observer {

	/**
	 * Add scripts depending on configuration values
	 */
	public function loadScripts($observer) {

		//initialize
		$jQueryPath = (Mage::getStoreConfig('customsuccesspage/configuration/version_jquery') == 'latest' ? 'http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' : 'customsuccesspage/jquery-'. Mage::getStoreConfig('customsuccesspage/configuration/version_jquery') .'.min.js');

		if (Mage::getStoreConfig('customsuccesspage/configuration/enabled')) {
			$_head = $this->__getHeadBlock();

			if ($_head) {

				// load css
				$_head->addFirst('skin_css', 'customsuccesspage/customsuccesspage.min.css');
				if(Mage::getStoreConfig('customsuccesspage/social/social_global') || Mage::getStoreConfig('customsuccesspage/social/social_items_ordered')) {

					// load social buttons css
					$_head->addFirst('skin_css', 'customsuccesspage/social-buttons.min.css');

					// determine if the scripts should be loaded first or last
					if(Mage::getStoreConfig('customsuccesspage/configuration/jquery_position') == 'before') {
						if(Mage::getStoreConfig('customsuccesspage/configuration/enable_jquery') && Mage::getStoreConfig('customsuccesspage/configuration/jquery_noconflictmode')) {
							$_head->addFirst('js', 'customsuccesspage/social-buttons.solide.min.js');
						} else {
							$_head->addFirst('js', 'customsuccesspage/social-buttons.min.js');
						}
					} else {
						if(Mage::getStoreConfig('customsuccesspage/configuration/enable_jquery') && Mage::getStoreConfig('customsuccesspage/configuration/jquery_noconflictmode')) {
							$_head->addEnd('js', 'customsuccesspage/social-buttons.solide.min.js');
						} else {
							$_head->addEnd('js', 'customsuccesspage/social-buttons.min.js');
						}
					}

					// if jQuery is enabled
					if(Mage::getStoreConfig('customsuccesspage/configuration/enable_jquery')) {

						$_head->addBefore('js', $jQueryPath, 'customsuccesspage/social-buttons.solide.min.js');

						// should noConflict mode be loaded
						if(Mage::getStoreConfig('customsuccesspage/configuration/jquery_noconflictmode')) {
							$_head->addAfter('js', 'customsuccesspage/jquery.noconflict.js', $jQueryPath);
						}

					}
				}

			}
		}
	}

	/*
	 * Get head block
	 */
	private function __getHeadBlock() {
		return Mage::getSingleton('core/layout')->getBlock('customsuccesspage_head');
	}

	/**
	 * Submitted contact forms are processed by another controller,
	 * so redirect right back to where we came from.
	 * @see Mage_Contacts_IndexController::postAction()
	 *
	 * @param Varien_Event_Observer $observer
	 * @return Netresearch_AppFactory_Model_Observer
	 */
	public function redirectReferer(Varien_Event_Observer $observer) {
		/* @var $action Mage_Core_Controller_Varien_Action */
		$action = $observer->getControllerAction();
		if ($action instanceof Mage_Contacts_IndexController) {
			if($action->getRequest()->getPost('referer')){
				$action->getResponse()->setRedirect($action->getRequest()->getPost('referer'));
			}
		}
		return $this;
	}

}
