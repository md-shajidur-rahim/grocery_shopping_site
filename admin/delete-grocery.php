<?php include('../config/constants.php'); 

//Check whether the id and image_name value is set or not
if(isset($_GET['id']) AND isset($_GET['image_name'])) { //&&
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //Check whether the image is available or not
    if($image_name != ""){
        $path = "../images/grocery/".$image_name;
        $remove = unlink($path);

        //Check whether the image is removed or not
        if($remove == false) {
            $_SESSION['upload'] = "<div class='error'>Failed To Remove Grocery Image. </div>";
            header('location:'.SITEURL.'admin/manage-grocery.php');
            die();
        }
    }

    //Delete grocery from database
    $sql = "DELETE FROM tbl_grocery WHERE id=$id";
    $res = mysqli_query($conn, $sql); 

    //Check whether the query executed or not
    if ($res == true) {
        $_SESSION['delete'] = "<div class='success'>Grocery Deleted Successfully. </div>";
        header('location:'.SITEURL.'admin/manage-grocery.php');
    } 
    else {
        $_SESSION['delete'] = "<div class='error'>Failed To Delete Grocery. </div>";
        header('location:'.SITEURL.'admin/manage-grocery.php');
    }
}
else {
    $_SESSION['unauthorized'] = "<div class='error'>Unauthorized Access. </div>";
    header('location:'.SITEURL.'admin/manage-grocery.php');
}