<?php

require_once './app/models/product.model.php';
require_once './app/views/product.view.php';
require_once "./app/views/error.view.php";
require_once "./app/models/categoria.model.php";

class ProductController{
    private $categoria_model;
    private $model;
    private $view;

    public function __construct() {

        $this->categoria_model = new CategoriaModel();
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    public function show($params = null, $filtro = false) {
        if(isset($params)){
            $product = $this->model->getById($params[0]);
            if($product){
                $categoria = $this->categoria_model->getById($product->categoria);
                $product->categoria = $categoria->nombre;
                $this->view->showProduct($product);
            } else {
                ErrorView::displayError("Hubo un error: el producto no se encuentra en la base");
            }
        } else {
            if($filtro){
                $products = $this->model->getAllByCategoria($filtro);
            } else {
                $products = $this->model->getAll();
            }
            foreach($products as $prod){
                $categoria = $this->categoria_model->getById($prod->categoria);
                $prod->categoria = $categoria->nombre;
            }

            $categorias = $this->categoria_model->getAll();
            $this->view->showProducts($products, $categorias);
        }

    }

    public function insert(){
        if(!empty($_POST["nombre"] && !empty($_POST["categoria"]) && !empty($_POST["precio"]))){
            $res = $this->model->insert($_POST["nombre"], $_POST["categoria"], $_POST["precio"]);
            header("Location: ".BASE_URL);
        }
        else {
        }
    }

    public function update($id = null){
        if(isset($id) && !empty($_POST["nombre"] && !empty($_POST["categoria"]) && !empty($_POST["precio"])) ){
            $res = $this->model->putById($id, $_POST);
        }

        header("Location: ".BASE_URL);
    }

    public function delete($id=null){
        if(isset($id)){
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


