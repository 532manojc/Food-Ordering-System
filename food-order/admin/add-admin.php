<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Add Admin</h1>

    <br><br>
    <?php 
      if(isset($_SESSION['add'])){//checking weather session is set or not
        echo $_SESSION['add'];//displaying the session message is set
        
        unset($_SESSION['add']);//removing the session message
      }
    ?>
    


    <form action="" method="POST">
      <table class="tbl-30">
        <tr>
          <td>Full Name :</td>
          <td>
            <input type="text" name="full_name" placeholder="Enter Your Name">
          </td>
        </tr>
        <tr>
          <td>Username :</td>
          <td>
            <input type="text" name="username" placeholder="Your Username">
          </td>
        </tr>
        <tr>
          <td>Password :</td>
          <td>
            <input type="password" name="password" placeholder="Your Password">
          </td>
        </tr> 
        <tr>
          <td colspan="2">
            <input type="submit" name="submit" value="Add Admin" class="btn-secondary" >
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
  //process the value from form and save it into the database
  //check weather submit button is clicked or not
  if(isset($_POST['submit'])){
    //button clicked
    // echo "button submitted";

    // 1. get the value from the form
    $full_name=$_POST['full_name']; 
    $username=$_POST['username']; 
    $password=md5($_POST['password']); //password encxryption with MD5
    
    // 2. sql query to save data into database
    $sql="INSERT INTO tbl_admin SET
      full_name='$full_name',
      username='$username',
      password='$password'
    ";

    //3. execute the query and saveing data in database

    $res=mysqli_query($conn,$sql) or die(mysqli_error());

    //4. check weather (query is executed ) data is inserted or not and display appropriate message
    if($res==TRUE){
      //data inserted successfully
      // echo "data inserted successfully";
      //creat a session variable to display message
      $_SESSION['add']="<div class='sucess'>admin added sucessfully</div>";

      //redirecting the page to manage-admin
      header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        //data is not inserted
        // echo "data not inserted successfully"; 
        //creat a session variable to display message
        $_SESSION['add']="<div class='error'>Failed to admin added </div>";

        //redirecting the page to manage-admin
        header("location".SITEURL.'admin/add-admin.php');
    }

  }
  
?>