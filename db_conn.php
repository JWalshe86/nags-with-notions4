<?php  

$sname = "localhost";
$uname = "root";
$password = "Sunshine7!";

$db_name = "image_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}