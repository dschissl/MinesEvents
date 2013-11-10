 function initialize() {
    var mapOptions = {
        center: new google.maps.LatLng(39.751244,-105.222260),
        zoom: 18,
        mapTypeId: google.maps.MapTypeId.SATELLITE
    };
    var map = new google.maps.Map(document.getElementById("map-canvas"),
    mapOptions);
}
	  
function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A&sensor=false&callback=initialize";
	document.body.appendChild(script);
}

window.onload = loadScript;