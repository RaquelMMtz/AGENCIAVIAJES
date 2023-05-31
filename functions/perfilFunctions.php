<?php
require(__DIR__ . "/../classes/loginClass.php");
$loginClass = new loginClass();

////:: editar datos clientes :://///

if (isset($_POST["idUserEdit"])) {
    $idUsers = filter_input(INPUT_POST, 'idUserEdit', FILTER_SANITIZE_NUMBER_INT);
    $firstName = filter_input(INPUT_POST, 'firstNameEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $secondName = filter_input(INPUT_POST, 'secondNameEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $names = $firstName . " " . $secondName;
    $aPaterno = filter_input(INPUT_POST, 'paternoEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $aMaterno = filter_input(INPUT_POST, 'maternoEdit', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $telf = filter_input(INPUT_POST, 'telfEdit', FILTER_SANITIZE_NUMBER_INT);
    // Validar que los campos estén llenos
    if (empty($idUsers) && empty($firstName) && empty($secondName) && empty($aPaterno)) {
        echo "empty";
    } else {

        $updateCliente = $loginClass->updateAccount($names, $aPaterno, $aMaterno, $telf, $idUsers);
        echo $updateCliente == true ?  "success" : "error";
    }
}

