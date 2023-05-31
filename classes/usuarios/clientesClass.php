<?php


require_once(__DIR__ . "/../../db/Conn.php");

class clientesClass
{
    private $conn;
    public function __construct()
    {

        $db = new Conn();
        $this->conn = $db->conectar();
    }

    //mostrar clientes registrados

    public function getClientes()
    {
        $search = $this->conn->prepare("SELECT * from cliente c INNER JOIN usuario u ON c.usuariosId  = u.idUsuario where rolUsuario = 2");
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }

    //actualizar registro usuarios

    public function updateClientes($calles, $colonia, $cp, $pais, $sesionUsuario, $idClientes)
    {
        $update = $this->conn->prepare("UPDATE cliente SET callesCliente = :calles, coloniaCliente = :colonia, codigoPostal = :cp, pais = :pais, usuarioModifica = :sessionUsuario WHERE idCliente = :id");
        $update->bindParam(":calles", $calles, PDO::PARAM_STR);
        $update->bindParam(":colonia", $colonia, PDO::PARAM_STR);
        $update->bindParam(":cp", $cp, PDO::PARAM_STR);
        $update->bindParam(":pais", $pais, PDO::PARAM_STR);
        $update->bindParam(":sessionUsuario", $sesionUsuario, PDO::PARAM_INT);
        $update->bindParam(":id", $idClientes, PDO::PARAM_INT);
        return $update->execute() ? true : false;
    }

    //eliminar usuarios

    public function deleteClientes($id)
    {
        $delete = $this->conn->prepare("DELETE from usuario where idUsuario = :id");
        $delete->bindParam(":id", $id, PDO::PARAM_INT);
        return $delete->execute() ? true : false;
    }
}
