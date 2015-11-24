<?php

/**
 * Description of productsModule
 *
 * @author jvicentem sergiobanegas
 */

$action = $_GET["action"];
$service = new ErpUrjcService();
$jTableResult = array();

switch ($action) {
    case "productsList":
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $service->productsList();
        
        break;
    case "addProduct":
        $res = $service->addProduct($_POST["nombre"],$_POST["precio"]);
        //Return result to jTable
        if ($res) {
            $jTableResult['Result'] = "OK";
            $jTableResult['Record'] = $service->productsList();;
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        
        break;
    case "modifyProduct":
        $res = $service->modifyProduct($_POST["IDP"],$_POST["nombre"],$_POST["precio"]);
        //Return result to jTable
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        
        break;        
    case "removeProduct": 
        $res = $service->removeProduct($_POST["IDP"]);
   
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }   
        
        break;
}

print json_encode($jTableResult);

