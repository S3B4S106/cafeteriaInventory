<?php

if(!isset($_GET['id'])){
    header('Location: /cafeteriaInventory/index.php?message=error');
    exit();
}

include_once '../../config/connection.php';

$id = $_GET['id'];

$query = $base_de_datos->prepare("SELECT * FROM sells WHERE product_id = ?;");
$result = $query->execute([$id]);
if($query->rowCount()>0){
    $query = $base_de_datos->prepare("DELETE FROM sells WHERE product_id = ?;");
    $result = $query->execute([$id]);
}
$query = $base_de_datos->prepare("DELETE FROM products WHERE product_id = ?;");
$result = $query->execute([$id]);

if ($result === TRUE) {
    header('Location: /cafeteriaInventory/index.php?message=deleted');
    exit();
} else {
    header('Location: /cafeteriaInventory/index.php?message=error');
    exit();
}

?>