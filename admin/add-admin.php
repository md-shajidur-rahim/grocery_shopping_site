<?php include('partials/menu.php'); ?>

<div class="main content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br> 

        <?php
        //Checking whether the session is set or not
        if (isset($_SESSION['add'])) 
        {
            //Displaying session message
            echo $_SESSION['add']; 
            //Removing session message
            unset($_SESSION['add']); 
        }
        ?> 
        <br> <br>  

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>

                <tr>
                    <td>Userame: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" placeholder="Enter your password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
//Submit button clicked
if (isset($_POST['submit'])) {

    //Get the data from the form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //Password encrypted with MD5
    $password = md5($_POST['password']); 

    //SQL query to save the data into the database
    $sql = "INSERT INTO tbl_admin SET
    full_name = '$full_name',
    username = '$username',
    password = '$password'
    ";

    //Execute the query and save data in the database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if($res == TRUE)
    {
        //Create a session variable to display message
        $_SESSION['add'] = "Admin Added Successfully";

        //Redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['add'] = "Failed To Add Admin";
        header("location:".SITEURL.'admin/add-admin.php');
    }
}
?>