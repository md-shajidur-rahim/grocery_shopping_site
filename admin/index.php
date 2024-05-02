<?php include('partials/menu.php'); ?>

<!--Main Content Section-->
<div class="main content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br> <br>

        <?php
        if (isset($_SESSION['login'])) 
        {
            echo $_SESSION['login']; 
            unset($_SESSION['login']); 
        }
        ?>

        <div class="col-4 text-center">

        <?php
        $sql1 = "SELECT * FROM tbl_category";
        $res1 = mysqli_query($conn, $sql1);
        $count1 = mysqli_num_rows($res1);
        ?>

            <h1><?php echo $count1; ?></h1>
            <br />
            Total Categories
        </div>

        <div class="col-4 text-center">

        <?php
        $sql2 = "SELECT * FROM tbl_grocery";
        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);
        ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            Total Groceries
        </div>

        <div class="col-4 text-center">

        <?php
        $sql3 = "SELECT * FROM tbl_order";
        $res3 = mysqli_query($conn, $sql3);
        $count3 = mysqli_num_rows($res3);
        ?>

            <h1><?php echo $count3; ?></h1>
            <br />
            Total Orders
        </div>

        <div class="col-4 text-center">

        <?php
        //Create a SQL query to get the total revenue generated from the delivered groceries
        $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
        $res4 = mysqli_query($conn, $sql4);
        $count4 = mysqli_fetch_array($res4);

        //Get the total revenue
        $total_revenue = $count4['Total'];
        ?>

            <h1>$<?php echo $total_revenue; ?></h1>
            <br />
            Total Revenue Generated
        </div>

        <div class="clearfix"></div>

    </div>
</div>

<?php include('partials/footer.php'); ?>