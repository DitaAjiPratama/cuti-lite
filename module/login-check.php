<?php
session_start();
include "../config/connection.php";
$myusername = $_POST['username'];
$mypassword = $_POST['password'];

$result = mysqli_query($con,"
  SELECT * FROM users
  WHERE username = '$myusername'
  AND
  password = '$mypassword'
");

$count = mysqli_num_rows($result);

if($count == 1){
  $_SESSION['username'] = $myusername;
  while($row = mysqli_fetch_assoc($result)) {
    $_SESSION['username'] = $row["username"];
    $_SESSION['level'] = $row["level"];
    // $_SESSION['id_division'] = $row["id_division"];
  }
  header("location:../");
}

else{
  header("location:../login.php?check=fail");
}

?>
