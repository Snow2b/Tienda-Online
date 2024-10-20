<?php
require_once "./app/config/config.php";
class DbHelper
{

    public static function connect_db()
    {
        try {
            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASS);
            return $conn;
        } catch (PDOException $e) {
            $conn = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS);
            $sql = "CREATE DATABASE " . DB_NAME;
            $conn->exec($sql);

            $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", DB_USER, DB_PASS);

            $sql = "CREATE TABLE categorias (
                    id int(11) NOT NULL,
                    nombre text(80) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  ALTER TABLE categorias
                ADD PRIMARY KEY (id);
                ALTER TABLE categorias
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
                  ";
            $conn->exec($sql);

            $sql = "INSERT INTO categorias (id, nombre) VALUES
    (1, 'Piernas'),
    (2, 'Mochila'),
    (3, 'Calzado'),
    (4, 'Manos'),
    (5, 'Pantalon');
";
            $conn->exec($sql);

            $sql = "CREATE TABLE productos (
                    id int(11) NOT NULL,
                    nombre text(255) NOT NULL,
                    categoria int(11) NOT NULL,
                    precio int(11) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  ALTER TABLE productos
  ADD PRIMARY KEY (id);
  ALTER TABLE productos
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
                  ";
            $conn->exec($sql);

            $sql = "INSERT INTO productos (id, nombre, categoria, precio) VALUES
                (1, 'Zapatillas deportivas', 3, 100),
                (2, 'Mochila de aventura', 2, 55),
                (3, 'Guantes de invierno', 4, 40),
                (4, 'Jeans azules', 5, 70);";
            $conn->exec($sql);


            $sql = "CREATE TABLE usuarios (
                    id_usuario int(11) NOT NULL,
                    email varchar(50) NOT NULL,
                    password varchar(100) NOT NULL
                  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                  ALTER TABLE usuarios
  ADD PRIMARY KEY (id_usuario);
  ALTER TABLE usuarios
  MODIFY id_usuario int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
                  ";
            $conn->exec($sql);


            $sql = "INSERT INTO usuarios (id_usuario, email, password) VALUES
                (1, 'webadmin', '$2y$10\$OqdXpUNyTcQ5rSoJEXAv2OYQOKSH1K1l5iTvGpiAetI6hy0MeQESy');
                ";
            $conn->exec($sql);

            
            return $conn;
        }
    }
}

