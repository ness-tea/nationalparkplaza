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
$search_name = trim(ucwords(strtolower($pname)));  // Trim leading/following white spaces, convert string to lowercase, then capitlize first letter of every word.

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
        // Find all parks in the database matching user's name input
        $query = "SELECT * FROM Parks WHERE parkname = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute(array($search_name));

        // Save all parks matching user's park name in an array
        $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else
    {
        // User is searching by park rating.
        // Find all parks in the database for park matching user's rating input
        $query = "SELECT * FROM Parks WHERE parkname = (SELECT parkname FROM Reviews WHERE rating = ?)";
        $stmt = $conn->prepare($query);
        $stmt->execute(array($search_rating));

        // Save all parks matching user's rating in an array
        $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } 

    if ($stmt->rowCount() == 0)
    {
        // If no parks match user's queries, display all parks in database
        $query = "SELECT * From Parks";
        $stmt = $conn->prepare($query);
        $stmt->execute();

        $parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $nomatch = true;
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

<script>
    // Retrieve matching parks from php array using json_encode()
    var searchParks = <?php echo json_encode($parks); ?>;

    // Add the array elements as markers for google API live map
    for (var i = 0; i < searchParks.length; i++)
    {
        addMarker(searchParks[i]);
    
    }
</script>

<!-- This is the section of results page body, which style defined in the css -->
<div class="wrap-results">
    <div class="main" id="indent">

        <h1>List of National Parks</h1>

        <?php echo $nomatch == true ? 'No parks matched your query.':NULL; ?>
        
        <!-- This is the section of results table, which style defined in the css -->
        <div class="results-table">
            <!-- Embedding a live map using Javascript -->
            <div id="map">
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA64g1CyyNFGJdJj8DxVpjr6Qbe17C89v0&callback=initResultMap"></script>
            </div>
            <br /><br />

            <table>
                <col width="10">
                <col width="300">
                <!-- Each table row is defined with the <tr> tag. -->
                <tr>
                    <!-- A table header is defined with the <th> tag. -->
                    <th>Name</th>
                    <th>Information</th>
                </tr>

                <!-- Use PHP to populate results page table with parks matching the user's query -->
                <?php

                    // Loop through each park in the parks array containing all records matching user's query
                    foreach ($parks as $park)
                    {
                        // Markdown for html code
                        echo "<tr>";
                        echo "<td>";
                        echo "<h4><a href=\"park.php?parkid=".$park['park_id']."\">".$park['parkname']."</a></h4>";
                        echo "<td>".$park['dsc']."</td>";
                        echo "</tr>";   
                    }
                ?>
            </table>

        </div>

    </div>
</div>

<?php include('footer.php'); ?>