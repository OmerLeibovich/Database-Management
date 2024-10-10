<?php
$connection = mysqli_connect("localhost", "root", "", "tzimer database");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['order'])) {
    session_start();
    $user = $_SESSION['user_id'];
    $cart_empty = mysqli_query($connection, "SELECT COUNT(*) FROM cart WHERE user_id = '$user'");
    $cart_empty_row = mysqli_fetch_row($cart_empty);
    $cart_items_count = $cart_empty_row[0];

    if ($cart_items_count > 0) {
        $_SESSION['date'] = date('y-m-d');
        $currentDate = $_SESSION['date'];
        $total_price_result = mysqli_query($connection, "SELECT SUM(c.price * c.amount) FROM cart c WHERE user_id = '$user'");
        $total_price_row = mysqli_fetch_row($total_price_result);
        $_SESSION['total_price'] = $total_price_row[0];
        $total_price = $_SESSION['total_price'];
        $maxO_ID = mysqli_query($connection, "select max(`order_id`) from orders");
        $max_IDfetch= mysqli_fetch_array($maxO_ID);
        $max_IDfetch[0]++;


        echo "<style>
        body {
            background-image: url(images/dolev555.jpeg);
            background-size: 100%;
            filter: drop-shadow(2px 2px 4px rgba(0, 0, 0, 0.5));
        }
        </style>";

        $result = mysqli_query($connection, "SELECT * FROM cart c where c.user_id = '$user'");

        echo '<div style="text-align: center; font-size: 20px; position: absolute; top: 20%; left: 25%;">';
        echo "<table border='1'>
        <tr>
        <th>prodct id</th>
        <th>name</th>
        <th>photo</th>
        <th>price</th>
        <th>amount</th>
        </tr>";

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['product_id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['photo'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['amount'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
        echo '<div style="text-align: center; font-size: 35px;position: absolute;top: 04%;left: 40.5%;">?האם ברצונך לבצע רכישה</div>';
        echo "<br>";
        echo "<br>";
        echo '<div style="text-align: center; font-size: 20px;position: absolute;top: 10%;left: 46.5%;">מספר הזמנה:' .  $max_IDfetch[0] . '</div>';
        echo "<br>";
        echo "<br>";
        echo '<div style="text-align: center; font-size: 20px;position: absolute;top: 13.5%;left: 44%;">תאריך הרכישה:' . $currentDate . '</div>';
        echo "<br>";
        echo '<div style="text-align: center; font-size: 20px;position: absolute;top: 17%;left: 44%;">עלות קנייה כוללת:' .$total_price. '</div>';
        echo "</div>";



        echo'<form action="homepage.php" method="post">';
        echo'<button type="submit" name="purchase" style="position: absolute; top: 80%; left: 42%; width: 100px; height: 60px;">המשך רכישה</button>';
        echo'</form>';
        echo '<form action="homepage.php" method="post">'; 
        echo'<button type="submit" name="cancel" style="position: absolute; top: 80%; left: 52%;width: 100px; height: 60px;">ביטול</button>';
        echo '</form>'; 





  }
else {
	echo "<script>if(!alert('אינך יכול להמשיך לתשלום שהעגלה ריקה')) document.location = 'addToCart.php';</script>";
  }
  mysqli_close($connection);
}














?>