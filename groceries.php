<?php include('partials-front/menu.php'); ?>

<!-- Grocery Search Section -->
<section class="grocery-search text-center">
    <div class="container">

        <form action="<?php echo SITEURL; ?>grocery-search.php" method="POST">
            <!--search bar-->
            <input type="search" name="search" placeholder="Search for Grocery.." required>
            <!--submit button-->
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>

    </div>
</section>

<!-- Grocery Menu Section -->
<section class="grocery-menu">
    <div class="container">
        <h2 class="text-center">Grocery Menu</h2>

        <?php
        $sql2 = "SELECT * FROM tbl_grocery WHERE active='Yes' AND featured='Yes' LIMIT 12";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if ($count2 > 0) {
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                ?>

                <div class="grocery-menu-box">
                    <div class="grocery-menu-img">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image Not Available.</div>";
                        } 
                        else {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/grocery/<?php echo $image_name; ?>" alt="Groceries" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                    </div>

                    <div class="grocery-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="grocery-price"><?php echo $price; ?></p>
                        <p class="grocery-detail"><?php echo $description; ?></p>
                        <br>

                        <a href="<?php echo SITEURL; ?>order.php?grocery_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                <?php
            }
        } 
        else {
            echo "<div class='error'>Grocery Not Available.</div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>

    <p class="text-center"><a href="#">See All Groceries</a></p>
</section>

<?php include('partials-front/footer.php'); ?>