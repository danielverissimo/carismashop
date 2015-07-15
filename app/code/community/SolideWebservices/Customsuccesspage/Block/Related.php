<?php
/**
 * @category	Solide Webservices
 * @package		CustomSuccessPage
 */
 
class SolideWebservices_Customsuccesspage_Block_Related extends Mage_Catalog_Block_Product_List {

	protected function _getProductCollection() {
		
        $orderItems = Mage::helper('customsuccesspage')->returnOrder()->getAllItems();
		$relatedProducts = array();
		
		switch(Mage::getStoreConfig('customsuccesspage/related/related_products_type')){
			case 'related':
				foreach($orderItems as $orderItem) {
					$relatedProducts[] = $orderItem->getProduct()->getRelatedProductIds();
				}
				break;
			case 'cross-sell':
				foreach($orderItems as $orderItem) {
					$relatedProducts[] = $orderItem->getProduct()->getCrossSellProductIds();
				}
				break;
			case 'both':
				foreach($orderItems as $orderItem) {
					$relatedProducts[] = $orderItem->getProduct()->getRelatedProductIds();
					$relatedProducts[] = $orderItem->getProduct()->getCrossSellProductIds();
				}
				break;
		}
		
		$filteredRelatedProducts = array_values( array_filter($relatedProducts));

		$this->_productCollection = Mage::getModel('catalog/product')->getCollection()
			->addIdFilter($filteredRelatedProducts)
			->addStoreFilter()
			->setPageSize(Mage::getStoreConfig('customsuccesspage/related/related_products_number'))
            ->setCurPage(1);

		if (Mage::helper('catalog')->isModuleEnabled('Mage_Checkout')) {
			Mage::getResourceSingleton('checkout/cart')->addExcludeProductFilter($this->_productCollection, Mage::getSingleton('checkout/session')->getQuoteId());
			$this->_addProductAttributesAndPrices($this->_productCollection);
		}

		Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($this->_productCollection);

		$this->_productCollection->load();

		foreach ($this->_productCollection as $product) {
			$product->setDoNotUseCategoryId(true);
		}

        return $this->_productCollection;
    }
}