<?php

class Conn
{
    private $conn;
    private $pdo;
    private $dsn = "mysql:host=localhost;dbname=viajes;charset=utf8mb4";
    private $usuario = "root";
    private $contrasena = "";

    public function conectar()
    {
        try {
            $opciones = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            );
            $pdo = new PDO($this->dsn, $this->usuario, $this->contrasena, $opciones);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }

    //metodo cerrar conexiones

    public function cerrarConexion() {
       $this->pdo = null;
    }

}
