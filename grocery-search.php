<?php include('partials-front/menu.php'); ?>

<!-- Grocery Search Section -->
<section class="grocery-search text-center">
    <div class="container">

    <?php
        //Get the search keyboard
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        ?>

        <h2>Groceries On Your Search "<a href="#" class="text-white"><?php echo $search?>"</a></h2>
    </div>
</section>

<!-- Grocery Menu Section -->
<section class="grocery-menu">
    <div class="container">
        <h2 class="text-center">Grocery Menu</h2>

        <?php
        $sql = "SELECT * FROM tbl_grocery WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
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
</section>

<?php include('partials-front/footer.php'); ?>