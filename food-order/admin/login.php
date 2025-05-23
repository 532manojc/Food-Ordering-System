<?php include('../config/constants.php'); ?> 

<html>
  <head>

    <title>Login - Food Ordering System</title>
    <link rel="stylesheet" href="../css/admin.css">

  </head>

  <body>
    
  <div class="login">
    <h1 class="text-center">Login</h1>
    <br><br>

    <?php 
    
      if(isset($_SESSION['login'])){
        echo $_SESSION['login'];
        unset($_SESSION['login']);
      }

      if(isset($_SESSION['no-login-message'])){
        echo $_SESSION['no-login-message'];
        unset($_SESSION['no-login-message']);
      }
    
    ?>

    <br><br>
    <!-- login form starta here -->
    <form action="" method="POST" class="text-center">
      Username : <br>
      <input class="in" type="text" name="username" placeholder="Enter your username"><br><br>

      Password :  <br>
      <input class="in" type="password" name="password" placeholder="Enter Your Password"><br><br>

      <input type="submit" name="submit" value="login" class="btn-primary">
    </form>


    <!-- login form ends here -->



    <br><br>
    <p class="text-center">Created by - Manoj C</p>
  </div>

  </body>
</html>

<?php 

  //check weather submit button is clicked or not 
  if(isset($_POST['submit'])){
    //1. get the data from login form
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    // 2.sql to check weather username and password exist or not
    $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' ";

    //3. EXECUTE THE SQL QUERY
    $res=mysqli_query($conn,$sql);


    //count rows to check weather user exist or not
    $count=mysqli_num_rows($res);

    if($count==1){
      //user availablle and message login sucess
      //creating session to dispaly message
      $_SESSION['login']="<div class='sucess'>Login Sucess</div>";

      $_SESSION['user']=$username;//to check weather user loginned or not and logout will unset it

      //rediredcting to home page
      header('location:'.SITEURL.'admin/');
    }
    else{
      //user not available and message login failure   
      //creating session to dispaly message
      $_SESSION['login']="<div class='error text-center'>Failed to Login </div>";

      //rediredcting to login page when login fails
      header('location:'.SITEURL.'admin/login.php');
    }


  }

?> 