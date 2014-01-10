/**
 * Created by Almaz on 28.10.13.
 */
$('.form_datetime').datetimepicker({
    //language:  'fr',
    weekStart: 1,
    todayBtn: 1,
    todayHighlight: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    forceParse: 0,
    showMeridian: 0,
    pickerPosition: "bottom-left"
});

// Google Maps at home page.
var mapMain;
var counterMain=0;
var beginMain,endMain, mainDepartureFilled,mainDestinationFilled;
var mainMapOptions = {center: new google.maps.LatLng(42.8747, 74.6122), zoom: 7, mapTypeId: google.maps.MapTypeId.ROADMAP};
var mainGeocoder = new google.maps.Geocoder();
var mainDirectionsService = new google.maps.DirectionsService();
var mainMap = new google.maps.Map(document.getElementById('map-main'), mapOptions);
var directionsDisplay =  new google.maps.DirectionsRenderer();
directionsDisplay.setMap(mainMap);
directionsDisplay.setOptions({suppressMarkers: true});

google.maps.event.addDomListener(mainMap,'click',function(event){

    mainGeocoder.geocode({'latLng': event.latLng}, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {

            if (results[1]) {
                if(!mainDepartureFilled){
                    mainDepartureFilled = true;
                    beginMain = event.latLng;
                    setMarker(mainMap, results[1].formatted_address, event.latLng, 'a');

                    //setLatLng('departure', results[1].formatted_address, event.latLng.lat(), event.latLng.lng());
                }else if(!mainDestinationFilled){
                    mainDestinationFilled = true;
                    endMain = event.latLng;
                    setMarker(mainMap, results[1].formatted_address, event.latLng, 'b');
                    //setLatLng('destination', results[1].formatted_address, event.latLng.lat(), event.latLng.lng());
                }
                calcMainRoute(beginMain,endMain);
            }
        }
    });
});

function calcMainRoute(departure,destination) {
    if (mainDepartureFilled) {
        if (mainDestinationFilled) {
            var request = { origin: departure, destination: destination, travelMode: google.maps.TravelMode.DRIVING };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                    var datas = {};
                    datas.start = response.routes[0].legs[0].steps[0].start_point.toString() + response.routes[0].legs[0].steps[0].end_point.toString();
                    datas.end = response.routes[0].legs[0].steps[response.routes[0].legs[0].steps.length - 1].start_point.toString() + response.routes[0].legs[0].steps[response.routes[0].legs[0].steps.length - 1].end_point.toString();
                    var urls = '/ru/ajax/rides';
                    $.ajax({
                            url: urls,
                            type:'POST',
                            data: datas,
                            success:function(response){console.log(response)},
                            error:function(){alert(1)}
                        }
                    );
                }
            });
        }
    }
}