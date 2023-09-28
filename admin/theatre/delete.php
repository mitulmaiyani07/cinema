<?php
require('../config.php');
$id = $_GET['id'];
$query = "delete from theatre where id=$id";
echo $query;
$result = mysqli_query($conn, $query);
header("location:all.php");
