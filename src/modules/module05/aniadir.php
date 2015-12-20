<?php
include './backend.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    insertaCliente($_POST['nombre'], $_POST['apellidos'], $_POST['correoElectronico'], $_POST['contrasena'], $_POST['fechaNac'], $_POST['fechaReg'], $_POST['valido']);
    header("location:cliente.php");
?>
