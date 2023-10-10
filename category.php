<?php
$title = "Movies";
require('header.php');
$category_id = $_GET['category_id'];
$query = "SELECT m.id,m.movie_image,m.movie_name,mc.cat_name,m.created_at,m.is_active FROM movie as m,movie_category as mc where mc.id = m.category_id and m.category_id = " . $category_id . " order by id";

$cat_query = "Select * from movie_category where id=" . $category_id;
$cat_result = mysqli_query($conn, $cat_query);
$cat_data = $cat_result->fetch_assoc();
?>
<main class="main py-5">
  <div class="page-content movie-list">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="page-title">
            <?php echo $cat_data['cat_name']; ?>
          </h2>
        </div>
      </div>
      <div class="row">
        <?php if ($result = $conn->query($query)): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 item-wrap">
              <div class="movie">
                <figure class="movie-media text-center">
                  <a href="/cinema/movie.php?id=<?php echo $row['id']; ?>">
                    <?php if ($row['movie_image'] != ""): ?>
                      <img src="/cinema/admin/movie/<?php echo str_replace("../", "", $row['movie_image']) ?>"
                        alt="Product image" class="product-image">
                    <?php else: ?>
                      <img src="/admin/movie/images/bollywood1.jpg" alt="Product image" class="product-image">
                    <?php endif; ?>
                  </a>
                </figure>
                <div class="movie-content py-4">
                  <div class="product-cat">
                    <p>
                      <?php echo $row['cat_name']; ?>
                    </p>
                  </div>
                  <h3 class="product-title">
                    <a href="/cinema/movie.php?id=<?php echo $row['id']; ?>">
                      <?php echo $row['movie_name']; ?>
                    </a>
                  </h3>
                  <div class="movie-action">
                    <form method="post">
                      <input type="hidden" name="movie_id" value="<?php echo $row['id']; ?>" />
                      <input type="hidden" name="movie_name" value="<?php echo $row['movie_name']; ?>" />
                      <input type="hidden" name="movie_image"
                        value="<?php echo str_replace("../", "", $row['movie_image']) ?>" />
                      <button type="submit" name="book" class="btn btn-movies btn-book"><span>Book
                          Now</span></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>
<?php require('footer.php');