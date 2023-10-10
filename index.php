<?php
$title = "Homepage";
require('header.php');
?>
<?php $query = "SELECT mc.id,mc.cat_image,mc.cat_name,mc.created_at,mc.is_active FROM movie_category as mc";
if (isset($_POST['add_to_cart'])) {
  $current_user_id = "";
  if (isset($_SESSION['id'])) {
    $current_user_id = $_SESSION['id'];
  }
  // $qty = 1;
  $id = $_POST['id'];
  $cat_name = $_POST['cat_name'];
  $cat_image = $_POST['cat_image'];
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
      'id' => $id,
      'cat_name' => $cat_name,
      // 'price' => $price,
      // 'product_image' => $product_image,
      // 'qty' => $qty,
      // 'total_amount' => $total,
    );
  }
}
?>

<section class="">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active slider_section" style="background-image:url('images/p1.jpg')" data-bs-interval="500">
        <div class="container">
          <div class="carousel-caption">
            <div class="row">
              <div class="col-md-12">
                <div class="text-bg">
                  <a href="/cinema/movies.php">View All</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item slider_section" style="background-image:url('images/p2.jpg')" data-bs-interval="500">
        <div class="container ">
          <div class="carousel-caption">
            <div class="row">
              <div class="col-md-12">
                <div class="text-bg">
                  <a href="/cinema/movies.php">View All</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item slider_section" style="background-image:url('images/p3.jpg')" data-bs-interval="500">
        <div class="container">
          <div class="carousel-caption ">
            <div class="row">
              <div class="col-md-12">
                <div class="text-bg">
                  <a href="/cinema/movies.php">View All</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol> -->
    <div class="carousel-arrow">
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
      </a>
    </div>
  </div>
</section>
<main class="main d-none">
  <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
      <h1 class="page-title">Category</h1>
    </div>
  </div>
  <div class="page-content mt-8">
    <div class="container">
      <div class="row">
        <?php if ($result = $conn->query($query)) : ?>
          <?php while ($row = $result->fetch_assoc()) : ?>
            <div class="col-md-4">
              <div class="product product-5 text-center">
                <figure class="product-media">
                  <!-- <span class="product-label label-top"><?php echo $row['cat_name']; ?></span> -->
                  <a href="/cinema/category.php?category_id=<?php echo $row['id']; ?>">
                    <?php
                    if ($row['cat_image'] != "") : ?>
                      <img src="/cinema/admin/category/<?php echo str_replace("../", "", $row['cat_image']) ?>" alt="movie image" class="movie-image">
                    <?php else : ?>
                      <img src="/admin/category/images/action.jpg" alt="movie image" class="movie-image">
                    <?php endif; ?>
                  </a>
                  <div class="movie-action">
                    <form method="post">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                      <input type="hidden" name="cat_name" value="<?php echo $row['cat_name']; ?>" />
                      <input type="hidden" name="cat_image" value="<?php echo str_replace("../", "", $row['cat_image']) ?>" />

                      <!-- <button type="submit" name="add_to_cart" class="btn btn-product btn-cart"><span>Book</span></button> -->
                    </form>
                  </div>
                </figure>

                <div class="movie-body">
                  <div class="movie-cat">
                    <p>
                      <?php echo $row['cat_name']; ?>
                    </p>
                  </div>
                  <h3 class="movie-title">
                    <a href="/cinema/category.php?category_id=<?php echo $row['id']; ?>">
                      <?php echo $row['cat_name']; ?>
                    </a>
                  </h3>

                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>

<?php require('footer.php'); ?>