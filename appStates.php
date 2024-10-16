<?php
//Inicia la sesion
session_start();

//Establecer una variable de sesion
$_SESSION['nombre'] = "Valor de la sesion";

//Obtener una variable de sesion
$nombre = $_SESSION['nombre'];

//Establecer una cookie
setcookie("nombre", "valor de la cookie", time() + (86400 * 30), "/");

//Obtener una cookie
$nombre = $_COOKIE['nombre'];
?>