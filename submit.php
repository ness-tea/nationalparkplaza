<!DOCTYPE html>

<?php 
    include('header.php'); 
    include('menu.php');
?>

<!-- Wrapper for content of the Submit page -->
<div class="wrap-submit">
    <!-- Apply indent styling -->
    <div id="indent"></div>

    <!-- Content-specific definition -->
    <div class="submit-content">
        <h1>Submit a Park</h1>

        <p>If you've come across a park that is not currently on this website, please feel free to add it!</p>

        <!-- Submit attributes -->
        <form name="submitpark" enctype="multipart/form-data" action="phpfunctions/submitpark.php" method="post">

            <!-- Step 1) Enter the park to be submitted -->
            <p>Name of Park:</p>

            <!-- HTML validation - required specified for name field-->
            <!-- Max length of park name input is set to 50 characters -->
            <input required type="text" placeholder="Type a Park name" id="parkname" name="parkname" maxlength="50">
            <br>
            <span style="font-size: 0.8em">Enter the name of the park. E.g. Bruce Peninsula National Park</span>

            <!-- Step 2) Enter park description -->
            <p>Description:</p>

            <!-- HTML validation - required specified for description field-->
            <!-- Max length of park description textarea is set to 50 characters -->
            <textarea required rows="5" cols="50" placeholder="Enter in a description of the park" id="desc" name="desc" maxlength="500"></textarea>
            <br>
            <br>

            <!-- Step 3) Enter the longitude and latitude coordinates of the park -->
            <!-- HTML validation - required specified for coordinate fields-->
            <span style="display: inline-block">
                Longitude:
                <input required id="longitude" type="text" placeholder="0.0000" id="longitude" name="longitude">

                Latitude:
                <input required id="latitude" type="text" placeholder="0.0000" id="latitude" name="latitude">
                <br>
            </span>

            <!-- Button to fill in park coordinates based on user's location using the Geolocation API-->
            <button onclick="getUserLocation()">Get current location</button>

            <br>
            <br>
            Select image to upload:
            <br>
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit-img">
            <br>
            <br>
            Select video to upload:
            <br>
            <input type="file" name="vid" accept="video/*">
            <input type="submit" value="Upload Image" name="submit-vid">
            <br><br>

            <input type="submit" name="submitpark" value="Submit">
            <input type="reset" value="Reset">
        </form>

        <br>
    </div>

    <br><br><br><br>
</div>

<?php include('footer.php') ?>