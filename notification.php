<?php
function enviarNotificacion($mensaje, $destinatario) {
    $fecha = date("Y-m-d H:i:s");
    $estado = "sin leer";

    // Conectarse a la base de datos e insetar los datos de la notificacion 
    $sql = "INSERT INTO notificaciones (mensaje, destinatario, estado, fecha) VALUES ('$mensaje', '$destinatario', '$estado', '$fecha')";

    if ($conn->query($sql) === TRUE) {
        // Enviar correo electronico al destinatario con la notificacion
        $to = $destinatario;
        $subject = "Notificacion de sitio web";
        $message = $mensaje;
        $headers = "From: no-reply@sitio.com\r\n";
        $mail($to, $subject, $message, $headers);
        return true;
    } else {
        return false;
    }
}
?>


<?php
// Recuperar todas las notificaciones de la base de datos
$sql = "SELECT * FROM notificaciones WHERE destinatario = '$destinatario'";
$result = $conn->query($sql);

// Mostrar todas las notificaciones en una tabla
echo "<table>";
echo "<tr><th>Mensaje</th><th>Fecha</th><th>Accion</th></tr>";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<tr>" . $row["mensaje"] . "</td>";
        echo "<tr>" . $row["fecha"] . "</td>";
        echo "<tr><a href='mark_read.php?id=" . $row["ID"] . "'>Marcar como no leido</a></td>";
        echo "<tr>";
    }
} else {
    echo "<tr><td colspan='3'>No hay notificaciones disponibles</td></tr>";
}
echo "</table>";

// Funcion para marcar las notificaciones como leidas
function marcarLeido($id) {
    $sql = "UPDATE notificaciones SET estado = 'leido' WHERE ID = $id";
    if ($conn->query($sql) === TRUE){
        return true;
    } else {
        return false;
    }
}


?>