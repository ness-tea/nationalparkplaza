// ------- Functions for Object pages ------

// Initialize and add the map
// The location of park
var Bruce = {
    lat: 45.230489,
    lng: -81.521887
};
var Georgian = {
    lat: 44.874301,
    lng: -79.870020
};
var Pelee = {
    lat: 41.962795,
    lng: -82.518484
};

var Park = {};

function initPeleeMap() {
    
    // The map shows centered at park with zoom 
    var map = new google.maps.Map(
        document.getElementById("map"), {
            zoom: 10,
            center: Pelee
        });

    // The marker positioned at park location
    var marker = new google.maps.Marker({
        position: Pelee,
        map: map
    });
}

function initGeorgianMap() {

    // The map shows centered at park with zoom 
    var map = new google.maps.Map(
        document.getElementById("map"), {
            zoom: 10,
            center: Georgian
        });

    // The marker positioned at park location
    var marker = new google.maps.Marker({
        position: Georgian,
        map: map
    });
}

function initBruceMap() {

    // The map shows centered at park with zoom 
    var map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 10,
            center: Bruce
        });
    // The marker positioned at park location
    var marker = new google.maps.Marker({
        position: Bruce,
        map: map
    });
}

function populatePark(park)
{
    // Fill in the Park struct
    var Park = {
        lat: park['latitude'],
        lng: park['longitude']
    }
}

function initParkMap() {
    // The map shows centered at park with zoom 
    var map = new google.maps.Map(
        document.getElementById('map'), {
            zoom: 10,
            center: Park
        });

    // The marker positioned at park location
    var marker = new google.maps.Marker({
        position: Park,
        map: map
    });
}
