<?php
session_start();
//llama a clase usuarios
require_once(__DIR__ . "/../../classes/usuarios/usuariosClass.php");
$id = $_SESSION['id_login'];

//llama a los datos usuario logueado
$objUsers = new usuariosClass();
$rowsUsers = $objUsers->getdatesUsers($id);
$namesClientes = $rowsUsers['nombres'] . " " . $rowsUsers['aPaterno'] . " " . $rowsUsers['aMaterno'];
$names =  $rowsUsers['nombres'];
$separadorNames = explode(" ", $names);
$firsName = $separadorNames[0];
$secodName = $separadorNames[1];
$aPaterno = $rowsUsers["aPaterno"];
$aMaternos = $rowsUsers["aMaterno"];
$telf = $rowsUsers["telefonosUsuario"];
$username = $rowsUsers["username"];
$rolNum = $rowsUsers["rolUsuario"];
$rolUsers = ($rolNum === 1) ? "Administrador" : "Clientes";
function validarAcceso()
{
    include(__DIR__ . "/../../core/config.php");
    $rol = $_SESSION['rol_login'];
    $currentPage = $_SERVER['PHP_SELF'];
    // Si el rol es de administrador y está intentando acceder a la vista de usuario
    if ($rol == 1 && strpos($currentPage, '/views/cliente') !== false) {
        header("Location: $root/views/admin/index.php");
    }

    // Si el rol es de usuario y está intentando acceder a la vista de administrador
    if ($rol == 2 && strpos($currentPage, '/views/admin') !== false) {
        header("Location: $root/views/centros_educativos/index.php");
    }
}
//ejecuta la funcion
validarAcceso();
