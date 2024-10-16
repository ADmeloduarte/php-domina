<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "database_name";

// Conectarse a la base de datos
$conn = mysqli_connect($host, $username, $password, $database);

// Verificar la conexion
if (!$conn) {
    die("conexion fallida: " . mysqli_connect_error());
}

// Nombre del archivo de backup
$backup_file = "backup.sql";

// Crear el archivo de backup
$sql = "SELECT * INTO OUTFILE '$backup_file' FROM tabla_datos";
mysqli_query($conn, $sql);

// Forzar la descarga del archivo
header("Content-Disposition: attachment; filename=$backup_file");
header("Content-Type: application/octet-stream");
readfile($backup_file);
?>