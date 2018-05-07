<?php
    session_start();
    if(isset($_POST['productNameBasket'])){
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
    }
    else{
         if(isset($_SESSION['basket'])){
            unset($_SESSION['basket']);
         }
    }
    header('Location: index.php');
?>