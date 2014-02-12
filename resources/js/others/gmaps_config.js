/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


var map = null;
var geocoder = null;

function initialize() {
    if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map_canvas"));
        geocoder = new GClientGeocoder();
    }
}

function showAddress(address) {

 multiple(address);
//multiple('Mirpur 10, Dhaka, Bangladesh');
//multiple('Pallabi, Dhaka, Bangladesh');
//multiple('Mirpur 12, Dhaka, Bangladesh');
//multiple('Mirpur 1, Dhaka, Bangladesh');
//multiple('Mirpur 2, Dhaka, Bangladesh');
}

function multiple(address) {
    if (geocoder) {
        geocoder.getLatLng(
            address,
            function(point) {
                if (!point) {
                    $('#location_address').html(address + " not found");
                    $('#location_address').addClass('error_message');

                } else {
                    map.setCenter(point, 13);
                    var marker = new GMarker(point);
                    map.addControl(new GLargeMapControl());
                    map.addControl(new GMapTypeControl());
                    //map.centerAndZoom(point, 3);
                    marker.openInfoWindowHtml('<div style="width:50px; height:auto; ">'+address+'</div>');
                    GEvent.addListener(marker, "click", function() {
                        marker.openInfoWindowHtml('<div style="width:50px; height:auto; ">'+address+'</div>');
                    });
                    map.zoomOut();

                    map.addOverlay(marker);
                }
            }
            );
    }


}
