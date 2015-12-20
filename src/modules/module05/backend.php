<?php

    function sqlite_open(){
        $handle = new SQLite3('../../database/module05.db');
        return $handle;
    } 
    function muestraBanner(){?>
        
    
<a href="../module02/index.html">Gesti&otilde;n usuarios</a> /
<a href="../module04/module.php">Cat&otilde;logo productos</a> /
<a href="./module.php">Gesti&otilde;n clientes</a> /
<a href="">Gesti&otilde;n empleados</a> /
<a href="../module07/module.php">Gesti&otilde;n pedidos</a> /
<a href="">Informes comerciales</a> /
<a href="../module09/module.php">N&otilde;minas</a>

<?php }

    function MuestraUsuarioBusqueda($nombre,$orden){
        $bd=sqlite_open();
        $i=0;
        if($orden==NULL){
            $orden="id";
        }
	if ($nombre == NULL) {
                $cons = $bd->query("SELECT * FROM clientes order by $orden");

        } else {
            $cons = $bd->query("SELECT * from clientes where nombre like '%$nombre%' or apellidos like '%$nombre%' order by $orden");
        }

            while($row=$cons->fetchArray()){
            if($i%2==0){
		?><tr id="FilaImpar">
                        <td><?php echo $row[0];?></td>
			<td><?php echo $row[1];?></td>
			<td><?php echo $row[2];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><?php echo $row[5];?></td>
                        <td><?php echo $row[6];?></td>
                        <td><a href="cliente.php?id=<?php echo $row[0];?>"><img src="images/editausu.jpg" alt="editar usuario" width="25" height="25"></img></a></td>
			<td><a href="borrar.php?id=<?php echo $row[0];?>"><img src="images/borrausu.png" alt="borrar usuario" width="25" height="25" value="borrar" name="borrar"></a></td>
			
            </tr>
      <?php }else{?>
                <tr>
                        <td><?php echo $row[0];?></td>
			<td><?php echo $row[1];?></td>
			<td><?php echo $row[2];?></td>
                        <td><?php echo $row[3];?></td>
                        <td><?php echo $row[4];?></td>
                        <td><?php echo $row[5];?></td>
                        <td><?php echo $row[6];?></td>
                        <td><a href="cliente.php?id=<?php echo $row[0];?>"><img src="images/editausu.jpg" alt="editar usuario" width="25" height="25" value="editar"/></a></td>
			<td><a href="borrar.php?id=<?php echo $row[0];?>"><img src="images/borrausu.png" alt="borrar usuario" width="25" height="25"  value="borrar" name="borrar"></a></td>
                </tr>
            <?php }
            $i+=1;
	}
}
function getId(){
            $id=1;
            $cons=sqlite_open()->query("select id from clientes");
            while($row=$cons->fetchArray()){
                if($id<$row[0]){
                    $id=$row[0];
                }
            }
            return $id+1;
        }

function insertaCliente($nombre,$apellidos,$correo,$pass,$fechaNac,$fechaReg,$valido){
    $bd=sqlite_open();
    $bd->query("INSERT INTO clientes(nombre,apellidos,correoElectronico,contrasena,fechaNac,fechaReg,valido) VALUES('{$_POST['nombre']}','{$_POST['apellidos']}','{$_POST['correoElectronico']}','{$_POST['contrasena']}','{$_POST['fechaNac']}','{$_POST['fechaReg']}','{$_POST['valido']}')");

}
function editarCliente($nombre,$apellidos,$correo,$pass,$fechaNac,$fechaReg,$valido,$id){
    $bd=sqlite_open();
    $bd->query("UPDATE clientes "
                            . "SET nombre='{$nombre}',"
                            . "apellidos='{$apellidos}', "
                            . "correoElectronico='{$correo}', "
                            . "contrasena='{$pass}',"
                            . "fechaNac='{$fechaNac}',"
                            . "fechaReg='{$fechaReg}',"
                            . "valido='{$valido}'"
                            . "WHERE id=".$id);
}
?>
