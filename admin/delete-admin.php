<?php include('../config/constants.php');

//Get the id of admin to be deleted
$id = $_GET['id'];

//Create SQL query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

$res = mysqli_query($conn, $sql); //Execute the query

//Check whether the query executed successfully or not
if ($res == true) {
    
    //Create session variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully. </div>";

    //Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
} 
else {
    $_SESSION['delete'] = "<div class='error'>Failed To Delete Admin. </div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}