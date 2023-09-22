<?php
$title = "Change Password";
require('header.php');
$message = "";
if (isset($_POST['update_password'])) {

    $curpass =  $_POST['curpass'];

    $newpass =  $_POST['newpass'];

    $renewpass =  $_POST['renewpass'];

    $userid = $_SESSION['id'];

    $sql =  "select * from users where id='$userid'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    

    if ($curpass == $renewpass) {
        $message = '<div class="alert alert-secondary">Current password and new password cannot be same!</div>';
    } elseif ($curpass == trim($row['password'])) {
        if ($newpass === $renewpass) {
            $pass_query = "Update users set password = '$newpass' where id = " . $_SESSION['id'];
            if (mysqli_query($conn, $pass_query)) {
                $message = '<div class="alert alert-success">Password updated successfully!</div>';
            } else {
                $message = '<div class="alert alert-danger">Something went wrong!</div>';
            }
        } else {
            $message = '<div class="alert alert-danger">Your Password is Not Matched.</div>';
        }
    } else {
        $message = '<div class="alert alert-danger">Your Current Password is Incorrect!</div>';
    }
}

// echo $sql;
$sql = "SELECT u.id,u.user_name,u.email,u.phone_no,u.profile,u.is_active,ut.type_name FROM users as u,user_type as ut where u.id = " . $_SESSION['id'];
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>
<form method="post">
  <main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Password
      </h2>
      <!-- General elements -->
      <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Change Password
      </h4>
      <?php if ($message != "") {
        echo $message;
      } ?>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Current Password</span>
          <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Current Password " name="curpass" type="password" required  />
        </label>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">New Password</span>
          <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="New Password" name="newpass" type="password" required  />
        </label>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Re-Enter Password</span>
          <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Re-Enter Password" name="renewpass" type="password" required  />
        </label>

        <button type=" submit"
          class="block w-medium px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          name="update_password">
          Update Password
        </button>

      </div>
    </div>
</form>
</main>

<?php
require('footer.php');
?>