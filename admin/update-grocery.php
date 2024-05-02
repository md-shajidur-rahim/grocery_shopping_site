<?php include('partials/menu.php'); ?>

<?php
//Check whether the id is set or not
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //SQL query to select all groceries
    $sql2 = "SELECT * FROM tbl_grocery WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $featured = $row2['featured'];
        $active = $row2['active']; 
} 
else {
    header('location:'.SITEURL.'admin/manage-grocery.php');
}
?>

<div class="main content">
    <div class="wrapper">
        <h1>Update Grocery</h1>
        <br> <br>

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" value="<php echo $title; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="description" cols="30" rows="5" value="<php echo $description; ?>"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price" value="<php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image: </td>
                    <td>
                        <?php
                        if ($current_image == "") {
                            echo "<div class = 'error'>Image Not Added. </div>";
                        } 
                        else {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/grocery/<?php echo $current_image; ?>" width="150px">
                            <?php
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
                    <td>Category: </td>
                    <td>
                        <select name="category">
                            <?php
                            //Select to get all categories
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            //Check whether the category available or not
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    ?>
                                    <option <?php if ($current_category == $category_id) {
                                        echo "Selected";
                                    } ?>
                                        value="<?php echo $category_id; ?>"> 
                                        <?php echo $category_title ?>
                                    </option>
                                    <?php
                                }
                            } 
                            else {
                                echo "<option value='0'>Category Not Available.</option>";
                            }
                            ?>
                        </select>
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
                        } ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" name="submit" value="Update Grocery" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        //Check whether the submit button clicked or not
        if (isset($_POST['submit'])) {

            //Get all the details from the form
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $category = $_POST['category'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //Check whether the upload button is clicked or not
            if (isset($_FILES['image']['name'])) {
                //To upload the image, we need image name, source and destination path 
                $image_name = $_FILES['image']['name'];

                if ($image_name != "") {

                    //Get the extension of the image e.g. food1.jpg, food2.png
                    $ext = end(explode('.', $image_name));

                    //Rename the image e.g. Grocery_Category_123, Grocery_Category_786
                    $image_name = "Grocery_Name_".rand(000, 999)."." .$ext;

                    $src_path = $_FILES['image']['tmp_name'];
                    $dest_path = "../images/grocery/".$image_name;
                    $upload = move_uploaded_file($src_path, $dest_path);

                    //Check whether the image is uploaded or not
                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class = 'error'>Failed To Upload Current Image. </div>";
                        header('location:'.SITEURL.'admin/manage-grocery.php');
                        die();
                    }

                    if ($current_image != "") {
                        //Remove The Current Image
                        $remove_path = "../images/grocery/".$current_image;
                        $remove = unlink($remove_path);

                        if ($remove == false) {
                            $_SESSION['remove-failed'] = "<div class = 'error'>Failed To Remove Current Image. </div>";
                            header('location:'.SITEURL.'admin/manage-grocery.php');
                            die();
                        }
                    }
                }
                else {
                    $image_name = $current_image;
                } 
            } 
            else {
                $image_name = $current_image;
            }

            //Update the grocery database
            $sql3 = "UPDATE tbl_grocery SET
            title = '$title',
            description = '$description',
            price = '$price',
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'
            WHERE id = $id
            ";

            $res3 = mysqli_query($conn, $sql3);

            if ($res3 == true) {
                $_SESSION['update'] = "<div class = 'success'>Grocery Updated Successfully. </div>";
                header('location:'.SITEURL.'admin/manage-grocery.php');
            } 
            else {
                $_SESSION['update'] = "<div class = 'error'>Failed To Update Grocery. </div>";
                header('location:'.SITEURL.'admin/manage-grocery.php');
            }
        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>