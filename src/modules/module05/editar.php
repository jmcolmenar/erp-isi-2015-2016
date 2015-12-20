<?php
include './backend.php';
editarCliente($_POST['nombre'],$_POST['apellidos'],$_POST['correoElectronico'],$_POST['contrasena'],$_POST['fechaNac'],$_POST['fechaReg'],$_POST['valido'],$_POST[id]);
header("location:module.php");
?>