<?php
if (session_id() === "")
  session_start();
require('config.php');
if (isset($_SESSION['id']) && $_SESSION['id'] != "") {
  $sql = "SELECT * from users where id = " . $_SESSION['id'];
  $result = $conn->query($sql);
  $row = mysqli_fetch_assoc($result);
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
  <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body class="main-layout<?php echo basename($_SERVER["PHP_SELF"]) == "index.php" ? "" : " contineer_page" ?>">
  <header>
    <?php if (basename($_SERVER["PHP_SELF"]) == "index.php"): ?>
      <div class="header-top">
      <?php endif; ?>
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="index.php"><img src="images/cinemalogo.png" alt="#" /></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9">

              <div class="menu-area">
                <div class="limit-box">
                  <nav class="main-menu ">
                    <ul class="menu-area-main">
                      <li class="active"> <a href="index.php">Home</a> </li>
                      <li> <a href="Movies.php">Movies</a> </li>
                      <li> <a href="category.php">Category </a> </li>
                      <li> <a href="about.php">About</a> </li>
                      <li> <a href="contact.php">Contact</a> </li>

                      <li class="nav-item">
                        <?php if (isset($_SESSION['id']) && $_SESSION['id'] != "") { ?>
                          <a href="/cinema/account.php" class="nav-link">Account</a>
                        <?php } else { ?>
                          <a href="/cinema/login.php" class="nav-link">Login</a>
                        <?php } ?>
                      </li>
                      <li> <a class="last_manu" href="#"><img src="images/search_icon.png" alt="#" /></a> </li>

                    </ul>
                  </nav>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php if (basename($_SERVER["PHP_SELF"]) == "index.php"): ?>
      </div>
    <?php endif; ?>
  </header>