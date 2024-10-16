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
?>

<?php
// Primero obtenemos una lista de tosos los prductos y los usuarios que los han interactuado
$products - get_products();
$user_interations = get_user_interactions();

// Luego creamos una matriz de similitud entre los productos
$similarity_matrix = calculate_similatiry_matrix($products, $user_interactions);

// Our ultimo, podemos hacer recomendaciones para un usuario especifico
$recommendations = get_recommendations_for_user($user_id, $products, $similarity_matrix);

// Mostramos las recomendaciones al usuario
foreach($recommendations as $product) {
    echo "Le recomendamos el producto: " . $product['name'];
}
?>