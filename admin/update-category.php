<?php include('partials/menu.php'); ?>

<div class="main content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br> <br>

        <?php
        //Check whether the id is set or not
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //Create SQL query to get all other details
            $sql = "SELECT * FROM tbl_category WHERE id=$id";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if ($count == 1) {
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            } 
            else {
                $_SESSION['no-category-found'] = "<div class='error'>Category Not Found. </div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        } 
        else {
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if ($current_image != "") {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?>" width="150px">
                            <?php
                        } else {
                            echo "<div class = 'error'>Image Not Added.</div>";
                        }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if ($featured == "Yes") {
                            echo "checked";
                        } 
                        ?> type="radio" name="featured" value="Yes"> Yes

                        <input <?php if ($featured == "No") {
                            echo "checked";
                        } 
                        ?> type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if ($active == "Yes") {
                            echo "checked";
                        } 
                        ?> type="radio" name="active" value="Yes"> Yes

                        <input <?php if ($active == "No") {
                            echo "checked";
                        } 
                        ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST['submit'])) {

            //Get all the details from the form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $current_image = $_POST['current_image']; //change
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //Check whether the image is selected or not
            if (isset($_FILES['image']['name'])) {

                //To upload the image, we need image name, source and destination path 
                $image_name = $_FILES['image']['name'];

                //Check whether the image is available or not
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
                        header('location:'.SITEURL.'admin/add-category.php');
                        die();
                    }

                    if ($current_image != "") { 
                        //Remove The Current Image
                        $remove_path = "../images/category/".$current_image;
                        $remove = unlink($remove_path);

                        if ($remove == false) {
                            $_SESSION['failed-remove'] = "<div class = 'error'>Failed To Remove Current Image. </div>";
                            header('location:'.SITEURL.'admin/manage-category.php');
                            die();
                        }
                    }
                } else {
                    //Not upload the image and set the image as blank
                    $image_name = $current_image;
                }
            } else {
                $image_name = $current_image;
            }

            //Update the category database
            $sql2 = "UPDATE tbl_category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
            WHERE id = $id
            ";

            $res2 = mysqli_query($conn, $sql2);

            //Check whether the query is executed or not
            if ($res2 == true) {
                $_SESSION['update'] = "<div class = 'success'>Category Updated Successfully. </div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            } 
            else {
                $_SESSION['update'] = "<div class = 'error'>Failed To Update Category. </div>";
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>