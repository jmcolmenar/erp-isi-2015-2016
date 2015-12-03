<?php

/**

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

 */
class TestBD extends SQLite3 {

    function __construct() {
        $this->open('src/modules/module07testBD.db');
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
        return $this->query('SELECT usu FROM usuarios');
    }

    function lista_tabla_usuarios_completa() {
        //Get records from database
        return $this->query_to_array('SELECT * FROM usuarios');
    }

    function lista_tabla_usuarios_con_filtro() {
        //con filtro
        return $this->query_to_array('SELECT * FROM usuarios');
    }

    function inserta_usuario($usu, $pass) {
        return $this->exec('INSERT INTO usuarios(usu,pass) VALUES (\'' . $usu . '\',\'' . $pass . '\')');
    }

    function actualiza_usuario($idu, $usu, $pass) {
        return $this->exec('UPDATE usuarios SET usu=\'' . $usu . '\', pass=\'' . $pass . '\' where IDU=\'' . $idu . '\'');
    }

    function last_record_usuarios() {
        $sql = 'select * from usuarios where rowid=' . $this->lastInsertRowID();
        return $this->query($sql)->fetchArray();
    }

    function delete_usuario($uid) {
        return $this->exec('delete from usuarios where IDU=' . $uid);
    }

}

?>