//namespace
var boston = {};

//map
var map;

//drawingManager
var drawingManager;

var infowindow;

var bounds;

//geocoder
var geocodemarker;

var geocoder = new google.maps.Geocoder();

function trace(message)
{
    if (typeof console != 'undefined')
    {
        console.log(message);
    }
}

//Function that gets run when the document loads
boston.initialize = function()
{
    var styles = [
        {
            stylers: [
                { saturation: -100 }
            ]
        }
    ];
    var latlng = new google.maps.LatLng(42.361061082707735, -71.06494315669636);
    var myOptions = {
        zoom: 13,
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles:styles

    };

    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    //allow pressing "enter"
    $('#address').keypress(function(e) {
        if(e.which == 13) {
            e.preventDefault();
            up206b.geocode();
        }
    });
    var lattest = $('.hidden_lat').val();
    var longtest= $('.hidden_long').val();

    // console.log(lattest);
    boston.mapMarkers(lattest);
    //add the drawing tool that allows users to draw points on the map
    drawingManager = new google.maps.drawing.DrawingManager({
        drawingMode: google.maps.drawing.OverlayType.MARKER,
        drawingControl: true,
        drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [google.maps.drawing.OverlayType.MARKER]
        },
        markerOptions: {
            draggable: true
        }
    });

    //add the tools to the map
    // drawingManager.setMap(map);


    //event listener that does the following after user draws point on the map
    google.maps.event.addListener(drawingManager, 'overlaycomplete', function (point)
    {
        //change the draw mode to allow user to drag the marker to desired location
        drawingManager.setDrawingMode(null);

        //"clone" the save-form to put in the infowindow
        var form =    $(".save-form").clone().show();
        var infowindow_content = form[0];
        infowindow = new google.maps.InfoWindow({
            content: infowindow_content
        });



        //make each marker clickable
        google.maps.event.addListener(point.overlay, 'click', function() {
            infowindow.open(map,point.overlay);
            console.log(lat);
        });

        // google.maps.event.addListener(map, 'click', function(event) {
        //    console.log( 'Lat: ' + event.latLng.lat() + ' and Longitude is: ' + event.latLng.lng() );
        // });

        //open infowindow by default
        infowindow.open(map,point.overlay);

        lat = point.overlay.getPosition().lat();
        long = point.overlay.getPosition().lng();

        $('#lat_form').val(lat);
        $('#long_form').val(long);
        console.log(lat_form);
        console.log(long_form);

        // $.post('/create', {lat:lat, long:long}, function(data) {
        //     console.log(data);
        // });


        // $('.sForm').on('click', function () {
        //
        //         $.ajax({
        //                 type: "POST",
        //
        //                 url: "/create",
        //                 data: {
        //                     lat:34
        //                 },
        //                     cache: false,
        //                 success: function(data) {
        //                      alert(data);
        //                  }
        //          });
        //           event.preventDefault();
        //          return false;
        //      });

    });


}

//map markers
boston.mapMarkers = function(data){
    console.log(data);
    bounds = new google.maps.LatLngBounds();
    $.get('/test',
        function(data)
        {
            var incidents =[]
            // console.log(data);
            $.each(data, function(i, item) {
                console.log(item);
                var icon;
                if (item.target_id== 1) {
                    icon ='/images/cyclist_marker.png';
                }
                else if (item.target_id == 3) {
                    icon = '/images/motorist_marker.png';
                }
                else if (item.target_id == 2){
                    icon = '/images/pedestrian_marker.png';
                }
                else {
                    icon = '/images/cyclist_marker.png';
                }

                var markerLatLng = new google.maps.LatLng(item.latitude,item.longitude);

                bounds.extend(markerLatLng);
                map.fitBounds(bounds);

                var thisincident = new google.maps.Marker({
                    position: markerLatLng,
                    map: map,
                    icon:icon
                    // title: item.display_name
                });
                var contentString= "Description: " + item.text +" <br><br>"+ "Type:" +item.type;
                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                thisincident.addListener('mouseover', function() {
                    infowindow.open(map, thisincident);
                    thisincident.setIcon('/images/marker_black.png');
                });
                thisincident.addListener('mouseout', function() {
                    infowindow.close(map, thisincident);
                    thisincident.setIcon(icon);
                });
                incidents.push(thisincident); //adds this new stop to the incident array
            });
        }
    );






}



//geocode function
boston.geocode = function()
{
    var address = $('#address').val();

    //erase previous markers
    if(geocodemarker)
    {
        geocodemarker.setMap(null);
    }

    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK)
        {
            map.setZoom(9);
            map.panTo(results[0].geometry.location);
            geocodemarker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });

        }
        else
        {
            alert("Geocode was not successful for the following reason: " + status);
        }
    });
}

//function to toggle edit mode
boston.toggleEditMode = function()
{
    if (drawingManager.getMap() == null)
    {
        $('#edit-button').html('<i class="icon-pencil"></i> I am done drawing');
        drawingManager.setMap(map);
    }
    else
    {
        $('#edit-button').html('<i class="icon-pencil"></i> Let me draw on this map');
        drawingManager.setMap(null);
    }
    $('#edit-button').toggleClass('btn-danger');
}
