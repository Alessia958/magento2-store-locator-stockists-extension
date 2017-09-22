define([
	'jquery',
	'stockists_individual_stores',
	'stockists_mapstyles',
	'stockists_slick',
	'stockists_geolocation'
],
function($,config,mapstyles) {

	return function (config) {

		$(document).ready(function() {

			$.getScript("https://maps.googleapis.com/maps/api/js?v=3&sensor=false&key="+config.apiKey+"&libraries=geometry", function () {
				getAllStore();
			});

			var map;
			markers=[];

			config.storeDetails.latitude = parseFloat(config.storeDetails.latitude);
			config.storeDetails.longitude = parseFloat(config.storeDetails.longitude);
			
			function getAllStore() {
				// var url = window.location.protocol+"//"+window.location.host + "/" + config.moduleUrl + '/ajax/stores';
				 var url="ajax/stores";
				 $.ajax({
					 dataType: 'json',
					 url: url
				 }).done(function(response) {
					 initialize(response);
				 });    
			 }
			function initialize(response) {

				var mapElement = document.getElementById('map-canvas-individual');
				var loadedMapStyles = mapstyles[config.map_styles];
				var mapOptions = {
					zoom: config.zoom_individual,
					scrollwheel: false,
					center: {lat: config.storeDetails.latitude, lng: config.storeDetails.longitude},
					styles: loadedMapStyles
				};

				map = new google.maps.Map(mapElement,mapOptions);

				var image = {
					url: config.map_pin
				};
				var infowindow = new google.maps.InfoWindow({
					content: ""
				});
				
				function bindInfoWindow(marker, map, infowindow, category, name, address, city, postcode, telephone, link, external_link, email) {
					google.maps.event.addListener(marker, 'click', function() {

						var contentString = '<div class="stockists-window" data-latitude="'+marker.getPosition().lat()+'" data-longitude="'+marker.getPosition().lng()+'"><p class="stockists-title">'+name+'</p>'
						if (external_link) {
							var protocol_link = external_link.indexOf("http") > -1 ? external_link : "http://"+external_link;
							contentString += '<p class="stockists-telephone"><a href="'+protocol_link+'" target="_blank">'+external_link+'</a></p>'
						} else if (link) {
							contentString += '<p class="stockists-telephone"><a href="magentonew/stockists/'+link+'" target="_blank">Detail page</a></p>'
						}
						if (telephone) {
							contentString += '<p class="stockists-telephone">'+telephone+'</p>';
						}
						if (email) {
							contentString += '<p class="stockists-address"><a href="mailto:'+email+'" target="_blank">'+email+'</a></p>';
						}
						if (address) {
							contentString += '<p class="stockists-telephone">'+address+'</p>'
						}
						if (city) {
							contentString += '<p class="stockists-telephone">'+city+'</p>'
						}
						if (postcode) {
							contentString += '<p class="stockists-web">'+postcode+'</p>';
						}
						contentString += '<p class="ask-for-directions get-directions" data-directions="DRIVING"><a href="http://maps.google.com/maps?saddr=&daddr='+marker.getPosition().lat()+','+marker.getPosition().lng()+'" target="_blank">Get Directions</a></p>';
						contentString += '</div>';
						map.setCenter(marker.getPosition());
						infowindow.setContent(contentString);
						infowindow.open(map, marker);
					});
				}

				//take all stores data
				var length = response.length
				
				for (var i = 0; i < length; i++) {
					
					var data = response[i];
					
					var latLng = new google.maps.LatLng(data.latitude,
						data.longitude);
						
					var record_id = "" + data.latitude + data.longitude;

					var markert = new google.maps.Marker({
						record_id: record_id,
						global_name: data.name,
						global_address: data.address,
						global_city: data.city,
						global_postcode: data.postcode,
						global_country: data.country,
						global_link: data.link,
						global_image: data.image,				
						position: latLng,
						map:map,
						icon: image,
						title: data.name
					});

					markers.push(markert);
				}	
				debugger;
				var latLng = new google.maps.LatLng(config.storeDetails.latitude,
					config.storeDetails.longitude);

				var record_id = "" + config.storeDetails.latitude + config.storeDetails.longitude;

				var marker = new google.maps.Marker({
					record_id: record_id,
					global_name: config.storeDetails.name,
					global_address: config.storeDetails.address,
					global_city: config.storeDetails.city,
					global_postcode: config.storeDetails.postcode,
					global_country: config.storeDetails.country,
					global_image: config.storeDetails.image,
					global_schedule: config.storeDetails.schedule,
					global_link: config.storeDetails.link,
					position: latLng,
					map:map,
					icon: image,
					title: config.storeDetails.name
				});
				var contentToAppend="";

						for (i = 0; i < markers.length; i++) { 
							debugger;
							var distance = google.maps.geometry.spherical.computeDistanceBetween(marker.position, markers[i].position);
							
							if (distance < config.radius && markers[i].global_country == marker.global_country && markers[i].record_id!=marker.record_id) {
				
								contentToAppend += " <div class='item'> <div class='image'>";
								contentToAppend += "<img src='"+markers[i].global_image+ "' alt='"+markers[i].global_address + "'/>";
								contentToAppend +="</div>";
													
								contentToAppend +="<a href='"+markers[i].global_link+"'class='individual-store-link'>"+
										"<div class='details'><p>"+markers[i].global_name+"</p></div></a>"
						
								contentToAppend +="</div>";	
												
							}
						}

				$('.all-stores-slider-wrapper').append(contentToAppend);
			
				bindInfoWindow(marker, map, infowindow, config.storeDetails.cateogry, config.storeDetails.name, config.storeDetails.address, config.storeDetails.city, config.storeDetails.postcode, config.storeDetails.phone, config.storeDetails.link, config.storeDetails.external_link, config.storeDetails.email);
	
			}

			if (config.otherStores && config.otherStoresSlider) {
		
	


				function initializeSlick() {
					$(".all-stores-slider-wrapper").slick({
						dots: true,
						arrows: true,
						lazyLoad: 'progressive',
						slidesToShow: 5,
						slidesToScroll: 4,
						prevArrow: '<button id="arrow-left" type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><img src="' + config.slider_arrow + '" alt="Left" /></button>',
						nextArrow: '<button id="arrow-right" type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><img src="' + config.slider_arrow + '" alt="Right" /></button>',
						responsive: [
							{
								breakpoint: 1230,
								settings: {
									slidesToShow: 4,
									slidesToScroll: 1,
									infinite: true,
									dots: true
								}
							},
							{
								breakpoint: 1024,
								settings: {
									slidesToShow: 3,
									slidesToScroll: 1,
									infinite: true,
									dots: true,
									arrows: true
								}
							},
							{
								breakpoint: 768,
								settings: {
									slidesToShow: 2,
									slidesToScroll: 1,
									arrows: true,
									infinite: true,
									dots: true
								}
							},
							{
								breakpoint: 480,
								settings: {
									slidesToShow: 1,
									slidesToScroll: 1,
									arrows: false,
									infinite: true,
									dots: true
								}
							}
						]
					});
				}

				if ($(".all-stores-slider-wrapper").length) {
					initializeSlick();
				}
			}

		});
	};
}
);