<?php

/**
 * Description of ServiceFactorySqlite
 *
 * @author jvicentem
 */
class ServiceFactorySqlite implements ServiceFactory{
    public function factoryMethod(){
        new ErpUrjcService(new SqliteUtils);
    }
}