 var myMap;

$(document).ready(function() {
	var markerHolder = $("#markerHolder");
	var markers = markerHolder.children("marker");
	markers.each(function(i) {
		alert($(this).attr("name"));
		alert($(this).next().html());
	});
});
 
 window.onload = loadScript;
 
 function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(39.751244,-105.222260),	//inbetween kafadar and gugenheim
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.SATELLITE
    };
    myMap = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	
	testMarker();
}
	  
function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A&sensor=false&callback=initialize";
	document.body.appendChild(script);
}

function testMarker(){
	var location = new google.maps.LatLng(39.751244,-105.222260);
	
	var markerOptions = {
		title: "Test Event Marker",
		map: myMap,
		position: location,
	};
	var marker = new google.maps.Marker(markerOptions);
	
	var windowOptions = {
		content: '<h2>Cult Meeting #3</h2>'+
			'<h4>Today we choose outfits</h4>'+
			'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.'+
			'Donec ullamcorper magna id lacus posuere, eu sollicitudin justo blandit. Nullam diam purus, viverra sed tortor vitae, rhoncus '+
			'scelerisque enim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',
		maxWidth: 300
	};
		
	var infoWindow = new google.maps.InfoWindow(windowOptions);

	google.maps.event.addListener(marker,'click',function() {
		infoWindow.open(myMap,marker);
	});
}
