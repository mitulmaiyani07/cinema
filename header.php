<?php
 if (session_id() === "") session_start();
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
  <link rel="icon" href="/cinema/images/logo.png" type="image" />
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
  <style type="text/css">
    .movie-content {
      text-align: center;
      display: inline-block;
      width: 100%;
    }

    .movie-media {
      margin: 0
    }

    .movie-media img {
      width: 100%;
      text-align: center;
      max-width: 100%;
      height: 200px;
      object-fit: cover;
      margin: 0 auto;
      overflow: hidden;
    }

    .btn {
      background-color: #960202 !important;
      color: #fff;
      border-color: transparent !important;
    }

    a:hover,
    .copyright a:hover {
      color: #960202;
    }

    .btn span {
      font-size: 14px;
    }

    .btn:hover {
      background-color: #E15A5D !important;
    }

    .about.movie-details {
      background: none;
    }

    .about.movie-details .about-box figure img {
      width: 100%;
      border-radius: 100%;
      height: 400px;
      max-width: 400px;
    }

    .about.movie-details .about-box h2 {
      font-size: 48px;
    }

    .about.movie-details .about-box figure {
      text-align: center;
    }

    .movie {
      border: 1px solid #eee;
      border-radius: 5px;
      margin: 15px 0;
    }

    .page-title {
      font-weight: 700;
      font-size: 48px;
      color: #960202;
    }

    .footer-logo {
      max-width: 200px;
      margin: auto
    }

    #myCarousel .slider_section {
      background-size: cover;
      background-repeat: no-repeat;
      min-height: 650px;
      background-position: top center;
    }

    .carousel-control-next,
    .carousel-control-prev {
      bottom: 5%;
    }

    .carousel-control-next i,
    .carousel-control-prev i {
      width: 30px;
      height: 30px;
      background-color: transparent;
      color: #fff;
    }
  </style>
</head>

<!-- <body class="main-layout<?php echo basename($_SERVER["PHP_SELF"]) == "index.php" ? "" : " contineer_page" ?>"> -->

<body class="main-layout contineer_page">
  <header>
    <?php if (basename($_SERVER["PHP_SELF"]) == "index.php"): ?>
      <!-- <div class="header-top"> -->
    <?php endif; ?>
    <div class="header">
      <div class="container">
        <div class="row">
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col logo_section">
            <div class="full">
              <div class="center-desk">
                <div class="logo">
                  <a href="/cinema/"><img src="images/white-logo.png" alt="Cinema" /></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9">

            <div class="menu-area">
              <div class="limit-box">
                <nav class="main-menu ">
                  <ul class="menu-area-main">
                    <li> <a href="index.php">Home</a> </li>
                    <li> <a href="/cinema/movies.php">Movies</a> </li>
                    <li> <a href="/cinema/about.php">About</a> </li>
                    <li> <a href="/cinema/contact.php">Contact</a> </li>
                    <li class="nav-item">
                      <?php if (isset($_SESSION['id']) && $_SESSION['id'] != "") { ?>
                        <a href="/cinema/account.php" class="nav-link">Account</a>
                      <?php } else { ?>
                        <a href="/cinema/login.php" class="nav-link">Login</a>
                      <?php } ?>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (basename($_SERVER["PHP_SELF"]) == "index.php"): ?>
      <!-- </div> -->
    <?php endif; ?>
  </header>