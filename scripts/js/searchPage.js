//------- Functions for HOME PAGE -------------------------

// Global variables
var closest;
var x = document.getElementById("find-me"); // get the id by name in html
var lat; // user's latitude
var lon; // user's longitude
var parks;

// get user location by using HTML5 Geolocation API, then transfer to userLocation() function
function getLocation(Parks) {
    if (navigator.geolocation) 
    {
        parks = Parks;
        navigator.geolocation.getCurrentPosition(userLocation);
    }
    else 
    {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
    
    return closest['parkname'];
}


// Callback function for asynchronous call to HTML5 Geolocation API
function userLocation(position) {
    lat = position.coords.latitude; // user's latitude
    lon = position.coords.longitude; // user's longitude
    // call NearestPark function with the user location
    NearestParks(position.coords.latitude, position.coords.longitude);
}

function NearestParks(latitude, longitude) {
    var minDis = 99999; // set the min distence 

    for (var i = 0; i < parks.length; i++) {
        // Call PythagorasEquirectangular() 
        var dis = CalculateDis(latitude, longitude, parks[i]['latitude'], parks[i]['longitude']);
        if (dis < minDis) {
            closest = parks[i]; // Get the index number of the closest distence
            minDis = dis;
        }
    }
}

// Calculate each distence between two pair of latitude and longtitude
function CalculateDis(lat1, lon1, lat2, lon2) {
    lat1 = lat1 * Math.PI / 180; // degree to radius
    lon1 = lon1 * Math.PI / 180;
    lat2 = lat2 * Math.PI / 180;
    lon2 = lon2 * Math.PI / 180;
    var R = 6371; // Radius of the earth in km
    var x = (lon2 - lon1) * Math.cos((lat1 + lat2) / 2);
    var y = (lat2 - lat1);
    var d = Math.sqrt(x * x + y * y) * R;
    return d;
}

