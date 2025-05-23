<?php
  //include constants.php
  include('../config/constants.php');
// echo "hgbcsh;";
  if(isset($_GET['id']) AND isset($_GET['image_name'])){
    //process to delete
    // echo "process to delete";

    //1.get ID and image name
    $id=$_GET['id'];
    $image_name=$_GET['image_name'];

    //2.remove image if available
    //check weather image is available or not and delete only if available
    if($image_name != ""){
      //we have image and remove it from folder
      //get the image path
      $path="../images/food/".$image_name;

      //remove image from folder
      $remove=unlink($path);

      //check weather image is removed or not
      if($remove==FALSE){
        //failed to remove the image
        $_SESSION['upload']="<div class='error'>Failed to Remove Image File</div>";
        //redirect to manage food
        header('location:'.SITEURL.'admin/manage-food.php');
        //stop the proces
        die(); 
      }
      else{

      }
    }


    //3.delete food from database
    // ..create the query
    $sql="DELETE FROM tbl_food WHERE id=$id";

    //executr the query
    $res=mysqli_query($conn,$sql);

    //check weather query is executed or not and set session message respectively
    //4.redirect to manage food with session message
    if($res==TRUE){
      //food deleted
      $_SESSION['delete']="<div class='sucess'>Food Deleted Sucessfully</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
    }
    else{
      //failed to delete food
      $_SESSION['delete']="<div class='error'>Failed to Delete Food</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
    }

    


  }
  else{
    //redirect to manage food page
    $_SESSION['unauthorize']="<div class='error'>Unauthorized Access</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
  }
?>