// Google maps
// Need to be added Body: <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIzn4jDmtS-gvSR3TwREr6mmVAkF-NwvQ"></script>
// function initGoogleMaps() {
// 	var mapOptions = {
// 			zoom: 15,
// 			draggable: true,
// 			animation: google.maps.Animation.DROP,
// 			center: new google.maps.LatLng(52.4158633,-1.4850157), // area location
// 			styles:[{"stylers":[{"saturation":-100},{"gamma":1}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"on"},{"saturation":50},{"gamma":0},{"hue":"#50a5d1"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"color":"#333333"}]},{"featureType":"road.local","elementType":"labels.text","stylers":[{"weight":0.5},{"color":"#333333"}]},{"featureType":"transit.station","elementType":"labels.icon","stylers":[{"gamma":1},{"saturation":50}]}]};
// 	var mapElement = document.getElementById('gmap_vaks'); // <div id="gmap_vaks"></div>
// 	var map = new google.maps.Map(mapElement, mapOptions);
// 	var image = {
// 		url: 'wp-content/themes/wp-dev-uk/assets/img/i/map-marker.png',
// 		origin: new google.maps.Point(0, 0),
// 		anchor: new google.maps.Point(-28, 34)
// 	};
// 	var marker = new google.maps.Marker({
// 			position: new google.maps.LatLng(52.4158633,-1.4850157),
// 			map: map,
// 			title: 'O&Jcars - 50B Barras Green, Coventry, CV2 4LY',
// 			icon: image
// 	});
// 	$('.su-tabs-nav span').click(function() {
// 		setTimeout(function(){
// 			lastCenter=map.getCenter();
// 			google.maps.event.trigger(map, "resize");
// 			map.setCenter(lastCenter);
// 		}, 200);
// 	});
// }
// initGoogleMaps();