<?php

require_once './app/models/product.model.php';
require_once './app/views/categoria.view.php';
require_once "./app/views/error.view.php";
require_once "./app/models/categoria.model.php";

class CategoriaController{
    private $product_model;
    private $model;
    private $view;

    public function __construct() {
        $this->product_model = new ProductModel();
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    public function show($params = null) {
        if(isset($params)){
            $categoria = $this->model->getById($params[0]);
            if($categoria){
                $this->view->showCategoria($categoria);
            } else {
                ErrorView::displayError("Hubo un error: la categoria no se encuentra en la base");
            }
        } else {
            $categorias = $this->model->getAll();
            $this->view->showCategorias($categorias);
        }

    }

    public function insert(){
        if(!empty($_POST["nombre"])){
            $res = $this->model->insert($_POST);
            header("Location: ".BASE_URL);
        }
        else {

        }
    }

    public function update($id = null){
        if(isset($id) && !empty($_POST["nombre"]) ){
            $res = $this->model->putById($id, $_POST);
        }

        header("Location: ".BASE_URL);
    }

    public function delete($id=null){
        if(isset($id)){
            $this->product_model->deleteAllByCategoriaId($id);
            $res = $this->model->deleteById($id);
        }

        header("Location: ".BASE_URL);
    }

    public function showForm($params){
        if(isset($params[0])){
            $this->view->showForm($params[0]);
        } else {
            $this->view->showForm();
        }
    }
}
?>


