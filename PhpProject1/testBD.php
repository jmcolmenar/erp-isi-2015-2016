<?php
/**
 * Ejemplo sencillo para extender la clase SQLite3 y cambiar los par�metros
 * de __construct, despu�s usar el m�todo open para inicializar la BD.
 * 
 * https://secure.php.net/manual/es/sqlite3.open.php
 * 
 */
class TestBD extends SQLite3
{
    function __construct() {
        $this->open('testBD.db');
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
    
    function lista_usuarios($nombre) {
        return $this->query("SELECT nombre FROM empleado WHERE nombre LIKE '%$%' ORDER BY nombre");
    }
    
    
    
    function lista_tabla_usuarios_completa() {
        //Get records from database
        return $this->query_to_array('SELECT * FROM empleado');
    }
    
    function inserta_usuario($nombre,$apellido,$cargo) {
        return $this->exec('INSERT INTO empleado(nombre,apellido,cargo) VALUES (\''.$nombre.'\',\''.$apellido.'\',\''.$cargo.'\')');
    }
    
    function actualiza_usuario($idu,$nombre,$apellido,$cargo) {
        return $this->exec('UPDATE empleado SET nombre=\''.$nombre.'\',apellido=\''.$apellido.'\', cargo=\''.$cargo.'\' where IDU=\''.$idu.'\'');
    }
    
    function last_record_usuarios() {
        $sql = 'select * from empleado where rowid='.$this->lastInsertRowID();
        return $this->query($sql)->fetchArray();
        
    }
    
    function delete_usuario($uid) {
        return $this->exec('delete from empleado where IDU='.$uid);
    }
    
}

?>