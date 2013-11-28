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
var beginMain,endMain;
$(window).load(function () {
    mapMain = new google.maps.Map(document.getElementById('map-main'),
        {
            center: new google.maps.LatLng(42.8747, 74.6122),
            zoom: 7,
            mapTypeId: google.maps.MapTypeId.ROADMAP,

        });

});

//google.maps.event.addDomListener(mapMain,'click',function(){
//
//    if(counterMain==0){
//        beginMain =
//    }
//});