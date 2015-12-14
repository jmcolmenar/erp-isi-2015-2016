<?php

class TestBD extends SQLite3
{
    function __construct() {
        $this->open('../../database/module07.db');
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
        return $this->query('SELECT * FROM pedidos');
    }
    
    
    function lista_tabla_pedidos_completa() {
        //Get records from database
        return $this->query_to_array('SELECT * FROM pedidos ORDER BY FECHA_PEDIDO DESC;');
    }
    
    function inserta_pedido($NUMERO_PEDIDO,$FECHA_PEDIDO,$PROVEEDOR,$CLIENTE,$IMPORTE,$DTO) {
        return $this->exec('INSERT INTO PEDIDOS(NUMERO_PEDIDO,FECHA_PEDIDO,PROVEEDOR,CLIENTE,IMPORTE,DTO) VALUES (\''.$NUMERO_PEDIDO.'\',\''.$FECHA_PEDIDO.'\',\''.$PROVEEDOR.'\',\''.$CLIENTE.'\',\''.$IMPORTE.'\',\''.$DTO.'\')');
        //return $this->exec("INSERT INTO PEDIDOS (NUMERO_PEDIDO,FECHA_PEDIDO,PROVEEDOR,CLIENTE,IMPORTE,DTO) VALUES (1,1,'HP','Pablo','25',2)");
    }
    
    function actualiza_pedido($ID,$NUMERO_PEDIDO,$FECHA_PEDIDO,$PROVEEDOR,$CLIENTE,$IMPORTE,$DTO) {
        return $this->exec('UPDATE PEDIDOS SET ID=\''.$ID.'\', NUMERO_PEDIDO=\''.$NUMERO_PEDIDO.'\',FECHA_PEDIDO=\''.$FECHA_PEDIDO.'\',PROVEEDOR=\''.$PROVEEDOR.'\',CLIENTE=\''.$CLIENTE.'\',IMPORTE=\''.$IMPORTE.'\',DTO=\''.$DTO.'\' where ID=\''.$ID.'\'');
    }
    
    function last_record_usuarios() {
        $sql = 'select * from PEDIDOS where rowid='.$this->lastInsertRowID();
        return $this->query($sql)->fetchArray();
        
    }
    
    function delete_pedido($ID) {
        return $this->exec('delete from PEDIDOS where ID='.$ID);
    }
    function seleccion_proveedores($ID){
        return $this->exec('SELECT * FROM PEDIDOS WHERE ID='.$ID);
    }
}

?>