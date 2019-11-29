<!DOCTYPE html>

<?php include('header.php'); ?>

<body>
    <!-- This is the header, which style defined in the css -->
    <div class="header">
        <?php include('menu.php'); ?>
    </div>

    <hr class="divider">

    <!-- This is the section of search page body, which style defined in the css -->
    <div class="wrap-search">
        <div id="indent"></div>
        <!-- This is the section of search form, which style defined in the css -->
        <div class="search-content">
            <!-- This is the page header -->
            <h1>Find a National Park</h1>
            <!-- This is the section of the search box -->
            <div class="search-container">
                <!-- This is the section of search by name box -->
                <!-- Shows prompt before the search box -->
                <p>Please enter the Park name you want to search.</p>
                <!-- This code makes a search box -->
                <form>
                    <!-- This code makes show word "Search..." in search box -->
                    <input type="buttom" placeholder="Search..." name="search">
                    <!-- This code makes a submit buttom after search box -->
                </form>

            </div>
            <br>
            <p id="find-me">Search By Your Location：</p>
            <!-- Add a buttom which can be click and call the getLocation() function -->
            <button onclick="getLocation()">Find park near me</button>

            <div class="picture">
                <picture>
                    <!-- The tags will present the images if the requirement specified by the 'media' attribute are satisfied. -->
                    <source media="(min-width: 800px)" srcset="assets/search-tree-4.jpg">
                    <source media="(min-width: 470px)" srcset="assets/search-tree-3.jpg">
                    <!-- This image that will be shown if the 'media' conditions for both sources above can not be satisfied, or if support for tag is not available on the browser.-->
                    <img src="assets/search-tree.jpg" alt="Tree Logo">
                </picture>
            </div>
        </div>
    </div>
    <!-- This is the section of footer, which style defined in the css -->
    <div class="footer">
        <footer>
            <!-- This code makes a contact infor box in the footer section on each pages-->
            <h1 class="footer-title"><b>Contact Information</b></h1>
            <p>
                Jiuwei Wang <a href="mailto:wangj160@mcmaster.ca">wangj160@mcmaster.ca</a>,
                Vanessa Truong <a href="mailto:truonv1@mcmaster.ca">truonv1@mcmaster.ca</a>
            </p>
        </footer>
    </div>

</body>

</html>
