<?php include('partials-front/menu.php'); ?>

<?php 
//Check whether grocery id is set or not
if (isset($_GET['grocery_id'])) {

    //Get the grocery id and details of the selected grocery
    $grocery_id = $_GET['grocery_id'];

    $sql = "SELECT * FROM tbl_grocery WHERE id=$grocery_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } 

    else {
        header('location:'.SITEURL);
    }
} 

else {
    header('location:'.SITEURL);
}
?>

<!-- Grocery Search Section -->
<section class="grocery-search">
    <div class="container">

        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Grocery</legend>

                <div class="grocery-menu-img">
                    <?php
                    if ($image_name == "") {
                        echo "<div class='error'>Image Not Available. </div>";
                    } 
                    else {
                        ?>
                        <img src="<?php echo SITEURL; ?>images/grocery/<?php echo $image_name; ?>" alt="Groceries" class="img-responsive img-curve">
                        <?php
                    }
                    ?>
                </div>

                <div class="grocery-menu-desc">
                    <h3><?php echo $title ?></h3>
                    <input type="hidden" name="grocery" value="<?php echo $title ?>">

                    <p class="grocery-price"><?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>

                </div>
            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g: First_name Surname" class="input-responsive"
                    required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g: 01xxxxxxxxx" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g: name@mail.com" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g: State, City, Country" class="input-responsive"
                    required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

            <?php
            if (isset($_POST["submit"])) {
                $grocery = $_POST['grocery'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                $total = $price * $qty;
                $order_date = date('Y-m-d H:i:s');
                $status = "Ordered";

                $customer_name = $_POST['full_name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                $sql2 = "INSERT INTO tbl_order SET
                grocery = '$grocery',
                price = $price,
                qty = $qty,
                total = $total,
                order_date = '$order_date',
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address'
                ";

                $res2 = mysqli_query($conn, $sql2);

                if ($res2 == true) {
                    $_SESSION['order'] = "<div class='success text-center'>Grocery Ordered Successfully. </div>";
                    header('location:'.SITEURL);
                } 
                else {
                    $_SESSION['order'] = "<div class='error text-center'>Failed to Order Grocery. </div>";
                    header('location:'.SITEURL);
                }
            } 
            ?>
        </form>

    </div>
</section>

<?php include('partials-front/footer.php'); ?>