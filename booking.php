<?php
require('header.php');
?>
<?php $query = "SELECT m.id,m.category_id,m.movie_image,m.movie_name,mc.cat_name,m.created_at,m.is_active FROM movie as m,movie_category as mc where mc.id = m.category_id order by id";
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
?>
<style type="text/css">
    .nice-select{ display: none; }
</style>

<div class="container mt-3">

    <div class="row">
        <div class="col-md-8 mt-5">
            <form class="contact_bg" method="post">
                <div class="row card">
                    <h1 class="mt-5 text-center">Booking</h1>
                    <div class="col-md-12">
                        <label class="m-0">Full Name</label>
                        <input class="contactus" type="user_name" name="user_no" required>
                    </div>
                    <div class="col-md-12">
                        <label class="m-0">Email</label>
                        <input class="contactus" type="email" name="email" required>
                    </div>
                    <div class="col-md-12">
                        <label class="m-0">Phone no</label>
                        <input class="contactus" type="phone_no" name="phone_no" required>
                    </div>
                    
                    <div class="col-md-12">
                        <label class="text-start m-0">theatre Name</label>
                        <select class="select form-control" name="theatre">
                            <option>--- Select theatre ---</option>
                            <?php
                            $query = "SELECT * from theatre";
                            if ($var_result = $conn->query($query)) {
                                $i = 0;
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
                        <div class="col-md-12">
                            <label class="m-0">Date</label>
                            <input class="contactus" type="datetime-local" name="date_time" required>
                        </div>
                    <div class="col-md-12">
                        <label class="m-0">Number of tickets</label>
                        <input class="contactus" type="number" name="tickets" required>
                    </div>
                    <!-- <div class="col-md-12">
                        <label class="m-0">Price</label>
                        <input class="contactus" type="100" name="total_amount" required>
                    </div> -->
                   
                  
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 p-3 text-center">
                        <button type="submit" class="submit" name="book">book</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<?php require('footer.php'); ?>