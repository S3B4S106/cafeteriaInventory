<?php
    if(empty($_POST["hidden"]) || empty($_POST["name"]) || empty($_POST["reference"]) 
    || empty($_POST["price"]) || empty($_POST["weigth"]) || empty($_POST["category"]) 
    || empty($_POST["stock"]) ){
        echo "¡ERROR! Faltan datos necesarios para crear un producto";
        header('Location: /cafeteriaInventory/index.php?message=missing');
        exit();
        
    }

    include_once '../../config/connection.php';
    $product_name = $_POST["name"];
    $reference = $_POST["reference"];
    $price = $_POST["price"];
    $weigth = $_POST["weigth"];
    $category = $_POST["category"];
    $stock = $_POST["stock"];

    $query = $base_de_datos->prepare("INSERT INTO products(product_name, reference, price, weigth, category, stock) VALUES (?,?,?,?,?,?);");
    $result = $query->execute([$product_name, $reference, $price, $weigth, $category, $stock]);

    if ($result === TRUE) {
        header('Location: /cafeteriaInventory/index.php?message=inserted');
        exit();
        
    } else {
        header('Location: /cafeteria/inventory/index.php?message=noinserted');
        exit();
        
    }
    
?>