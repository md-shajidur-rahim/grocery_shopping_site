<?php include('partials-front/menu.php'); ?>

    <!-- Grocery Search Section -->
    <section class="grocery-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Selected Grocery</legend>

                    <div class="grocery-menu-img">
                        <img src="images/menu-fruits-1.jpg" alt="Mixed Fruits Basket (Small)" class="img-responsive img-curve">
                    </div>
    
                    <div class="grocery-menu-desc">
                        <h3>Mixed Fruits Basket (Small)</h3>
                        <p class="grocery-price">$5.0</p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>
                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g: First_name Surname" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g: 01xxxxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g: name@mail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g: State, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
            </form>

        </div>
    </section>

<?php include('partials-front/footer.php'); ?>