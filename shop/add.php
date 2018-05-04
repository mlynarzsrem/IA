<?php
    include 'connection.php';
    $productName =$_POST['name'];
    mysqli_query($con,'Insert into products values("'.$productName.'")') or die("Zapytanie niepoprawne");
    header('Location: index.php');
?>