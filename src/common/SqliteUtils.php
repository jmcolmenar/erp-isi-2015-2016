<?php

use SQLite3;

/**
 *
 * @author jvicentem
 */
class SqliteUtils extends SQLite3 implements externalSourceInterface {
    const TABLE_NAME = 'productos';
    const PRODUCT_NAME_FIELD = 'nombre';
    const PRODUCT_PRICE_FIELD = 'precio';
    const PRODUCT_ID_FIELD = 'IDP';

    public function __construct($name) {
        parent::__construct($name);
    }
    
    private function getTableName(){
        return SqliteUtils::TABLE_NAME;
    }
    
    private function getProductNameField(){
        return SqliteUtils::PRODUCT_NAME_FIELDE;
    }
    
    private function getProductPriceField(){
        return SqliteUtils::PRODUCT_PRICE_FIELD;
    }
    
    private function getProductIdField(){
        return SqliteUtils::PRODUCT_ID_FIELD;
    }
    
    private function query_to_array($query) {
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
        return $this->exec("INSERT INTO {$this->getTableName()}({$this->getProductNameField()},{$this->getTableName()}({$this->getProductPriceField()}) VALUES (\'$name\',\'$price\')");
    }
    
    public function updateProduct($idp,$name,$price) {
        return $this->exec("UPDATE {$this->getTableName()} SET {$this->getProductNameField()}=\'$name\', {$this->getProductPriceField()}=\'$price\' where {$this->getProductIdField()}=\'$idp\'");
    }
    
    public function deleteProduct($idp) {
        return $this->exec("delete from {$this->getTableName()} where {$this->getProductIdField()}={$idp}" );
    }
    
}

