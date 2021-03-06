var myMap;
var markerArray = [];
var locMarker;

$(document).ready(function() {
	loadScript();
});

function loadScript() {
	var script = document.createElement("script");
	script.type = "text/javascript";
	script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyAXTdwWRRhOzQDa1lRcQ7PfKsuhV-XG78A&sensor=false&callback=initialize";
	document.body.appendChild(script);
}

function initialize() {
    var mapElem = $("#map-canvas");
    if (mapElem.length > 0) {
        myMap = new google.maps.Map(mapElem[0], 
        {
            center: new google.maps.LatLng(39.751244,-105.222260),	//inbetween kafadar and gugenheim
            zoom: 17,
            mapTypeId: google.maps.MapTypeId.SATELLITE
        });
        
        dropMarkers();
    }
}

function dropMarkers(){
	var markerHolder = $("#markerHolder");
	var markers = markerHolder.children("marker");
	markers.each(function(i) {
        var markerElem = $(this);
        var infoElem = $(this).next();
        markerArray.push(new MinesMarker(markerElem, infoElem));
	});
    markerHolder.remove(); //clean-up
}

function selectMarker(id) {
    for (var i = 0; i < markerArray.length; i++) {
        if (markerArray[i].getId() == id) {
            markerArray[i].select();
        }
    }
}

function unselectAllMarkers() {
    for (var i = 0; i < markerArray.length; i++) {
        markerArray[i].unselect(); 
    }
}

function MinesMarker(el, infoEl) {
    var elem = $(el);
    var infoElem = $(infoEl);
    this.id = elem.attr("event_id");
    this.name = elem.attr("name");
    this.latitude = elem.attr("latitude");
    this.longitude = elem.attr("longitude");
    this.infoHtml = infoElem.wrapAll('<div></div>').parent().html();
    this.infoWindow = this.getInfoWindow();
    this.marker = this.getMarker();
    this.selected = false;
}

MinesMarker.prototype.getId = function() {
    return this.id;   
}

MinesMarker.prototype.getMarker = function() {
    var me = this;
    if (me.marker) 
        return me.marker;
    
    me.marker = new google.maps.Marker({
        title: me.name,
        map: myMap,
        position: new google.maps.LatLng(me.latitude, me.longitude)  
    });

	if (initializeMinesMarker) {
		initializeMinesMarker(me);
	}
    
    return me.marker;
}

MinesMarker.prototype.getInfoWindow = function() {
    var me = this;
    if (me.infoWindow)
        return me.infoWindow;
    
    me.infoWindow = new google.maps.InfoWindow({
        content: me.infoHtml,
        maxWidth: 250
    });

    google.maps.event.addListener(me.infoWindow, 'closeclick', function() {
        me.unselect();
    });
    
    return me.infoWindow;
}

MinesMarker.prototype.select = function() {
    unselectAllMarkers();  
    this.selected = true;
    this.highlight(true);
    this.getInfoWindow().open(myMap, this.getMarker());
}

MinesMarker.prototype.center = function() {
	myMap.setCenter(new google.maps.LatLng(this.latitude, this.longitude));
}

MinesMarker.prototype.unselect = function() {
    this.selected = false;
    this.highlight(false);
    this.getInfoWindow().close();
}

MinesMarker.prototype.highlight = function(isHighlight) {
    if (isHighlight && isHighlight === true) {
		var path = document.location.pathname;
		var dir = path.substring(path.lastIndexOf('/')+1, path.length);
        //this.getMarker().setIcon("https://chart.googleapis.com/chart?chst=d_map_pin_letter_withshadow&chld=%E2%80%A2|85A5CC");
		if (dir == 'filter'){
			this.getMarker().setIcon("../img/blue.png");
		}
		else{
			this.getMarker().setIcon("img/blue.png");
		}
    }
    else {
        this.getMarker().setIcon("");
    }
}

MinesMarker.prototype.hover = function(isHover) {
    if (isHover && isHover === true) {

	}
	else {

	}
}
