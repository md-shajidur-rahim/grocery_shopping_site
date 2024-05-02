<?php include('partials-front/menu.php'); ?>

<!-- Categories Section -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Groceries</h2>

        <?php
        //Create a SQL query to display category
        $sql = "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 10";

        //Execute the query
        $res = mysqli_query($conn, $sql);

        //Count rows to check whether the data is in the database or not
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {

                //Get individual data
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                ?>

                <a href="<?php echo SITEURL; ?>category-groceries.php?category_id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image Not Available. </div>";
                        } 
                        else {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Fruits"
                                class="img-responsive img-curve">
                            <?php
                        }
                        ?>

                        <h3 class="float-text text-white"><?php echo $title; ?></h3>s
                    </div>
                </a>
                <?php
            }
        } else {
            echo "No data found";
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>

<?php include('partials-front/footer.php'); ?>