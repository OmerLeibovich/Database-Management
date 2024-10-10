<?php

session_start();
if(isset($_SESSION['user_id'])){
unset( $_SESSION['user_id']);

echo "<script>if(!alert('ההתנתקות התבצעה בהצלחה')) document.location = 'homepage.php';</script>";
}
else{
    echo "<script>if(!alert('אינך מחובר לכן אינך יכול להתנתק')) document.location = 'homepage.php';</script>";
}
?>