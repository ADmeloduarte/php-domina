<?php

///not case sensitive

$string = "https://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2022-40512";
$pattern = "/\cve-\b/i";
if (preg_match($pattern, $string)) {
    echo "El patron se encontron en la cadena.";
} else {
    echo "EL patron no se encontron en la cadena.";
}

///Validar Emails

$email = "example@gmail.com";
$pattern = "/^[a-zA-z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
if (preg_match($pattern, $email)) {
    echo "La direccion de correo electronico es valida";
} else {
    echo "La direccion de correo electronico no es valida";
}