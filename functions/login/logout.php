<?php 

session_start();
session_status();
session_destroy();
header("Location: ../../login.php");

?>