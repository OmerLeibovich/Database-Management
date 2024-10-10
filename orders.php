<!DOCTYPE html>
<html>
<head>
    <link href="StyleS.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </link>
    <?php require("adminTopnav.php");?>
  <title>orders</title>
</head>
<body>
<?php
echo "<form method='post' action='orders.php'>";
echo "<td><input name='month_check'></input></td>";
echo "<td><button type='submit' name='month'>הצג לי הזמנות לפי החודש</button></td>";
echo "</form>";


$connection = mysqli_connect("localhost", "root", "", "tzimer database");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['month'])) {
    $month = $_POST['month_check'];
    $onlyMonth = mysqli_query($connection, "SELECT  * FROM orders WHERE MONTH(date) = '$month'");
    echo "<table border='1'>
    <tr>
        <th>user id</th>
        <th>date</th>
        <th>total price</th>
        <th>print</th>
    </tr>";

    while ($row = mysqli_fetch_array($onlyMonth)) {
        echo "<form method='post' action=orders.php>";
        echo "<tr>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . "<a href='#'><button type='submit' name='print' onclick = 'printPage()'>הדפסה</button></a></td>";
        echo "</tr>";
        echo "</form>";
    }
} else {
    $result = mysqli_query($connection, "  SELECT * FROM orders");
    echo "<table border='1'>
    <tr>
        <th>user id</th>
        <th>date</th>
        <th>total price</th>
        <th>print</th>
    </tr>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<form method='post' action=orders.php>";
        echo "<tr>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['price'] . "</td>";
        echo "<td>" . "<a href='#'><button type='submit' name='print' onclick = 'printPage()'>הדפסה</button></a></td>";
        echo "</tr>";
        echo "</form>";
    }
}

echo "</table>";
mysqli_close($connection);
?>
<script>
    function printPage() {
        window.print();
    }
</script>






  </div>
  </script>
  </body>
</html>