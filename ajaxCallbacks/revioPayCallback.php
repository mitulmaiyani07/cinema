<?php
if (session_id() === "")
    session_start();
require('../config.php');
$json = array();

$user_id =  $_SESSION['id'];
$movie_id  =  $_POST['movie_id'];
$theatre_id  =  $_POST['theatre_id'];
$tickets =  $_POST['tickets'];
$booking_date =  $_POST['booking_date'];
$total_amount =  $_POST['total_amount'];
$transaction_id =  $_POST['transaction_id'];
$payment_status =  'completed';

$sql = "insert into booking (user_id,movie_id,theatre_id,tickets,date_time,payment_status,total_amount,transaction_id) values ('$user_id','$movie_id','$theatre_id','$tickets','$booking_date','$payment_status','$total_amount','$transaction_id')";

if(mysqli_query($conn,$sql)){
    $json['success'] = true;
}else{
    $json['success'] = false;
}

echo json_encode($json);
exit;