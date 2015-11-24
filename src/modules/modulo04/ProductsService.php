<?php

/**
 * Description of erpUrjcService
 *
 * @author jvicentem
 */


class ProductsService {
    private $externalDataProvider;
    
    function __construct(ProductsExternalSourceInterface $externalSource){
        $this->externalDataProvider = $externalSource; 
    }
    
    private function getExternalDataProvider() {
        return $this->externalDataProvider;
    }
    
    public function productsList() {
        return $this->getExternalDataProvider()->fetchProducts();
    }
    
    public function addProduct($name,$price) {
        return $this->getExternalDataProvider()->insertProduct($name,$price);
    }
    
    public function modifyProduct($idp,$name,$price) {
        return $this->getExternalDataProvider()->updateProduct($idp,$name,$price);
    }
    
    public function removeProduct($idp) {
        return $this->getExternalDataProvider()->deleteProduct($idp);
    }
}
