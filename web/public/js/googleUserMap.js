var userMapOptions = {
    center: new google.maps.LatLng(42.8747, 74.6122),
    zoom: 7,
    mapTypeId: google.maps.MapTypeId.ROADMAP
}
var userMap = new google.maps.Map(document.getElementById('map-user-canvas'), userMapOptions);
var departureLatLng = new google.maps.LatLng(ride[0],ride[1]);
var destinationLatLng = new google.maps.LatLng(ride[2],ride[3]);
var directionsDisplay = new google.maps.DirectionsRenderer();
var directionsService = new google.maps.DirectionsService();
var distance;
directionsDisplay.setMap(userMap);
var request = { origin: departureLatLng, destination: destinationLatLng, travelMode: google.maps.TravelMode.DRIVING };
directionsService.route(request, function (response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(response);
    }
});
