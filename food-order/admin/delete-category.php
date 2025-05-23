<?php 
//include constants.php
  include('../config/constants.php');
  //check weather id and Image_name is set or not
  if(isset($_GET['id']) AND isset($_GET['image_name'])){
    //get the value and delete
    // echo "get the value and delete";

    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    //remove image file if available
    if($image_name != ""){
      //image is available so remove it
      $path="../images/category/".$image_name ;

      //remove the image
      $remove=unlink($path);

      //if failed to remove image add error message and stop process
      if($remove==FALSE){
        //set the session message
        //redirect to manahe-category
        //stop the process
        $_SESSION['remove']="<div class='error'>Failes to remove category image</div>";

        header('location:'.SITEURL.'admin/manage-category.php');

        die();
      }
    }

    //delete data fro database
    //sql query to delete data from database
    $sql="DELETE FROM tbl_category WHERE id=$id";

    //execute the query
    $res=mysqli_query($conn,$sql);

    //check weather data is deleted from database or not
    if($res==TRUE){
      //set sucess message and redirect
      $_SESSION['delete']="<div class='sucess'>Category deleted sucessfully</div>";

      header('location:'.SITEURL.'admin/manage-category.php');
    }
    else{
       //set failure message and redirect
       $_SESSION['delete']="<div class='error'>Failed to delete Category </div>";

      header('location:'.SITEURL.'admin/manage-category.php');
    }
    


  }
  else{
    //redirect to manage vategory pade
    header('location:'.SITEURL.'admin/manage-category.php');
  }


?>