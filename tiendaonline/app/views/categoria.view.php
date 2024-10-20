<?php

class CategoriaView {
    public function showCategorias($categorias) {
        $count = count($categorias);

        require './templates/categoriasList.phtml';
    }

    public function showCategoria($categoria) {

        require './templates/categoriaDetail.phtml';
    }
    public function showForm($id=null) {
        require 'templates/formCategorias.phtml';
    } 
    public function showError($error) {
        require 'templates/error.phtml';
    }
}