<?php include('partials/menu.php'); ?>

<!--Main Content Section-->
<div class="main content">
    <div class="wrapper">
        <h1>Manage Grocery</h1>
        <br> <br>

        <a href="<?php echo SITEURL; ?>admin/add-grocery.php" class="btn-primary">Add New Grocery Item</a>
        <br> <br> 

        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        if (isset($_SESSION['delete'])) {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if (isset($_SESSION['upload'])) {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']);
        }
        if (isset($_SESSION['unauthorized'])) {
            echo $_SESSION['unauthorized'];
            unset($_SESSION['unauthorized']);
        }
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>
        <br> <br>

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>

            <?php
            //Create a SQL query to get all categories
            $sql = "SELECT * FROM tbl_grocery";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            $sn = 1; 

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    //Get individual data id
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    ?>

                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>

                        <td>
                            <?php
                            //Check whether we have the image or not
                            if ($image_name == "") {
                                echo "<div class='error'>Image Not Added. </div>";
                            } 
                            else {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/grocery/<?php echo $image_name; ?>" width="100px">
                                <?php
                            }
                            ?>
                        </td>

                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?>admin/update-grocery.php?id=<?php echo $id; ?>" class="btn-secondary">Update Grocery</a>
                            <a href="<?php echo SITEURL; ?>admin/delete-grocery.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Grocery</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">
                        <div class='error'>No Grocery Added</div>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<?php include('partials/footer.php'); ?>