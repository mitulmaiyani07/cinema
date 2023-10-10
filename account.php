<?php
$title = "My Account";
require('header.php');

$message = "";
$msg = "";
if (isset($_POST['save_changes'])) {

    $userid = $_SESSION['id'];
    $sql =  "select * from users where id='$userid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $update_sql = "update users set user_name = '$user_name' , email = '$email' , phone_no = '$phone_no' , updated_at = now(), updated_by = " . $_SESSION['id'] . " where id = " . $_SESSION['id'];
    if (mysqli_query($conn, $update_sql)) {
        $message .= "<div class='alert alert-success'>Profile updated successfully..</div>";
    } else {
        $message .= "<div class='alert alert-danger'>Something went wrong. Please Check..!</div>";
    }
}
if (isset($_POST['change_password'])) {

    $userid = $_SESSION['id'];
    $sql =  "select * from users where id='$userid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
    $curpass =  $_POST['curpassword'];

    $newpass =  $_POST['newpassword'];

    $renewpass =  $_POST['renewpassword'];

    if ($curpass == $renewpass) {
        $msg = '<div class="alert alert-secondary">Current password and new password cannot be same!</div>';
    } elseif ($curpass == trim($row['password'])) {
        if ($newpass === $renewpass) {
            $pass_query = "Update users set password = '$newpass' where id = " . $_SESSION['id'];
            if (mysqli_query($conn, $pass_query)) {
                $msg = '<div class="alert alert-success">Password updated successfully!</div>';
            } else {
                $msg = '<div class="alert alert-danger">Something went wrong!</div>';
            }
        } else {
            $msg = '<div class="alert alert-danger">Your Password is Not Matched.</div>';
        }
    } else {
        $msg = '<div class="alert alert-danger">Your Current Password is Incorrect!</div>';
    }
}
$sql = "SELECT u.id,u.user_name,u.email,u.phone_no,u.is_active,ut.type_name FROM users as u,user_type as ut where u.id = " . $_SESSION['id'] . " and ut.id = u.user_type_id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

?>
<!-- <a href="/onlineWatchStore/logout.php">logout</a> -->

<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">My Account</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="/cinema/index.php">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Book</p>
        </div>
    </div>
</div>

<section class="section py-4">
    <div class="container">
        <div class="card p-5">
            <div class="row">
                <div class="col-md-4">
                    <ul class="tab-links">
                        <li class="p-3 active"><a href="account.php" class="link" data-id="my-account">Account Details </a></li>
                        <li class="p-3"><a href="#" class="link" data-id="change-password">Change Password </a></li>
                        <li class="p-3"><a href="booking.php" class="link" data-id="booking">booking </a></li>
                        <li class="p-3"><a href="/cinema/logout.php">Sign Out</a></li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <div class="tab-content show" id="my-account">
                        <form method="post">
                            <?php echo $message; ?>

                            <div class="col-12">
                                <div class="control-group">
                                    <input type="text" class="form-control" id="name" name="user_name" placeholder="Your Name" required value="<?php echo $row['user_name']; ?>">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="col-12 p-3">
                                <div class="control-group">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required value="<?php echo $row['email']; ?>">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <div class="control-group">
                                    <input type="text" class="form-control" name="phone_no" id="subject" placeholder="Phone No." required value="<?php echo $row['phone_no']; ?>">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <br><button name="save_changes" class="btn btn-primary w-100" type="submit">Save Change</button>

                            </div>
                        </form>
                    </div>
                    <div class="tab-content show" id="chnage-password">
                        <form method="post">
                        <?php echo $msg; ?>
                            <div class="col-12">
                                <div class="control-group">
                                    <input type="password" class="form-control" name="curpassword"   placeholder="Current Password" required>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="col-12 p-3">
                                <div class="control-group">
                                    <input type="password" class="form-control" name="newpassword" id="email" placeholder="New Password" required  />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <div class="control-group">
                                    <input type="password" class="form-control" name="renewpassword" id="subject" placeholder="Current New Password" required >
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <div class="col-12">
                                <br><button name="change_password" class="btn btn-primary w-100" type="submit">Submit</button>

                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require('footer.php');
?>