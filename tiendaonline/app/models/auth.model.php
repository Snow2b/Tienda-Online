<?php 

class UserModel {
    private $db;
    private $table;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tiendaonline;charset=utf8', 'root', '');
        $this->table = "usuarios";
    }

    public function getByEmail($email) {
        $query = $this->db->prepare('SELECT * FROM '.$this->table.' WHERE email = ?');
        $query->execute([$email]);

        return $query->fetch(PDO::FETCH_OBJ);
    }
}