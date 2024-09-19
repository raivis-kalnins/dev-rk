<?php
	// Add short code locations loop [locations]
	function locationsShortcode() {

		$locations = get_fields('options')['locations'];

		foreach( $locations as $location ) : //var_dump($location);

			$img = $location['location_marker'] ?? '';
			$m = wp_get_attachment_image_src($img,'full') ?? '';
			$marker = $m[0] ?? '';
			$text = $location['location_desc'] ?? '';
			$address = $location['location']['address'] ?? '';
			$place_id = $location['location']['place_id'] ?? '';
			$place_name = $location['location']['place_name'] ?? '';
			$zoom = $location['location']['zoom'] ?? '';
			$city = $location['location']['city'] ?? '';
			$country = $location['location']['country'] ?? '';
			$country_short = $location['location']['country_short'] ?? '';
			$lat = $location['location']['lat'] ?? '';
			$lng = $location['location']['lng'] ?? '';
			$loop =  $loop ?? '';

			$loop .='<div class="marker" data-lat="'.$lat.'" data-lng="'.$lng.'" data-icon="'.$marker.'">
						<img src="'. $marker .'" alt="'.$place_name.'" height="32" />
						<p class="locations-list__item--text p">'. wp_trim_words( $text, 95, '...' ) .'</p>
					</div>';
		endforeach;

		return '<div class="locations-map" data-zoom="'.$zoom.'"><div class="markers">'. $loop .'</div></div>
			<style type="text/css">
				.locations-map {
					border: #ccc solid 1px;
					height: 500px;
					width: 100%;
					margin: 0;
				}
				.locations-map img {
					max-width: inherit !important;
					position: absolute;
					z-index: 999999;
					width: 30px;
					left: 5px;
					top: 15px;
				}
			</style>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDgxqiCatkYH81cqSfRaDaMtTbw8yLpfuE&callback=Function.prototype"></script>
			<script type="text/javascript">
				(function( $ ) {
				function initMap( $el ) {
					// Find marker elements within map.
					var $markers = $el.find(".marker");
					// Create gerenic map.
					var mapArgs = {
						zoom: $el.data("zoom") || 16,
						styles: [
							{
							elementType: "geometry",
							stylers: [{ color: "#f5f5f5" }],
							},
							{
							elementType: "labels.icon",
							stylers: [{ visibility: "on" }],
							},
							{
							elementType: "labels.text.fill",
							stylers: [{ color: "#999999" }],
							},
							{
							elementType: "labels.text.stroke",
							stylers: [{ color: "#f0f0f0" }],
							},
							{
							featureType: "administrative.land_parcel",
							elementType: "labels.text.fill",
							stylers: [{ color: "#999999" }],
							},
							{
							featureType: "poi",
							elementType: "geometry",
							stylers: [{ color: "#f0f0f0" }],
							},
							{
							featureType: "poi",
							elementType: "labels.text.fill",
							stylers: [{ color: "#999999" }],
							},
							{
							featureType: "poi.park",
							elementType: "geometry",
							stylers: [{ color: "#f0f0f0" }],
							},
							{
							featureType: "poi.park",
							elementType: "labels.text.fill",
							stylers: [{ color: "#999999" }],
							},
							{
							featureType: "road",
							elementType: "geometry",
							stylers: [{ color: "#ffffff" }],
							},
							{
							featureType: "road.arterial",
							elementType: "labels.text.fill",
							stylers: [{ color: "#999999" }],
							},
							{
							featureType: "road.highway",
							elementType: "geometry",
							stylers: [{ color: "#f0f0f0" }],
							},
							{
							featureType: "road.highway",
							elementType: "labels.text.fill",
							stylers: [{ color: "#999999" }],
							},
							{
							featureType: "road.local",
							elementType: "labels.text.fill",
							stylers: [{ color: "#999999" }],
							},
							{
							featureType: "transit.line",
							elementType: "geometry",
							stylers: [{ color: "#f0f0f0" }],
							},
							{
							featureType: "transit.station",
							elementType: "geometry",
							stylers: [{ color: "#eeeeee" }],
							},
							{
							featureType: "water",
							elementType: "geometry",
							stylers: [{ color: "#f0f0f0" }],
							},
							{
							featureType: "water",
							elementType: "labels.text.fill",
							stylers: [{ color: "#f0f0f0" }],
							},
						],
						mapTypeControl: false,
						draggable: true,
						scaleControl: true,
						scrollwheel: false,
						navigationControl: true,
						streetViewControl: false,
						disableDefaultUI: true,						
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					var map = new google.maps.Map( $el[0], mapArgs );

					// Add a style-selector control to the map.
					//var styleControl = document.getElementById("style-selector-control");
					//map.controls[google.maps.ControlPosition.TOP_LEFT].push(styleControl);
					
					// Add markers.
					map.markers = [];
					$markers.each(function(){
						initMarker( $(this), map );
					});
					// Use map silver style
					// Center map based on markers.
					centerMap( map );
					// Return map instance.
					return map;
				}
				/**
				 * initMarker
				 */
				function initMarker( $marker, map ) {
					// Get position from marker.
					var lat = $marker.data("lat");
					var lng = $marker.data("lng");
					var latLng = {
						lat: parseFloat( lat ),
						lng: parseFloat( lng )
					};
					// Create marker instance.
					var marker = new google.maps.Marker({
						icon: $marker.data("icon"),
						position : latLng,
						map: map
					});
					// Append to reference for later use.
					map.markers.push( marker );
					// If marker contains HTML, add it to an infoWindow.
					if( $marker.html() ) {
						// Create info window.
						var infowindow = new google.maps.InfoWindow({
							content: $marker.html()
						});
						// Show info window when marker is clicked.
						google.maps.event.addListener(marker, "click", function() {
							infowindow.open( map, marker );
						});
					}
				}
				/**
				 * centerMap
				 */
				function centerMap( map ) {
					// Create map boundaries from all map markers.
					var bounds = new google.maps.LatLngBounds();
					map.markers.forEach(function( marker ){
						bounds.extend({
							lat: marker.position.lat(),
							lng: marker.position.lng(),
						});
					});
					// Case: Single marker.
					if( map.markers.length == 1 ){
						map.setCenter( bounds.getCenter() );
					// Case: Multiple markers.
					} else {
						map.fitBounds( bounds );
					}
				}
				// Render maps on page load.
				$(document).ready(function(){
					$(".locations-map").each(function(){
						var map = initMap( $(this) );
					});
				});
				})(jQuery);
			</script>';
	}
	add_shortcode('locations-map', 'locationsShortcode');
?>