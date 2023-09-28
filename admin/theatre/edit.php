<?php
$title = "Edit theatre";
require('../header.php');
$message = "";
if (isset($_GET['id'])) {
$id = $_GET['id'];
if (isset($_POST['edit_type'])) {
  $theatre_name = $_POST['theatre_name'];
  $theatre_desc = mysqli_real_escape_string($conn,$_POST['theatre_desc']);

  if (isset($_FILES["theatre_image"]) && $_FILES["theatre_image"]["name"] != "") {

    $filename = $_FILES["theatre_image"]["name"];

    $tempname = $_FILES["theatre_image"]["tmp_name"];

    $folder = "images/" . $filename;

    /* Check type and size */

    if (move_uploaded_file($tempname, $folder)) {
      $update_sql = "update theatre set theatre_name='$theatre_name',theatre_image='$folder',theatre_desc='$theatre_desc',updated_at=now(), updated_by=" . $_SESSION['id'] . " where id =  " . $id;

      if (mysqli_query($conn, $update_sql)) {
        $message .= "<div class='alert alert-success col-sm-11'>theatreegory updated successfully..</div>";
      } else {
        $message .= "<div class='alert alert-danger col-sm-11'>Something went wrong. Please Check..!</div>";
      }
    } else {
      $message .= '<div class="alert alert-danger col-sm-11">Failed to upload image!</div>';
    }
  } else {
    $update_sql = "update theatre set theatre_name='$theatre_name',theatre_desc='$theatre_desc',updated_at=now(), updated_by=" . $_SESSION['id'] . " where id =  " . $id;
    if (mysqli_query($conn, $update_sql)) {
      $message .= "<div class='alert alert-success col-sm-11'>theatreegory updated successfully..</div>";
    } else {
      $message .= "<div class='alert alert-danger col-sm-11'>Something went wrong. Please Check..!</div>";
    }
  }
}
}

$sql = "SELECT id,theatre_name,theatre_image,theatre_desc from theatre where id = " . $id;
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>
<?php if (!empty($row) && isset($_GET['id'])): ?>
<form method="post" enctype="multipart/form-data">
  <main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
      <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Edit theatre
      </h2>
      <?php if ($message != "") {
                echo $message;
            } ?>
      
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Edit</span>
          <input
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder="Edit " name="theatre_name" value="<?php echo $row['theatre_name']; ?>" required />
        </label>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">theatre Image</span>
          <input type="file"
            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
            placeholder=" theatreegory Image" name="theatre_image" value="<?php echo $row['theatre_image']; ?>" /><?php if($row['theatre_image']) : ?>
               <img src="<?php echo $row['theatre_image']; ?>" style="max-width:200px" />
               <?php endif; ?>
        </label>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Description</span>
          <textarea class="form-control" name="theatre_desc" id="description" ><?php echo $row['theatre_desc']; ?></textarea>

        </label>

        <button type="submit"
          class="block w-medium px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
          name="edit_type">
          Update
        </button>

      </div>
    </div>
</form>
<?php else: ?>
<div class='alert alert-danger'><strong> Invalid place type!</strong</div>
<?php endif; ?>
</main>

<?php
require('../footer.php');
?>