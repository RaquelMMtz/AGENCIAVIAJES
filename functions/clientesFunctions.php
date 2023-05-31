<?php
session_start();
require(__DIR__ . "/../classes/usuarios/clientesClass.php");
$clientesClass = new clientesClass();

////:: editar datos clientes :://///

if (isset($_POST["id-users"])) {
    $idClientes = filter_input(INPUT_POST, 'id-users', FILTER_SANITIZE_NUMBER_INT);
    $calles = filter_input(INPUT_POST, 'callesEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $colonia = filter_input(INPUT_POST, 'coloniaEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cp = filter_input(INPUT_POST, 'cpEdit', FILTER_SANITIZE_NUMBER_INT);
    $pais = filter_input(INPUT_POST, 'paisEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sesionUsuario = $_SESSION["id_login"];
    // Validar que los campos estén llenos
    if (empty($calles) && empty($colonia) && empty($cp) && empty($pais)) {
        echo "empty";
    } else {

        $updateCliente = $clientesClass->updateClientes($calles, $colonia, $cp, $pais, $sesionUsuario, $idClientes);
        echo $updateCliente == true ?  "success" : "error";
    }
}


////:: eliminar usuarios ::////

if (isset($_POST["idDelete"])) {
    $idDelete = filter_input(INPUT_POST, 'idDelete', FILTER_SANITIZE_NUMBER_INT);
    $deleteResult = $clientesClass->deleteClientes($idDelete);
    echo $deleteResult ? "success" : "error";
}


