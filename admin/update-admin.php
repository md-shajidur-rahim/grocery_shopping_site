<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br/>

        <?php
        //Get the id of admin to be deleted
        $id = $_GET['id'];

            //Query to get all admins
            $sql = "SELECT * FROM tbl_admin WHERE id=$id";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if ($res == TRUE) 
            {
                //Count rows to check whether the data is in the database or not
                $count = mysqli_num_rows($res); 

                if ($count == 1)
                {
                    $row = mysqli_fetch_assoc($res);

                    //Get individual data
                    $full_name = $row["full_name"];
                    $username = $row["username"];
                }
                else
                {
                    //Redirect to manage admin page
                    header('location:'.SITEURL.'admin/manage-admin.php');
                    exit;
                }
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Userame: </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //SQL query to save the data into the database
    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id = $id;
    ";

    //Execute the query 
    $res = mysqli_query($conn, $sql);

    if($res == TRUE)
    {
        //Create a session variable to display message
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully. </div>";
        //Redirect page to manage admin
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else
    {
        $_SESSION['update'] = "<div class='error'>Failed To Update Admin. </div>";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
}
?>