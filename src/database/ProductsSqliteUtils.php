<?php


/**
 *
 * @author jvicentem
 */

include_once("ProductsExternalSourceInterface.php");

class ProductsSqliteUtils extends SQLite3 implements ProductsExternalSourceInterface {
    const TABLE_NAME = 'productos';
    const PRODUCT_NAME_FIELD = 'nombre';
    const PRODUCT_PRICE_FIELD = 'precio';
    const PRODUCT_ID_FIELD = 'IDP';

    public function __construct() {
        $this->open("products.db");
    }
    
    private function getTableName(){
        return ProductsSqliteUtils::TABLE_NAME;
    }
    
    private function getProductNameField(){
        return ProductsSqliteUtils::PRODUCT_NAME_FIELD;
    }
    
    private function getProductPriceField(){
        return ProductsSqliteUtils::PRODUCT_PRICE_FIELD;
    }
    
    private function getProductIdField(){
        return ProductsSqliteUtils::PRODUCT_ID_FIELD;
    }
    
    public function query_to_array($query) {
        $results = $this->query($query);
        
        //Add all records to an array
        $rows = array();
        while ($row = $results->fetchArray()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public function fetchProducts() {
        return $this->query_to_array("SELECT * FROM {$this->getTableName()}");
    }
    
    public function insertProduct($name,$price) {
        return $this->exec("INSERT INTO {$this->getTableName()}({$this->getProductNameField()},{$this->getProductPriceField()}) VALUES ('$name','$price')");
    }
    
    public function updateProduct($idp,$name,$price) {
        return $this->exec("UPDATE {$this->getTableName()} SET {$this->getProductNameField()}='$name', {$this->getProductPriceField()}='$price' where {$this->getProductIdField()}='$idp'");
    }
    
    public function deleteProduct($idp) {
        return $this->exec("delete from {$this->getTableName()} where {$this->getProductIdField()}={$idp}" );
    }
    
}

