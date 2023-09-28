<?php
session_start();
$title = "Register";
require('header.php');

$error_msg = "";

if (isset($_POST['add_create'])) {

  $user_name = $_POST['user_name'];

  $email = $_POST['email'];

  $password = $_POST['password'];

  $confirm_password = $_POST['confirm_password'];

  $phone_no = $_POST['phone_no'];

  $user_type_id = 3;

  if ($password === $confirm_password) {
    $sql = "insert into users (user_name,email,phone_no,password,user_type_id,created_at,created_by,updated_by,updated_at,is_active,is_deleted) values ('$user_name','$email','$phone_no','$password','$user_type_id',now(),'$last_id','$last_id',now(),true,false)";
    if (mysqli_query($conn, $sql)) {
      $last_id = mysqli_insert_id($conn);
      $_SESSION['id'] = $last_id;
      header("location:index.php");
    } else {
      $error_msg = "Something went wrong. Please try again..!!";
    }
  } else {
    $error_msg = "Password and Confirm password must be same.!";
  }
}
?>

<div class="container mt-3">

  <div class="row">
    <div class="col-md-12 mt-5">
      <form class="contact_bg" method="post">
        <div class="row card">
          <div class="col-md-12">
            <h1 class="mt-5">Register</h1>
            <div class="col-md-12">
              <input class="contactus" placeholder="Full Name" type="text" name="user_name" required>
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Your Email" type="email" name="email" required>
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Phone No" type="tel" name="phone_no" required>
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Password" type="password" name="password" required>
            </div>
            <div class="col-md-12">
              <input class="contactus" placeholder="Confirm Password" type="password" name="confirm_password" required>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <button type="submit" class="submit" name="add_create">Register</button>
            </div>
            <div class="col-md-12">
              <br>
              <p class="small mb-0 text-center">Do you have Account <a href="login.php">Login</a></p>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<?php require('footer.php'); ?>