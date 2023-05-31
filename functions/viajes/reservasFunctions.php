<?php
session_start();
include(__DIR__ . "/../../core/config.php");
require(__DIR__ . "/../../classes/viajes/reservarClass.php");
$reservarClass = new reservarClass();

////:: agregar solicitudes viajes - clientes :://///

if (isset($_POST["idCliente"])) {
    $idCliente = filter_input(INPUT_POST, 'idCliente', FILTER_VALIDATE_INT);
    $origen = filter_input(INPUT_POST, 'origen', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $destino = filter_input(INPUT_POST, 'destino', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $origen = html_entity_decode($origen);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $duracion = filter_input(INPUT_POST, 'duracion', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $dateSolicitud = filter_input(INPUT_POST, 'fechaReserva', FILTER_VALIDATE_REGEXP, array(
        "options" => array("regexp" => "/^\d{4}-\d{2}-\d{2}$/")
    ));

    if (empty($idCliente) || empty($origen) || empty($destino)) {
        echo "empty";
    } else {

        $insertSolicitud = $reservarClass->setSolicitudViaje($origen, $destino, $price, $dateSolicitud,$duracion,$idCliente);
        echo $insertSolicitud == true ? "success" : "error";
    }
}

////:: reservar viajes admin ::////

if (isset($_POST["idViajes"])) {
    $idCliente = filter_input(INPUT_POST, 'idClientesReserva', FILTER_VALIDATE_INT);
    $idHotel = filter_input(INPUT_POST, 'idHotel', FILTER_VALIDATE_INT);
    $idDestino = filter_input(INPUT_POST, 'idViajes', FILTER_VALIDATE_INT);
    $llegada = $_POST["llegada"];
    $salida = $_POST["salida"];
    $sessionUser = $_SESSION["id_login"];
    $matricula = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $operador = filter_input(INPUT_POST, 'operador', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 

    if (empty($idCliente) || empty($idHotel) || empty($idDestino)) {
        echo "empty";
    } else {

        $insertSolicitud = $reservarClass->setConfirmationReserva($idCliente, $idHotel, $idDestino, $llegada, $salida, $sessionUser, $matricula, $modelo, $tipo, $operador);
        echo $insertSolicitud == true ? "success" : "error";
    }
}


////:: eliminar solicitudes ::////

if (isset($_POST["idDelete"])) {
    $idDelete = filter_input(INPUT_POST, 'idDelete', FILTER_SANITIZE_NUMBER_INT);
    $deleteResult = $reservarClass->deleteSolicitudes($idDelete);
    echo $deleteResult ? "success" : "error";
}