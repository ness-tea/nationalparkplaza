//------- Functions for HOME PAGE -------------------------

// Global variables
var closest;
var x = document.getElementById("find-me"); // get the id by name in html
var lat; // user's latitude
var lon; // user's longitude
var parks = [
    ["park0", 45.230489, -81.521887, "Bruce Peninsula National Park"],
    ["park1", 44.874301, -79.870020, "Georgian Bay Islands National Park"],
    ["park2", 41.962795, -82.518484, "Point Pelee National Park"]
];

// get user location by using HTML5 Geolocation API, then transfer to userLocation() function
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(userLocation);
    }else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}


// Callback function for asynchronous call to HTML5 Geolocation API
function userLocation(position) {
    lat = position.coords.latitude; // user's latitude
    lon = position.coords.longitude; // user's longitude
    // call NearestPark function with the user location
    NearestPark(position.coords.latitude, position.coords.longitude);
}

function NearestPark(latitude, longitude) {
    var minDis = 99999; // set the min distence 

    for (index = 0; index < parks.length; ++index) {
        // Call PythagorasEquirectangular() 
        var dis = CalculateDis(latitude, longitude, parks[index][1], parks[index][2]);
        if (dis < minDis) {
            closest = index; // Get the index number of the closest distence
            minDis = dis;
        }
    }
    document.getElementById("find-me").innerHTML = (parks[closest][3]);
    // get the var with id and put the results name back
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

