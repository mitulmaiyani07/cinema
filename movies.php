<?php
$title = "Movies";

?>
<?php $query = "SELECT m.id,m.category_id,m.movie_image,m.movie_name,mc.cat_name,m.created_at,m.is_active FROM movie as m,movie_category as mc where mc.id = m.category_id order by id";
if (isset($_POST['book'])) {
  $current_user_id = "";
  if (isset($_SESSION['id'])) {
    $current_user_id = $_SESSION['id'];
  }
  // $qty = 1;
  $movie_id = $_POST['movie_id'];
  $movie_name = $_POST['movie_name'];
  $movie_image = $_POST['movie_image'];
  // $price = $_POST['price'];
  // $total = (int) $price * $qty;
  if ($current_user_id != "") {
    // $sql = "insert into cart (user_id,movie_id,qty,amount) values ('$current_user_id','$movie_id',$qty,$total)";
    if (mysqli_query($conn, $sql)) {
      header("location:cart.php");
    } else {
      $message = "<div class='alert alert-danger'>Something went wrong!</div>";
    }
  } else {
    $_SESSION['cart'][] = array(
      'movie_id' => $movie_id,
      'movie_name' => $movie_name,
      // 'price' => $price,
      // 'movie_image' => $movie_image,
      // 'qty' => $qty,
      // 'total_amount' => $total,
    );
  }
}
require('header.php');
?>
<main class="main py-5">
  <div class="page-content movie-list">
    <div class="container">
      <div class="row">
        <?php if ($result = $conn->query($query)): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 item-wrap">
              <div class="movie">
                <figure class="movie-media text-center">
                  <a href="/cinema/movie.php?id=<?php echo $row['id']; ?>">
                    <?php if ($row['movie_image'] != ""): ?>
                      <img src="/cinema/admin/movie/<?php echo str_replace("../", "", $row['movie_image']) ?>"
                        alt="movie image" class="movie-image">
                    <?php else: ?>
                      <img src="/admin/movie/images/bollywood1.jpg" alt="movie image" class="movie-image">
                    <?php endif; ?>
                  </a>
                </figure>
                <div class="movie-content py-4">
                  <div class="movie-cat">
                    <a href="/cinema/category.php?category_id=<?php echo $row['category_id']; ?>">
                      <?php echo $row['cat_name']; ?>
                    </a>
                  </div>
                  <h3 class="movie-title">
                    <a href="/cinema/movie.php?id=<?php echo $row['id']; ?>">
                      <?php echo $row['movie_name']; ?>
                    </a>
                  </h3><!-- End .movie-title -->
                  <div class="movie-action">
                    <form method="post">
                      <input type="hidden" name="movie_id" value="<?php echo $row['id']; ?>" />
                      <input type="hidden" name="movie_name" value="<?php echo $row['movie_name']; ?>" />
                      <input type="hidden" name="movie_image"
                        value="<?php echo str_replace("../", "", $row['movie_image']) ?>" />
                        <a class="btn" href="booking.php">Book Now</a>
                    </form>
                  </div><!-- End .movie-action -->
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>

<!-- end Gallery -->

<?php require('footer.php');