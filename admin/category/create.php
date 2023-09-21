<?php
$title = "Add Category";
require('../header.php');
if (isset($_POST['add_type'])) {

  $is_uploaded = false;

  if (isset($_FILES["cat_image"]["name"]) && $_FILES["cat_image"]["name"] != "") {

      $filename = $_FILES["cat_image"]["name"];

      $tempname = $_FILES["cat_image"]["tmp_name"];

      $edit_category = "images/" . $filename;

      if (move_uploaded_file($tempname, $edit_category)) {

          $is_uploaded = true;

          $message = "<div class= 'alert alert-succss' Image uploaded successfully!</div>";
      } else {
          $message =  "<div class = 'alert alert-danger'>  Failed to upload image!</div>";
      }
  }

  $cat_name =  $_POST['cat_name'];

  $description=  $_POST['description'];

  $current_user_id = $_SESSION['id'];

  if ($is_uploaded == true) {
      $sql = "insert into movie_category (cat_name,cat_image,description,created_by,updated_by,is_active,is_deleted,created_at,updated_at) values('$cat_name','$cat_image','$edit_category','$description',$current_user_id,$current_user_id,true,false,now(),now())";
  } else {
      $sql = "insert into movie_category (cat_name,description,created_by,updated_by,is_active,is_deleted,created_at,updated_at) values('$cat_name','$description',$current_user_id,$current_user_id,true,false,now(),now())";
  }

  if (mysqli_query($conn, $sql)) {
      $message = '<div class="alert alert-success">Category added successfully! </div>';
  } else {
      $message = 'Something went wrong.' . $sql;
  }
}
?>
 <!-- #region -->
 <form method="post">
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add Category
    </h2>
   
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Add</span>
        <input type="text"
          class="bloc k w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder="Add "name="cat_name" class="form-control"  />
      </label>
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Category Image</span>
        <input type="file"
          class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
          placeholder=" Category Image" name="cat_image"   />
      </label>
      <label class="block text-sm">
        <span class="text-gray-700 dark:text-gray-400">Description</span>
        <textarea class="form-control" name="description" id="description"></textarea>
      
      </label>
      <button type="submit"
        class="block w-medium px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
        name="add_type">
        Add
      </button>

    </div>
  </div>
  </form> 
</main>

<?php
require('../footer.php');
?>