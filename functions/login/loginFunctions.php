<?php

//llamar clase login
require(__DIR__ . "/../../classes/loginClass.php");
$login = new loginClass();

if (isset($_POST["userLogin"])) {
    $user = filter_input(INPUT_POST, 'userLogin', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if (empty($user) || empty($pass)) {
        echo "error";
    } else {
        $result = $login->getUsers($user, $pass);
        //valida si devuelve true o false en el login
        echo $result ? "success" : "error";
    }
}
