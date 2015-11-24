<?php

/**
 * Description of erpUrjcService
 *
 * @author jvicentem
 */


class ErpUrjcService {
    private $externalDataProvider;
    
    function __construct(ExternalSourceInterface $externalSource){
        $this->externalDataProvider = $externalSource; 
    }
    
    public function getExternalDataProvider() {
        return $this->externalDataProvider;
    }
    
    public function productsList() {
        $this->getExternalDataProvider()->fetchProducts();
    }
    
    public function addProduct($name,$price) {
        $this->getExternalDataProvider()->insertProduct($name,$price);
    }
    
    public function modifyProduct($idp,$name,$price) {
        $this->getExternalDataProvider()->updateProduct($idp,$name,$price);
    }
    
    public function removeProduct($idp) {
        $this->getExternalDataProvider()->deleteProduct($idp);
    }
}
