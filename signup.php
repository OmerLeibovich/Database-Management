<?php
$connection=mysqli_connect("localhost","root","","tzimer database");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
session_start();
if(isset($_SESSION['user_id'])){
    echo "<script>if(!alert('אתה נדרש להתנתק על מנת לגשת לדף ההרשמה')) document.location = 'homepage.php';</script>";
}
else{
if (isset($_POST['sign'])) {
$username = $_POST['username'];
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$id = $_POST['ID'];
$email = $_POST['mail'];
$password = $_POST['password']; 
$Cpassword = $_POST['confirm_password']; 
$idQuery = mysqli_query($connection, "SELECT * FROM users c where c.id = '$id'");
$userQuery = mysqli_query($connection, "SELECT * FROM users c where c.username = '$username'");
$userfetch= mysqli_fetch_array($idQuery);
if (!empty($username) && !empty($firstname) && !empty($lastname) && !empty($id) && !empty($email) && !empty($password) && !empty($Cpassword)) {
    if (!is_numeric($id) || strlen($id) != 9){
        echo "<style>#ID { color: red; }</style>";
        echo "<script>alert('התעודת זהות חייבת להכיל 9 ספרות בלבד');</script>";
    }
    else if(mysqli_num_rows($idQuery) ){
        echo "<style>#ID { color: red; }</style>";
        echo "<script>alert('התעודת זהות כבר קיימת במערכת');</script>";
        }
    else if(mysqli_num_rows($userQuery) ){
        echo "<style>#username { color: red; }</style>";
        echo "<script>alert('המשתמש תפוס נסה משתמש אחר');</script>";   
    }
    else if (substr_count($email, '@') !== 1) {
        echo "<style>#mail { color: red; }</style>";
        echo "<script>alert('אימייל תקין חייב להכיל סימן @ אחד');</script>";
    }
    else if($password !== $Cpassword){
        echo "<style>#password { color: red; }</style>";
        echo "<style>#confirm_password { color: red; }</style>";
        echo "<script>alert('הסיסמאות לא תואמות');</script>";

    }
    
    else{
        $insert = mysqli_query($connection, "INSERT INTO `users` (`id`, `username`, `mail`, `password`, `FirstName`, `LastName`) VALUES ('$id', '$username', '$email', '$password', '$firstname', '$lastname')");
        echo "<script>if(!alert('ההרשמה התבצעה בהצלחה')) document.location = 'Login.php';</script>";
    }
}
else{
echo "<script>alert('אסור להשאיר שדות ריקים');</script>";
}
mysqli_close($connection);
}
}


?>



<!DOCTYPE php>
<html>
<head>
    <title>Sign up</title>
    <link href="StyleS.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<?php require("topnav.php"); 
?>


    <h1>Sign up</h1>
    <p>dolev55</p>

    <form action="#" method="POST" >
        <label for="username"><mark>Username:</mark></label><br>
        <input type="text" id="username" name="username"><br>

        <label for="first_name"><mark>First name:</mark></label><br>
        <input type="text" id="first_name" name="first_name"><br>

        <label for="last_name"><mark>Last name:</mark></label><br>
        <input type="text" id="last_name" name="last_name"><br>

        <label for="ID"><mark>ID:</mark></label><br>
        <input type="text" id="ID" name="ID"><br>

        <label for="mail"><mark>Email:</mark></label><br>
        <input type="text" id="mail" name="mail"><br>

        <label for="password"><mark>Password:</mark></label><br>
        <input type="password" id="password" name="password"><br>

        <label for="confirm_password"><mark>Confirm password:</mark></label><br>
        <input type="password" id="confirm_password" name="confirm_password"><br>

        <button type="submit" name="sign" >Sign up</button>
        <a href="contact.php"><button type="button">Cancel</button></a>
    </form>

    <img src="images/pool.jpg" style="width: 500px; height: 300px;">


</body>
</html> 