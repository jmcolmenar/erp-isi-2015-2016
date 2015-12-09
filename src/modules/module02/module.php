<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$action = $_GET["action"];

include_once($_SERVER['DOCUMENT_ROOT']."/src/database/accessBD.php");
$bd = new AccessBD();

$jTableResult = array();

switch ($action) {
    case "listar":
        $rows = $bd->lista_tabla_usuarios_completa();
        
        //Return result to jTable
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $rows;
        break;
    case "nuevo":

        $res = $bd->inserta_usuario($_POST["usu"],$_POST["pass"]);
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
        $res = $bd->actualiza_usuario($_POST["IDU"],$_POST["usu"],$_POST["pass"]);
        //Return result to jTable
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }
        break;        
    case "borrar":
        $res = $bd->delete_usuario($_POST["IDU"]);
        if ($res) {
            $jTableResult['Result'] = "OK";
        } else {
            $jTableResult['Result'] = "ERROR";
        }        
        break;
}

print json_encode($jTableResult);
