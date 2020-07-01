<?php 
require_once 'classes/cls.constants.php'; 
//include_once 'z_head.php'; 

$col_keys = array();
$col_keys['indoor'] = array(
	
);
?>


<html lang="en-US" xmlns="//www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" type="image/x-icon" href="ability-logo.png">
	<title>Ability Programme 2019 - Ability Depends on the Task</title>
	<link rel="manifest" href="manifest.json">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Ability Project Questionnaire">
	<link rel="apple-touch-icon" href="/assets/images/icons/ability-152.png">

	<meta name="description" content="Ability Project's tool for data collection">
	<meta name="theme-color" content="#F5F5F5" />

	<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase-app.js"></script>

	<!-- Add Firebase products that you want to use -->
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase-database.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase-messaging.js"></script>
	<!-- End PWA -->

	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">-->
	<link rel="stylesheet" href="assets/js/bootstrap/css/bootstrap.3.3.7.min.css" type="text/css">
	<link rel="stylesheet" href="assets/js/bootstrap/css/bootstrap-override.css" type="text/css">
	<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
	<!-- <script type='text/javascript' src='//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js'></script>-->

	<!-- Mapbox dependencies -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.css' rel='stylesheet' />
	<!-- Mapbox dependencies -->

	<link rel="stylesheet" type="text/css" href="assets/js/leaflet/leaflet-0.7.7.css" />


	<script type='text/javascript' src='assets/js/leaflet/leaflet-0.7.2.js'></script>
	
	<!--<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>-->

	<script src="assets/js/leaflet/OSM.js"></script>
	<script src="assets/js/leaflet/KML.js"></script>
	<script src="assets/js/leaflet/osmtogeojson.js"></script>
	<script type='text/javascript' src='assets/js/leaflet/leaflet.label.js'></script>
	
	<!--<script src='http://tyrasd.github.io/osmtogeojson/osmtogeojson.js'></script>-->
	<link rel="stylesheet" type="text/css" href="assets/js/leaflet/leaflet.label.css">
	<link rel="stylesheet" type="text/css" href="assets/js/modal/jquery.modal.css">
	<link rel="stylesheet" type="text/css" href="assets/css/base_overrides.css">

	<style type="text/css">
		.pop_title {
			font-size: 15px;
			color: darkcyan;
		}
		.map-legend-keys img { width: 14px; }
		.map-legend-keys div { padding: 4px; }
		.btn_filter_hide {  width:34px;background:white;font-size:20px; color: #000; font-weight: bold; }
		
		
/*.card {background-color: #ffffff;border: 1px solid rgba(0, 34, 51, 0.1);box-shadow: 2px 4px 10px 0 rgba(0, 34, 51, 0.05), 2px 4px 10px 0 rgba(0, 34, 51, 0.05);border-radius: 0.15rem;}
.tab-card {border:1px solid #eee;}
.tab-card-header {background:none;}*/
.tab-card-header > .nav-tabs {border-bottom: 1px solid #ccc;margin: 0px;}
.tab-card-header > .nav-tabs > li {margin-right: 2px;}
.tab-card-header > .nav-tabs > li > a {border: 0;border-bottom:2px solid transparent;margin-right: 0;color: #737373;padding: 12px 10px;}

.tab-card-header > .nav-tabs > li.active > a {border-bottom:2px solid #007bff;color: #007bff;}
.tab-card-header > .nav-tabs > li > a:hover {color: #007bff;}
.tab-card-header > .tab-content {padding-bottom: 0;}

		
		
		/*@media (min-width: 768px) {
			.col-md-3.wrap_filters { width: 20%; }
			.col-md-9.wrap_mapper { width: 80%; }
		}
		@media (max-width: 768px) {
		.col-md-3.wrap_filters { width: 100%; }
		.col-md-9.wrap_mapper { width: 100%; }
		}	*/
	</style>
</head>

<!--Userway widget for accessibility -->
<script type="text/javascript">
	// Ability: Register service worker.
	/*if ('serviceWorker' in navigator) {
	window.addEventListener('load', () => {
	    navigator.serviceWorker.register('./sw.js')
	        .then((reg) => {
	        console.log('Service worker registered.', reg);
	        });
	});
	}*/

	/*var _userway_config = {
	 position: 3,
	 size: 'small', 
	// color: 'null', 
	account: '8F9hvjQmMs'
	};*/

</script>
<!--<script type="text/javascript" src="https://cdn.userway.org/widget.js"></script>-->

<body>	<!-- style="max-width:1600px; margin:auto;"-->

<!--<div class="row clearfix  wrap_header hiddenX">
	<div class="col-md-3"></div>
	<div class="col-md-9">
		<h1 class="txt30 bold ">Ability Map</h1>
		<p class="">Findings on the Ability Project</p>
		
	</div>
</div>-->
<div class="row clearfix">	
	
	<div class="col-md-12 nopadd">
		
		
		
		<div class="col-md-9 col-md-push-3 wrap_mapper" style="position:relative">
			<div class="wrap_menu_hide" style="position:absolute; top:77px; left:21px; z-index:100;display:none;"><a class="btn btn-sm btn-default btn_filter_hide" id="menu_show" title="Show Filters">&raquo;</a></div>
			<div id="gg_data_result" style=""></div>
			<div id="map" style="height: 100%; border: 1px solid #AAA;"></div> <!--650px-->
			
			
	<!--<div class="map-legend-keys">
		<div class="col-md-12">
			
			<strong><u>KEY</u>: Accessibility Rating (%) and Level</strong> - <em>Rating is based on percentage of features available</em>
		</div> 
		<div class="col-md-12">
			<div class="col-md-2"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png" class="legend-marker"> (00-20%) NOT Accessible </div>
			<div class="col-md-2"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-orange.png"> (20-40%) Somewhat Accessible</div>
			<div class="col-md-2"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-yellow.png"> (41-60%) Moderately Accessible</div>
			<div class="col-md-2"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png"> (61-80%) Accessible</div>
			<div class="col-md-2"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-violet.png"> (&gt; 81%) Very Accessible</div> 
		</div>
	</div>-->
	
	
		</div>
		
		
		
		
		<div class="col-12 col-md-3  col-md-pull-9 wrap_filters">	
		
			<div class="col-md-12" style="position:relative">
				<h1 class="txt30 bold ">Ability Map</h1>
				<p class="">Findings on the Ability Programme</p>
				<div style="position:absolute; top:20px; right:10px; width:100px;z-index:100;"><a class="btn btn-sm btn-default btn_filter_hide" style="float:right" id="menu_hide" title="Hide Filters">&laquo;</a></div>
			</div>
			<div>&nbsp;</div>
			<div class="col-md-12">
			<?php include("map_filter.php"); ?>
			</div>
			
				<div class="col-md-12">
				<div class="map-legend-keys">
					<div class="col-md-12">
						<h4>KEY:</h4> 
						<strong>Accessibility Rating (%) and Level</strong> - <em>Rating is based on percentage of features available</em>
					</div> 
					<div class="col-md-12">
						<div class="col-md-12"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-red.png" class="legend-marker"> (00-20%) NOT Accessible </div>
						<div class="col-md-12"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-orange.png"> (20-40%) Somewhat Accessible</div>
						<div class="col-md-12"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-yellow.png"> (41-60%) Moderately Accessible</div>
						<div class="col-md-12"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-green.png"> (61-80%) Accessible</div>
						<div class="col-md-12"><img src="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-violet.png"> (&gt; 81%) Very Accessible</div> 
					</div>
				</div>
				</div>
		</div>
		
	</div>
</div>



	<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/misc/jquery.slidetoggle.js"></script>
	<script type="text/javascript" src="assets/js/modal/jquery.modal.js" charset="utf-8"></script>
	<div class="modal fade" style="display:none;"></div>


	<script type="text/javascript">
	
		var map = L.map( 'map', {center: [-1.2667913, 36.8098615],minZoom: 0,zoom: 16});	
		
		var mopt = {			
			url: '//{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
			options: {
				attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
				subdomains: ['a', 'b', 'c'],
				id: 'mapbox.light',
				fullscreenControl: true,
				tilelayersControl: true,
			}
		};

		var mq = L.tileLayer(mopt.url, mopt.options);
		mq.addTo(map);
		
		var layer_main = L.layerGroup();
		var layer_streets = L.layerGroup();
		
		map.addControl(new L.Control.Layers({}, {"Buildings":layer_main, "Streets":layer_streets}, {}));
		
		
		function getColor(d) {
			return  d > 80 ? 'violet' :
					d > 60 ? 'green' :
					d > 40 ? 'yellow' :
					d > 20 ? 'orange' :
							'red';		
		}

		
		function AddMarkerToMap(ma_point, ma_layer, ma_color = 'grey') {
			console.log(ma_point);
			var my_coord = '' + ma_point.lat + ', ' + ma_point.lng + '';
			var my_photo_link = (ma_point.photo !== '') ? 'https://ability.or.ke/checklist/files/indoor/' + ma_point.photo + '' : '';
			var my_photo = (my_photo_link !== '') ? '<b><hr></b><a href="' + my_photo_link + '" target="_blank"><img src="' + my_photo_link + '" style="width:100px;" /></a>' : '';
			var my_comments = (ma_point.comments !== '') ? '<b>Comments:</b> ' + ma_point.comments + '' : '';
			var my_icon = '';
			var my_link = ' data-href="maps/ability_point.php?id=' + ma_point.id + '" id="marka_' + ma_point.id + '" title="View Point Details" rel="modal:open"';
			
			var my_popup = '<div><b class="pop_title"> ' + ma_point.building + '</b><br /><br /><b>Entry Type:</b> ' + ma_point.type + '<br /><b>Accessibility Ranking:</b> ' + ma_point.perc_access + '% <a ' + my_link + '>[ view details ]</a><br /><b>Public Rating:</b> ' + ma_point.rating + ' <br /> <b>Ability Code:</b> ' + ma_point.entiti_code + ' <br /><b>Steet Code:</b> ' + ma_point.street + '<br />'+ my_comments +' ' + my_photo + ' </div>';
			//<b>Ability Code:</b> ' + ma_point.name + ' <br /> 
			//<b>Steet Code:</b> ' + ma_point.street + '<br />
			// @@Icons Source: https://github.com/pointhi/leaflet-color-markers 

			var greenIcon = new L.Icon({
				iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-' + ma_color + '.png',
				/*shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',*/
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34]
				/*,
							  shadowSize: [41, 41]*/
			});
			// Li.circleMarker 
			var newMarker = new L.marker([parseFloat(ma_point.lat), parseFloat(ma_point.lng)], { icon: greenIcon })
				.bindPopup(my_popup)
				.addTo(ma_layer);

			return ma_layer.addTo(map);
		}

		
		function AddStreetToMap(road_points, road_props, road_color) {
			
			var ma_point	= road_props; /*console.log("ma_point", ma_point);*/
			var my_comments = (ma_point.comments !== '') ? '<b>Comments:</b> ' + ma_point.comments + '' : '';
			var my_link 	= '#';
			var my_photo_link = (ma_point.photo !== '') ? 'files/outdoor/' + ma_point.photo + '' : '';
			var my_photo = (my_photo_link !== '') ? '<b><hr></b><a href="' + my_photo_link + '" target="_blank"><img src="' + my_photo_link + '" style="width:100px;" /></a>' : '';
			
			var my_popup = '<div><b class="pop_title"> ' + ma_point.name + '</b><br /><br /><b>Accessibility Ranking:</b> ' + ma_point.perc_access + '% <a ' + my_link + '></a><br /><b>Steet Code:</b> ' + ma_point.street + '<br />'+ my_comments +' ' + my_photo + ' </div>';
			/*[ view details ]*/
			
			var line_options = {color: road_color,weight: 7,opacity: 0.8}; 	
			var polyline = L.polyline(road_points, line_options).bindLabel('' + my_popup + '', { direction: 'auto' }).addTo(layer_streets);
			
			return layer_streets.addTo(map);
		}


		function rageMappa(de_file, de_layer, de_source) {
			
			jQuery(document).ready(function($) {
				$.ajax({
					type: 'get',
					url: de_file,
					cache: true,
					dataType: 'json',
					success: function(data) {   
						var mapsData = data; //JSON.parse(data);
						var markers_a = mapsData.features;

						if(de_source === 'indoor'){
							
							for (var i = 0; i < markers_a.length; i++) {
								var ma_point = markers_a[i].properties;
								var m_color = getColor(ma_point['perc_access']);	
								
								AddMarkerToMap(ma_point, de_layer, m_color);
							}
						} else if(de_source === 'outdoor'){
							/*console.log("outdoor markers_a", markers_a);*/
							for (var i = 0; i < markers_a.length; i++) {
								//var ma_point = markers_a[i].coordinates;	
								var road_props = markers_a[i].properties;
								var road_points = markers_a[i].geometry.coordinates;		
								var road_color = getColor(road_props['perc_access']);	
								
								AddStreetToMap(road_points, road_props, road_color);
							}
						}
					}
				});
			});

		}


		rageMappa('maps/ability_json.php?c=bldg', layer_main, 'indoor');
		rageMappa('maps/ability_json.php?c=strt', layer_streets, 'outdoor');



		jQuery(document).ready(function($) {

			$('.panel-heading span.clickable').each(function() {
				var $this = $(this);
				if ($this.hasClass('panel-collapsed')) {
					$this.parents('.panel').find('.panel-body').slideUp();
					$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
				}
			});

			
			

			$("#menu_hide").on('click', function(e) {
				$(".wrap_filters, .wrap_header").addClass("hidden");
				$(".wrap_mapper").removeClass("col-md-9").removeClass("col-md-push-3").addClass("col-md-12");
				$(".wrap_menu_hide").show();
			});
			
			$("#menu_show").on('click', function(e) {
				$(".wrap_filters, .wrap_header").removeClass("hidden");
				$(".wrap_mapper").removeClass("col-md-12").addClass("col-md-9 col-md-push-3");
				$(".wrap_menu_hide").hide();
			});
			
			//gg_indoor_search(layer_main, 'indoor');

			jQuery(document).on('click', '.panel-heading span.clickable', function(e) {
				var $this = $(this);
				if (!$this.hasClass('panel-collapsed')) {
					$this.parents('.panel').find('.panel-body').slideUp();
					$this.addClass('panel-collapsed');
					$this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
				} else {
					$this.parents('.panel').find('.panel-body').slideDown();
					$this.removeClass('panel-collapsed');
					$this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
				}
			})

			$(document).on('change', '.gg_checks', function(e) {
				gg_indoor_search(layer_main, 'indoor');
			});

			$(document).on('change', '.out_checks', function(e) {
				gg_indoor_search(layer_streets, 'outdoor');
			});

		});

		function gg_indoor_search(de_layer, de_source) {
			jQuery(document).ready(function($) {
				
				de_layer.clearLayers();
				var de_class = (de_source === 'indoor') ? 'gg_checks' : 'out_checks';
				var de_call  = (de_source === 'indoor') ? 'bldg' : 'strt';
				
				$("."+de_class+"").each(function() {
					var label = $(this).parent();
					if ($(this).prop('checked')) {label.css('color', 'red');} else {label.css('color', '#777777');}
				});

				$.ajax({
					url: 'maps/ability_json.php?c='+de_call+'&tk=' + Math.random(),
					type: 'get',
					dataType: 'json',
					data: $('#frm_search').serialize(),
					beforeSend: function() {
						$('#gg_data_result').html('loading <img src="assets/images/icons/a-loader.gif" alt="..."  />');
					},
					success: function(data) {
						$('#gg_data_result').html("");
						var mapsData = data; 
						var markers_a = mapsData.features;
						
						if(de_source === 'indoor'){							
							for (var i = 0; i < markers_a.length; i++) {
								var ma_point = markers_a[i].properties;
								var m_color = getColor(ma_point['perc_access']);									
								AddMarkerToMap(ma_point, de_layer, m_color);
							}
						} else if(de_source === 'outdoor'){							
							for (var i = 0; i < markers_a.length; i++) {								
								var road_props = markers_a[i].properties;
								var road_points = markers_a[i].geometry.coordinates;		
								var road_color = getColor(road_props['perc_access']);									
								AddStreetToMap(road_points, road_props, road_color);
							}
						}
						

						/*for (var i = 0; i < markers_a.length; i++) {
							var ma_point = markers_a[i].properties;
							var m_color = getColor(ma_point['perc_access']);
							AddMarkerToMap(ma_point, de_layer, m_color);
						}*/

					}
				});
			});
		}
		
		
		function kbModalLoaded() {
		}

	</script>




</body>

</html>
