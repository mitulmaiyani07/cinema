<?php
require('header.php');
?>
<?php
if (isset($_POST['add_to_cart'])) {
    $current_user_id = "";
    if (isset($_SESSION['id'])) {
        $current_user_id = $_SESSION['id'];
    }
    $tickets = 1;
    $movie_id = $_POST['movie_id'];
    $movie_name = $_POST['movie_name'];
    $movie_image = $_POST['movie_image'];
    // $price = $_POST['price'];
    $total_amount = (int) $price * $tickets;
    if ($current_user_id != "") {
        $sql = "insert into booking (movie_id,theatre_id,user_id,product_id,tickets,total_amount) values ('$movie_id','$theatre_id',$current_user_id','$product_id',$tickets,$total_amount)";
        if (mysqli_query($conn, $sql)) {
            header("location:booking.php");
        } else {
            $message = "<div class='alert alert-danger'>Something went wrong!</div>";
        }
    } else {
        $_SESSION['cart'][] = array(
            'booking_id' => $booking_id,
            'product_name' => $product_name,
            // 'price' => $price,
            // 'product_image' => $product_image,
            'tickets' => $tickets,
            'total_amount' => $total_amount,
        );
    }
}

$movie_id = $_GET['movie'];
$movie_query = "SELECT m.id,m.movie_image,m.movie_name,m.movie_desc,m.category_id,mc.cat_name,m.created_at,m.is_active,m.price FROM movie as m,movie_category as mc where mc.id = m.category_id and m.id=" . $movie_id . " order by id";
$movie_result = mysqli_query($conn, $movie_query);
$movie_row = mysqli_fetch_assoc($movie_result);

$user_sql = "SELECT u.id,u.user_name,u.email,u.phone_no,u.is_active,ut.type_name FROM users as u,user_type as ut where u.id = " . $_SESSION['id'] . " and ut.id = u.user_type_id";
$user_result = $conn->query($user_sql);
$user_data = mysqli_fetch_assoc($user_result);
?>
<style type="text/css">
    .nice-select {
        display: none;
    }

    .booking-wrap {
        border: #eee solid 1px;
        margin-top: 60px;
        padding: 40px;
        margin-bottom: 60px;
    }

    .contact_bg {
        max-width: 100%;
        text-align: left;
    }
</style>

<div class="container booking-wrap">
    <form class="contact_bg booking-form" method="post">
        <div class="row">
            <div class="col-md-8">
                <h1 class="text-center">Booking Details</h1>
                <div class="row">
                    <div class="col-md-12">
                        <label class="m-0">Full Name</label>
                        <input class="contactus" id="fullname" type="user_name" name="user_no" required value="<?php echo $user_data['user_name']; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="m-0">Email</label>
                        <input class="contactus" id="emailid" type="email" name="email" required placeholder="Email Address*" value="<?php echo $user_data['email']; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="m-0">Phone no</label>
                        <input class="contactus" id="phone" type="phone_no" name="phone_no" required placeholder="Phone No*" value="<?php echo $user_data['phone_no']; ?>" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="m-0">Number of tickets</label>
                        <input class="contactus" id="tickets" type="number" name="tickets" required min="1" max="5">
                    </div>
                    <div class="col-md-6">
                        <label class="m-0">Date</label>
                        <input class="contactus" id="booking_date" type="datetime-local" name="date_time" required>
                    </div>
                    <div class="col-md-12">
                        <label class="text-start m-0">Select Theatre</label>
                        <select class="select form-control" id="theatre_id" name="theatre">
                            <option>--- Select theatre ---</option>
                            <?php
                            $query = "SELECT * from theatre";
                            if ($var_result = $conn->query($query)) {
                                while ($var_row = $var_result->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $var_row['id']; ?>">
                                        <?php echo $var_row['theatre_name']; ?>
                                    </option>
                            <?php
                                    $i++;
                                }
                                $var_result->free();
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 item-wrap">
                <div class="movie">
                    <figure class="movie-media text-center">
                        <a href="/cinema/movie.php?id=<?php echo $movie_row['id']; ?>">
                            <?php if ($movie_row['movie_image'] != "") : ?>
                                <img src="/cinema/admin/movie/<?php echo str_replace("../", "", $movie_row['movie_image']) ?>" alt="movie image" class="movie-image">
                            <?php else : ?>
                                <img src="/admin/movie/images/bollywood1.jpg" alt="movie image" class="movie-image">
                            <?php endif; ?>
                        </a>
                    </figure>
                    <div class="movie-content py-4">
                        <div class="movie-cat">
                            <a href="/cinema/category.php?category_id=<?php echo $movie_row['category_id']; ?>">
                                <?php echo $movie_row['cat_name']; ?>
                            </a>
                            <p>₹<span class="movie-price"><?php echo $movie_row['price']; ?></span></p>
                        </div>
                        <h3 class="movie-title">
                            <a href="/cinema/movie.php?id=<?php echo $movie_row['id']; ?>">
                                <?php echo $movie_row['movie_name']; ?>
                            </a>
                        </h3>
                        <div class="movie-action">
                            <form method="post">
                                <input type="hidden" id="final_amount" name="final_amount" value="<?php echo $movie_row['price']; ?>" />
                                <input type="hidden" id="price" name="price" value="<?php echo $movie_row['price']; ?>" />
                                <input type="hidden" id="movie_id" name="movie_id" value="<?php echo $movie_row['id']; ?>" />
                                <button id="book_movie" class="btn">Book Your Show</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php require('footer.php'); ?>