<?php

/* 
 * ERP-ISI-2015-2016
 * 
 *   This file is part of ERP-ISI-2015-2016.
 * 
 *     ERP-ISI-2015-2016 is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 * 
 *     ERP-ISI-2015-2016 is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with ERP-ISI-2015-2016.  If not, see <http://www.gnu.org/licenses/>.
 * 
 *  @license     http://www.gnu.org/licenses/gpl.txt
 *  @source code https://github.com/jmcolmenar/erp-isi-2015-2016
 */

include_once 'functions.inc';
include_once '../database/dbFunctions.inc';

/*
 * 1.- Comprobar que usuario y pass están en la BD.
 * 1.1.- Activar la sesión y guardar en ella info de seguridad.
 * 2.- Recabar el listado de módulos a los que se tiene acceso.
 * 3.- Codificarlos y enviarlos.
 */

if (isset($_GET["logout"])) {
    logoutERP();
    $actual_link = "http://$_SERVER[HTTP_HOST]";
    header('Location: /src/index.html');
    die();
} else {

    if (isset($_POST["user"]) && isset($_POST["pass"])) {

        $usu = filter_input(INPUT_GET, $_POST["user"]);
        $pass = filter_input(INPUT_GET, $_POST["pass"]);

        if (check_login($usu, $pass)) {

            loginERP();
            // Dummy: siempre los mismos módulos.
            $json_result = array();
            $json_result["0"] = main_menu_element("Mod. Test 1", "modules/testmod1/");
            $json_result["1"] = main_menu_element("Mod. Test 2", "modules/testmod2/");
            print json_encode($json_result);
        } else {
            print "Error: no check";
        }
    }
}

