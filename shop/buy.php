<?php
    session_start();
    include 'connection.php';
    if(isset($_SESSION['basket'])){
        $basket = $_SESSION['basket'];
        $con->autocommit(FALSE);
        foreach ($basket as &$product) {
            $result = mysqli_query($con,'SELECT * from products where name like "'.$product.'"') or die("Zapytanie niepoprawne");
            if(mysqli_num_rows($result)!=0){
                mysqli_query($con,'DELETE from products where name like "'.$product.'"') or die("Zapytanie niepoprawne");
            }
            else{
                $con->rollback();
                header('Location: index.php');
            }
        }
        $con->commit();
        unset($_SESSION['basket']);
    }
    header('Location: index.php');
?>