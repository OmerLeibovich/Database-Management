<!DOCTYPE html>
<html>
<head>
<?php require("topnav.php"); ?>
	<link href="StyleS.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php 
session_start();
if (isset($_POST['sub'])) {
	if(isset($_SESSION['user_id'])){
$_SESSION['amount'] = $_POST['amount'];
$amount = $_POST['amount'];
$_SESSION['Pid'] = $_POST['Pid'];
$productID = $_POST['Pid'];
$user_id = $_SESSION['user_id'];
$_SESSION['price'] = $_POST['price'];
$price = $_POST['price'];
$_SESSION['name'] = $_POST['name'];
$proname = $_POST['name'];
$available = $_POST['available'];
$_SESSION['photo'] = $_POST['photo'];
$photo = $_POST['photo'];
$connection=mysqli_connect("localhost","root","","tzimer database");
$userquery= mysqli_query($connection, "SELECT * FROM users WHERE id  = '$user_id'");
$idQuery = mysqli_query($connection, "SELECT * FROM cart WHERE user_id  = '$user_id'");
$idfetch= mysqli_fetch_array($idQuery);
	if (mysqli_num_rows($userquery) ) {
		if($available >= $amount && $amount>0){
		if (mysqli_num_rows($idQuery) ){
    	if ($idfetch['product_id'] === $productID && $idfetch['user_id'] === $user_id) {
			$update_cart = mysqli_query($connection, "UPDATE `cart` SET `amount` = amount + $amount WHERE user_id = '$user_id' AND product_id = '$productID'");

		}
		else{
			$query = mysqli_query($connection,"INSERT INTO `cart` (`user_id`, `product_id`, `name`, `photo`, `price` , `amount`) VALUES ('$user_id', '$productID', '$proname','$photo', '$price', '$amount' )");
			}
	}
		else{
		$query = mysqli_query($connection,"INSERT INTO `cart` (`user_id`, `product_id`, `name`, `photo`, `price` , `amount`) VALUES ('$user_id', '$productID', '$proname','$photo', '$price', '$amount' )");
		}
	}
	else {
		echo "<script>if(!alert('הכמות שנבחרה אינה זמינה במלאי')) document.location = 'Products.php';</script>";
	  }
	  

}
else{
	echo "<script>if(!alert('אתה צריך להירשם על מנת לרכוש מהאתר')) document.location = 'signup.php';</script>";
}

}
}
else{
// Check connection
	$connection=mysqli_connect("localhost","root","","tzimer database");
	if(isset($_SESSION['user_id'])){
	$user_id = $_SESSION['user_id'];
	}
}
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_SESSION['user_id'])){
$result = mysqli_query($connection,"SELECT * FROM cart c where c.user_id = '$user_id'");
echo "<table border='1'>
<tr>
<th>prodct id</th>
<th>name</th>
<th>photo</th>
<th>price</th>
<th>amount</th>
</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['product_id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['photo'] . "</td>";
echo "<td>" . $row['price'] . "</td>";
echo "<td>" . $row['amount'] . "</td>";
echo "</tr>";

}
echo "<form method='post' action=confirm_Order.php>";

echo "<button type='submit' name ='order'>לתשלום</button>";
echo "</form>";
}
else{
	echo "<script>if(!alert('אתה חייב להתחבר על מנת לרכוש מוצרים')) document.location = 'Login.php';</script>";
}
mysqli_close($connection);





?>
</body>
</html>


