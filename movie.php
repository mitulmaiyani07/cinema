<?php
$title = "Movies";
require('config.php');

$movie_id = $_GET['id'];
$query = "SELECT m.id,m.movie_image,m.movie_name,m.movie_desc,mc.cat_name,m.created_at,m.is_active FROM movie as m,movie_category as mc where mc.id = m.category_id and m.id=" . $movie_id . " order by id";
$movie_result = mysqli_query($conn, $query);
$movie_row = mysqli_fetch_assoc($movie_result);
require('header.php');
?>

<div id="about" class="about movie-details">
  <div class="container">
    <div class="row display_boxflex">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="about-box">
          <h2>
            <?php echo $movie_row['movie_name']; ?>
          </h2>
          <?php echo $movie_row['movie_desc']; ?>
          <a class="btn" href="booking.php">Book Now</a>
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="about-box">
          <figure>
            <?php if ($movie_row['movie_image']): ?>
              <img src="/cinema/admin/movie/<?php echo str_replace('./', '', $movie_row['movie_image']); ?>" />
            <?php else: ?>
              <img src="movie/images/about.png" />
            <?php endif; ?>
          </figure>
        </div>
      </div>
    </div>

  </div>
</div>


<?php require('footer.php');