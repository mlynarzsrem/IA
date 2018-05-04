<?php
    session_start();
    $productName =$_POST['productNameBasket'];
    echo $productName;
    if(isset($_SESSION['basket'])){
        $basket = $_SESSION['basket'];
        array_push($basket,$productName );
        $_SESSION['basket'] = $basket;
    }
    else{
        $basket = array($productName);
        $_SESSION['basket'] = $basket;
    }
    header('Location: index.php');
?>