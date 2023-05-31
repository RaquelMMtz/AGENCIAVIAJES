<?php


require_once(__DIR__ . "/../../db/Conn.php");

class hotelesClass
{
    private $conn;
    public function __construct()
    {

        $db = new Conn();
        $this->conn = $db->conectar();
    }

    //mostrar viajes registrados

    public function getHoteles()
    {
        $search = $this->conn->prepare("SELECT * from direccion_hotel d INNER JOIN hotel h ON d.hotelesId = h.idHotel");
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }

    //solicitar reserva viaje

    public function setHoteles($names, $telf, $calles, $colonia, $cp, $pais, $sessionUser)
    {
        $insert = $this->conn->prepare("INSERT into hotel (nombre, telefono, usuarioModifica) values (:nombre, :telefono, :sessionUser)");
        $insert->bindParam(":nombre", $names, PDO::PARAM_STR);
        $insert->bindParam(":telefono", $telf, PDO::PARAM_STR);
        $insert->bindParam(":sessionUser", $sessionUser, PDO::PARAM_STR);
        $insert->execute();
        $lastId = $this->conn->lastInsertId();
        $insertDirection = $this->conn->prepare("INSERT into direccion_hotel (calles, colonia, cp, pais, hotelesId) values (:calles, :colonia, :cp, :pais, :hoteles_id)");
        $insertDirection->bindParam(":calles", $calles, PDO::PARAM_STR);
        $insertDirection->bindParam(":colonia", $colonia, PDO::PARAM_STR);
        $insertDirection->bindParam(":cp", $cp, PDO::PARAM_STR);
        $insertDirection->bindParam(":pais", $pais, PDO::PARAM_STR);
        $insertDirection->bindParam(":hoteles_id", $lastId, PDO::PARAM_INT);
        return $insertDirection->execute() ? true : false;
    }

    //actualizar info hoteles

    public function updateHoteles($hotelId, $names, $telf, $calles, $colonia, $cp, $pais, $sessionUser)
    {
        $updateHotel = $this->conn->prepare("UPDATE hotel SET telefono = :telefono, usuarioModifica = :sessionUser WHERE idHotel = :hotelId");
        $updateHotel->bindParam(":telefono", $telf, PDO::PARAM_STR);
        $updateHotel->bindParam(":sessionUser", $sessionUser, PDO::PARAM_STR);
        $updateHotel->bindParam(":hotelId", $hotelId, PDO::PARAM_INT);
        $updateHotel->execute();

        $updateDirection = $this->conn->prepare("UPDATE direccion_hotel SET calles = :calles, colonia = :colonia, cp = :cp, pais = :pais WHERE hotelesId = :hotelId");
        $updateDirection->bindParam(":calles", $calles, PDO::PARAM_STR);
        $updateDirection->bindParam(":colonia", $colonia, PDO::PARAM_STR);
        $updateDirection->bindParam(":cp", $cp, PDO::PARAM_STR);
        $updateDirection->bindParam(":pais", $pais, PDO::PARAM_STR);
        $updateDirection->bindParam(":hotelId", $hotelId, PDO::PARAM_INT);

        return $updateDirection->execute() ? true : false;
    }

    //eliminar hoteles

    public function deleteHoteles($id)
    {
        $delete = $this->conn->prepare("DELETE from hotel where idHotel = :id");
        $delete->bindParam(":id", $id, PDO::PARAM_INT);
        return $delete->execute() ? true : false;
    }
}
