<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- For making website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grocery Shopping Website</title>
    <!-- Linking the CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navigation bar Section -->
    <section class="navbar">
        <div class="container">
            <div class="logo"> <!-- display the logo -->
                <a href="#" title="Logo">
                    <img src="images/logo.JPG" alt="Grocery Shopping Logo" class="img-responsive">
                    <!-- the logo will be limited in the border -->
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>groceries.php">Groceries</a>
                    </li>
                    <li>
                        <a href="#">Contact Info</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>