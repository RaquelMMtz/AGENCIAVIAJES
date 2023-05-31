<?php


require_once(__DIR__ . "/../../db/Conn.php");

class serviciosClass
{
    private $conn;
    public function __construct()
    {

        $db = new Conn();
        $this->conn = $db->conectar();
    }

    //mostrar hoteles registrados para asignar servicios

    public function getHoteles()
    {
        $search = $this->conn->prepare("SELECT * from hotel");
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }

    //mostrar servicios asignados a hoteles
    public function getServices()
    {
        $search = $this->conn->prepare("SELECT * from servicio_hotel");
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }

    //solicitar reserva viaje

    public function setServices($idHotel, $namesServices, $description, $sessionUser)
    {
        $insert = $this->conn->prepare("INSERT into servicio_hotel (nombre, descripcion, usuarioModifica) values (:names, :description, :usuario_modifica)");
        $insert->bindParam(":names", $namesServices, PDO::PARAM_STR);
        $insert->bindParam(":description", $description, PDO::PARAM_STR);
        $insert->bindParam(":usuario_modifica", $sessionUser, PDO::PARAM_STR);
        $lastId = $this->conn->lastInsertId();
        return $insert->execute() ? true : false; 
        //insertar relacion hoteles
       /*  $insertRel = $this->conn->prepare("INSERT into hoteles_servicios_relacion (servicios_id, hoteles_id) values (:services, :hotels)");
        $insertRel->bindParam(":services", $lastId, PDO::PARAM_INT);
        $insertRel->bindParam(":hotels", $idHotel, PDO::PARAM_INT);
        return $insertRel->execute() ? true : false; */
    }

    //eliminar hoteles

    public function deleteServices($id)
    {

        $delete = $this->conn->prepare("DELETE from servicio_hotel where idServicios = :id");
        $delete->bindParam(":id", $id, PDO::PARAM_INT);
        return $delete->execute() ? true : false;
    }
}
