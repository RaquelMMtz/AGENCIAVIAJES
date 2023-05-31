<?php


require_once(__DIR__ . "/../../db/Conn.php");

class reservarClass
{
    private $conn;
    public function __construct()
    {

        $db = new Conn();
        $this->conn = $db->conectar();
    }

    //mostrar viajes registrados

    public function getViajesId($id)
    {
        $search = $this->conn->prepare("SELECT * from destino where idDestino = :id");
        $search->bindParam(":id", $id, PDO::PARAM_INT);
        $search->execute();
        $result = $search->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }

    //solicitar reserva viaje

    public function setSolicitudViaje($origen, $destino, $precio, $date, $duracion, $idCliente)
    {
        $insert = $this->conn->prepare("INSERT into viaje (origen, destino, precio,fechaReserva,duracion,idCliente) values (:origen, :destino, :price,:dateReserva, :duracion, :id)");
        $insert->bindParam(":origen", $origen, PDO::PARAM_STR);
        $insert->bindParam(":destino", $destino, PDO::PARAM_STR);
        $insert->bindParam(":price", $precio, PDO::PARAM_STR);
        $insert->bindParam(":dateReserva", $date, PDO::PARAM_STR);
        $insert->bindParam(":duracion", $duracion, PDO::PARAM_STR);
        $insert->bindParam(":id", $idCliente, PDO::PARAM_INT);
        return $insert->execute() ? true : false;
    }

    //mostrar viajes solicitados 

    public function getViajesSolicitados($id)
    {
        $search = $this->conn->prepare("SELECT * from viaje v INNER JOIN usuario u ON v.idCliente = u.idUsuario INNER JOIN cliente c ON c.usuariosId = v.idCliente where idViaje = :id");
        $search->bindParam(":id", $id, PDO::PARAM_INT);
        $search->execute();
        $result = $search->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }


    ////:: mostrar solicitudes viajes - admin ::////

    public function getSolicitudes()
    {
        $search = $this->conn->prepare("SELECT * from viaje");
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }

    ////:: mostrar solicitudes viajes - cliente ::////

    public function getSolicitudesClientes($id)
    {
        $search = $this->conn->prepare("SELECT * from viaje where idCliente = :id");
        $search->bindParam(":id", $id, PDO::PARAM_INT);
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }

    ////:: insertar confirmarcion reserva viajes ::////

    public function setConfirmationReserva($idCliente, $idHotel, $idDestino, $llegada, $salida, $sessionUser, $matricula, $modelo, $tipo, $operador)
    {
        $insert = $this->conn->prepare("INSERT reserva (clienteReserva, hotelReserva, destinoReserva,llegada, salida, usuarioModifica, matriculaTransporte, modeloTransporte, tipoTransporte, operador) values (:idCliente, :idHotel, :idDestino,:llegada, :salida, :sessionUser, :matricula, :modelo, :tipo, :operador)");
        $insert->bindParam(":idCliente", $idCliente, PDO::PARAM_INT);
        $insert->bindParam(":idHotel", $idHotel, PDO::PARAM_INT);
        $insert->bindParam(":idDestino", $idDestino, PDO::PARAM_INT);
        $insert->bindParam(":llegada", $llegada, PDO::PARAM_STR);
        $insert->bindParam(":salida", $salida, PDO::PARAM_INT);
        $insert->bindParam(":sessionUser", $sessionUser, PDO::PARAM_INT);
        $insert->bindParam(":matricula", $matricula, PDO::PARAM_STR);
        $insert->bindParam(":modelo", $modelo, PDO::PARAM_STR);
        $insert->bindParam(":tipo", $tipo, PDO::PARAM_STR);
        $insert->bindParam(":operador", $operador, PDO::PARAM_STR);
        $insert->execute();
        //actualizar estado viajes
        $status = 1;
        $uptade = $this->conn->prepare("UPDATE viaje SET estatus = :status where idViaje = :id");
        $uptade->bindParam(":status", $status, PDO::PARAM_INT);
        $uptade->bindParam(":id", $idDestino, PDO::PARAM_INT);
        return $uptade->execute() ? true : false;
    }

    //consultar reservas por cliente


    public function getReservasId($id)
    {
        $search = $this->conn->prepare("SELECT * from reserva r INNER JOIN cliente c ON r.clienteReserva = idCliente INNER JOIN hotel h ON r.hotelReserva = h.idHotel INNER JOIN viaje v ON v.idViaje = r.destinoReserva
           WHERE c.usuariosId = :id");
        $search->bindParam(":id", $id, PDO::PARAM_INT);
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }

    //consultar datos por id viajes

    public function getReservasRecibos($id)
    {
        $search = $this->conn->prepare("SELECT * from reserva r INNER JOIN cliente c ON r.clienteReserva = c.idCliente INNER JOIN hotel h ON r.hotelReserva = h.idHotel INNER JOIN viaje v ON v.idViaje = r.destinoReserva
           WHERE r.idReserva = :id");
        $search->bindParam(":id", $id, PDO::PARAM_INT);
        $search->execute();
        $result = $search->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }

    //eliminar solicitudes viajes

    public function deleteSolicitudes($id)
    {

        $search = $this->conn->prepare("DELETE from viaje where idViaje = :id");
        $search->bindParam(":id", $id, PDO::PARAM_INT);
        return $search->execute() ? true : false;
    }
}
