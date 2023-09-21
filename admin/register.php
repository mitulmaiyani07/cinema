<?php
$title = "Register";
require('config.php');

$error_msg = "";

if (isset($_POST['add_create'])) {

  $user_name = $_POST['user_name'];

  $email = $_POST['email'];

  $password = $_POST['password'];

  $confirm_password = $_POST['confirm_password'];

  $phone_no = $_POST['phone_no'];

  $user_type_id = 1;

  if ($password === $confirm_password) {
    $sql = "insert into users (user_name,email,phone_no,password,user_type_id,created_at,updated_at,is_active,is_deleted) values ('$user_name','$email','$phone_no','$password','$user_type_id',now(),now(),true,false)";
    if (mysqli_query($conn, $sql)) {
      header("location:dashboard.php");
    } else {
      $error_msg = "Something went wrong. Please try again..!!";
    }
  } else {
    $error_msg = "Password and Confirm password must be same.!";
  }
}
?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create account - Windmill Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="assets/js/init-alpine.js"></script>
</head>

<body>

  <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">

      <div class="flex items-center justify-center p-6 sm:p-12 sm:w-1/2">
        <div class="w-full">
          <h1 class="mb- text-xl font-semibold text-gray-700 dark:text-gray-200">
            Create account
          </h1><br>
          <form method="post">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Name</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Full Name" name="user_name" required />

            </label>
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Phone no</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Phone No" name="phone_no" required />
            </label>
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Email</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Email" name="email" required />
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">Password</span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Password" name="password" type="password" required />
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 dark:text-gray-400">
                Confirm password
              </span>
              <input
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Confirm Password" name="confirm_password" type="password" required />
            </label>

            <div class="flex mt-6 text-sm">
              <label class="flex items-center dark:text-gray-400">
              </label>
            </div>

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button type="submit"
              class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              name="add_create">
              Create account
            </button>
            <hr class="my-8" />
            <p class="mt-4 text-center">
              <span>Already have an account?</span><a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="index.php">Login</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>