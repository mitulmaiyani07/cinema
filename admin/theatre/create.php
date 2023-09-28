<?php
$title = "Add Theatre";
require('../header.php');
$message = "";
if (isset($_POST['add_type'])) {

    $is_uploaded = false;

    if (isset($_FILES["theatre_image"]["name"]) && $_FILES["theatre_image"]["name"] != "") {

        $filename = $_FILES["theatre_image"]["name"];

        $tempname = $_FILES["theatre_image"]["tmp_name"];

        $folder = "./images/" . $filename;

        if (move_uploaded_file($tempname, $folder)) {

            $is_uploaded = true;

            $message = "<div class= 'alert alert-succss> Image uploaded successfully!</div>";
        } else {
            $message = "<div class = 'alert alert-danger'>  Failed to upload image!</div>";
        }
    }
    $theatre_name = $_POST['theatre_name'];
    $theatre_desc = mysqli_real_escape_string($conn,$_POST['theatre_desc']);
    $current_user_id = $_SESSION['id'];

    if ($is_uploaded == true) {
        $sql = "insert into theatre (theatre_name,theatre_image,theatre_desc,created_by,updated_by,is_active,is_deleted,created_at,updated_at) values('$theatre_name','$folder','$theatre_desc',$current_user_id,$current_user_id,true,false,now(),now())";
    } else {
        $sql = "insert into theatre (theatre_name,theatre_desc,created_by,updated_by,is_active,is_deleted,created_at,updated_at) values('$theatre_name','$theatre_desc',$current_user_id,$current_user_id,true,false,now(),now())";
    }

    if (mysqli_query($conn, $sql)) {
        $message = "<div class='alert alert-success'><strong>Category added successfully!</strong></div>";
    } else {
        $message = 'Something went wrong.' . $sql;
    }
}
?>
<!-- #region -->
<form method="post" enctype="multipart/form-data">
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Add Category
            </h2>
            <?php if ($message != "") {
                echo $message;
            } ?>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Add</span>
                    <input type="text"
                        class="bloc k w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Add " name="theatre_name" />
                </label>
                <label class=" block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Theatre Image</span>
                    <input type="file"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Theatre Image" name="theatre_image" />
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Description</span>
                    <textarea class="form-control" name="theatre_desc" id="description"></textarea>

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