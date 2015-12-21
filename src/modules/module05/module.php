
<!DOCTYPE html>
<!--
    Ejemplo comunicaci�n jQuery con JSON.
-->
<?php include_once ("backend.php");?>

<html>
    <head>
        <title>usuarios</title>
        <meta charset="ISO-8859-15">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <link rel="stylesheet" type="text/css" href="estilo.css" title="default"> 
    </head> 
    <body>
        <div class="total">
            <center>
		<div class="central_princ">
                    <div id="banner_princ">
			<?php muestraBanner();?>
                    </div>
                    <div id="centre_princ">
                        <form method="get">Buscar por Nombre / Apellido: 
                            <input type="text" id="nombre" name="nombre"/>
                            <input type="submit" value="Buscar"/>
                            <table border="1">
                                <tr>
                                    <td><a href="module.php?nombre=<?php echo $_GET['nombre']?>&orden=id">id</a></td>
                                    <td><a href="module.php?nombre=<?php echo $_GET['nombre']?>&orden=nombre">Nombre</a></td>
                                    <td><a href="module.php?nombre=<?php echo $_GET['nombre']?>&orden=apellidos">Apellidos</a></td>
                                    <td><a href="module.php?nombre=<?php echo $_GET['nombre']?>&orden=correoElectronico">Correo Electr&otilde;nico</a></td>
                                    <td><a href="module.php?nombre=<?php echo $_GET['nombre']?>&orden=contrasena">Contrase&ntilde;a</a></td>
                                    <td><a href="module.php?nombre=<?php echo $_GET['nombre']?>&orden=fechaNac">Fecha de Nacimiento</a></td>
                                    <td><a href="module.php?nombre=<?php echo $_GET['nombre']?>&orden=fechaReg">Fecha de Registro</a></td>
                                    <td colspan="2">Acciones</td>
                                </tr>
                                <?php MuestraUsuarioBusqueda($_GET['nombre'],$_GET['orden']);?>
                                
                            </table>
                        </form>
                        <span id="botonAniadir">
                            <a href="cliente.php?"><img src="images/anadeusu2.png" alt="a&ntilde;adir usuario" width="50" height="50"/></a>
                            
                        </span>
                                   

                    </div>
		</div>
            </center>
	</div>
    </body>
</html>
