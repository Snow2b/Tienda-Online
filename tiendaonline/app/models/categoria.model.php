<?php
    require_once "./app/helpers/db.helper.php";
class CategoriaModel {
    private $db;
    private $table;
    function __construct() {
        $this->db = DbHelper::connect_db();
        $this->table = "categorias";
    }

    function getById($id) {
        $query = $this->db->prepare('SELECT * FROM '.$this->table.' WHERE id = ?');
        $query->execute([$id]);

        $data = $query->fetch(PDO::FETCH_OBJ);

        return $data;
    }
    function getAll() {
        $query = $this->db->prepare('SELECT * FROM '.$this->table.'');
        $query->execute();

     
        $data = $query->fetchAll(PDO::FETCH_OBJ);

        return $data;
    }
    
    public function insert($data,){
        $query = $this->db->prepare('INSERT INTO '.$this->table.' (nombre) values (?)');
        return $query->execute([$data["nombre"]]);
    }
    function putById($id, $data) {
        $query = $this->db->prepare('UPDATE '.$this->table.' SET nombre = ? WHERE id = ?');
        return $query->execute([$data["nombre"], $id]);
   
    }

    public function deleteById($id){
        $query = $this->db->prepare('DELETE FROM '.$this->table.' WHERE id = ?');
        return $query->execute([$id]);
    }
}