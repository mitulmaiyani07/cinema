<?php
$title = "Login";
// require('auth-header.php');
require('config.php');
$error_msg = "";
if (isset($_POST['login'])) {
  $email = $_POST['email'];

  $password = $_POST['password'];

  $sql = "select * from users where email='$email' and password='$password'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  if ($row) {
    var_dump($row);
    $_SESSION['id'] = $row['id'];
    $_SESSION['user_type_id'] = $row['user_type_id'];
    header("location:dashboard.php");
    echo $sql;
  } else {
    $error_msg = "Email or password is incorrect!";
  }
}
?>
<?php if ($error_msg != ""): ?>
  <div class="alert alert-danger m-3">
    <?php echo $error_msg; ?>
  </div>
<?php endif; ?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Windmill Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/tailwind.output.css" />
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
  <script src="assets/js/init-alpine.js"></script>
</head>

<body>
  <div class="flex items-center min-h-screen p- bg-gray-50 dark:bg-gray-900">
    <div class="flex-1 h-full max-w-xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
      <div class="h-30 sm:h-auto sm:w-1/2">

      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 sm:w-1/2">
        <div class="w-full">
          <h1 class="mb-8 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Login
          </h1>
          <form method="post">
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

            <!-- You should use a button here, as the anchor is only used for the example  -->
            <button type="submit"
              class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
              name="login">
              Log in
            </button>
          </form>
          <hr class="my-8" />

          <p class="mt-1">
            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="register.php">
              Create account
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
  </div>
</body>

</html>