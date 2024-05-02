<?php include('partials/menu.php'); ?>

<div class="main content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br> <br>

        <?php
        if (isset($_GET['id'])) { 
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Current Password: </td>
                    <td>
                        <input type="password" name="current_password" placeholder="Current Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>


                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="Confirm">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-primary">
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php
//Submit button clicked

if (isset($_POST['submit'])) {

    //Get the data from the form
    $id = $_POST['id'];

    //Password encrypted with MD5
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //Query to get all admins
    $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'"; //Here id 

    //Execute the query 
    $res = mysqli_query($conn, $sql);

    if ($res == TRUE) {
        //Count rows to check whether the data is in the database or not
        $count = mysqli_num_rows($res); 

        if ($count == 1) {

            //User exists and password can be changed
            if ($confirm_password == $new_password) {

                //Update the password
                $sql2 = "UPDATE tbl_admin SET
                password = '$new_password'
                WHERE id = $id
                ";

                //Execute the new query 
                $res2 = mysqli_query($conn, $sql2); 

                if ($res2 == true) {

                    //Create a session variable to display message
                    $_SESSION['change-pass'] = "<div class = 'success'>Password Changed Successfully. </div>";
                    
                    //Redirect page to manage admin
                    header("location:".SITEURL.'admin/manage-admin.php');
                } 
                else 
                {
                    $_SESSION['change-pass'] = "<div class = 'error'>Failed To Change Password. </div>";
                    header("location:".SITEURL.'admin/manage-admin.php');
                }
            } 
            else 
            {
                $_SESSION['pass-not-match'] = "<div class = 'error'>Password Do Not Match. </div>";               
                header("location:".SITEURL.'admin/manage-admin.php');
            }
        } 
        else 
        {
            $_SESSION['user-not-found'] = "<div class = 'error'>User Not Found. </div>";
            header("location:".SITEURL.'admin/manage-admin.php');
        }
    }
    //ch
}
?>

<?php include('partials/footer.php'); ?>