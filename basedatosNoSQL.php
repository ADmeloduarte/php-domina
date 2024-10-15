<?php
//conectar a MongoDB con PHP
$cliente = new MongoDB\Cliente("mongodb://localhost:27017");
$db = $cliente->selectDatabase("database");

?>


<?php
//Crear coleccion y agregar documentos
$colletion = $db->selectCollection('collection');
$document = [
    "name" => "Matthew",
    "age" => 35,
    "email" => "mathew@linkedin.com"
];
$colletion->inesertONe($document);
?>


<?php
// Recuperar documentos de una coleccion
$cursos = $colletion->find();
foreach ($cursor as $document) {
    echo "Name: " . $document["name"] . "\n";
    echo "Age: " . $document["age"] . "\n";
    echo "Email: " . $document["email"] . "\n\n";
}
?>


<?php
// Devuelve un dato especifico
$cursor = $collection->find(["age" => 30]);
foreach ($cursor as $document) {
    echo "Name: " . $document["name"]. "\n";
    echo "Age: " . $document["age"]. "\n";
    echo "Email: " . $document["email"]. "\n\n";
}
?>