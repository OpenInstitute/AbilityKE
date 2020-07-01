<?php include_once 'z_head.php'; ?>
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
    
    
    
    <body>
  	
	<!-- Show our findings after the project -->
	<!-- <div class="row " style="margin-top: 30px;"> -->
	<div class="row">
		<div class="container"><br/> <br/>
			<center><h3> MapAbility Checklist</h3></center>
			<center><h4 class="type"><?php if(!empty($type)){ echo $type. ' checklist'; }?></h4></center>
			<div class="row">
				<div class="col-md-12">
						<?php include 'form.php'; ?>
				</div>
			</div>
		</div>
	</div>

<!-- Check if user added email address to proceed -->
<?php //if(!isset($_SESSION['name'])){ ?>
<!-- <div class="login-form">

	<center><h3>Please enter email address to proceed</h3></center>
	<form name="login" method="post" name="login">
	<div class="login">
        <div class="col-md-8 col-sm-8 col-xs-8">
        <input type="text" name="email" id="email" value="" class="email" placeholder="Please enter your email address">
        </div> 

		<div class="col-md-4 col-sm-4 col-xs-4">
			<button type="submit" id="sbmt" name="submit" class="btn btn-block btn-default"><i class="far fa-arrow-alt-circle-right"></i></button>
		</div>
		<div id="fdbk"></div>
    </div>
	
	</form>
</div> -->
<?php //} ?>              


<!-- Initialize firebase -->

<script src="https://www.gstatic.com/firebasejs/5.11.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDCC1BCS90S2I9_8SROUKocJUMepd8f6eE",
    authDomain: "ability-project.firebaseapp.com",
    databaseURL: "https://ability-project.firebaseio.com",
    projectId: "ability-project",
    storageBucket: "ability-project.appspot.com",
    messagingSenderId: "809627450745"
  };
  firebase.initializeApp(config);
</script>
<!-- Initialize firebase -->


<!-- Scripts for the modal -->
<script>


$(document).ready(function(){
	$('#sbmt').on('click', function(e){
		let email = $('#email').val();
		if(email !== ''){
			// Initialize ajax
			$.ajax({
				type: "post",
				url: "action.php",
				data: {
					form: "login",
					email: email
				},
				beforeSend: function(){
					$('#fdbk').append('<p>Checking, please wait...</p>');
				},

				success: function(e){
						$('#fdbk').append('<p>'+ e +'</p>');
						$('.login-form').hide();
				
					// $('#fdbk').html( e + '<p> Click <a href="index.php?type=">here </a> if you are not redirected</p>');
				}
			})
		}
	});



	$('#select').on('change', function(){
		let val = this.value;
		$.ajax({
			url: "action.php",
			type: "post",
			data: {
					 zone: val,
				   type: "<?php echo $type; ?>",
				   form: "indoor"
			},
			success: function(e){
				// alert(e);
				$('.buildingsX').show();
				$('.buildingsX').find('select').html(e);
			}
		});
		
	});
	
	$('#selOutdoor').on('change', function(){
		let val = this.value;
	
		$.ajax({
			url: "action.php",
			type: "post",
			data: {
				   zone: val,
				   type: "<?php echo $type; ?>",
				   form: "outdoorsi"
			},
			success: function(e){
				$('.streets').show();
				$('.streets').find('select').html(e);
				// $('.streets').html(e);
			}
		});
		
	})
})


$(document).ready(function(){
	// $('#LatLong').val("Keff");
	// Prevent our button from submitting
	// $('#loc').on('click', function(e){
		// e.preventDefault();
		// Define function for geo location
	//  var x = document.getElementById("LatLong");

	// function getLocation() {
	// 	if (navigator.geolocation) {
	// 	navigator.geolocation.getCurrentPosition(showPosition);
	// 	} else { 
	// 	//x.innerHTML = "Geolocation is not supported by this browser.";
	// 	$('#LatLong').val("Geolocation is not supported by this browser.");
	// 	}
	// }

	// function showPosition(position) {
	// 	kef = "Latitude: " + position.coords.latitude + 
	// 	"<br>Longitude: " + position.coords.longitude;
	// 	$('#LatLong').val(kef);
	// }

	// console.log(getLocation());

	// });

})

var x = document.getElementById("LatLong");

function getLocation() {
	if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(showPosition);
	} else { 
	x.innerHTML = "Geolocation is not supported by this browser.";
	}
}

function showPosition(position) {
	let lat = position.coords.latitude;
	let long = position.coords.longitude;
	// x.innerHTML  = "Latitude: " + position.coords.latitude + 
	// "<br>Longitude: " + position.coords.longitude;
	
	let coordinates = lat + ',' + long;
	x.value = coordinates;
}

// console.log(getLocation());


function getUserMeta(){
	let url = 'https://ipapi.co/json/';
	let res = '';
	// console.log(url);
	$.ajax({
		url: url,
		success: function(e){
			res = e;
		}
	});
	// alert('res is ' + res);
}

getUserMeta();



function getUserAgent(){
	let ua = navigator.appCodeName;
	console.log('user agent is' + ua);
}


</script>
     
    </body>
</html>