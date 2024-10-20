<?php
    require_once "./app/helpers/db.helper.php";

class ProductModel {
    private $db;
    private $table;

    public function __construct() {
        $this->db = DbHelper::connect_db();
        $this->table = "productos";
    }

    

    public function getById($id) {
        $query = $this->db->prepare('SELECT * FROM '.$this->table.' WHERE id = ?');
        $query->execute([$id]);
        
        $data = $query->fetch(PDO::FETCH_OBJ);

        return $data;
    }
    public function getAll() {
        $query = $this->db->prepare('SELECT * FROM '.$this->table.'');
        $query->execute();

        
        $data = $query->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }

    function getAllByCategoria($id) {
        $query = $this->db->prepare('SELECT * FROM '.$this->table.' WHERE categoria = ?');
        $query->execute([$id]);

        
        $data = $query->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }
    public function insert($nombre, $categoria, $precio){
        $query = $this->db->prepare('INSERT INTO '.$this->table.' (nombre,categoria,precio) values (?,?,?)');
        return $query->execute([$nombre, $categoria, $precio]);
    }
    public function putById($id, $data) {
        $query = $this->db->prepare('UPDATE '.$this->table.' SET nombre = ?, categoria = ?, precio = ? WHERE id = ?');
        return $query->execute([$data["nombre"], $data["categoria"], $data["precio"], $id]);
        
    }
    public function deleteById($id){
        $query = $this->db->prepare('DELETE FROM '.$this->table.' WHERE id = ?');
        return $query->execute([$id]);
    }
    public function deleteAllByCategoriaId($id){
        $query = $this->db->prepare('DELETE FROM '.$this->table.' WHERE categoria = ?');
        return $query->execute([$id]);
    }
}