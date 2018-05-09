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
				$stmt = $con->prepare('DELETE from products where name = ? ');
				$stmt->bind_param("s", $product);
                $stmt->execute() or die("Zapytanie niepoprawne");
				$result = mysqli_stmt_affected_rows($stmt); 
                if($result==0){
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