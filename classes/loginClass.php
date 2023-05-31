<?php


session_start();

require_once(__DIR__ . "/../db/Conn.php");

class loginClass
{

    private $conn;
    public function __construct()
    {

        $db = new Conn();
        $this->conn = $db->conectar();
    }

    public function getUsers($user, $pass)
    {
        $query = $this->conn->prepare("SELECT * from usuario where username = :nick AND estatus = 1");
        $query->bindParam(':nick', $user, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() == 1) {
            $rows = $query->fetch(PDO::FETCH_ASSOC);
            if (password_verify($pass, $rows['passUsuario'])) {
                //session_start();
                $userLogin = $rows['username'];
                $rolLogin = $rows['rolUsuario'];
                $idLogin = $rows['idUsuario'];
                $_SESSION['usuario_login'] = $userLogin;
                $_SESSION['rol_login'] = $rolLogin;
                $_SESSION['id_login'] = $idLogin;
                //echo 'el rol es:' . $_SESSION['rol_login'];
                return true;
            } else {
                //  echo 'no existe pass';
            }
        } else {
            return false;
        }
    }

    //desactivar cuenta usuarios


    public function updateAccount($names, $aPaterno, $aMaterno, $telf, $idUsers)
    {

        $query = $this->conn->prepare("UPDATE usuario set nombres = :names, aPaterno = :paternos, aMaterno = :maternos, telefonosUsuario = :telf where idUsuario = :id");
        $query->bindParam(':names', $names, PDO::PARAM_STR);
        $query->bindParam(':paternos', $aPaterno, PDO::PARAM_STR);
        $query->bindParam(':maternos', $aMaterno, PDO::PARAM_STR);
        $query->bindParam(':telf', $telf, PDO::PARAM_STR);
        $query->bindParam(':id', $idUsers, PDO::PARAM_INT);
        return $query->execute() ? true : false;
    }
}
