
 <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$action = $_GET["action"];

include_once("testBD.php");
$bd = new TestBD();

$jTableResult = array();

switch ($action) {
    case "listar":
        $rows = $bd->lista_tabla_usuarios_completa();

        //Return result to jTable
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $rows;
        break;
    case "nuevo":
        //$res = $bd->inserta_usuario("One","Uno");
        $res = $bd->inserta_usuario($_POST["nombre"],$_POST["apellido"],$_POST["cargo"]);
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
        $res = $bd->actualiza_usuario($_POST["IDU"],$_POST["nombre"],$_POST["apellido"],$_POST["cargo"]);
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
    case "ordenar":
        $res = $bd->lista_usuarios($_POST["nombre"]);
        //Return result to jTable
        if ($res) {
            $jTableResult['Result'] = $res;
        } else {
            $jTableResult['Result'] = "ERROR";
        }
}

print json_encode($jTableResult); 
 ?>
     