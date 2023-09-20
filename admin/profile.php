<?php 
$title = "profile";
require('header.php');
$message = "";

if (isset($_POST['update_profile'])) {
  $user_name = $_POST['user_name'];
  $email = $_POST['email'];
  $phone_no = $_POST['phone_no'];

  if (isset($_FILES["profileimage"]) && $_FILES["profileimage"]["name"] != "") {

    $filename = $_FILES["profileimage"]["name"];

    $tempname = $_FILES["profileimage"]["tmp_name"];

    $profile_path = 'assets/public/profiles/' . $filename;

    /*Check type and size*/

    if (move_uploaded_file($tempname, $profile_path)) {
      $update_sql = "update users set user_name='$user_name',email='$email',phone_no='$phone_no', profile='$profile_path',updated_at=now(), updated_by=" . $_SESSION['id'] . " where id =  " . $_SESSION['id'];

      if (mysqli_query($conn, $update_sql)) {
        $message .= "<div class='alert alert-success'>Profile updated successfully..</div>";
      } else {
        $message .= "<div class='alert alert-danger'>Something went wrong. Please Check..!</div>";
      }
    } else {
      $message .= '<div class="alert alert-danger">Failed to upload image!</div>';
    }
  } else {
    $update_sql = "update users set user_name='$user_name',email='$email', phone_no='$phone_no', updated_at=now(), updated_by=" . $_SESSION['id'] . " where id =  " . $_SESSION['id'];
    if (mysqli_query($conn, $update_sql)) {
      $message .= "<div class='alert alert-success'>Profile updated successfully..</div>";
    } else {
      $message .= "<div class='alert alert-danger'>Something went wrong. Please Check..!</div>";
    }
  }
}
// $sql = "SELECT user_id,user_name,email,phone_no,profile,is_active,user_type_type_name FROM users,user_type  where user_id = " . $_SESSION['id'] . " and user_type_id = user_user_type_id";
// echo $sql;
// $result = $conn->query($sql);
// $row = mysqli_fetch_assoc($result);
?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Profile
    </h2>
    <!-- General elements -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      Profile Info
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Name</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="Name " name="user_name" />
      </label>

      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Email</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="Email" name="email" />
      </label>

      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Phone No</span>
        <input
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="Phone No" name="phone_no"/>
      </label>
      <button type="submit"
        class="block w-medium px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        name="submit">
        Submit
      </button>

    </div>
  </div>
</main>
