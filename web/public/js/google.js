/**
 * Created by Almaz on 29.10.13.
 */
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {

    directionsDisplay = new google.maps.DirectionsRenderer();

    var mapOptions = {
        center: new google.maps.LatLng(-33.8688, 151.2195),
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    directionsDisplay.setMap(map);
    directionsDisplay.setPanel(document.getElementById('directions-panel'));

    var inputFrom = document.getElementById('podorozhniki_mainbundle_ride_departure');
    var inputTo = document.getElementById('podorozhniki_mainbundle_ride_destination');
    var autocompleteFrom = new google.maps.places.Autocomplete(inputFrom);
    var autocompleteTo = new google.maps.places.Autocomplete(inputTo);

    autocompleteFrom.bindTo('bounds', map);
    autocompleteTo.bindTo('bounds', map);

}

function calcRoute() {
    var start = document.getElementById('podorozhniki_mainbundle_ride_departure').value;
    var end = document.getElementById('podorozhniki_mainbundle_ride_destination').value;
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        }
    });
}

google.maps.event.addDomListener(window, 'load', initialize);



