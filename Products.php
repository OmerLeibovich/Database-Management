<!DOCTYPE html>
<html>
<head>
    <link href="StyleS.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </link>
  <title>My Products</title>
</head>
<body>
  
  <div id="productTable">
  <?php
  $connection=mysqli_connect("localhost","root","","tzimer database");
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  session_start();

  if(isset($_SESSION['user_id'])){
  $user = $_SESSION['user_id'];
  $usernameQuery = mysqli_query($connection, "SELECT * FROM users WHERE id  = '$user'");
  $userfetch= mysqli_fetch_array($usernameQuery);
  if ($userfetch['admin'] == 1){
    require("adminTopnav.php");
    $result = mysqli_query($connection,"SELECT * FROM product");
    echo "<table border='1'>
    <tr>
    <th>id</th>
    <th>name</th>
   <th>photo</th>
   <th>price</th>
   <th>amount</th>
   <th>available</th>
   <th>update</th>
  </tr>";
  
   while($row = mysqli_fetch_array($result))
  {
  echo "<form method='post' action=Products.php>";
  echo "<tr>";
  echo "<td><input type='hidden' name='Pid' value='" . $row['id'] . "'>" . $row['id'] . "</td>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['photo'] . "</td>";
  echo "<td>" . $row['price'] . "</td>";
  echo "<td><input name='product_update'></input></td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "<td>" ."<a href='#'><button type='submit' name = 'update'>עדכון מלאי</button></a></td>";
  echo "</tr>";
  echo "</form>";
  
  }
  if(isset($_POST['update'])){
    $id = $_POST['Pid'];
    $available = $_POST['product_update'];
    $update_product = mysqli_query($connection, "UPDATE `product` SET `amount` = amount + $available  WHERE id = '$id'");
    echo "<script>if(!alert('הכמות עודכנה בהצלחה')) document.location = 'Products.php';</script>";


  }
  }
  
  else{
    require("topnav.php");
    $result = mysqli_query($connection,"SELECT * FROM product");
    echo "<table border='1'>
    <tr>
    <th>id</th>
    <th>name</th>
   <th>photo</th>
   <th>price</th>
   <th>amount</th>
   <th>available</th>
   <th>addtocart</th>
  </tr>";
  
   while($row = mysqli_fetch_array($result))
  {
  echo "<form method='post' action=addToCart.php>";
  echo "<tr>";
  echo "<td><input type='hidden' name='Pid' value='" . $row['id'] . "'>" . $row['id'] . "</td>";
  echo "<td><input type='hidden' name='name' value='" . $row['name'] . "'>" . $row['name'] . "</td>";
  echo "<td><input type='hidden' name='photo' value='" . $row['photo'] . "'>" . $row['photo'] . "</td>";
  echo "<td><input type='hidden' name='price' value='" . $row['price'] . "'>" . $row['price'] . "</td>";
  echo "<td><input name='amount'></input></td>";
  echo "<td><input type='hidden' name='available' value='" . $row['amount'] . "'>" . $row['amount'] . "</td>";
  echo "<td>" ."<a href='#'><button type='submit' name = 'sub'>הוספה לסל</button></a></td>";
  echo "</tr>";
  echo "</form>";
  
  }
  echo "</table>";
    }
  }
  else{
    require("topnav.php");
    $result = mysqli_query($connection,"SELECT * FROM product");
    echo "<table border='1'>
    <tr>
    <th>id</th>
    <th>name</th>
   <th>photo</th>
   <th>price</th>
   <th>amount</th>
   <th>available</th>
   <th>addtocart</th>
  </tr>";
  
   while($row = mysqli_fetch_array($result))
  {
  echo "<form method='post' action=addToCart.php>";
  echo "<tr>";
  echo "<td><input type='hidden' name='Pid' value='" . $row['id'] . "'>" . $row['id'] . "</td>";
  echo "<td><input type='hidden' name='name' value='" . $row['name'] . "'>" . $row['name'] . "</td>";
  echo "<td><input type='hidden' name='photo' value='" . $row['photo'] . "'>" . $row['photo'] . "</td>";
  echo "<td><input type='hidden' name='price' value='" . $row['price'] . "'>" . $row['price'] . "</td>";
  echo "<td><input name='amount'></input></td>";
  echo "<td><input type='hidden' name='available' value='" . $row['amount'] . "'>" . $row['amount'] . "</td>";
  echo "<td>" ."<a href='#'><button type='submit' name = 'sub'>הוספה לסל</button></a></td>";
  echo "</tr>";
  echo "</form>";
  
  }
  echo "</table>";
    }


 

  mysqli_close($connection); 

?>
<h1> our products </h1>

  </div>
  </script>
</body>
</html>