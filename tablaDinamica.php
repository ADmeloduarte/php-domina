<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
    </tr>

    <?php
    $conn =  mysqli_connect("localhost", "username","password", "database");
    $sql = "SELECT * FROM table";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        ?>
    <tr>
        <td><?php echo $row ['id']; ?></td>
        <td><?php echo $row ['nombre']; ?></td>
        <td><?php echo $row ['apellido']; ?></td>
    </tr>

    <?php
    }
    ?>
</table>