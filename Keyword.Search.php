<?php
//buscamos una palabra clave en la descripcion del producto:
$keyword = $_POST['keyword'];
$query = "SELECT * FROM products WHERE description LIKE '%$keyword'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["ID"]. " - Name: " . $row["name"]. " = Description: " . $row["description"]. "<br>";
    } 
} else {
    echo "No se encontraron resultados.";
}
?>


<?php
// Buscamos una palabra clave en un archivo de texto
$keyword = $_POST['keyword'];
$file = file_get_contents('file.txt');
$lines = explode("\n", $file);

foreach ($lines as $line) {
    if (strpos($line, $keyword) !== false) {
        echo $line . "<br>";
    }
}
?>


<?php
//Mejoramos la busqueda de un archivo de texto
function search($file, $keyword) {
    $lines = explode("\n", $file);

    foreach ($lines as $line) {
        if (stripos($line, $keyword) !== false) {
            return $line;
        }
    }
}
?>


<?php
//Anadimos una funcion para buscar multiples palabras claves
function searchMultiple($file, $keyword) {
    $lines = explode("\n", $file); // dividimos el archivo en lineas con un salto de linea como separador
    $results = array();

    // Evaluamos linea por linea y cuando encontramos la palabra clave anadimos la linea al array de resultados
    foreach($lines as $line) {
        foreach ($keyword as $keyword) {
            if (stripos($line, $keyword) !== false) {
                $result[] = $line;
            }
        }
    }
    return $result;
}
$keyword = explode(" ", $_POST['keyword']);
$file = file_get_contents('file.text');
$result = searchMultiple($file, $keyword);

if (count($result) > 0) {
    foreach ($results as $result) {
        echo $result . "<br>";
    }
} else {
    echo "No se encontraron resultados";
}
?>