<?php
$action = $_GET["action"];

include_once("basededatos.php");
$bd = new TestBD();

$jTableResult = array();

switch ($action) {
    case "listar":
        $rows = $bd->lista_tabla_pedidos_completa();

        //Return result to jTable
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $rows;
        break;
    case "nuevo":
        //$res = $bd->inserta_usuario("One","Uno");
        $res = $bd->inserta_pedido($_POST["NUMERO_PEDIDO"],$_POST["FECHA_PEDIDO"],$_POST["PROVEEDOR"],$_POST["CLIENTE"],$_POST["IMPORTE"],$_POST["DTO"]);
        $row = $bd->last_record_usuarios();
        //Return result to jTable
        if ($res) {
            $jTableResult['Result'] = "OK";
            $jTableResult['Record'] = $row;
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        break;
    case "actualizar":
        $res = $bd->actualiza_pedido($_POST["ID"],$_POST["NUMERO_PEDIDO"],$_POST["FECHA_PEDIDO"],$_POST["PROVEEDOR"],$_POST["CLIENTE"],$_POST["IMPORTE"],$_POST["DTO"]);
        //Return result to jTable
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        break;        
    case "borrar":
        $res = $bd->delete_pedido($_POST["ID"]);
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }        
        break;
    case "proveedores":
        $res = $bd->seleccion_proveedores($_POST["ID"]);
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        break;
}

print json_encode($jTableResult);
