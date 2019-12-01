<!DOCTYPE html>

<?php include('header.php'); ?>
<?php include('menu.php'); ?>
<?php
    // This PHP will find the park of concern by parkid provided in the URL. 
    include('phpfunctions/findparkbyid.php'); 
?> 

<!-- This is the section of object page body, which style defined in the css -->
<div class="wrap-object">
    <div class="object" id="indent">
        
        <!-- Use PHP to fill in the park page's header-->
        <h1 class="acorn-logo"><?php echo $park[0]['parkname']; ?></h1>
        
        <!-- The tags will present the images if the requirement specified by the 'media' attribute are satisfied. -->
        <picture class="acorn-logo" style="float:right">
            <source media="(min-width: 800px)" srcset="assets/acorn_2.jpg">
            <img src="assets/acorn.jpg" alt="acorn">
        </picture>

        <p><a href="submitreview.php" class="buttonReview">Write a review</a></p>

        <h2>General Park Information</h2>

        <!-- Use PHP to fill in general park info -->
        <p><?php echo $park[0]['dsc']; ?></p>

        <!-- This code add a video with width and height we need -->
        <video width="480" height="400" controls>
            <source src="assets/Bruce Peninsula National Park.mp4" type="video/mp4">
            <source src="assets/Bruce Peninsula National Park.ogg" type="video/ogg">
            Your browser does not support the video tag.
        </video>

        <h3>Things to do</h3>
        
        <!-- Use PHP to fill in Things to Do with activities key -->
        <p><?php echo $park[0]['activities']; ?></p>
        
        <h3>Discover</h3>

        <!-- Use PHP to fill in discover with discover key -->
        <p><?php echo $park[0]['discover']; ?></p>
       
        <h3>Park management</h3>

        <!-- Use PHP to fill in park management with parkmgmt key -->
        <p><?php echo $park[0]['parkmgmt']; ?></p>
        
        <h2>Park Location on Google Maps</h2>
        <!-- This code add a map picture with width and height we need -->
        <!-- This code add google mpas of the loction -->
        <div id="map">

            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA64g1CyyNFGJdJj8DxVpjr6Qbe17C89v0&callback=initBruceMap">
            </script>

        </div>
        <address>
            <p>Parks Canada Visitor Centre</p>
            <p>120 Chi sin tib dek Road<br />Box 189<br />Tobermory ON N0H 2R0</p>
        </address>
        <!-- This is the section of rating on the object page, which style defined in the css -->
        <div class="total-review">
            <h2>Visitor Reviews</h2>
        </div>
        <br>
        <!-- This is the section of individual reviews -->
        <div class="indi-review">

            <?php
                // Loop through $reviews to display all user reviews
                foreach ($reviews as $review)
                {
                    // Display name of reviewer
                    $usr = strtok($review['email'], '@');
                    echo '<span class="heading1">'.$usr.'</span>';
                    
                    // Display stars equal to the number of rating
                    for ($x = 0; $x < (int)($review['rating']); $x++)
                    {
                        echo '<span style=font-size:100% class="fa fa-star checked"></span>';
                    }

                    // Reviewer's comments
                    echo "<p>".$review['review']."</p>";
                }
            ?>

        </div>
        <br><br>
        <h3>Add a Rating:</h3>
        <br>
        <select required name="rating">
            <option value="5">5 star</option>
            <option value="4">4 star</option>
            <option value="3">3 star</option>
            <option value="2">2 star</option>
            <option value="1">1 star</option>
        </select>
        <br>
        <h3>Write a Review:</h3>
        <br>
        <textarea required rows="3" cols="50" placeholder="Enter your review of the park" name="review" maxlength="300"></textarea>
    </div>
</div>

<?php include('footer.php') ?>
