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
    if(isset($_POST['details'])){
    $order_id = $_POST['order_id'];
    $result = mysqli_query($connection,"SELECT * FROM orders o where o.order_id = '$order_id'");
    echo "<table border='1'>
    <tr>
    <th>order id</th>
    <th>product id</th>
    <th>date</th>
    <th>product name</th>
    <th>photo</th>
    <th>amount</th>
    </tr>";
    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['order_id'] . "</td>";
    echo "<td>" . $row['product_id'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['product_name'] . "</td>";
    echo "<td>" . $row['photo'] . "</td>";
    echo "<td>" . $row['amount'] . "</td>";
    echo "</tr>";
    
    }
}

?>
</body>
</html>


