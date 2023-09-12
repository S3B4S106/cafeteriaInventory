<?php

if(!isset($_POST['id'])){
    header('Location: /cafeteriaInventory/index.php?message=error');
    exit();
}

include_once '../config/connection.php';


$id = $_POST['id'];
$product_name = $_POST['name'];
$product_cantity = $_POST['cantity'];
$stock = (($_POST['stock'])-$product_cantity);


$query = $base_de_datos->prepare("UPDATE products SET stock = ? WHERE product_id = ?;");
$result = $query->execute([$stock, $id]);

if ($result === TRUE) {
    $consulta = $base_de_datos->prepare("INSERT INTO sells(product_id, product_cantity) VALUES (?,?);");
    $resultado = $consulta->execute([$id, $product_cantity]);
    header('Location: /cafeteriaInventory/index.php?message=selled');
    exit();
} else {
    header('Location: /cafeteriaInventory/index.php?message=error');
    exit();
}
?>