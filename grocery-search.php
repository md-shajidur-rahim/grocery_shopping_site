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
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="categories.html">Categories</a>
                    </li>
                    <li>
                        <a href="groceries.html">Groceries</a>
                    </li>
                    <li>
                        <a href="#">Contact Info</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Grocery Search Section -->
    <section class="grocery-search text-center">
        <div class="container">
            
            <h2>Groceries On Your Search <a href="#" class="text-white">"Grocery"</a></h2>

        </div>
    </section>

    <!-- Grocery Menu Section -->
    <section class="grocery-menu">
        <div class="container">
            <h2 class="text-center">Grocery Menu</h2>

            <div class="grocery-menu-box">
                <div class="grocery-menu-img">
                    <img src="images/menu-fruits-1.jpg" alt="Mixed Fruits Basket (Small)" class="img-responsive img-curve">
                </div>

                <div class="grocery-menu-desc">
                    <h4>Mixed Fruits Basket (Small)</h4>
                    <p class="grocery-price">$5.0</p>
                    <p class="grocery-detail">
                        Contains mixed fruits in a small basket.
                    </p>
                    <br>

                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="grocery-menu-box">
                <div class="grocery-menu-img">
                    <img src="images/menu-fruits-2.jpg" alt="Mixed Fruits Basket (Large)" class="img-responsive img-curve">
                </div>

                <div class="grocery-menu-desc">
                    <h4>Mixed Fruits Basket (Large)</h4>
                    <p class="grocery-price">$10.0</p>
                    <p class="grocery-detail">
                        Contains mixed fruits in a large basket.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="grocery-menu-box">
                <div class="grocery-menu-img">
                    <img src="images/menu-vegetables-1.jpg" alt="Mixed Vegetables Basket (Small)" class="img-responsive img-curve">
                </div>

                <div class="grocery-menu-desc">
                    <h4>Mixed Vegetables Basket (Small)</h4>
                    <p class="grocery-price">$4.0</p>
                    <p class="grocery-detail">
                        Contains mixed vegetables in a small basket.
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="grocery-menu-box">
                <div class="grocery-menu-img">
                    <img src="images/menu-vegetables-2.JPG" alt="Mixed Vegetables Basket (Large)" class="img-responsive img-curve">
                </div>

                <div class="grocery-menu-desc">
                    <h4>Mixed Vegetables Basket (Large)</h4>
                    <p class="grocery-price">$8.0</p>
                    <p class="grocery-detail">
                        Contains mixed vegetables in a large basket. 
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="grocery-menu-box">
                <div class="grocery-menu-img">
                    <img src="images/menu-dairy-1.jpg" alt="Milk Bottle (1 Litre)" class="img-responsive img-curve">
                </div>

                <div class="grocery-menu-desc">
                    <h4>Milk Bottle (1 Litre)</h4>
                    <p class="grocery-price">$3.0</p>
                    <p class="grocery-detail">
                        Contains fresh milk in one litre bottle.  
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="grocery-menu-box">
                <div class="grocery-menu-img">
                    <img src="images/menu-dairy-2.jpg" alt="One Case Of Egg" class="img-responsive img-curve">
                </div>

                <div class="grocery-menu-desc">
                    <h4>One Case Of Egg</h4>
                    <p class="grocery-price">$2.0</p>
                    <p class="grocery-detail">
                        Contains one dozens of egg in one case. 
                    </p>
                    <br>

                    <a href="#" class="btn btn-primary">Order Now</a>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>

    <!-- Social Media Section -->
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
                </li>
            </ul>
        </div>
    </section>

    <!-- Footer Section -->
    <section class="footer">
        <div class="container text-center">
            <p>All rights reserved. Designed By <a href="#">Md Shajidur Rahim</a></p>
        </div>
    </section>

</body>
</html>