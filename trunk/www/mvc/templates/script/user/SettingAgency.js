/*<![CDATA[*/
var map;
function changeMap(){
	var toado = $('#Position option[selected]="selected"').attr('title');
	var arrayToado = toado.split(',');				
	var center = new GLatLng(parseFloat(arrayToado[0]),parseFloat(arrayToado[1]));
	map.setCenter(center, 16);
}

function SetNewMap(){	
	var latitude = $("#lat").val();
	var longitude = $("#lng").val();				
	var center = new GLatLng(parseFloat(latitude),parseFloat(longitude));
	map.setCenter(center, 16);
}

function disableMovement(disable) {
    var mapOptions;
    if (disable) {
        mapOptions = {
            draggable: false,
            scrollwheel: false,
            disableDoubleClickZoom: true,
            zoomControl: false
        };
    } else {
        mapOptions = {
            draggable: true,
            scrollwheel: true,
            disableDoubleClickZoom: false,
            zoomControl: true
        };
    }
    map.setOptions(mapOptions);
}
function LockMaker() {
	map.GEvent.addListener(marker, 'dragstart', function() {
		disableMovement(true);
	});

	map.GEvent.addListener(marker, 'dragend', function() {
		disableMovement(true);
	});
}	
function load(){
	if (GBrowserIsCompatible()){
		map = new GMap2(document.getElementById("map"));
		map.addControl (new GSmallMapControl());
		map.addControl(new GMapTypeControl());
		var X = 10.246724;
		var Y = 105.976732;
		
		if ((document.getElementById("lat").value != 0) && (document.getElementById("lng").value != 0)) {
			X = document.getElementById("lat").value;
			Y = document.getElementById("lng").value;
		} else {
			document.getElementById("lat").value = X;
			document.getElementById("lng").value = Y;
		}
		var center = new GLatLng(X,Y);
		map.setCenter(center, 16);
		//map.setMapType(G_SATELLITE_MAP);
		//map.setMapType(G_HYBRID_MAP);
		map.enableScrollWheelZoom();
		geocoder = new GClientGeocoder();

		var marker = new GMarker(center, {draggable: true}); 		
		map.addOverlay(marker);
		document.getElementById("lat").value = center.lat();
		document.getElementById("lng").value = center.lng ();
		
		geocoder = new GClientGeocoder();

		GEvent.addListener(marker, "dragend", function() {
			var point = marker.getPoint();
			map.panTo(point);
			document.getElementById("lat").value = point.lat();
			document.getElementById("lng").value = point.lng();
		});

		GEvent.addListener(map, "moveend", function(){
			map.clearOverlays();
			var center = map.getCenter();
			var marker = new GMarker(center, {draggable: true});
			map.addOverlay(marker);
			document.getElementById ("lat").value = center.lat();
			document.getElementById("lng").value = center.lng();

			GEvent.addListener(marker, "dragend", function() {
				var point =marker.getPoint();
				map.panTo(point);
				document.getElementById("lat").value = point.lat();
				document.getElementById("lng").value = point.lng();
			});
		});
		marker.openInfoWindowHtml("Nắm kéo thả tới vị trí Quán của bạn");
	}
}

function showAddress(address) {
	map = new GMap2(document.getElementById("map"));
	map.addControl(new GSmallMapControl());
	map.addControl(new GMapTypeControl());
	if (geocoder) {
		geocoder.getLatLng (
			address,
			function(point) {
				if (!point) {
					alert(address + " city not found !");
				}
				else {
					document.getElementById("lat").value = point.lat();
					document.getElementById("lng").value = point.lng();
					map.clearOverlays()
					map.setCenter(point, 16);
					var marker = new GMarker(point, {draggable: false}); 
					map.addOverlay(marker);

					GEvent.addListener(marker, "dragend", function() {
						var pt =marker.getPoint();
						map.panTo(pt);
						document.getElementById("lat").value = pt.lat();
						document.getElementById("lng").value = pt.lng();
					});

				GEvent.addListener(map, "moveend", function() {
				map.clearOverlays();
				var center = map.getCenter();
				var marker = new GMarker(center, {draggable: true});
				map.addOverlay(marker);
				document.getElementById ("lat").value = center.lat();
				document.getElementById("lng").value = center.lng();

				GEvent.addListener(marker, "dragend", function() {
				var pt =marker.getPoint();
				map.panTo(pt);
				document.getElementById("lat").value = pt.lat();
				document.getElementById("lng").value = pt.lng();
				});
				});
			}}
		);
	}
}
function showMaker() {
	map = new GMap2(document.getElementById("map"));
	map.addControl(new GSmallMapControl());
	map.addControl(new GMapTypeControl());
	map.clearOverlays()
	var latitude = $("#lat").attr('alt');
	var longitude = $("#lng").attr('alt');
	var center = new GLatLng(parseFloat(latitude),parseFloat(longitude));
	map.setCenter(center, 16);
	//map.setMapType(G_SATELLITE_MAP);
	//map.setMapType(G_HYBRID_MAP);
	var marker = new GMarker(center, {draggable: true}); 	
	marker.openInfoWindowHtml( $("#MarkerName").attr('alt') );
	map.addOverlay(marker);
	map.enableScrollWheelZoom();		
}
/*]]>*/