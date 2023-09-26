<?php

require('header.php');

$error_msg = "";
if (isset($_POST['login'])) {
  $email = $_POST['email'];

  $password = $_POST['password'];

  $sql =  "select * from users where email='$email' and password='$password'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($row) {
    // var_dump($row);
    $_SESSION['id'] = $row['id'];
    $_SESSION['user_type_id'] = $row['user_type_id'];
    header("location:index.php.php");
    // echo $sql;
  } else {
    $error_msg = "Email or password is incorrect!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Cinema</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- bootstrap css -->
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
<!-- body -->

<body>

  <main>


    <div class="container">

      <section class="section register d-flex flex-column align-items-center justify-content-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!-- <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img heigh="60px" width="70px" src="/e-commerce/img/brocode_logo.jpg" alt="">
                </a>
              </div> -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                  </div>
                  <?php if ($error_msg != "") : ?>
                    <div class="alert alert-danger m-3"><?php echo $error_msg; ?></div>
                  <?php endif; ?>
                  <form method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-12 p-3">
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                      </div>
                    </div>

                    <div class="col-12 ">
                      <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" placeholder="password" required>
                      </div>
                    </div>


                    <div class="col-12">
                      <br><button name="login" class="btn btn-primary w-100" type="submit">Log in</button>
                    </div>
                    <div class="col-12">
                      <br>
                      <p class="small mb-0 text-center">Don't have account? <a href="register.php">Create an account</a></p>
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
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

</body>

</html>

<?php
require('footer.php');
?>