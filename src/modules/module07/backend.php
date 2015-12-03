<!--
ERP-ISI-2015-2016

  This file is part of ERP-ISI-2015-2016.

    ERP-ISI-2015-2016 is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    ERP-ISI-2015-2016 is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with ERP-ISI-2015-2016.  If not, see <http://www.gnu.org/licenses/>.

 @license     http://www.gnu.org/licenses/gpl.txt
 @source code https://github.com/jmcolmenar/erp-isi-2015-2016
-->
<?php
$action = $_GET["action"];

include_once("basededatos.php");
$bd = new basededatos();

$jTableResult = array();
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $rows;
         
switch ($action) {
    case "listar":
        $rows = $bd->lista_usuarios();

        //Return result to jTable
        $jTableResult['Result'] = "OK";
        $jTableResult['Records'] = $rows;
        break;
    case "nuevo":
        //$res = $bd->inserta_usuario("One","Uno");
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