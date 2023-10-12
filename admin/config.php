<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "cinema";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
	echo "failed";
	exit();
	
}
?>

