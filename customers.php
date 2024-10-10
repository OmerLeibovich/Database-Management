<!DOCTYPE html>
<html>
<head>
    <link href="StyleS.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </link>
  <title>My customers</title>
  <?php require("adminTopnav.php"); ?>
</head>
<body>
  <h1>all customers</h1>
  <div id="customers">
  <?php
  $connection=mysqli_connect("localhost","root","","tzimer database");
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
    $result = mysqli_query($connection,"SELECT * FROM users where admin = '0'");
    echo "<table border='1'>
    <tr>
    <th>id</th>
    <th>username</th>
   <th>mail</th>
   <th>FirstName</th>
   <th>LastName</th>

  </tr>";
  
   while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
  echo "<td>" . $row['username'] . "</td>";
  echo "<td>" . $row['mail'] . "</td>";
  echo "<td>" . $row['FirstName'] . "</td>";
  echo "<td>" . $row['LastName'] . "</td>";
  echo "</tr>"; 
  }
  mysqli_close($connection);
?>

  </div>
  </script>
</body>
</html>