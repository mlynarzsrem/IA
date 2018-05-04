<?php
session_start();
include 'connection.php';
?>

<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The Shop</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

</head>

<body>
<h1>Super shop</h1>
<h3>Products</h3>
<ul>
<?php
	  $result = mysqli_query($con,"SELECT * from products")
    or die("Zapytanie niepoprawne");
	
	while($row = mysqli_fetch_array($result))
	  {
	  echo '<form method="post" action="basket.php"><li>'.$row['name'].'<input type="text" name="productNameBasket" value="'.$row['name'].'" style="display: none;"/><input type="submit" value="Add to basket"/></li></form>';
	  echo "<br />";
	  }
	mysqli_close($con);
?>
</ul>
<h3>Basket</h3>
<ul>
<?php
    if(isset($_SESSION['basket'])){
        $basket = $_SESSION['basket'];
        foreach ($basket as &$product) {
            echo $product;
            echo "<br />";
        }
    }
?>
</ul>
<?php
    if(isset($_SESSION['basket'])){
    echo '<form action="buy.php"><button type="submit">Buy</button></form><br/>';
    echo '<form action="clearbasket.php"><button type="submit">Clear basket</button></form><br/>';
    }
?>
</body>
</html>