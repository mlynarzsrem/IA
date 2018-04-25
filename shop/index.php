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
<?php
$con = mysqli_connect("localhost","root","","db127220");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
<ul>
<?php
	  $result = mysqli_query($con,"SELECT * from products")
    or die("Zapytanie niepoprawne");
	
	while($row = mysqli_fetch_array($result))
	  {
	  echo '<li>'.$row['name'].'</li>';
	  echo "<br />";
	  }
	mysqli_close($con);
?>
</ul>
</body>
</html>