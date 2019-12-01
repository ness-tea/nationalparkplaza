<!DOCTYPE html>
<?php

// Database access credentials
$servername = "nationalparkplazadb.cjpr4ybdu2p3.us-east-2.rds.amazonaws.com";
$username = "truonv1";
$password = "12345678";
$dbname = "nationalparkplaza";

// Reformat parkname input to only contain relevant keywords
$pname = str_ireplace("park", "", $_POST['name']);    // Remove any instances of park
$pname = str_ireplace("national", "", $pname);      // Remove any instances of national
$search_name = ucwords(strtolower(trim($pname)));  // Trim leading/following white spaces, convert string to lowercase, then capitlize first letter of every word.

// Store user input if searched by rating
// Because we are using submit onclick for rating search, store the URL as a string first and
// extract last char for the rating
$url = "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$search_rating = substr($url,-1);

try {
    // Connect to the SQL databse using PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if user is searching by park name or by rating.
    if (isset($_POST['name']))
    {   
        // User is searching by park name.
        $query = "SELECT * FROM Parks";
        $stmt = $conn->prepare($query);
        $stmt->execute(trim($search_name));

        $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        print_r($data);
    }
    else
    {
        // User is searching by park rating.
        echo "Searching by rating.";
    } 

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

?>

<?php
    include('header.php');
    include('menu.php');
?>

<!-- This is the section of results page body, which style defined in the css -->
<div class="wrap-results">
    <div class="main" id="indent">

        <h1>List of National Parks</h1>
        <!-- This is the section of results table, which style defined in the css -->
        <div class="results-table">
            <!-- Embedding a live map using Javascript -->
            <div id="map">
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA64g1CyyNFGJdJj8DxVpjr6Qbe17C89v0&callback=initResultsMap"></script>
            </div>
            <br /><br />

            <table>
                <col width="10">
                <col width="5">
                <col width="300">
                <!-- Each table row is defined with the <tr> tag. -->
                <tr>
                    <!-- A table header is defined with the <th> tag. -->
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Information</th>
                </tr>
                <tr>
                    <!-- A table data/cell is defined with the <td> tag. -->

                    <td>
                        <!-- This code links to the detailed object page. -->
                        <h4><a href="object1.html">Bruce Peninsula National Park</a></h4>
                    </td>
                    <td>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                    </td>
                    <td>Bruce Peninsula National Park beckons hikers to travel woodland trails, swimmers to refresh in clear waters, explorers to discover the rugged limestone coast and campers to revel at a stunning night sky.</td>
                </tr>
                <tr>
                    <!-- This code add a picture in the <td> tag. -->

                    <td>
                        <!-- This code links to the detailed object page. -->
                        <h4><a href="object2.html">Georgian Bay Islands National Park</a></h4>
                    </td>
                    <td>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                    </td>
                    <td>Swim in Lake Huron’s clear waters. Cycle wooded island trails. Hike paths that meander between ecosystems. Unwind at a cosy cabin. Welcome to an inspiring and beautiful place. Welcome to Georgian Bay Islands National Park.</td>
                </tr>
                <tr>

                    <td>
                        <!-- This code links to the detailed object page. -->
                        <h4><a href="object3.html">Point Pelee National Park</a></h4>
                    </td>
                    <td>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                        <span style=font-size:100% class="fa fa-star checked"></span>
                    </td>
                    <td>Canada’s second smallest but most diverse national park, Point Pelee’s forest hosts diverse habitats that provide a sanctuary for plants and animals rarely found elsewhere in the country and the nature lovers who enjoy it.</td>
                </tr>
            </table>

        </div>

    </div>
</div>

<?php include('footer.php'); ?>