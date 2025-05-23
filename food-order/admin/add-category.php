<?php include('partials/menu.php');?>

  <div class="main-content">
    <div class="wrapper">
      <h1>Add Category</h1>

      <br>

      <?php 
      
        if(isset($_SESSION['add'])){
          echo $_SESSION['add'];//display session message
          unset($_SESSION['add']);//remove the session message
        }

        if(isset($_SESSION['upload'])){
          echo $_SESSION['upload'];//display session message
          unset($_SESSION['upload']);//remove the session message
        }

      ?>
      <br>
      <!-- add category form starts-->

      <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-40">
          <tr>
            <td>Title :</td>
            <td>
              <input type="text" name="title" placeholder="Category title">

            </td>
          </tr>

          <tr>
            <td>Select Image :</td>
            <td>
              <input type="file" name="image" >
            </td>
          </tr>

          <tr>
            <td>Featured :</td>
            <td>
              <input type="radio" name="featured" value="Yes">Yes
              <input type="radio" name="featured" value="No">No
            </td>
          </tr>

          

          <tr>
            <td>Active :</td>
            <td>
              <input type="radio" name="active" value="Yes">Yes
              <input type="radio" name="active" value="No">No
            </td>
          </tr>

          <tr>
            <td colspan="2">
              <input type="submit" name="submit" value="Add Category" class="btn-secondary">
            </td>
          </tr>

        </table>
      </form>
      <!-- add category form ends-->

      <?php 
      
      //check weather submit butto is clicked or not
      if(isset($_POST['submit'])){
        // echo "clicked";

        //1.get the values from form
        $title=$_POST['title'];

        //for radio input type we need to check weather button is selected or not
        if(isset($_POST['featured'])){
          //get the value from form
          $featured=$_POST['featured'];
        }
        else{
          //set the default value
          $featured="No";
        }

        if(isset($_POST['active'])){
          //get the value from form
          $active=$_POST['active'];
        }
        else{
          //set the default value
          $active ="No";
        }

        //check weather image is selected or not and set the value name for image name accordingly
        // print_r($_FILES['image']);

        // die();//break the code here
        if(isset($_FILES['image']['name'])){
            //upload the image
            //to upload the image we need image name and source path and destination path
            $image_name=$_FILES['image']['name'];

            //upload image  only if image is selected
            if($image_name != ""){

            

              //auto rename the image
              //get the extension of our image(jpg,png,gif etc...)
              $ext=end(explode('.',$image_name));

              //rename the image
              $image_name="Food_category_".rand(000,999).'.'.$ext;

              $source_path=$_FILES['image']['tmp_name'];

              $destination_path="../images/category/".$image_name;

              //finally upload the image
              $upload=move_uploaded_file($source_path,$destination_path);

              //check weather image is uploaded or not
              //if image is not uploaded then we will stop the process and redirect with error message
              if($upload==FALSE){
                //set the error message
                $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                //redirect to add category
                header('location:'.SITEURL.'admin/add-category.php');
                //stop the process
                die();
              }
          }
        }
        
        else{
          //dont upload the image and set the image_name value blank
          $image_name="";
        }


          //2. create a sql query to insert category into database
          $sql="INSERT INTO tbl_category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
          ";

          //3. execute the query and save in database
          $res=mysqli_query($conn,$sql);

          //4.check weather query is executed or not and data added or not
          if($res==TRUE){
            //query executed and category added
            $_SESSION['add']="<div class='sucess'>Category Added Sucessfully</div>";
            //redirect to manage caregory page
            header('location:'.SITEURL.'admin/manage-category.php');
          }
          else{
            //Failed to add category
            $_SESSION['add']="<div class='error'>Failed to Add Category </div>";
            //redirect to manage caregory page
            header('location:'.SITEURL.'admin/add-category.php');
          }


      }
      
      ?>
    </div>
  </div>




<?php include('partials/footer.php');?>