<?php
require('header.php');


$error_msg = "";
if (isset($_POST['login'])) {
  $email = $_POST['email'];

  $password = $_POST['password'];

  $sql = "select * from users where email='$email' and password='$password'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($row) {
    $_SESSION['id'] = $row['id'];
    $_SESSION['user_type_id'] = $row['user_type_id'];
    header("location:index.php");
  } else {
    $error_msg = "Email or password is incorrect!";
  }
}
?>
<div class="container my-3">
  <div class="row">
    <div class="col-md-12 mt-5">
      <form class="contact_bg" method="post">
        <div class="row card">
          <div class="col-md-12">
            <h1 class="mt-5">Login</h1>
            <div class="col-md-12">
              <input class="contactus" placeholder="Your Email" type="email" name="email" required>
            </div>

            <div class="col-md-12">
              <input class="contactus" placeholder="Password" type="password" name="password" required>
            </div>


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <button type="submit" class="w-100 btn" name="login">Login</button>
            </div>
            <div class="col-md-12 py-4">
              <p class="small mb-0 text-center">Don't have account? <a href="register.php">Register</a></p>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<?php require('footer.php'); ?>