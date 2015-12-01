<?php

/**
 * Description of productsModule
 *
 * @author jvicentem sergiobanegas
 */

include_once("ProductsService.php");
include_once("../database/ProductsSqliteUtils.php");

$action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);

$service = new ProductsService(new ProductsSqliteUtils());

$jTableResult = array();

switch ($action) {
    case "productsList":
        $rows =  $service->productsList();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $rows;
        
        break;
    case "addProduct":
        $res = $service->addProduct(
                filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING),
                filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING)
                );
        //Return result to jTable
        if ($res) {
            $jTableResult['Result'] = "OK";
            $jTableResult['Record'] = $service->productsList();
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        
        break;
    case "modifyProduct":
        $res = $service->modifyProduct(
                filter_input(INPUT_POST, "IDP", FILTER_SANITIZE_STRING),
                filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING),
                filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING)
                );
        //Return result to jTable
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        
        break;        
    case "removeProduct": 
        $res = $service->removeProduct(filter_input(INPUT_POST, "IDP", FILTER_SANITIZE_STRING));
   
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }   
        
        break;
}

print json_encode($jTableResult);

