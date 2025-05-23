
<?php include('partials/menu.php'); ?>

    <!-- main_section section starts -->
    <div class="main-content">
      <div class="wrapper">
        <h1>Dashboard</h1> 

        <br><br>
        <?php 
    
          if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset($_SESSION['login']);
          }
        
        ?>

        <br><br>
        
        <div class="col-4 text-center">
          <?php
          //create query
          $sql="SELECT * FROM tbl_category";

          //execute category
          $res=mysqli_query($conn,$sql);

          //count rows
          $count=mysqli_num_rows($res);

          ?>
          <h1><?php echo $count; ?></h1>
          <br>
          Category
        </div>

        <div class="col-4 text-center">
          <?php
            //create query
            $sql2="SELECT * FROM tbl_food";

            //execute category
            $res2=mysqli_query($conn,$sql2);

            //count rows
            $count2=mysqli_num_rows($res2);

          ?>
          <h1><?php echo $count2; ?></h1>
          <br>
          Foods
        </div>

        <div class="col-4 text-center">
          <h1>2</h1>
          <br>
          Total Orders
        </div>

        <div class="col-4 text-center">
                  <!-- <?php
                  //create sql query to calculate total revenu generted
                  //aggregate function in sql
                  $sql4="SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                  //execute the mysqli_query
                  $res4=mysqli_query($conn,$sql4);

                  $row4=mysqli_fetch_assoc($res4);

                  $total_revenue=$row4['Total'];
                  ?>

                  <h1><?php echo $total_revenue; ?></h1> -->
          <h1>$ 17</h1>
          <br>
          Revenue Generated
        </div>
        <div class="clearfix"></div>
      </div> 
     </div>
    <!-- main_section section ends -->

    
<?php include('partials/footer.php'); ?>