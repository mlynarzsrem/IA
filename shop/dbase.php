<?php
    session_start();
    include 'connection.php';
    if(isset($_POST['name'])){    
        $productName =$_POST['name'];
        mysqli_query($con,'Insert into products values("'.$productName.'")') or die("Zapytanie niepoprawne");
    }
    else{
        if(isset($_SESSION['basket'])){
            $basket = $_SESSION['basket'];
            $con->autocommit(FALSE);
            $isValid =TRUE;
            foreach ($basket as &$product) {
                $result = mysqli_query($con,'SELECT * from products where name like "'.$product.'"') or die("Zapytanie niepoprawne");
                if(mysqli_num_rows($result)!=0){
                    mysqli_query($con,'DELETE from products where name like "'.$product.'"') or die("Zapytanie niepoprawne");
                }
                else{
                    $isValid =FALSE;
                }
            }
            If($isValid ==TRUE){
                $con->commit();
                unset($_SESSION['basket']);
            }
            else{
                $con->rollback();
            }
            $con->autocommit(TRUE);
        }
    }
    header('Location: index.php');
?>