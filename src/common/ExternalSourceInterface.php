<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author jvicentem
 */
interface ExternalSourceInterface {
    public function fetchProducts();
    
    public function insertProduct();
    
    public function updateProduct();
    
    public function deleteProduct();
}
