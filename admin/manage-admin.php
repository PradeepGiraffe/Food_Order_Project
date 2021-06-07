<?php include('partials/menu.php'); ?>


<!-- Main Content -->
<div class="main-content">
  <div class="wrapper">
    <h1>Manage Admin</h1>
    <br>

<?php

if(isset($_SESSION['add']))
{
  echo $_SESSION['add'];// Display session message
  unset($_SESSION['add']);// Removing session message
}

if(isset($_SESSION['delete']))
{
  echo $_SESSION['delete'];
  unset($_SESSION['delete']);
}

if(isset($_SESSION['update']))
{
  echo $_SESSION['update'];
  unset($_SESSION['update']);
}

if(isset($_SESSION['user-not-found']))
{
  echo $_SESSION['user-not-found'];
  unset($_SESSION['user-not-found']);
}

if(isset($_SESSION['pwd-not-match']))
{
  echo $_SESSION['pwd-not-match'];
  unset($_SESSION['pwd-not-match']);
}

if(isset($_SESSION['change-pwd']))
{
  echo $_SESSION['change-pwd'];
  unset($_SESSION['change-pwd']);
}

?>

<br>
<br>


    <a href="add-admin.php" class="btn">Add Admin</a>
     <br>
     <br/>

    <table>
    <tr>
    <th>S.N.</th>
    <th>Full Name</th>
    <th>User Name</th>
    <th>Action</th>
    </tr>


    <?php
    // Query to get all data
    $sql = "SELECT * FROM tbl_admin";
    // Execute the query
    $res = mysqli_query($conn, $sql);

    //Check whether the query is executed or not
       if($res==TRUE)
       {
         // Count rows to check whether we have data on database or not
         $count = mysqli_num_rows($res);// Function to get all the rows to database
         
         $sn=1; // create a variable and assign the value 
         // Check th num of rows
         if($count>0)
         {

          // we have data in database
          while($rows=mysqli_fetch_assoc($res))
          {

            // using while loop to get all the data from database
            // and while loop will run as long as we have data in database

            //get individual  data
            $id=$rows['id'];
            $full_name=$rows['full_name'];
            $username=$rows['username'];

            //Display the values in our table
            ?>

<tr>
<td><?php echo $sn++; ?>. </td>
<td><?php echo $full_name; ?></td>
<td><?php echo $username; ?></td>
<td>

    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-update">Change Password</a>
    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-update">Update Admin</a>
    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-delete">Delete Admin</a>
</td>
</tr>

            <?php
          }

         }
         else{
           //we don't have data in database
         }
       }

    ?>

    </table>
  </div>
</div>

<!-- Footer Section  -->
<?php include('partials/footer.php'); ?>