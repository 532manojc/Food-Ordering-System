<?php

  //include constanta to use "conn"
  include('../config/constants.php');


  // 1. get the id of admin to be deleted
  // echo $id=$_GET['id'];
  $id=$_GET['id'];

  // 2.create the sql query to delete the admin
  $sql="DELETE FROM tbl_admin WHERE id=$id";

  // execute the query
  $res=mysqli_query($conn,$sql);

  //check weather query is executed sucessfully or not
  if($res==TRUE){
    //query executed sucessfully and admin deleted 
    // echo "admin deleted";
    //crate a session variable to display message
    $_SESSION['delete']="<div class='sucess'>Admin Deleted Sucessfully</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
  }
  else{
    //failed to delete admin
    // echo "failed to delete admin";
    //crate a session variable to display message
    $_SESSION['delete']="<div class='error'>Faileed to delete admin</div>";
    //redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');

  }

  // 3 .redirect to message  admin page with message (sucess/error) 

?>