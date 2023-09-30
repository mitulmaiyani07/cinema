<?php
$title = "Categories";
require('header.php'); ?>
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
  // $total = (int)$price * $qty;
  if ($current_user_id != "") {
    // $sql = "insert into book (user_id,product_id,qty,amount) values ('$current_user_id','$product_id',$qty,$total)";
    if (mysqli_query($conn, $sql)) {
      header("location:booking.php");
    } else {
      $message = "<div class='alert alert-danger'>Something went wrong!</div>";
    }
  } else {
    $_SESSION['booking'][] = array(
      'id' => $id,
      'cat_name' => $cat_name,
      // 'price' => $price,
      'cat_image' => $cat_image,
      // 'qty' => $qty,
      // 'total_amount' => $total,
    );
  }
}

?>


<!-- <div class="backgro_mh">
  <div class="container">
    <div class="row">
     
    </div>
  </div>
</div> -->

<!-- upcoming -->
<main class="main">
  <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
      <h1 class="page-title">Categories</h1>
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
                  <a href="/cinema/category.php?id=<?php echo $row['id']; ?>">
                    <?php
                    if ($row['cat_image'] != ""): ?>
                      <img src="/cinema/admin/category/<?php echo str_replace("../", "", $row['cat_image']) ?>"
                        alt="Product image" class="product-image">
                    <?php else: ?>
                      <img src="/admin/category/images/action.jpg" alt="Product image" class="product-image">
                    <?php endif; ?>
                  </a>
                  <div class="movie-action">
                    <form method="post">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                      <input type="hidden" name="cat_name" value="<?php echo $row['cat_name']; ?>" />
                      <input type="hidden" name="cat_image"
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
                    <a href="/cinema/category.php?id=<?php echo $row['id']; ?>">
                      <?php echo $row['cat_name']; ?>
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

<!-- end upcoming -->


<?php require('footer.php'); ?>