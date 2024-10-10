<?php
session_start();
$connection=mysqli_connect("localhost","root","","tzimer database");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if(isset($_SESSION['user_id'])){
    echo "<script>if(!alert('אתה כבר מחובר')) document.location = 'homepage.php';</script>";
}
else{
if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $password = $_POST['password'] ;
  $_SESSION['counter_load'] ;
  $usernameQuery = mysqli_query($connection, "SELECT * FROM users WHERE username  = '$user'");
  $userfetch= mysqli_fetch_array($usernameQuery);
  // $passwordQuery = mysqli_query($connection, "SELECT * FROM customers WHERE password  = '$password'"); 
  if (mysqli_num_rows($usernameQuery) ) {
    if ($userfetch['password'] == $password) {
			$_SESSION['user_id'] = $userfetch['id'] ;
			$_SESSION['counter_load']=0;
      		echo "<script>if(!alert('הכניסה התבצעה בהצלחה')) document.location='homepage.php';</script>";
  }
  else{
	$_SESSION['counter_load']++;
	if ($_SESSION['counter_load'] >= 3) {
		$_SESSION['userֹ_id']= $userfetch['id'];
		echo "<script>if(!alert('נחסמת בגלל שגיאות רבות. אנא נסה שוב מאוחר יותר.')) document.location = 'reset-password.php';</script>";
	}
	
	else{	
    echo "<style>#password { color: red; }</style>";
    echo "<script>alert('סיסמא לא נכונה נסה שוב');</script>";
}
}
  }
  else{
		echo "<style>#password { color: red; }</style>";
		echo "<style>#user { color: red; }</style>";
		echo "<script>alert('פרטי ההתחברות לא נכונים אנא נסה שב');</script>";
  }
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
	<form action="Login.php" method="POST">
		<label for="user"><mark>Username:</mark></label><br>
		<input type="text" id="user" name="user"><br>
		<label for="password"><mark>Password:</mark></label><br>
		<input type="password" id="password" name="password"><br>
		<label for="remember-me">remember-me</label>
		<input type="checkbox" id="remember-me" name="remember-me"><br><br>
    	<button type="submit" name="submit">submit</button>
		<a href="signup.php"><button type="button">sign up now!</button></a>
		<a href="homepage.php"><button type="button">cancel</button></a>
	</form>
</body>
</html>
