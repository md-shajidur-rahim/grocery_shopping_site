<?php include('partials/menu.php'); ?>

<div class="main content">
    <div class="wrapper">
        <h1>Add Grocery</h1>
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
                        <input type="text" name="title" placeholder="Enter Grocery Title">
                    </td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td>
                        <textarea name="text" cols="30" rows="5" placeholder="Enter Grocery Description"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category">

                            <?php
                            //Create SQL query to get all the categorie from database
                            $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                            $res = mysqli_query($conn, $sql);
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                    //Get the details of the category
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    ?>
                                    <option value="<?php echo $id; ?>">
                                        <?php echo $title; ?>
                                    </option>
                                    <?php
                                }
                            } 
                            else {
                                ?>
                                <option value="0">No Category Found</option>
                                <?php
                            }
                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes
                        <input type="radio" name="featured" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Grocery" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>

        <?php
        //Check whether the submit button is clicked or not
        if (isset($_POST['submit'])) {

            //Get the data from the form
            $title = $_POST['title'];
            $description = $_POST['text'];
            $price = $_POST['price'];
            $category = $_POST['category'];

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

                if ($image_name != "") {

                    //Get the extension of the image e.g. food1.jpg, food2.png
                    $image_name_parts = explode('.', $image_name);
                    $ext = end($image_name_parts);


                    //Rename the image e.g. Grocery_Category_123, Grocery_Category_786
                    $image_name = "Grocery_Name_".rand(000, 999).".".$ext;

                    $src_path = $_FILES['image']['tmp_name']; //change src
                    $dest_path = "../images/grocery/".$image_name;
                    $upload = move_uploaded_file($src_path, $dest_path);

                    if ($upload == false) {
                        $_SESSION['upload'] = "<div class = 'error'>Failed To Upload Image. </div>";
                        header('location:'.SITEURL.'admin/add-grocery.php');
                        die();
                    }
                }
            } 
            else {
                //Not upload the image and set the image as blank
                $image_name = "";
            }

            //Create another SQL query to save data into database
            $sql2 = "INSERT INTO tbl_grocery SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = $category,
            featured = '$featured',
            active = '$active'
            ";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 == TRUE) {
                $_SESSION['add'] = "<div class = 'success'>Grocery Added Successfully. </div>";
                
            } 
            else {
                $_SESSION['add'] = "<div class = 'error'>Failed To Add Grocery. </div>";
                header('location:'.SITEURL.'admin/add-grocery.php');
            }
        }
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>