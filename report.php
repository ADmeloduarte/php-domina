<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "database_name";

//conectarse a la base de datos
$conn = mysqli_connect($host, $username, $password, $database);

//Verificar la conexion
if (!$conn) {
    die("Conecion fallida: " . mysqli_connect_error());

    $query = "SELECT * FROM tabla_reportes";
    $result = mysqli_query($conn, $query);
}
?>

<table>
    <tr>
        <th>Columna 1</th>
        <th>Columna 2</th>
        <th>Columna 3</th>
    </tr>
    <tr>
        <th>Fila 1, Columna 1</th>
        <th>Fila 1, Columna 2</th>
        <th>Fila 1, Columna 3</th>
    </tr>
    <tr>
        <th>Fila 2, Columna 1</th>
        <th>Fila 2, Columna 2</th>
        <th>Fila 2, Columna 3</th>
    </tr>
</table>

<?php
while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>" . $row['columna_1'] . "</td>";
    echo "<td>" . $row['columna_2'] . "</td>";
    echo "<td>" . $row['columna_3'] . "</td>";
    echo "</tr>";
}