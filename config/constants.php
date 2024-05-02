<?php
//Starting a session
session_start(); 

//Create Constants to store non-repeating values
define('SITEURL', 'http://localhost/grocery_shopping_site/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'grocery_shopping');

//Database connection
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
//Selecting database
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); 