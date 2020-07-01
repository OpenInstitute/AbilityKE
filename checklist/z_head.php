<?php require_once 'classes/cls.constants.php'; 

@$type = $_GET['type'];
// $back = '<center><a href="index.php?type="> <i class="fas fa-undo-alt"></i> Back to Choose Questionnaire type </a> |  <a href="index.php?type=indoor-manual"> <i class="fas fa-edit"></i> Add Manually</a> </center>';
$back = '<center><a href="index.php?type="> <i class="fas fa-undo-alt"></i> Back to Choose Questionnaire type </a></center>';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>The Ability Project Questionnaire</title>
        <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css" >
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="assets/images/icons/ability-favi.png">
	<link rel="canonical" href="https://ability.or.ke">
	<title>Ability Programme - Ability is measured by the task</title>

	<!-- Start PWA -->
	<!-- Our app manifest -->
	<link rel="manifest" href="manifest.json">

	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Ability Project Questionnaire">
	<link rel="apple-touch-icon" href="/assets/images/icons/ability-152.png">

	<meta name="description" content="Ability Project's tool for data collection">
	<meta name="theme-color" content="#F5F5F5" />

	<!-- Firebase links -->
	<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase-app.js"></script>

	<!-- Add Firebase products that you want to use -->
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase-auth.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase-database.js"></script>
	<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase-messaging.js"></script>
	<!-- End PWA -->

	<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
	

	<!-- Mapbox dependencies -->
	<script src='https://api.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.js'></script>
	<link href='https://api.mapbox.com/mapbox-gl-js/v0.54.0/mapbox-gl.css' rel='stylesheet' />
	<!-- Mapbox dependencies -->


    </head>

<!--Userway widget for accessibility -->
<script type="text/javascript">


// Ability: Register service worker.
if ('serviceWorker' in navigator) {
window.addEventListener('load', () => {
    navigator.serviceWorker.register('./sw.js')
        .then((reg) => {
        console.log('Service worker registered.', reg);
        });
});
}

var _userway_config = {
 position: 3,
 size: 'small', 
// color: 'null', 
account: '8F9hvjQmMs'
};
</script>
<script type="text/javascript" src="https://cdn.userway.org/widget.js"></script>
<!--Userway widget for accessibility -->

<body> <!--start body-->
    <div class="container">
    	<div class="row">
    		<div class="col-md-12 col-xs-12 emblem">
    			<div class="logo">
    				<a href="index.php?type="><img src="assets/images/ability-logo.png" alt="The Ability Project Logo" /></a>
    			</div>
			</div>	
    	</div>
    </div>