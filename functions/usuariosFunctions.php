<?php
session_start();
require(__DIR__ . "/../classes/usuarios/usuariosClass.php");
$usersClass = new usuariosClass();

if (isset($_POST["users"])) {
    $namesFirst = filter_input(INPUT_POST, 'names', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $namesSecond = filter_input(INPUT_POST, 'names-second', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $names = $namesFirst . " " . $namesSecond;
    $paterno = filter_input(INPUT_POST, 'paterno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $materno = filter_input(INPUT_POST, 'materno', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $users = filter_input(INPUT_POST, 'users', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $telf = filter_input(INPUT_POST, 'telf', FILTER_SANITIZE_NUMBER_INT);
    $rol = filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_NUMBER_INT);
    $calles = filter_input(INPUT_POST, 'calles', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $colonia = filter_input(INPUT_POST, 'colonia', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_NUMBER_INT);
    $pais = filter_input(INPUT_POST, 'pais', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fecha = date("Y-m-d");

    // Validar que los campos estén llenos
    if (empty($names) && empty($paterno) && empty($materno) && empty($users) && empty($pass) && empty($telf) && empty($rol) && empty($calles) && empty($colonia) && empty($cp) && empty($pais)) {
        echo "empty";
    } else {

        $insertUser = $usersClass->setUsers($users, $passHash, $names, $paterno, $materno, $telf, $fecha, $rol);


        if ($insertUser === "existe") {
            echo "existe";
        } elseif ($insertUser == true) {
            echo "success";
        } else {
            echo "error";
        }

        //si es cliente agrega sus datos adicionales

        if ($rol == 2) {
            $result = $usersClass->setClientes($calles, $colonia, $cp, $pais, $insertUser);
        }
    }
}

////:: editar datos usuarios ::////

if (isset($_POST["id-users"])) {
    $idEdit = filter_input(INPUT_POST, 'id-users', FILTER_SANITIZE_NUMBER_INT);
    $namesFull = filter_input(INPUT_POST, 'names-edit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //separar nombres y apellidos
    $separadorNames = explode(" ", $namesFull);
    $firsName = $separadorNames[0];
    $secodName = $separadorNames[1];
    $aPaterno = $separadorNames[2];
    $aMaterno = $separadorNames[3];
    $names = $firsName . " " . $secodName;
    //echo $materno;
    $telf = filter_input(INPUT_POST, 'telf-edit', FILTER_SANITIZE_NUMBER_INT);
    $status = filter_input(INPUT_POST, 'estado-edit', FILTER_SANITIZE_NUMBER_INT);
    $rol = filter_input(INPUT_POST, 'rol-edit', FILTER_SANITIZE_NUMBER_INT);
    $user_session = $_SESSION["id_login"];

    // Validar que los campos estén llenos
    if (empty($names) && empty($paterno) && empty($materno) && empty($telf) && empty($rol)) {
        echo "empty";
    } else {

        $editResult = $usersClass->updateUsers($names, $aPaterno, $aMaterno, $telf, $status, $user_session, $rol, $idEdit);
        if ($editResult == true) {
            echo "success";
        }
    }
}

////:: eliminar usuarios ::////

if (isset($_POST["idDelete"])) {
    $idDelete = filter_input(INPUT_POST, 'idDelete', FILTER_SANITIZE_NUMBER_INT);
    $deleteResult = $usersClass->deleteUsers($idDelete);
    echo $deleteResult ? "success" : "error";
}

////:: actualizar pass usuarios ::////

if (isset($_POST["idUsersPass"])) {
    $idUserPass = filter_input(INPUT_POST, 'idUsersPass', FILTER_SANITIZE_NUMBER_INT);
    $pass = filter_input(INPUT_POST, 'pass-edit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $updateResult = $usersClass->updatePass($idUserPass,$passHash);
    echo $updateResult ? "success" : "error";
}


