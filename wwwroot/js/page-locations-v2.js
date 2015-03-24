var map;
var geocoder;

function load() {
  if (GBrowserIsCompatible()) {
	geocoder = new GClientGeocoder();
	map = new GMap2(document.getElementById('map'));
	map.addControl(new GSmallMapControl());
	map.addControl(new GMapTypeControl());
	map.setCenter(new GLatLng(40, -100), 4);
  }
}

function searchLocations() {
 var address = document.getElementById('addressInput').value;
 geocoder.getLatLng(address, function(latlng) {
   if (!latlng) {
	 alert(address + ' not found');
   } else {
	 searchLocationsNear(latlng);
   }
 });
}

function searchLocationsNear(center) {
 var radius = document.getElementById('radiusSelect').value;
 var searchUrl = 'data/phpsqlsearch_genxml.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
 GDownloadUrl(searchUrl, function(data) {
   var xml = GXml.parse(data);
   var markers = xml.documentElement.getElementsByTagName('marker');
   map.clearOverlays();

   var sidebar = document.getElementById('sidebar');
   sidebar.innerHTML = '';
   if (markers.length == 0) {
	 sidebar.innerHTML = 'No results found.';
	 map.setCenter(new GLatLng(40, -100), 4);
	 return;
   }

   var bounds = new GLatLngBounds();
   for (var i = 0; i < markers.length; i++) {
		var name = markers[i].getAttribute('name');
		var address = markers[i].getAttribute('address');
		var phone = markers[i].getAttribute('phone');
		var hours = markers[i].getAttribute('hours');
		var distance = parseFloat(markers[i].getAttribute('distance'));
		var point = new GLatLng(parseFloat(markers[i].getAttribute('lat')),
							 parseFloat(markers[i].getAttribute('lng')));
	 
	 var marker = createMarker(point, name, address, phone, hours);
	 map.addOverlay(marker);
	 var sidebarEntry = createSidebarEntry(marker, name, address, phone, hours, distance);
	 sidebar.appendChild(sidebarEntry);
	 bounds.extend(point);
   }
   map.setCenter(bounds.getCenter(), map.getBoundsZoomLevel(bounds));
 });
}

function createMarker(point, name, address, phone, hours) {
  var marker = new GMarker(point);
  var html = '<strong>Vision Center at Meijer - ' + name + '</strong><br/>' +address+'<br/>'+ phone+'<br/><br/>';
  var lnhours = hours.split(";");
  for (var i=0;i<lnhours.length;i++)
  {
	html += lnhours[i]+"<br />";
  }
  GEvent.addListener(marker, 'click', function() {
	marker.openInfoWindowHtml(html);
  });
  return marker;
}

function createSidebarEntry(marker, name, address, phone, hours, distance) {
  var div = document.createElement('div');
  div.className = 'locationAddress';
  var html = '<strong>' + name + '</strong> (' + distance.toFixed(1) + ' mi)<br/>' +address+'<br/>'+ phone+'<br/><br/>';
  var lnhours = hours.split(";");
  for (var i=0;i<lnhours.length;i++)
  {
	html += lnhours[i]+"<br />";
  }
  //html += "<br />";
  div.innerHTML = html;
  div.style.cursor = 'pointer';
  div.style.marginBottom = '5px'; 
  GEvent.addDomListener(div, 'click', function() {
	GEvent.trigger(marker, 'click');
  });
  GEvent.addDomListener(div, 'mouseover', function() {
	div.className = 'locationAddressHover';
  });
  GEvent.addDomListener(div, 'mouseout', function() {
	div.className = 'locationAddress';
  });
  return div;
}