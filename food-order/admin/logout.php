<?php 

  //include constanta.php for SITERL to work
  include('../config/constants.php');

  //1. destroy the session 
  session_destroy();

  // 2.redirect to login page
  header('location:'.SITEURL.'admin/login.php');


?>