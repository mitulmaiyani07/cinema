<?php
$title = "Movies";
require('header.php');
?>
<?php $query = "SELECT m.id,m.movie_image,m.movie_name,mc.cat_name,m.created_at,m.is_active FROM movie as m,movie_category as mc where mc.id = m.category_id order by id";
if (isset($_POST['add_to_cart'])) {
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
    // $sql = "insert into cart (user_id,product_id,qty,amount) values ('$current_user_id','$product_id',$qty,$total)";
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
      // 'product_image' => $product_image,
      // 'qty' => $qty,
      // 'total_amount' => $total,
    );
  }
}
?>





<main class="main">
  <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
      <h1 class="page-title">Movies</h1>
    </div>
  </div>

  <div class="page-content mt-8">

    <div class="container">
      <div class="row">
        <?php if ($result = $conn->query($query)): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4">
              <div class="product product-5 text-center">
                <figure class="product-media">
                  <!-- <span class="product-label label-top"><?php echo $row['cat_name']; ?></span> -->
                  <a href="/cinema/movie.php?id=<?php echo $row['id']; ?>">
                    <?php
                    if ($row['movie_image'] != ""): ?>
                      <img src="/cinema/admin/movie/<?php echo str_replace("../", "", $row['movie_image']) ?>"
                        alt="Product image" class="product-image">
                    <?php else: ?>
                      <img src="/admin/movie/images/bollywood1.jpg" alt="Product image" class="product-image">
                    <?php endif; ?>
                  </a>
                  <div class="movie-action">
                    <form method="post">
                      <input type="hidden" name="movie_id" value="<?php echo $row['id']; ?>" />
                      <input type="hidden" name="movie_name" value="<?php echo $row['movie_name']; ?>" />
                      <input type="hidden" name="movie_image"
                        value="<?php echo str_replace("../", "", $row['movie_image']) ?>" />
                      
                      <button type="submit" name="add_to_cart" class="btn btn-product btn-cart"><span>Book</span></button>
                    </form>
                  </div><!-- End .product-action -->
                </figure><!-- End .product-media -->

                <div class="product-body">
                  <div class="product-cat">
                    <p>
                      <?php echo $row['cat_name']; ?>
                    </p>
                  </div>
                  <h3 class="product-title">
                    <a href="/cinema/movies.php?id=<?php echo $row['id']; ?>">
                      <?php echo $row['movie_name']; ?>
                    </a>
                  </h3><!-- End .product-title -->
                  
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



  