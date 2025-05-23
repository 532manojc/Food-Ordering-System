<?php 
  //authentication and access control
  //check weather user has loginned in  or not
  if(!isset($_SESSION['user'])){//if user sesion is not set
    //user is not loggined in
    //redirect to login page with message

    $_SESSION['no-login-message']="<div class='error text-center'> Please Login to Access login Pannel</div>";

    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');
  }

?>