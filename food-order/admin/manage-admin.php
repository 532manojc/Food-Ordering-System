<?php include('partials/menu.php'); ?>

    <!-- main_section section starts -->
    <div class="main-content">
      <div class="wrapper">
        <h1>Manage admin</h1> 
        <br>

        <?php
          if(isset($_SESSION['add'])){
            echo $_SESSION['add'];//dispalying session message
            unset($_SESSION['add']);//removing the seeion message
          }
          

          if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];  //displaying session message
            unset($_SESSION['delete']);//removing the session message
          }

          if(isset($_SESSION['update'])){
            echo $_SESSION['update']; //displaying session message
            unset($_SESSION['update']);//removing session message
          }

          if(isset($_SESSION['user-not-found'])){
            echo $_SESSION['user-not-found'];
            unset($_SESSION['user-not-found']);
          }
          
          if(isset($_SESSION['pwd-not-match'])){
            echo $_SESSION['pwd-not-match'];
            unset($_SESSION['pwd-not-match']);
          }

          if(isset($_SESSION['change-pwd'])){
            echo $_SESSION['change-pwd'];
            unset($_SESSION['change-pwd']);
          }
        ?>
        
        <br><br>

        <!-- bytton for creating admin -->
        <a href="add-admin.php" class="btn-primary"> Add Admin</a>
        <br><br><br>

        <table class="tbl-full">
          <tr>
            <th>S.No</th>
            <th>Full_name</th>
            <th>username</th>
            <th>Actions</th>
          </tr>


          <?php 
            //query to execute all admin
            $sql= "SELECT * FROM tbl_admin";

            //execute the query
            $res=mysqli_query($conn,$sql);

            //check weather query is executed or not
            if($res==TRUE){
              //count the rows to check weather we have data in database or not
              $count=mysqli_num_rows($res);

              $sn=1;//create a variable and assign the value

              //check the num of rows
              if($count>0){
                //data is there in database
                while($rows=mysqli_fetch_assoc($res))
                {
                  //using while loop to get all data fron database
                  // and while loop will run as long as there is data in database 

                  //get individual data
                  $id=$rows['id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];

                  //displaying the value in our table
                  ?>

                    <tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $full_name ?></td>
                        <td><?php echo $username ?></td>
                        <td>
                          <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id ; ?>" class="btn-primary">Change Password</a>
                          <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                          <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                          
                          
                        </td>
                    </tr>

                  <?php
                }
              }
              else{
                //there is no data in database
              }
            }
          ?>



          
        </table>
        
      </div> 
     </div>
    <!-- main_section section ends -->

<?php include('partials/footer.php'); ?>