 var myMap;
 
 window.onload = loadScript;
 
 function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(39.751244,-105.222260),
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
		position: location
	};

	var marker = new google.maps.Marker(markerOptions);
}