<?php 
include('../config/constants.php'); 
include('login-check.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <!-- For making website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Shopping Website-Admin</title>

    <!-- Linking the CSS file -->
    <link rel="stylesheet" href="../css/admin.css">
</head>


<body>

    <section class="navbar">
        <div class="container">

            <!-- display the logo -->
            <div class="logo"> 
                <a href="#" title="Logo">
                    <img src="../images/logo.JPG" alt="Grocery Shopping Logo" class="img-responsive">
                </a>
            </div>

    <!--Menu Section-->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="<?php echo SITEURL; ?>">Home</a></li>
                <li><a href="index.php">Admin Dashboard</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-grocery.php">Grocery</a></li>
                <li><a href="manage-order.php">Order</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>

        </div>
    </div>
    
    </div>
</section>