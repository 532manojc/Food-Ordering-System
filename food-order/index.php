<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

            <?php 
                //create sql to display categories from database
                $sql="SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";

                //execute the query
                $res=mysqli_query($conn,$sql);

                //count rows to check weather category is available or not
                $count=mysqli_num_rows($res);

                if($count>0){
                    //category available
                    while($row=mysqli_fetch_assoc($res)){
                        //get id ,title,image_name
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                            <a href="category-foods.html">
                            <div class="box-3 float-container">
                                <!-- check weather image is available or not -->
                                <?php
                                    if($image_name==""){
                                        //display message
                                        echo "<div class='error'>Image No Available</div>";
                                    }
                                    else{
                                        //image is available
                                        ?>
                                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">;
                                        <?php
                                    }
                                ?>
                                

                                <h3 class="float-text text-white"><?php echo $title; ?></h3>
                            </div>
                            </a>
                        <?php
                    }
                }
                else{
                    //category not available
                    echo "<div class='error'>Category Not Added</div>";
                }

            ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            //getting food from database that are active and featured
            //create sql query to get all active food from databse
            $sql2="SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //execute sql
            $res2=mysqli_query($conn,$sql2);

            //count rows
            $count2=mysqli_num_rows($res2);

            //check weather food is available or not
            if($count2>0){
                //food is Avvailable
                while($row2=mysqli_fetch_assoc($res2)){
                    //get id,title,image_name
                    $id=$row2['id'];
                    $title=$row2['title'];
                    $price=$row2['price'];
                    $description=$row2['description'];
                    $image_name=$row2['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            //check weather image is available or not
                            if($image_name==""){
                                //image not available
                                echo "<div class='error'>Image Not Available</div>";
                            }
                            else{
                                //image available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                <?php
                            }
                            ?>
                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price">$<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description ?>
                            </p>
                            <br>

                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else{
                //food not available
                echo "<div class='error'>Food Not Available</div>";
            }
            //
            ?>

        
            <div class="clearfix"></div>


        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    

<?php include('partials-front/footer.php'); ?>