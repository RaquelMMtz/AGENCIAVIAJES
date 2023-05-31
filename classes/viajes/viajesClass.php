<?php


require_once(__DIR__ . "/../../db/Conn.php");

class viajesClass
{
    private $conn;
    public function __construct()
    {

        $db = new Conn();
        $this->conn = $db->conectar();
    }

    //mostrar viajes registrados

    public function getViajes()
    {
        $search = $this->conn->prepare("SELECT * from destino");
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }


    //agregar viajes

    public function setViajes($destino, $price, $duration, $img, $description, $sessionUser)
    {

        $insert = $this->conn->prepare("INSERT into destino (destino,precioDestino, duracion, img, descripcion, usuarioModifica) values (:destino, :price, :duration, :img, :description, :sessionUser)");
        $insert->bindParam(":destino", $destino, PDO::PARAM_STR);
        $insert->bindParam(":price", $price, PDO::PARAM_STR);
        $insert->bindParam(":duration", $duration, PDO::PARAM_STR);
        $insert->bindParam(":img", $img, PDO::PARAM_STR);
        $insert->bindParam(":description", $description, PDO::PARAM_STR);
        $insert->bindParam(":sessionUser", $sessionUser, PDO::PARAM_INT);
        return $insert->execute() ? true : false;
    }

    //eliminar viajes registrados

    public function deleteViajes($id)
    {
        $delete = $this->conn->prepare("DELETE from destino where idDestino = :id");
        $delete->bindParam(":id", $id, PDO::PARAM_INT);
        return $delete->execute() ? true : false;
    }

    //cancelar viajes clientes

    public function cancelViajes($id)
    {

        $status = 0;
        $insert = $this->conn->prepare("UPDATE viaje SET estatus = :status WHERE idViaje = :id");
        $insert->bindParam(":status", $status, PDO::PARAM_INT);
        $insert->bindParam(":id", $id, PDO::PARAM_INT);
        return $insert->execute() ? true : false;
    }

}
