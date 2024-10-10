
<html>

<head>
<?php
    $connection = mysqli_connect("localhost", "root", "", "tzimer database");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    session_start();
if (isset($_POST['purchase'])) {
    $user = $_SESSION['user_id'];
    $amount = $_SESSION['amount'];
    $productID = $_SESSION['Pid'];
    $proname =  $_SESSION['name'];
    $price =  $_SESSION['total_price'];
    $photo = $_SESSION['photo'] ;
    $currentDate = $_SESSION['date'];
    $CartItems = mysqli_query($connection,"SELECT c.product_id, c.amount, p.name , p.photo
                                    FROM cart c 
                                    INNER JOIN product p ON c.product_id = p.id 
                                    WHERE c.user_id = '$user'");
    $maxO_ID = mysqli_query($connection, "select max(`order_id`) from orders");
    $max_IDfetch= mysqli_fetch_array($maxO_ID);
    $max_IDfetch[0]++;
        while ($cartItem = mysqli_fetch_assoc($CartItems)) {
            $productID  = $cartItem["product_id"];
            $amount = $cartItem["amount"];
            $proname  = $cartItem["name"];
            $photo = $cartItem["photo"];
        $orderupdate = mysqli_query($connection,"INSERT INTO `orders`(`order_id`, `user_id`, `product_id`, `date`, `product_name`, `photo`, `price`, `amount`) VALUES ('$max_IDfetch[0]','$user','$productID','$currentDate',' $proname','$photo',' $price',' $amount')");
        $update_prod = mysqli_query($connection, "UPDATE `product` SET `amount` = amount - $amount WHERE id = '$productID'");
        $remove = mysqli_query($connection, "DELETE FROM `cart` WHERE user_id = '$user' ");
        echo "<script>if(!alert('תודה שרכשת אצלנו נשמח לראותך שוב בקרוב')) document.location = 'homepage.php' ;</script>";
        }
  }
    if(isset($_SESSION['user_id'])){
        $user = $_SESSION['user_id'];
        $usernameQuery = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user'");
        $userfetch = mysqli_fetch_array($usernameQuery);
        if ($userfetch['admin'] == 1){
            require("adminTopnav.php");
        } else {
            require("topnav.php");
        }
    } 
    else {
        require("topnav.php");
    }
    ?>
    <link href="StyleS.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </link>
</head>

<body>`
<h1><mark> hello!</mark></h1>
<h1>this website is about DOLEV55 hotel </h1>
<p>On our website you can find the suites that our complex offers alongside photos of the complex.
    In addition, you can join our customer club and stay updated on promotions and news.</p>
<p>this is our new website, hope you like</p>  
<img src="images/1.jpg" style="position: relative ; top: 200px; width: 500px; height: 200px;" >

<p>dolev55</p>
</body>



</html>