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

/**
 * Returns the HTML code that represents an element of the main module menu.
 * @param String $str Description of the element
 * @param String $url Link to the module
 */
function main_menu_element($str,$url) {
    $res = '<div class="main_menu_element"><p><a href="'.$url.'">'.
            $str.'</a></p></div>';
 
    return $res;
}

function isLogged() {
    session_start();
    return isset($_SESSION['erp']);
}

function loginERP() {
    // Activa la sesión
    session_start();
    $_SESSION['erp'] = "On";       
}

function logoutERP() {
    // Activa la sesión
    session_start();
    unset($_SESSION['erp']);
}