<?php
/**
 * Ejemplo sencillo para extender la clase SQLite3 y cambiar los par�metros
 * de __construct, despu�s usar el m�todo open para inicializar la BD.
 * 
 * https://secure.php.net/manual/es/sqlite3.open.php
 * 
 */
class AccessBD extends SQLite3
{
    function __construct() {
        $this->open($_SERVER['DOCUMENT_ROOT'].'/src/database/accessBD.db');
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
    
    function inserta_usuario($usu,$pass) {
        return $this->exec('INSERT INTO usuarios(usu,pass) VALUES (\''.$usu.'\',\''.$pass.'\')');
    }
    
    function actualiza_usuario($idu,$usu,$pass) {
        return $this->exec('UPDATE usuarios SET usu=\''.$usu.'\', pass=\''.$pass.'\' where IDU=\''.$idu.'\'');
    }
    
    function last_record_usuarios() {
        $sql = 'select * from usuarios where rowid='.$this->lastInsertRowID();
        return $this->query($sql)->fetchArray();
        
    }
    
    function delete_usuario($uid) {
        return $this->exec('delete from usuarios where IDU='.$uid);
    }
    
}

?>