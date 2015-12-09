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

class DbAccess extends SQLite3 {

    function __construct() {
        // Still not implemented.
//        $this->open('data.db');
    }

    /**
     * Checks if the user and pass are correct and are stored into the database.
     * @param type $user
     * @param type $pass
     */
    function isUser($user,$pass) {
        // TODO: to be implemented
        return true;
    }
    
}

?>