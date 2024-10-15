<?php
// Obtener los datos de la base de datos con getData()

function getData($limit, $offset) {
    $conn = mysqli_connect("localhost", "username", "password", "database");
    $query = "SELECT * FROM products LIMIT {$limit} OFFSET {$offset}";
    $result = mysqli_query($conn, $query);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    return $data;
}

//Mostrar los productos (5 productos por pagina)
$limit = 5;
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$offset = ($page - 1) * $limit;
$data = getData($limit, $offset);

foreach ($data as $product) {
    echo $product['name'] . "<br>";
}

//Creamos la paginacion , con 100 productos en total
$total_products = 100;
$total_pages = ceil($total_products / $limit);
$current_page = (isset($_GET['page'])) ? $_GET['page'] : 1;

echo  "<a href='?page=1'>Primera</a>";

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $current_page) {
        echo $i . " ";
    } else {
        echo "<a href='?page={$i}'>{$i}</a>";
    }
}

echo "<a href='?page={$total_pages}'>Ultima</a>";

?>