<?php
$user_id = $_GET['user_id']; //Para que usuario estamos recomendando
$query = "SELECT item_id FROM interations WHERE user_id = $user_id";
$similar_users = array(); // Guardaremos aqui los user_id que hayan interactuado con el mismo item_id que nuestro usuario
    foreach ($db->query($query) as $row) {    
    $item_id = $row['item_id'];
    $query = "SELECT user_id FROM interations WHERE item_id = $item_id";
    foreach ($db->query($query) as $row) {
    $similar_user[] = $row['user_id'];
    }
}
$similar_users = array_unique($similar_users); //Se realiza una busqueda de todos los item_id con los que han interactuado
$recommendations = array();
foreach ($similar_user as $user_id) {
    $query = "SELECT item_id FROM interactions WHERE user_id = $user_id";
    foreach ($db->query($query) as $row) {
        $recommendations[] = $row['item_id']; // Se almacenan los item_id en un array de recomendaciones
    }
}
$recommendations = array_unique($recommendations); // eliminamos duplicidades