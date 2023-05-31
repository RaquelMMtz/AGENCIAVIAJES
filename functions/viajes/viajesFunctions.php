<?php
session_start();
include(__DIR__."/../../core/config.php");
require(__DIR__ . "/../../classes/viajes/viajesClass.php");
$viajesClass = new viajesClass();

////:: editar datos clientes :://///

if (isset($_POST["destinoViajes"])) {
    $destino = filter_input(INPUT_POST, 'destinoViajes', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $duration = filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $img = $_FILES['img']['name'];
    $temporal = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];
    $ext = pathinfo($img, PATHINFO_EXTENSION);
    //direccion guardar adjuntos
    $dir = $_SERVER['DOCUMENT_ROOT'] . $root . '/uploads/viajes';
    $newImagesName = 'destinosimg_' . md5(time() . $img) . '.' . $ext;
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $sessionUser = $_SESSION["id_login"];
    // Validar que los campos estén llenos
    if (empty($img) || empty($destino) || empty($price)) {
        echo "empty";
    } else {
        if ((strpos($type, "jpg") || strpos($type, "jpeg") || strpos($type, "png"))) {
            move_uploaded_file($temporal, $dir . '/' . $newImagesName);
            //si no existe crea carpeta
            if (!file_exists($dir)) {
                mkdir($dir, 007);
            }
            if (move_uploaded_file($temporal, $dir . '/' . $newImagesName)) {
                echo 'error al subir imagen';
            } else {
                //  echo 'la imagen se subio';
                //si los datos enviados son validos guardar informacion en la BD
                $resultInsert = $viajesClass->setViajes($destino, $price, $duration, $newImagesName, $description, $sessionUser);
                echo $resultInsert==true ? "success" : "error"; 
            }
        } else {
            echo 'formato de imagen no valido';
        }
    }
}


////:: eliminar viajes ::////

if (isset($_POST["idDelete"])) {
    $idDelete = filter_input(INPUT_POST, 'idDelete', FILTER_SANITIZE_NUMBER_INT);
    $deleteResult = $viajesClass->deleteViajes($idDelete);
    echo $deleteResult ? "success" : "error";
}

////:: cancelar viajes clientes ::////

if (isset($_POST["idCancel"])) {
    $idCancel = filter_input(INPUT_POST, 'idCancel', FILTER_SANITIZE_NUMBER_INT);
    $cancelResult = $viajesClass->cancelViajes($idCancel);
    echo $cancelResult ? "success" : "error";
}


