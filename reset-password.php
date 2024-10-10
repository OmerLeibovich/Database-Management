<?php
	session_start();
	$connection=mysqli_connect("localhost","root","","tzimer database");
	if (mysqli_connect_errno())
	{
 	 echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (isset($_POST['sub'])) {
	$_SESSION['counter_load'] = 0;
	$user = $_SESSION['userֹ_id'];
	$newpassword = $_POST['password'];
	$Cnewpassword = $_POST['confirm_password'];
	$usernameQuery = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user'");
	$userfetch= mysqli_fetch_array($usernameQuery);
	if ($newpassword!= null && $Cnewpassword != null ){
	if($Cnewpassword == $newpassword){
		if($newpassword === $userfetch['password']){
			echo "<script>alert('הסיסמא זהה לסיסמא הקודמת נדרשת סיסמא חדשה')</script>";
		}
		else{
	$update = mysqli_query($connection,"UPDATE `users` SET `password`= '$newpassword' WHERE id  = '$user'");
	echo "<script>if(!alert('הסיסמא התעדכנה בהצלחה')) document.location='login.php';</script>";
	}
}
	else{
		echo "<style>#password { color: red; }</style>";
		echo "<style>#confirm_password { color: red; }</style>";
		echo "<script>alert('הסיסמאות לא תואמות') </script>";
	}
	}
	else{
		echo "<style>#password { color: red; }</style>";
		echo "<style>#confirm_password { color: red; }</style>";
		echo "<script>alert('אתה חייב למלא את 2 השדות');</script>";
	}
	
	}

	mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
<?php require("topnav.php"); ?>
	<link href="StyleS.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<h1>log in </h1>
	<h1>this website is about DOLEV55 hotel </h1>
	<p>this is the new website, hope you like</p>
	<img src="images/pool.jpg" style="width: 500px; height: 300px;">
	<p>dolev55</p>
	<form action="#" method="POST" >
        <label for="password">new Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <label for="confirm_password">Confirm new password:</label><br>
        <input type="confirm_password" id="confirm_password" name="confirm_password"><br>
        <button type="submit" name="sub">submit</button>
		<a href="homepage.php"><button type="button">cancel</button></a>
	</form>
</body>
</html>
