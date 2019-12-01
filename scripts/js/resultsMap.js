// ------ Functions for Results page -----
var map;
var InforObj = [];
// Set the center of the map
var centerCords = {
    lat: 44.874301,
    lng: -79.870020
};
// Marker var list with the parks name, latlongtitude, plcae infor and a link url
var markersOnMap = [{
        placeName: "Georgian Bay Islands National Park",
        LatLng: [{
            lat: 44.874301,
            lng: -79.870020
        }],
        placeInfo: "Swim in Lake Huron’s clear waters. Cycle wooded island trails. Hike paths that meander between ecosystems. Unwind at a cosy cabin.",
        placeHref: "object2.html"

    },
    {
        placeName: "Point Pelee National Park",
        LatLng: [{
            lat: 41.962795,
            lng: -82.518484
        }],
        placeInfo: "Canada’s second smallest but most diverse national park, Point Pelee’s forest hosts diverse habitats that provide a sanctuary for plants and animals rarely found elsewhere in the country and the nature lovers who enjoy it.",
        placeHref: "object3.html"


    }
];

function addMarker(park)
{
    var marker = {
        placeName: park['parkname'],
        LatLng: [{
            lat: park['latitude'],
            lng: park['longitude']
        }],
        placeInfo: park['dsc'],
        placeHref: "park.php"
    }

    markersOnMap.push(marker);    
}

// Load the google map when the page is load and call the initMap() 
window.onload = function () {
    initResultMap();
};

// Initial the google map with center and zoom 
function initResultMap() {
    // Put the map results in the location id named map 
    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: centerCords
    });
    // Call add Marker()
    addMarkersOnMap();
}

// Add marker on map
function addMarkersOnMap() {
    for (var i = 0; i < markersOnMap.length; i++) {
        // The content detais shows when click the mark
        // incluing the park name, short infor and link to individual park page
        var contentString = '<div id="content"><h4>' + markersOnMap[i].placeName +
            '</h4><p>' + markersOnMap[i].placeInfo + '</p>' +
            '<a href=' + markersOnMap[i].placeHref + '>View More Details</a>' + '</div>';
        // Set google maps marker position
        const marker = new google.maps.Marker({
            position: markersOnMap[i].LatLng[0],
            map: map
        });
        // The info window will shows after click the marker
        const infoWindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 280
        });
        // Close the info windows when click the one marker and open the info window of current marker
        marker.addListener('click', function () {
            closeInfo();
            infoWindow.open(marker.get('map'), marker);
            InforObj[0] = infoWindow;
        });

    }
}

// Colse the info window
function closeInfo() {
    if (InforObj.length > 0) {
        // Detach the info-window from the marker 
        InforObj[0].set("marker", null);
        // Close the window
        InforObj[0].close();
        // Clear the array 
        InforObj.length = 0;
    }
}
