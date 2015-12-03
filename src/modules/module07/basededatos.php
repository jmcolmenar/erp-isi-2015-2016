<?php
/**

 * ERP-ISI-2015-2016

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

 */
class basededatos extends SQLite3
{
    function __construct() {
        $this->open('src/modules/modulo07/basededatos.db');
    }
    
    function query_to_array($query) {
        $results = $this->query($query);
        
        //Add all records to an array
        $rows = array();
        while ($row = $results->fetchArray()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    function lista_usuarios() {
        return $this->query('SELECT * FROM PEDIDOS');
    }
    
    
    
    
}

?>