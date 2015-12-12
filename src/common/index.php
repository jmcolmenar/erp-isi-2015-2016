<?php
        include_once 'functions.inc';
        
        if (!isLogged()) {
            header('Location: /src/index.html');
            die();
        }
?>

<!DOCTYPE html>
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
<html>
    <head>
        <title>ERP - ISI 2015-2016 (URJC)</title>
        <meta charset="ISO-8859-15">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="main.css" rel="stylesheet" type="text/css"/>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    </head>
    <body>       
        <header>
            <?php
            // Hardcoded header: deber�a procesar una lista de m�dulos accesibles.
            ?>
            <ul>
                <li><a href='index.php'>Inicio</a></li>
                <li><a href='index.php?module=00'>M&oacute;dulo Test</a></li>
                <li><a href='index.php?module=01'>M&oacute;dulo 1</a></li>
                <li><a href='index.php?module=02'>M&oacute;dulo 2</a></li>
                <li><a href='index.php?module=03'>M&oacute;dulo 3</a></li>
                <li><a href='index.php?module=04'>M&oacute;dulo 4</a></li>
                <li><a href='index.php?module=05'>M&oacute;dulo 5</a></li>
                <li><a href='index.php?module=06'>M&oacute;dulo 6</a></li>
                <li><a href='index.php?module=07'>M&oacute;dulo 7</a></li>
                <li><a href='index.php?module=08'>M&oacute;dulo 8</a></li>
                <li><a href='index.php?module=09'>M&oacute;dulo 9</a></li>
                <li><a href='login.php?logout=true'>Logout</a></li>
            </ul>
        </header>
        <div id="main-content">
    <?php
        
            if (isset($_GET['module'])) {
                $module = $_GET['module'];
            }

            if (isset($module)) {
                include '../modules/module' . $module . '/module.php';
            } else {
                echo '<p>P&aacute;gina INICIAL por defecto</p>';
            }
        
    ?>
        </div>
        <footer><p>Curso 2015-2016 - Ingenier&iacute;a de Sistemas de Informaci&oacute;n - Universidad Rey Juan Carlos</p></footer>
    </body>
</html>
