<?php


require('header.php');

$error_msg = "";

if (isset($_POST['register'])) {

  $user_name =  $_POST['user_name'];

  $email =  $_POST['email'];

  $password =  $_POST['password'];

  $confirm_passsword =  $_POST['confirm_passsword'];

  $phone_no =  $_POST['phone_no'];

  $user_type_id = 3;

  if ($password === $cpass) {
    $sql = "insert into users (user_name,email,phone_no,password,user_type_id,created_at,updated_at,is_active) values ('$user_name','$email','$phone_no','$password','$user_type_id',now(),now(),true)";
    if (mysqli_query($conn, $sql)) {

      // if ($password === $cpass) {
      $last_id = mysqli_insert_id($conn);
      // var_dump($row);
      $_SESSION['id'] = $last_id;
      // $update_user = "update users set created_by = $last_id, updated_by = $last_id where id = $last_id";
      // mysqli_query($conn, $update_user);
      header("location:index.php");
    } else {
      $error_msg = "Something went wrong. Please try again..!!";
    }
  } else {
    $error_msg = "Password and Confirm password must be same.!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Cinema</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free HTML Templates" name="keywords">
  <meta content="Free HTML Templates" name="description">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">  
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
 
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Register</h5>
                  </div>
                  <form method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-12">
                      <div class="input-group has-validation">
                        <input type="email" name="user_name" class="form-control" id="yourUsername" placeholder="Full Name" required>
                      </div>
                    </div>

                    <div class="col-12 p-3">
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" id="yourUsername" placeholder="Email" required>
                      </div>
                    </div>

                    <div class="col-12 ">
                      <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" id="yourUsername" placeholder="Password" required>
                      </div>
                    </div>
                    <div class="col-12 p-3">
                      <div class="input-group has-validation">
                        <input type="password" name="cpass" class="form-control" id="yourUsername" placeholder="Confirm Password" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12 p-3">
                      <input type="number" name="phone_no" class="form-control" placeholder="Phone No" required>
                    </div>

                    <div class="col-12">
                    <?php if ($error_msg != "") : ?>
                        <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                      <?php endif; ?>
                      <br><button name="register" class="btn btn-primary w-100" type="submit">Sign Up</button>
                     
                    </div>
                    <div class="col-12">
                      <br>
                      <p class="small mb-0 text-center">Don't have account? <a href="login.php">Login</a></p>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

  <script src="js/jquery.min.js"></script>
          <script src="js/popper.min.js"></script>
          <script src="js/bootstrap.bundle.min.js"></script>
          <script src="js/jquery-3.0.0.min.js"></script>
          <script src="js/plugin.js"></script>
          <!-- sidebar -->
          <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
          <script src="js/custom.js"></script>
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>t>

</body>

</html>

<?php
require('footer.php');

?>