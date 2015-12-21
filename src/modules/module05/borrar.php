<?php
    $handle = new SQLite3('../../database/module05.db') or die("cannot open the database");
    
    $handle->exec("DELETE FROM clientes WHERE id=".$_GET['id']);
    header("Location:module.php");

?>