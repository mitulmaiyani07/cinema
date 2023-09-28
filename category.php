<?php
$title = "Categories";
require('header.php'); ?>
<?php $query = "SELECT m.id,m.movie_image,m.movie_name,mc.cat_name,m.created_at,m.is_active FROM movie as m,movie_category as mc where mc.id = m.category_id order by id";
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
    $sql = "insert into book (user_id,product_id,qty,amount) values ('$current_user_id','$product_id',$qty,$total)";
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
<div id="upcoming" class="upcoming">
  <div class="container-fluid padding_left3">
    <div class="row display_boxflex">
      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
        <?php echo $row['cat_name']; ?>
        <a href="/cinema/category.php?id=<?php echo $row['id']; ?>">
          <?php
          if ($row['cat_image'] != ""): ?>
            <img src="/cinema/admin/<?php echo str_replace("../", "", $row['cat_image']) ?>" alt="Cat image"
              class="product-image">
          <?php else: ?>
            <img src="assets/images/products/elements/product-1.jpg" alt="cat image" class="cat-image">
          <?php endif; ?>
        </a>
        <div class="box_text">
          <div class="titlepage">
            <h2>Upcoming Concerts</h2>
            <form method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
              <input type="hidden" name="cat_name" value="<?php echo $row['cat_name']; ?>" />
              <input type="hidden" name="cat_image" value="<?php echo str_replace("../", "", $row['cat_image']) ?>" />

              <button type="submit" name="add_to_cart" class="btn btn-product btn-cart"><span>Book</span></button>
            </form>
          </div>

        </div>
      </div>


    </div>
  </div>
</div>
<!-- end upcoming -->


<?php require('footer.php'); ?>