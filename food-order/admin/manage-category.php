<?php include('partials/menu.php'); ?>

<div class="main-content">
  <div class="wrapper">
    <h1>Manage Category</h1>
  
    <br><br><br>
      <?php 
      
        if(isset($_SESSION['add'])){
          echo $_SESSION['add'];//display session message
          unset($_SESSION['add']);//remove the session message
        }

        if(isset($_SESSION['remove'])){
          echo $_SESSION['remove'];//display session message
          unset($_SESSION['remove']);//remove the session message
        }

        if(isset($_SESSION['delete'])){
          echo $_SESSION['delete'];//display session message
          unset($_SESSION['delete']);//remove the session message
        }

        if(isset($_SESSION['no-category-found'])){
          echo $_SESSION['no-category-found'];//display session message
          unset($_SESSION['no-category-found']);//remove the session message
        }

        if(isset($_SESSION['update'])){
          echo $_SESSION['update'];//display session message
          unset($_SESSION['update']);//remove the session message
        }

        if(isset($_SESSION['upload'])){
          echo $_SESSION['upload'];//display session message
          unset($_SESSION['upload']);//remove the session message
        }

        if(isset($_SESSION['failed-remove'])){
          echo $_SESSION['failed-remove'];//display session message
          unset($_SESSION['failed-remove']);//remove the session message
        }


      ?>
      <br><br>

        <!-- bytton for creating admin -->
        <a href="<?php echo SITEURL ;?>admin/add-category.php" class="btn-primary"> Add Category</a>
        <br><br><br>

        <table class="tbl-full">
          <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
          </tr>


          <?php 
            //query to get all category from database
            $sql="SELECT * FROM tbl_category";

            //execute the query
            $res=mysqli_query($conn,$sql);

            //count rows
            $count=mysqli_num_rows($res);

            $sn=1;//create a variable and assign the value

            //check weather data is in database or not
            if($count>0){
              //data is pesent in databse
              // get the data an display
              while($row=mysqli_fetch_assoc($res)){
                $id=$row['id'];
                $title=$row['title'];
                $image_name=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];

                ?>
                
                <tr>
                  <td><?php echo $sn++ ?></td>
                  <td><?php echo $title; ?> </td>


                  <td>
                    <?php 
                       //check weather image name if available or not
                       if($image_name != ""){
                        //display image name
                        ?>
                        <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?> " width="100px">
                        <?php
                          echo $image_name;
                       }
                       else{
                        //display message
                        echo "<div class='error'>No Image Added</div>";
                       }
                    ?>
                  </td>


                  <td><?php echo $featured; ?></td>
                  <td><?php echo $active; ?></td>
                  <td>
                    <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id; ?>" class="btn-secondary">Update Category</a>
                    <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger">Delete Category</a>
                  </td>
                </tr>


                <?php
              }
            }
            else{
              //data is not present in datbase
              //display the message inside the table
              ?>
              <tr>
                <td colspan="6"><div class="error">No Category Added</div></td>
              </tr>
              <?php
            }
          
          
          ?>

          
          
        </table>
  </div>
</div>



<?php include('partials/footer.php'); ?>

