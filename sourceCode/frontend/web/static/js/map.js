/*function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    }
}

function showPosition(position) {

	var myCenter = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
    var mapProp = {center:myCenter, zoom:14, scrollwheel:false, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker = new google.maps.Marker({position:myCenter});
    marker.setMap(map);
     google.maps.event.addListener(marker, 'click', function() {
        $('#myModalMap').modal('show');
    });

	var lng = document.getElementById("coord_lng");
	var lat = document.getElementById("coord_lat");
	//alert(lng.val);
    lat.value = position.coords.latitude;
    lng.value = position.coords.longitude;
}


function myMap(position) {
    var myCenter = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
    var mapProp = {center:myCenter, zoom:14, scrollwheel:false, draggable:true, mapTypeId:google.maps.MapTypeId.ROADMAP};
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    var marker = new google.maps.Marker({position:myCenter});
    marker.setMap(map);
     google.maps.event.addListener(marker, 'click', function() {
        $('#myModalMap').modal('show');
    });

}













function getDistanceFromLatLonInKm(lat1,lng1,lat2,lng2) {
      //alert(lat1);
      var R = 6371; // Radius of the earth in km
      var dLat = deg2rad(lat2-lat1);  // deg2rad below
      var dLng = deg2rad(lng2-lng1); 
      var a = 
        Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
        Math.sin(dLng/2) * Math.sin(dLng/2)
        ; 
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
      var d = R * c; // Distance in km
      return d;
    }



function deg2rad(deg) {
	return deg * (Math.PI/180)
}*/