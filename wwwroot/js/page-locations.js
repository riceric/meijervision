    var map;
    var markers = [];
    var infoWindow;
    var locationSelect;

    function load() {
      map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(42.968482,-85.665894),
        zoom: 8,
        mapTypeId: 'roadmap'
      });
      infoWindow = new google.maps.InfoWindow();

   }
   
   /* Load map for store page */
   function loadLatLng(lat,lng,zoom) {
	  var myStore = new google.maps.LatLng(lat,lng);
      map = new google.maps.Map(document.getElementById("map"), {
        center: myStore,
        zoom: 15,
        mapTypeId: 'roadmap'
      });
      //infoWindow = new google.maps.InfoWindow();
	  var storeMarker = new google.maps.Marker({
		  position: myStore,
		  map: map,
		  title:"Hello World!"
		});
   }

   function searchLocations() {
     var address = document.getElementById("addressInput2").value;
     var geocoder = new google.maps.Geocoder();
     geocoder.geocode({address: address}, function(results, status) {
       if (status == google.maps.GeocoderStatus.OK) {
        searchLocationsNear(results[0].geometry.location);
       } else {
         alert(address + ' not found');
       }
     });
   }

   function clearLocations() {
     infoWindow.close();
     for (var i = 0; i < markers.length; i++) {
       markers[i].setMap(null);
     }
     markers.length = 0;

     locationSelect.innerHTML = "";
     var option = document.createElement("option");
     option.value = "none";
     option.innerHTML = "See all results:";
     locationSelect.appendChild(option);
   }

   function searchLocationsNear(center) {
		//clearLocations(); 
		var radius = document.getElementById('radiusSelect').value;
		var searchUrl = 'data/phpsqlsearch_genxml.php?lat=' + center.lat() + '&lng=' + center.lng() + '&radius=' + radius;
		var sidebar = document.getElementById('sidebar');
		sidebar.innerHTML = '';
		downloadUrl(searchUrl, function(data) {
			var xml = parseXml(data);
			var markerNodes = xml.documentElement.getElementsByTagName("marker");
			var bounds = new google.maps.LatLngBounds();
			if (markerNodes.length == 0)
			{
				showNoResultsMessage();
			}
			else
			{
				for (var i = 0; i < markerNodes.length; i++) {
					var name = markerNodes[i].getAttribute("name");
					var address = markerNodes[i].getAttribute("address");
					var phone = markerNodes[i].getAttribute('phone');
					var hours = markerNodes[i].getAttribute('hours');
					var distance = parseFloat(markerNodes[i].getAttribute("distance"));
					var page_url = markerNodes[i].getAttribute("page_url");
					var latlng = new google.maps.LatLng(
					parseFloat(markerNodes[i].getAttribute("lat")),
					parseFloat(markerNodes[i].getAttribute("lng")));

					//createOption(name, distance, i);
					var marker = createMarker(latlng, name, address, phone, hours, page_url);
					var sidebarEntry = createSidebarEntry(i, name, address, phone, hours, page_url, distance);
					sidebar.appendChild(sidebarEntry);

					bounds.extend(latlng);
			   }
		   }
		   map.fitBounds(bounds);
      });
    }

	function showNoResultsMessage()
	{
		var sidebar = document.getElementById('sidebar');
		sidebar.innerHTML = '';
		var div = document.createElement('div');
		div.className = 'locationAddress';
		var html = '<strong>Sorry, no Vision Centers found near this address</strong><br /><a href="/locations-list.php?state=Illinois">View stores in Illinois</a><br /><a href="/locations-list.php?state=Indiana">View stores in Indiana</a><br /><a href="/locations-list.php?state=Michigan">View stores in Michigan</a><br /><a href="/locations-list.php?state=Ohio">View stores in Ohio</a><br /><a href="/locations-list.php">View all stores</a>';
		div.innerHTML = html;
		div.style.cursor = 'pointer';
		sidebar.appendChild(div);
	}
	
	function createMarker(latlng, name, address, phone, hours, page_url) {
		urlAddress = escape(address);
		var html = '<strong>Vision Center at Meijer - ' + name + '</strong><br/>' +address+'<br/>'+ phone+'<br/><br/><strong>Hours:</strong><br/>';
		var lnhours = hours.split(";");
		for (var i=0;i<lnhours.length;i++)
		{
			html += lnhours[i]+"<br />";
		}
		html += '<a href=\"'+page_url+'\">View store details</a>&nbsp;|&nbsp;<a href=\"http://maps.google.com/maps?q='+urlAddress+'\">Get directions</a><br/>';
		var marker = new google.maps.Marker({
			map: map,
			position: latlng
		});

		google.maps.event.addListener(marker, 'click', function() {
			infoWindow.setContent(html);
			infoWindow.open(map, marker);
		});
		markers.push(marker);
	}

    function createOption(name, distance, num) {
      var option = document.createElement("option");
      option.value = num;
      option.innerHTML = name + "(" + distance.toFixed(1) + ")";
      locationSelect.appendChild(option);
    }

    function downloadUrl(url, callback) {
      var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

      request.onreadystatechange = function() {
        if (request.readyState == 4) {
          request.onreadystatechange = doNothing;
          callback(request.responseText, request.status);
        }
      };

      request.open('GET', url, true);
      request.send(null);
    }

    function parseXml(str) {
      if (window.ActiveXObject) {
        var doc = new ActiveXObject('Microsoft.XMLDOM');
        doc.loadXML(str);
        return doc;
      } else if (window.DOMParser) {
        return (new DOMParser).parseFromString(str, 'text/xml');
      }
    }

function createSidebarEntry(markeridx, name, address, phone, hours, page_url, distance) {
	var div = document.createElement('div');
	div.className = 'locationAddress';
	urlAddress = escape(address);
	
	var html = '<strong>Vision Center at Meijer - ' + name + '</strong> (' + distance.toFixed(1) + ' mi)<br/>' +address+'<br/>'+ phone+'<br/><br/>';
	var lnhours = hours.split(";");
	for (var i=0;i<lnhours.length;i++)
	{
		html += lnhours[i]+"<br />";
	}
	html += '<a href=\"'+page_url+'\">View store details</a>&nbsp;|&nbsp;<a href=\"http://maps.google.com/maps?q='+urlAddress+'\">Get directions to this location</a><br/>';
	//html += "<br />";
	div.innerHTML = html;
	div.style.cursor = 'pointer';
  
	google.maps.event.addDomListener(div, 'click', function() {
		google.maps.event.trigger(markers[markeridx], 'click');
	});
	google.maps.event.addDomListener(div, 'mouseover', function() {
		div.className = 'locationAddressHover';
	});
	google.maps.event.addDomListener(div, 'mouseout', function() {
		div.className = 'locationAddress';
	});
	return div;
}	
	
function doNothing() {}