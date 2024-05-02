<?php include('partials/menu.php'); ?>

<div class="main content"> 
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br> <br>

        <a href="add-admin.php" class="btn-primary">Add New Admin</a>
        <br> <br>   

        <?php
        //Checking whether the session is set or not
        if (isset($_SESSION['add'])) 
        {
            //Displaying session message
            echo $_SESSION['add']; 
            //Removing session message
            unset($_SESSION['add']); 
        }

        if (isset($_SESSION['delete'])) 
        {
            echo $_SESSION['delete']; 
            unset($_SESSION['delete']);
        }
        
        if (isset($_SESSION['update'])) 
        {
            echo $_SESSION['update']; 
            unset($_SESSION['update']);
        }
        
        if (isset($_SESSION['user-not-found'])) 
        {
            echo $_SESSION['user-not-found']; 
            unset($_SESSION['user-not-found']);
        } 

        if (isset($_SESSION['pass-not-match'])) 
        {
            echo $_SESSION['pass-not-match']; 
            unset($_SESSION['pass-not-match']);
        } 

        if (isset($_SESSION['change-pass'])) 
        {
            echo $_SESSION['change-pass']; 
            unset($_SESSION['change-pass']);
        } 
        ?> 
        <br/> <br/>  

        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php
            //Create a SQL query to get all admins
            $sql = "SELECT * FROM tbl_admin";

            //Execute the query
            $res = mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if ($res == TRUE) 
            {
                //Count rows to check whether the data is in the database or not
                $count = mysqli_num_rows($res); 
                $sn = 1; //Create a variable and assign the value

                if ($count > 0)
                {
                    while ($rows = mysqli_fetch_assoc($res)) 
                    {
                        //Get individual data
                        $id = $rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows['username'];
                        ?>
                        
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/change-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
                else
                {
                    echo "No data found";
                }
            }
            ?>
        </table>

    </div>
</div>

<?php include('partials/footer.php'); ?>