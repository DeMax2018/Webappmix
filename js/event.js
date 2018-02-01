function myMap() {
  var myCenter = new google.maps.LatLng(28.457315, -16.283084);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 14};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
