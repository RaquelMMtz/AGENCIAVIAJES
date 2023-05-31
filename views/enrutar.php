<?php
session_start();
include(__DIR__ . "/../core/config.php");
if (isset($_SESSION['rol_login']) && isset($_SESSION['usuario_login'])) {

    switch ($_SESSION['rol_login']) {
        case 1:
            header("location: $root/views/admin/index.php");
            break;
        case 2:
            header("location: $root/views/cliente/index.php");
            break;
    }
}

?>