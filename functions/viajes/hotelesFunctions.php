<?php
session_start();
include(__DIR__ . "/../../core/config.php");
require(__DIR__ . "/../../classes/viajes/hotelesClass.php");
$hotelesClass = new hotelesClass();

////:: agregar hoteles :://///

if (isset($_POST["namesHoteles"])) {
    $namesHoteles = filter_input(INPUT_POST, 'namesHoteles', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $telf = filter_input(INPUT_POST, 'telefonos', FILTER_VALIDATE_INT);
    $calles = filter_input(INPUT_POST, 'calles', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $colonia = filter_input(INPUT_POST, 'colonia', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cp = filter_input(INPUT_POST, 'cp', FILTER_VALIDATE_INT);
    $pais = filter_input(INPUT_POST, 'paisHotel', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $sessionUser = $_SESSION["id_login"];
    // Validar que los campos estén llenos
    if (empty($namesHoteles) || empty($telf) || empty($calles)) {
        echo "empty";
    } else {

        $insertHotel = $hotelesClass->setHoteles($namesHoteles, $telf, $calles, $colonia, $cp, $pais, $sessionUser);
        echo $insertHotel == true ? "success" : "error";
    }
}

////:: actualizar datos hoteles ::////

if (isset($_POST["idHoteles"])) {
    $idDirecciones = filter_input(INPUT_POST, 'idDirecciones', FILTER_VALIDATE_INT);
    $idHoteles = filter_input(INPUT_POST, 'idHoteles', FILTER_VALIDATE_INT);
    $namesHoteles = filter_input(INPUT_POST, 'names-edit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $telf = filter_input(INPUT_POST, 'telefonosEdit', FILTER_VALIDATE_INT);
    $calles = filter_input(INPUT_POST, 'callesEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $colonia = filter_input(INPUT_POST, 'coloniaEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cp = filter_input(INPUT_POST, 'cpEdit', FILTER_VALIDATE_INT);
    $pais = filter_input(INPUT_POST, 'paisEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sessionUser = $_SESSION["id_login"];
    // Validar que los campos estén llenos
    if (empty($namesHoteles) || empty($telf) || empty($calles)) {
        echo "empty";
    } else {

        $insertHotel = $hotelesClass->updateHoteles($idHoteles, $namesHoteles, $telf, $calles, $colonia, $cp, $pais, $sessionUser);
        echo $insertHotel == true ? "success" : "error";
    }
}

////:: eliminar viajes ::////

if (isset($_POST["idDelete"])) {
    $idDelete = filter_input(INPUT_POST, 'idDelete', FILTER_SANITIZE_NUMBER_INT);
    $deleteResult = $hotelesClass->deleteHoteles($idDelete);
    echo $deleteResult ? "success" : "error";
}
