<?php include_once 'z_head.php'; ?>
	<!-- Show our findings after the project -->
	<div class="row " style="margin-top: 30px;">
		<div class="container"><br/> <br/>
			<center><h3> Ability Volunteers Filling</h3></center>
			<center><h4 class="type"> Volunteer activity during data collection  </h4></center>

            <div class="row">
                <div class="col-md-6">
                    <center> <h4>Indoor Questionnaire</h4> </center>
                    <hr/>
                    <div class="col-md-6 top">
                        <h5> Top 10 Highest Contributors </h5>
                        <ul id="topHin"></ul>
                    </div>
                    <div class="col-md-6 least">
                        <h5> Top 10 Least Contributors </h5>
                        <ul id="topLin"></ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <center> <h4>Outdoor Questionnaire</h4> </center>
                    <hr/>
                    <div class="col-md-6 top">
                        <h4> Top 10 Highest <br>Contributors </h4>
                        <ul id="topHout"></ul>
                    </div>
                    <div class="col-md-6 least">
                        <h4> Top 10 Least <br>Contributors </h4>
                        <ul id="topLout"></ul>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-md-12">
						<div id="volunteers"></div>
				</div>
				
			</div>
		</div>
	</div>
         


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

<script>
// <!-- Get top stats for indoor and outdoor questionnaires -->
// <!-- Top 10 indoor -->
$(document).ready(function(){

  // Top 10 indoor highest
  $.ajax({
				type: "post",
				url: "action.php",
				data: {
					form: "highcharts",
					stat: "topHin"
				},
				beforeSend: function(){
					$('#topHin').html('<p> Fetching top 10 highest contributors, <br/> please wait... </p>');
				},

				success: function(e){
          //  alert(e);
						$('#topHin').html(e);
				
					// $('#fdbk').html( e + '<p> Click <a href="index.php?type=">here </a> if you are not redirected</p>');
				}
  });
  
// <!-- Top 10 indoor lowest -->
  $.ajax({
          type: "post",
          url: "action.php",
          data: {
            form: "highcharts",
            stat: "topLin"
          },
          beforeSend: function(){
            $('#topLin').html('<p> Fetching top 10 contributors,<br/> please wait... </p>');
          },

          success: function(e){
            // alert(e);
              $('#topLin').html(e);
          
            // $('#fdbk').html( e + '<p> Click <a href="index.php?type=">here </a> if you are not redirected</p>');
          }
    });
})
</script>












<!-- Highcharts scripts -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>


<!-- Scripts for the modal -->
<script>

// highcharts start here
Highcharts.chart('volunteers', {

title: {
  text: 'Volunteers entries for Ability Project'
},

subtitle: {
  text: 'Between 29th April to '
},

yAxis: {
  title: {
    text: 'Number of Entries'
  }
},
legend: {
  layout: 'vertical',
  align: 'right',
  verticalAlign: 'middle'
},

plotOptions: {
  series: {
    label: {
      connectorAllowed: false
    },
    pointStart: 2010
  }
},

series: [{
  name: 'Installation',
  data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
  name: 'Manufacturing',
  data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}, {
  name: 'Sales & Distribution',
  data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
}, {
  name: 'Project Development',
  data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
}, {
  name: 'Other',
  data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
}],

responsive: {
  rules: [{
    condition: {
      maxWidth: 500
    },
    chartOptions: {
      legend: {
        layout: 'horizontal',
        align: 'center',
        verticalAlign: 'bottom'
      }
    }
  }]
}

});
// highcharts end here





$(document).ready(function(){


})




        </script>        
    </body>
</html>