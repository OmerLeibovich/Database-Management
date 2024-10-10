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
$connection = mysqli_connect("localhost", "root", "", "tzimer database");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$user_id = $_SESSION['user_id'];
if(isset($_SESSION['user_id'])){
    $result = mysqli_query($connection,"SELECT distinct o.order_id,o.date,o.price FROM orders o where o.user_id = '$user_id'");
    echo "<table border='1'>
    <tr>
    <th>order id</th>
    <th>date</th>
    <th>price</th>
    <th>order details</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
    echo "<form method='post' action=orderDetails.php>";
    echo "<tr>";
    echo "<td><input type='hidden' name='order_id' value='" . $row['order_id'] . "'>" . $row['order_id'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" ."<a href='orderDetails.php'><button type='submit' name = 'details'>לצפייה בפרטי ההזמנה</button></a></td>";
    echo "</tr>";
    echo "</form>";
    
    }
    mysqli_close($connection);  
}
else{
	echo "<script>if(!alert('על מנת לצפות בהיסטורית הרכישות שלך אתה חייב להתחבר לאתר')) document.location = 'Login.php';</script>";
    mysqli_close($connection);  
}

?>
</body>
</html>


