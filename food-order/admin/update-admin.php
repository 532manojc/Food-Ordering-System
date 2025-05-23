<?php include('partials/menu.php'); ?>

  <div class="main-content">
    <div class="wrapper">
      <h1>Update Admin</h1>

      <br><br>

      <?php 
        //1.get the ID of selected admin
        $id=$_GET['id'];

        //2.create sql query to get the details
        $sql="SELECT * FROM tbl_admin WHERE id=$id";

        //3.execute the query
        $res=mysqli_query($conn,$sql);

        //check weather query is executed or not
        if($res==TRUE){
          //check weather data is available or not 
          $count=mysqli_num_rows($res);

          //check weather we have admin data or not 

          if($count==1){
            //get the details
            // echo "admin available";
            $rows=mysqli_fetch_assoc($res);//it will fetch the details

            $full_name=$rows['full_name'];
            $username=$rows['username'];


          }
          else{
            //redirect manage admin page
            header("location:".SITEURL.'admin/manage-admin.php');
          }
        }
        else{
          //failed to update
          echo "failed to upfdate";
        }


      
      ?>
      
      <form action="" method="POST">
        <table class="tbl-30">
          <tr>
            <td>Full Name :</td>
            <td>
              <input type="text" name="full_name" value="<?php echo $full_name;?>">
            </td>
          </tr>
          <tr>
            <td>Username</td>
            <td>
              <input type="text" name="username" value="<?php echo $username; ?>">
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <input type="hidden" name="id" value="<?php echo $id ; ?>">
              <input type="submit" name="submit"  value="update admin" class="btn-secondary">
              
            </td>
          </tr>

          
        </table>
      </form>
      
    </div>
  </div>

<?php 

  //check weather submit button is clicked or not
  if(isset($_POST['submit'])){
    // echo "buuton clicked";
    //get all values from form to update
    $id=$_POST['id'];
    $full_name=$_POST['full_name'];
    $username=$_POST['username'];


    //create a sql query to update admin
      $sql="UPDATE tbl_admin SET
      full_name='$full_name',
      username='$username'
      WHERE id='$id'
      ";

    //execute the query
      $res=mysqli_query($conn,$sql);

      //check weather query is executed or not
      if($res==TRUE){
        //query executed and admin updated
        //crate a session variable to display message
        $_SESSION['update']="<div class='sucess'>Admin update sucess</div>";

        //redirect to manage admin page 
        header("location:".SITEURL.'admin/manage-admin.php');

      }
      else{
        //update failed
        //crate a session variable to display message
        $_SESSION['update']="<div class='error'>Failed to Update Admin</div> ";

        //redirect to manage admin page 
        header('location:'.SITEURL.'admin/manage-admin.php');

      }


  }

  

?>



<?php include('partials/footer.php'); ?>