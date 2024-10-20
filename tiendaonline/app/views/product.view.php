<?php

class ProductView {
    public function showProducts($products, $categorias) {
        $count = count($products);

        require './templates/productList.phtml';
    }

    public function showProduct($product) {

        require './templates/productDetail.phtml';
    }
    public function showForm($id=null) {
        require 'templates/formProducts.phtml';
    } 
    public function showError($error) {
        require 'templates/error.phtml';
    }
}