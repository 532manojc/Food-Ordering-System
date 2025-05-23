<?php include('partials/menu.php');?>

<div class="main-content">
  <div class="wrapper">
    <h1>Update Password</h1>
    <br><br>


    <!-- getting the id -->
    <?php 
      if(isset($_GET['id'])){
        $id=$_GET['id'];
      }
    
    ?>

    <form action="" method="POST">

      <table class="tbl-30">
        <tr>
          <td>Current Password :</td>
          <td>
            <input type="password" name="current_password" placeholder="Enter Current Password">
          </td>
        </tr>

        <tr>
          <td>New Password :</td>
          <td>
            <input type="password" name="new_password" placeholder="Enter new password">

          </td>
        </tr>

        <tr>
          <td>Confirm Password :</td>
          <td>
            <input type="password" name="confirm_password" placeholder="Confirm password">
          </td>
        </tr>

        <tr>
          <td colspan="2">
            <input type="hidden" name="id" value="<?php echo $id ; ?>">
            <input type="submit" name="submit" value="Change password" class="btn-secondary">
          </td>
        </tr>

      </table>
    </form>


  </div>
</div>


<?php 

  //check weather submit button is clicked or not

  if(isset($_POST['submit'])){
    // echo "clicked ";
    // 1.get the data from form
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);

    // 2. check weather the user with current user id and password exist or not
    $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    //execute the query
    $res=mysqli_query($conn,$sql);

    //check weather query is executed or not
    if($res==TRUE){

      //check weather data is available or not
      $count=mysqli_num_rows($res);

      if($count==1){
        //user exist and password can be changed
        // echo "user found";
        
        //check weather new password and conform password match or not
        if($new_password==$confirm_password){
          //update password
          // echo "password match";
          $sql2="UPDATE tbl_admin SET
              password='$new_password'
              WHERE id=$id; 
          ";

          //execute the query
          $res2=mysqli_query($conn,$sql2);

          //check weather qyery is executed or not
          if($res2==TRUE){
            //dispaly sucess message
            //redirect page to manage admin with sucess message
            $_SESSION['change-pwd']="<div class='sucess'>Password changes sucessfylly</div>";

            //redirect to manage admin
            header('location:'.SITEURL.'admin/manage-admin.php');
          }
          else{
            //display error message
            //redirect page to manage admin with error message
            $_SESSION['change-pwd']="<div class='error'>Failed To Change Password</div>";

            //redirect to manage admin
            header('location:'.SITEURL.'admin/manage-admin.php');
            
          }
        }
        else{
          //redirect page to manage admin with error message
          $_SESSION['pwd-not-match']="<div class='error'>Password did not Match</div>";

          //redirect to manage admin
          header('location:'.SITEURL.'admin/manage-admin.php');
        }
      }
      else{
        //user does not exist so set message and redirect
        $_SESSION['user-not-found']="<div class='error'>User Not Found</div>";

        //redirect to manage admin
        header('location:'.SITEURL.'admin/manage-admin.php');
      }
    }
    

    //3. check weather new password and confirm password match or not

    //4. change password if all above is true
  }

?>




<?php include('partials/footer.php');?>