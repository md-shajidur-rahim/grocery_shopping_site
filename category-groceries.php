<?php include('partials-front/menu.php'); ?>

<?php
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $sql = "SELECT title FROM tbl_category WHERE id='$category_id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    $category_title = $row['title'];
} 
else {
    header('location:'.SITEURL);
    exit();
}
?>

<!-- Grocery Search Section -->
<section class="grocery-search text-center">
    <div class="container">

        <h2>Groceries on <a href="#" class="text-white">"Category"</a></h2>

    </div>
</section>

<!-- Grocery Menu Section -->
<section class="grocery-menu">
    <div class="container">
        <h2 class="text-center">Grocery Menu</h2>

        <?php
        $sql2 = "SELECT * FROM tbl_category WHERE category_id='$category_id'";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if ($count2 > 0) {
            while ($row2 = mysqli_fetch_assoc($res2)) {
                $id = $row2['id'];
                $title = $row2['title'];
                $price = $row2['price'];
                $description = $row2['description'];
                $image_name = $row2['image_name'];
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

<?php include('partials-front/footer.php'); ?>