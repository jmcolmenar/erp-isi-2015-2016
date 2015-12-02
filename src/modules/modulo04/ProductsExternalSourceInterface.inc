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
interface ProductsExternalSourceInterface {
    public function fetchProducts();
    
    public function insertProduct($name,$price);
    
    public function updateProduct($idp,$name,$price);
    
    public function deleteProduct($idp);
}
