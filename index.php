<!DOCTYPE html>

<?php 
    include('header.php');
    include('menu.php');
?>

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
                <p>Search by Name:</p>
                <!-- Make a search box for searching a park by name -->
                <form action="search.php" method="post">
                    <input type="buttom" placeholder="Search..." id="name" name="name">
                </form>
            </div>

            <!-- Put next 2 search queries in line -->
            <div class="search-inline">
                <p>Search by Rating:</p>
                <!-- Adds a drop-down for searching a park by rating -->
                <form action="search.php" method="post">
                    <div class="styled">
                        <select id="rating" name="rating" onchange="this.form.submit()">
                            <option disabled selected value>Select star...</option>
                            <option value="5">5 star</option>
                            <option value="4">4 star</option>
                            <option value="3">3 star</option>
                            <option value="2">2 star</option>
                            <option value="1">1 star</option>
                        </select>
                    </div>
                </form>
                <br>
            </div>

            <div class="search-inline">
                <p>Search by Location:</p>
                <form action="search.php" method="post">
                    <button type="submit" id="location" name="location" value="">Find Near Me</button>
                    <script>
                        var elem = document.getElementById("location");
                        elem.value = getLocation();
                    </script>
                </form>
                <p id="find-me"></p>
            </div>


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
<?php include('footer.php'); ?>
