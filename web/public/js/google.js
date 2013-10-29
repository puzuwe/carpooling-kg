/**
 * Created by Almaz on 29.10.13.
 */
function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(-33.8688, 151.2195),
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);

    var inputFrom = /** @type {HTMLInputElement} */(document.getElementById('podorozhniki_mainbundle_ride_departure'));
    var inputTo = /** @type {HTMLInputElement} */(document.getElementById('podorozhniki_mainbundle_ride_destination'));
    var autocompleteFrom = new google.maps.places.Autocomplete(inputFrom);
    var autocompleteTo = new google.maps.places.Autocomplete(inputTo);

    autocompleteFrom.bindTo('bounds', map);
    autocompleteTo.bindTo('bounds', map);

    var infowindowFrom = new google.maps.InfoWindow();
    var infowindowTo = new google.maps.InfoWindow();
    var markerFrom = new google.maps.Marker({
        map: map
    });
    var markerTo = new google.maps.Marker({
        map: map
    });

    google.maps.event.addListener(autocompleteFrom, 'place_changed', function() {
        infowindowFrom.close();
        markerFrom.setVisible(false);
        //input.className = '';
        var placeFrom = autocompleteFrom.getPlace();
        if (!placeFrom.geometry) {
            // Inform the user that the placeFrom was not found and return.
            //input.className = 'notfound';
            return;
        }

        // If the placeFrom has a geometry, then present it on a map.
        if (placeFrom.geometry.viewport) {
            map.fitBounds(placeFrom.geometry.viewport);
        } else {
            map.setCenter(placeFrom.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        markerFrom.setIcon(/** @type {google.maps.Icon} */({
            url: placeFrom.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        markerFrom.setPosition(placeFrom.geometry.location);
        markerFrom.setVisible(true);

        var address = '';
        if (placeFrom.address_components) {
            address = [
                (placeFrom.address_components[0] && placeFrom.address_components[0].short_name || ''),
                (placeFrom.address_components[1] && placeFrom.address_components[1].short_name || ''),
                (placeFrom.address_components[2] && placeFrom.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindowFrom.setContent('<div><strong>' + placeFrom.name + '</strong><br>' + address);
        infowindowFrom.open(map, markerFrom);
    });

    google.maps.event.addListener(autocompleteTo, 'place_changed', function() {
        infowindowTo.close();
        markerTo.setVisible(false);
        //input.className = '';
        var placeTo = autocompleteTo.getPlace();
        if (!placeTo.geometry) {
            // Inform the user that the placeTo was not found and return.
            //input.className = 'notfound';
            return;
        }

        // If the placeTo has a geometry, then present it on a map.
        if (placeTo.geometry.viewport) {
            map.fitBounds(placeTo.geometry.viewport);
        } else {
            map.setCenter(placeTo.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        markerTo.setIcon(/** @type {google.maps.Icon} */({
            url: placeTo.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        markerTo.setPosition(placeTo.geometry.location);
        markerTo.setVisible(true);

        var address = '';
        if (placeTo.address_components) {
            address = [
                (placeTo.address_components[0] && placeTo.address_components[0].short_name || ''),
                (placeTo.address_components[1] && placeTo.address_components[1].short_name || ''),
                (placeTo.address_components[2] && placeTo.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindowTo.setContent('<div><strong>' + placeTo.name + '</strong><br>' + address);
        infowindowTo.open(map, markerTo);
    });
}

google.maps.event.addDomListener(window, 'load', initialize);

