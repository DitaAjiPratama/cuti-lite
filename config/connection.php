<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "cuti_lite";

$con = mysqli_connect($host, $username, $password) or die("Cannot connect");
mysqli_select_db($con, $database) or die("Cannot select database");

?>
