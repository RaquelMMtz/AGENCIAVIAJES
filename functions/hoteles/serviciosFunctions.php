<?php
session_start();
include(__DIR__ . "/../../core/config.php");
require(__DIR__ . "/../../classes/servicios/serviciosClass.php");
$serviciosClass = new serviciosClass();

////:: agregar servicios :://///

if (isset($_POST["namesServices"])) {
    $idHotel = null;
    $namesServices = filter_input(INPUT_POST, 'namesServices', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descriptionServices = filter_input(INPUT_POST, 'descriptionServices', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sessionUser = $_SESSION["id_login"];
    // Validar que los campos estén llenos
    if (empty($namesServices) || empty($descriptionServices)) {
        echo "empty";
    } else {

        $insertServices = $serviciosClass->setServices($idHotel, $namesServices, $descriptionServices,$sessionUser);
        echo $insertServices == true ? "success" : "error";
    }
}

////:: eliminar servicios ::////

if (isset($_POST["idDelete"])) {
    $idDelete = filter_input(INPUT_POST, 'idDelete', FILTER_SANITIZE_NUMBER_INT);
    $deleteResult = $serviciosClass->deleteServices($idDelete);
    echo $deleteResult ? "success" : "error";
}
