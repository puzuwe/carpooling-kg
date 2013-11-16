/**
 * Created by Almaz on 29.10.13.
 */
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var googleIconsURL = 'http://localhost/podorozhniki.kg/web/public/img/icons/'
var mapOptions = {center: new google.maps.LatLng(42.8747, 74.6122), zoom: 7, mapTypeId: google.maps.MapTypeId.ROADMAP};
var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
var geocoder = new google.maps.Geocoder();
var DepartureFilled = false;
var DestinationFilled = false;
var origin, destination;
var markerA,markerB;
$(window).load(function () {

    directionsDisplay = new google.maps.DirectionsRenderer();
    directionsDisplay.setMap(map);
    directionsDisplay.setOptions({suppressMarkers: true});

    var inputFrom = document.getElementById('podorozhniki_mainbundle_ride_departure');
    var inputTo = document.getElementById('podorozhniki_mainbundle_ride_destination');

    var autocompleteFrom = new google.maps.places.Autocomplete(inputFrom);
    var autocompleteTo = new google.maps.places.Autocomplete(inputTo);

    autocompleteFrom.bindTo('bounds', map);
    autocompleteTo.bindTo('bounds', map);
});

google.maps.event.addDomListener(map, 'click', function (event) {
    geocoder.geocode({'latLng': event.latLng}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {

            if (results[1]) {
                    if(!DepartureFilled){
                        DepartureFilled = true;
                        origin = event.latLng;
                        setMarker(map, results[1].formatted_address, event.latLng, 'a');
                        setLatLng('departure', results[1].formatted_address, event.latLng.lat(), event.latLng.lng());
                    }else if(!DestinationFilled){
                        DestinationFilled = true;
                        destination = event.latLng;
                        setMarker(map, results[1].formatted_address, event.latLng, 'b');
                        setLatLng('destination', results[1].formatted_address, event.latLng.lat(), event.latLng.lng());
                    }
                    calcRoute(origin,destination);
                }
        }
    });
});


function setLatLng(type, address, lat, lng) {
    $('#podorozhniki_mainbundle_ride_' + type).val(address);
    $('#podorozhniki_mainbundle_ride_' + type + 'latitude').val(lat);
    $('#podorozhniki_mainbundle_ride_' + type + 'longitude').val(lng);
}
function setMarker(map, address, latlng, letter) {
    var marker = new google.maps.Marker({
        map: map,
        position: latlng,
        icon: googleIconsURL + 'letter_' + letter + '.png',
        draggable: true
    });
    if(letter=='a'){
        markerA = marker;
    }else{
        markerB = marker;
    }
    infoWin = new google.maps.InfoWindow();
    infoWin.setContent(address);
    infoWin.open(map, marker);
    google.maps.event.addDomListener(marker, 'click', function () {
        infoWin.open(map, marker);
    });
    google.maps.event.addDomListener(marker,'dragend',function(event){
        var char = 'a';
        if(this.icon == googleIconsURL +"letter_a.png"){
            markerA.setMap(null);
        }
        else{
            char = 'b';
            markerB.setMap(null);
        }
        //setMarker(map,"AA",event.latLng,char);
        geocoder.geocode({'latLng': event.latLng},function(results, status){
            if(status ==google.maps.GeocoderStatus.OK){
                setMarker(map,results[1].formatted_address,event.latLng,char);
            }
        });
        calcRoute(markerA.position,markerB.position);
    });
}

function setMarkerFromName(location,letter){
    var address = $('#podorozhniki_mainbundle_ride_'+location).val();
    geocoder.geocode({'address': address},function(results, status){
        if(status == google.maps.GeocoderStatus.OK){
            if(letter=='a'){
                if(DepartureFilled){
                    markerA.setMap(null);
                }
                DepartureFilled = true;
            }
            else{
                if(DestinationFilled){
                    markerB.setMap(null);
                }
                DestinationFilled = true;
            }
            setMarker(map,address,results[0].geometry.location,letter);
            setLatLng(location,address,results[0].geometry.location.ob,results[0].geometry.location.pb);
        }
    });
    var departure =$('#podorozhniki_mainbundle_ride_departure').val().trim();
    var destination = $('#podorozhniki_mainbundle_ride_destination').val().trim();
    calcRoute(departure,destination);
}

function calcRoute(departure,destination) {
    if(DepartureFilled && DestinationFilled){
        var request = { origin: departure, destination: destination, travelMode: google.maps.TravelMode.DRIVING };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                document.getElementById("podorozhniki_mainbundle_ride_distance").value = response.routes[0].legs[0].distance.text;
            }
        });
    }
}