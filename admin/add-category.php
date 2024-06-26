<?php include('partials/menu.php'); ?>

<div class="main content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br> <br>

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        ?>
        <br> <br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Enter Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php
        //Check whether the submit button clicked or not
        if (isset($_POST['submit'])) {

            //Get the values from the category form
            $title = $_POST['title'];

            if (isset($_POST['featured'])) {
                $featured = $_POST['featured'];
            } 
            else {
                $featured = "No";
            }

            if (isset($_POST['active'])) {
                $active = $_POST['active'];
            } 
            else {
                $active = "No";
            }

            //Check whether the image is selected or not and set the value for image name accordingly
            if (isset($_FILES['image']['name'])) {
                //To upload the image, we need image name, source and destination path 
                $image_name = $_FILES['image']['name'];

                //Upload the image only if image is selected
                if ($image_name != "") { 

                    //Get the extension of the image e.g. food1.jpg, food2.png
                    $ext = end(explode('.', $image_name));

                    //Rename the image e.g. Grocery_Category_123, Grocery_Category_786
                    $image_name = "Grocery_Category_".rand(000, 999).".".$ext;

                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/category/".$image_name;
                    $upload = move_uploaded_file($src_path, $dest_path);

                    //Check whether the image is uploaded or not
                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class = 'error'>Failed To Upload Image. </div>";
                        header("location:".SITEURL.'admin/add-category.php');
                        die();
                    }
                }
            } 
            else {
                //Not upload the image and set the image as blank
                $image_name = "";
            }

            //Create SQL query to insert category into database
            $sql = "INSERT INTO tbl_category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            ";

            //Execute the query and save in database
            $res = mysqli_query($conn, $sql);

            //Check whether the query executed or not and Category added or not
            if ($res == TRUE) {
                $_SESSION['add'] = "<div class = 'success'>Category Added Successfully. </div>";
                header("location:".SITEURL.'admin/manage-category.php');
            } 
            else {
                $_SESSION['add'] = "<div class = 'error'>Failed To Add Category. </div>";
                header("location:".SITEURL.'admin/add-category.php');
            }
        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>