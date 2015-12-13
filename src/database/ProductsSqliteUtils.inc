<?php


/**
 *
 * @author jvicentem
 */

class ProductsSqliteUtils extends SQLite3 {
    const TABLE_NAME = 'productos';
    const PRODUCT_NAME_FIELD = 'nombre';
    const PRODUCT_PRICE_FIELD = 'precio';
    const PRODUCT_ID_FIELD = 'IDP';

    private static $connection;
    
    static function init() {
        $db = new SQLite3(filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING).'/src/database/products.db');
        self::$connection = $db;
    }
    
    private static function getTableName(){
        return ProductsSqliteUtils::TABLE_NAME;
    }
    
    private static function getProductNameField(){
        return ProductsSqliteUtils::PRODUCT_NAME_FIELD;
    }
    
    private static function getProductPriceField(){
        return ProductsSqliteUtils::PRODUCT_PRICE_FIELD;
    }
    
    private static function getProductIdField(){
        return ProductsSqliteUtils::PRODUCT_ID_FIELD;
    }
    
    private static function query_to_array($query) {
        $results = ProductsSqliteUtils::$connection->query($query);
        
        //Add all records to an array
        $rows = array();
        while ($row = $results->fetchArray()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public static function fetchProductsOrderedBy($sortRule) {
        $table_name = ProductsSqliteUtils::getTableName();
        return ProductsSqliteUtils::query_to_array("SELECT * FROM {$table_name} ORDER BY {$sortRule}");
    }
    
    public static function fetchProducts() {
        $table_name = ProductsSqliteUtils::getTableName();
        return ProductsSqliteUtils::query_to_array("SELECT * FROM {$table_name}");
    }
    
    public static function insertProduct($name,$price) {
        $table_name = ProductsSqliteUtils::getTableName();
        $name_field = ProductsSqliteUtils::getProductNameField();
        $product_field = ProductsSqliteUtils::getProductPriceField();
        return ProductsSqliteUtils::$connection->exec("INSERT INTO {$table_name}({$name_field},{$product_field}) VALUES ('$name','$price')");
    }
    
    public static function updateProduct($idp,$name,$price) {
        $table_name = ProductsSqliteUtils::getTableName();
        $name_field = ProductsSqliteUtils::getProductNameField();
        $product_field = ProductsSqliteUtils::getProductPriceField();
        $id_field = ProductsSqliteUtils::getProductIdField();
        return ProductsSqliteUtils::$connection->exec("UPDATE {$table_name} SET {$name_field}='$name', {$product_field}='$price' where {$id_field}='$idp'");
    }
    
    public static function deleteProduct($idp) {
        $table_name = ProductsSqliteUtils::getTableName();
        $id_field = ProductsSqliteUtils::getProductIdField();
        return ProductsSqliteUtils::$connection->exec("delete from {$table_name} where {$id_field}={$idp}" );
    }
    
}

