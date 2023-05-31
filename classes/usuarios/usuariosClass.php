<?php


require_once(__DIR__ . "/../../db/Conn.php");

class usuariosClass
{
    private $conn;
    public function __construct()
    {

        $db = new Conn();
        $this->conn = $db->conectar();
    }

    //agregar usuarios

    public function setUsers($user, $pass, $names, $paternos, $maternos, $telf, $fecha,$rol)
    {

        $search = $this->conn->prepare("SELECT username from usuario where username = :user");
        $search->bindParam(":user", $user, PDO::PARAM_STR);
        $search->execute();
        $result = $search->fetch(PDO::FETCH_ASSOC);
        if ($search->rowCount() >= 1) {
            return "existe";
        } else {
            $insert = $this->conn->prepare("INSERT into usuario (username,passUsuario,nombres,aPaterno,aMaterno,	telefonosUsuario,fechaRegistro,rolUsuario) values (:username, :pass, :names, :paternos, :maternos, :telf, :fecha, :rol)");
            $insert->bindParam(":username", $user, PDO::PARAM_STR);
            $insert->bindParam(":pass", $pass, PDO::PARAM_STR);
            $insert->bindParam(":names", $names, PDO::PARAM_STR);
            $insert->bindParam(":paternos", $paternos, PDO::PARAM_STR);
            $insert->bindParam(":maternos", $maternos, PDO::PARAM_STR);
            $insert->bindParam(":telf", $telf, PDO::PARAM_STR);
            $insert->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $insert->bindParam(":rol", $rol, PDO::PARAM_STR);
            return $insert->execute() ? $this->conn->lastInsertId() : false;
        }
    }

    public function setClientes($calles, $colonia, $cp, $pais, $userId)
    {

        $insert = $this->conn->prepare("INSERT into cliente (callesCliente,coloniaCliente,codigoPostal,pais,usuariosId) values (:calles, :colonia, :cp, :pais, :usuarioId)");
        $insert->bindParam(":calles", $calles, PDO::PARAM_STR);
        $insert->bindParam(":colonia", $colonia, PDO::PARAM_STR);
        $insert->bindParam(":cp", $cp, PDO::PARAM_STR);
        $insert->bindParam(":pais", $pais, PDO::PARAM_STR);
        $insert->bindParam(":usuarioId", $userId, PDO::PARAM_INT);
        return $insert->execute() ? "true" : false;
    }

    //mostrar usuarios registrados

    public function getUsers()
    {
        $search = $this->conn->prepare("SELECT * from usuario");
        $search->execute();
        $result = $search->fetchAll();
        return $result ? $result : false;
    }

    //consultar datos por 

    public function getdatesUsers($id)
    {
        $search = $this->conn->prepare("SELECT * from usuario where idUsuario = :id");
        $search->bindParam(":id", $id, PDO::PARAM_INT);
        $search->execute();
        $result = $search->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }

    //actualizar registro usuarios

    public function updateUsers($names, $paterno, $materno, $telf ,$status,$user_session,$rol, $idEdit)
    {
        $update = $this->conn->prepare("UPDATE usuario SET nombres=:names, aPaterno=:paternos, aMaterno=:maternos, telefonosUsuario=:telf, estatus = :estatus ,usuarioModifica=:user_modificacion, rolUsuario = :rol WHERE idUsuario=:id");
        $update->bindParam(":names", $names, PDO::PARAM_STR);
        $update->bindParam(":paternos", $paterno, PDO::PARAM_STR);
        $update->bindParam(":maternos", $materno, PDO::PARAM_STR);
        $update->bindParam(":telf", $telf, PDO::PARAM_STR);
        $update->bindParam(":estatus", $status, PDO::PARAM_STR);
        $update->bindParam(":user_modificacion", $user_session, PDO::PARAM_STR);
        $update->bindParam(":rol", $rol, PDO::PARAM_STR);
        $update->bindParam(":id", $idEdit, PDO::PARAM_INT);
        return $update->execute() ? true : false;
    }

    //eliminar usuarios

    public function deleteUsers($id)
    {
        $delete = $this->conn->prepare("DELETE from usuario where idUsuario = :id");
        $delete->bindParam(":id", $id, PDO::PARAM_INT);
        return $delete->execute() ? true : false;
    }

    ////:: actualizar pass usuarios ::////

    public function updatePass($id,$pass)
    {
        $updatePass = $this->conn->prepare("UPDATE usuario SET passUsuario = :pass where idUsuario = :id");
        $updatePass->bindParam(":pass", $pass, PDO::PARAM_STR);
        $updatePass->bindParam(":id", $id, PDO::PARAM_INT);
        return $updatePass->execute() ? true : false;
    }
}
