<html>
<?php session_start();
include("navBar.php");?>
<body>
<script src="js/Chart.js"></script>
<style>
	body{
		padding: 0;
		margin: 0;
	}
	#canvas-holder{
		width:50%;
	}
	#canvas-holder2{
		width:50%;
	}
	#canvas-holder3{
		width:50%;
	}
	.rotate090 {

    -webkit-transform: rotate(90deg);
    -moz-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    -ms-transform: rotate(90deg);
    transform: rotate(90deg);
}
</style>
<script>
var $ = jQuery.noConflict();
</script>
<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-112  col-sm-12 col-xs-12" id="content">
	<?php
				if($_GET["team"]){
					$teamNumber = $_GET["team"];
					include("databaseName.php");
					include("databaseLibrary.php");
					//getTeamData($_GET["team"]);
					$teamData = getTeamData($teamNumber);

				}
		?>
		<form action="" method="get">
		Enter Team Number: <input class="control-label"type="number" name="team"  id="team"  size="10" height="10" width="40">
		<button id="submit" class="btn btn-primary" onclick="">Display</button>
		<div class="row">
			<div class = "col-md-4">
				<h1> Team <?php echo($_GET["team"]);?>  - <?php echo($teamData[0]); ?></h1>
				<div class="box">
					<div id="myCarousel" class="carousel slide" data-interval="false">
					  <ol class="carousel-indicators">
					  <?php
						$index = 0;
						while(file_exists("uploads/".$_GET["team"]."-".$index.".jpg")==1){
								if($index == 0){
									echo('<li data-target="#myCarousel" data-slide-to="'.$index.'" class="active"></li>');
								}
								else{
									echo('<li data-target="#myCarousel" data-slide-to="'.$index.'"></li>');
								}
								$index++;
						}

						$index = 0;
						while(file_exists("uploads/".$_GET["team"]."-".$index.".png")==1){
								if($index == 0){
									echo('<li data-target="#myCarousel" data-slide-to="'.$index.'" class="active"></li>');
								}
								else{
									echo('<li data-target="#myCarousel" data-slide-to="'.$index.'"></li>');
								}
								$index++;
						}

						$index = 0;
						while(file_exists("uploads/".$_GET["team"]."-".$index.".jpeg")==1){
								if($index == 0){
									echo('<li data-target="#myCarousel" data-slide-to="'.$index.'" class="active"></li>');
								}
								else{
									echo('<li data-target="#myCarousel" data-slide-to="'.$index.'"></li>');
								}
								$index++;
						}
					?>
					  </ol>
					  <div class="carousel-inner" role="listbox">
					  <?php
						$index = 0;
						while(file_exists("uploads/".$_GET["team"]."-".$index.".jpg")==1){
								if($index == 0){
									echo('<div class="item active" >
											<img   id="'.$_GET["team"].'-'.$index.'" src="uploads/'.$_GET["team"].'-'.$index.'.jpg" >
										 </div>');
								}
								else{
									echo('<div class="item" >
											<img   id="'.$_GET["team"].'-'.$index.'" src="uploads/'.$_GET["team"].'-'.$index.'.jpg" >
										 </div>');
								}
								$index++;
						}

						$index = 0;
						while(file_exists("uploads/".$_GET["team"]."-".$index.".png")==1){
								if($index == 0){
									echo('<div class="item active" >
											<img   id="'.$_GET["team"].'-'.$index.'" src="uploads/'.$_GET["team"].'-'.$index.'.png" >
										 </div>');
								}
								else{
									echo('<div class="item" >
											<img   id="'.$_GET["team"].'-'.$index.'" src="uploads/'.$_GET["team"].'-'.$index.'.png" >
										 </div>');
								}
								$index++;
						}
						?>
					  </div>
					  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
				<button class=" btn btn-material-purple">Auto Cargo</button>
				<button class=" btn btn-material-orange">Auto Hatch</button>
				<button class=" btn btn-material-green">Teleop Cargo</button>
				<button class=" btn btn-material-yellow">Teleop Hatch</button>

				<button class=" btn btn-material-blue">Second Level Climb</button>


				<button class=" btn btn-material-red">Third Level Climb</button>


				<canvas id="dataChart" width="300" height="250"></canvas>

				<script>
								var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
								var lineChartData = {
								labels : <?php echo(json_encode(matchNum($teamNumber)));?>,
								datasets : [
									{
										label: "Level 3 Climbs",
										fillColor : "rgba(220,220,220,0.1)",
										strokeColor : "red",
										pointColor : "rgba(220,220,220,1)",
										pointStrokeColor : "#ff0000",
										pointHighlightFill : "#fff",
										pointHighlightStroke : "rgba(220,220,220,1)",
										data : <?php echo(json_encode(getLevel3Climb($teamNumber))); ?>
									},

									{
										label: "Level 2 Climbs",
										fillColor : "rgba(220,220,220,0.1)",
										strokeColor : "blue",
										pointColor : "rgba(220,220,220,1)",
										pointStrokeColor : "#ffff00",
										pointHighlightFill : "#fff",
										pointHighlightStroke : "rgba(220,220,220,1)",
										data : <?php echo(json_encode(getLevel2Climb($teamNumber))); ?>
									},

									{
										label: "Auto Hatches",
										fillColor : "rgba(220,220,220,0.1)",
										strokeColor : "orange",
										pointColor : "rgba(220,220,220,1)",
										pointStrokeColor : "#ffff00",
										pointHighlightFill : "#fff",
										pointHighlightStroke : "rgba(220,220,220,1)",
										data : <?php echo(json_encode(getAutoHatches($teamNumber))); ?>
									},

									{
										label: "Auto Cargo",
										fillColor : "rgba(220,220,220,0.1)",
										strokeColor : "purple",
										pointColor : "rgba(220,220,220,1)",
										pointStrokeColor : "#ffff00",
										pointHighlightFill : "#fff",
										pointHighlightStroke : "rgba(220,220,220,1)",
										data : <?php echo(json_encode(getAutoCargo($teamNumber))); ?>
									},

									{
										label: "Teleop Cargo",
										fillColor : "rgba(220,220,220,0.1)",
										strokeColor : "green",
										pointColor : "rgba(220,220,220,1)",
										pointStrokeColor : "#ffff00",
										pointHighlightFill : "#fff",
										pointHighlightStroke : "rgba(220,220,220,1)",
										data : <?php echo(json_encode(getTeleopCargo($teamNumber))); ?>
									},

									{
										label: "Teleop Hatches",
										fillColor : "rgba(220,220,220,0.1)",
										strokeColor : "yellow",
										pointColor : "rgba(220,220,220,1)",
										pointStrokeColor : "#ffff00",
										pointHighlightFill : "#fff",
										pointHighlightStroke : "rgba(220,220,220,1)",
										data : <?php echo(json_encode(getTeleopHatches($teamNumber))); ?>
									},

								]
							}
								</script>


			</div>
			<div class = "col-md-4">
			<a><h3><b><u>Cargo and Hatch Statistics:</u></b></h3></a>
				<div class="table-responsive">
					<table class="table">
					<tbody>
						<tr class="info">
							<td>Average Hatch</td>
							<td><?php echo(getAvgHatch($teamNumber)); ?></td>
					  </tr>
					  <tr class="success">
							<td>Average Cargo</td>
							<td><?php echo(getAvgCargo($teamNumber)); ?></td>
					  </tr>
					  <tr class="danger">
							<td>Max Rocket Hatch</td>
							<td><?php echo(getMaxRocketHatch($teamNumber)); ?></td>
					  </tr>
					  <tr class="info">
							<td>Max Rocket Cargo</td>
							<td><?php echo(getMaxRocketCargo($teamNumber)); ?></td>
					  </tr>
					  <tr class="success">
							<td>Max Cargoship Hatch</td>
							<td><?php echo(getMaxCargoshipHatch($teamNumber)); ?></td>
					  </tr>
					  <tr class="danger">
							<td>Max Cargoship Cargo</td>
							<td><?php echo(getMaxCargoshipCargo($teamNumber)); ?></td>
					  </tr>
						<tr class="success">
							<td>Average Cargo in Auto</td>
							<td><?php echo(getAvgCargoA($teamNumber)); ?></td>
						</tr>
						<tr class="danger">
							<td>Average Hatches in Auto</td>
							<td><?php echo(getAvgHatchA($teamNumber)); ?></td>
						</tr>

						<tr class="info">
							<td>Highest Teleop Rocket Level</td>
							<td><?php echo(getHighestRocket($teamNumber)); ?></td>
						</tr>

					</tbody>
					</table>
				</div>
				<a><h3><b><u>Comments:</u></b></h3></a>
				<div class="table-responsive">
					<table class="table">
					<tbody>
						<tr class="success">
							<td>Match Strategy Comments</td>
							<td><?php $mc = matchComments($teamNumber);
										for($i = 0; $i!= sizeof($mc); $i++){
											echo("$mc[$i].").PHP_EOL;
										}?></td>
					  </tr>
					  <tr class="info">
							<td>Defense Comments</td>
							<td><?php $dc = defenseComments($teamNumber);
										for($i = 0; $i!= sizeof($dc); $i++){
											echo("$dc[$i].").PHP_EOL;
										}?></td>
					  </tr>
					  <tr class="danger">
							<td>Head Scout Comments</td>
							<td><?php $hc = headScoutComments($teamNumber);
										for($i = 0; $i!= sizeof($hc); $i++){
											echo("$hc[$i].").PHP_EOL;
										}?></td>
					  </tr>

						<tr class="danger">
							<td>Average Penalties</td>
							<td><?php echo(getAvgPenalties($teamNumber));?></td>
						</tr>

						<tr class="success">
						 <td>Avg Drive Ranking</td>
						 <td><?php echo(getAvgDriveRank($teamNumber)); ?></td>
					 </tr>


					</tbody>
					</table>

				</div>
			</div>
			<div class = "col-md-4">
				<a><h3><b><u>Pit Statistics:</u></b></h3></a>
				<div class="table-responsive">
					<table class="table">
					<tbody>
						<tr class="info">
							<td>Weight of Robot</td>
							<td><?php echo($teamData[1]); ?></td>
					  </tr>
					  <tr class="success">
							<td>Height of Robot</td>
							<td><?php echo($teamData[2]); ?></td>
					  </tr>
					  <tr class="danger">
							<td>No. of Batteries</td>
							<td><?php echo($teamData[3]); ?></td>
					  </tr>
					  <tr class="info">
							<td>Batteries Charged Simultaneously</td>
							<td><?php echo($teamData[4]); ?></td>
					  </tr>
					   <tr class="success">
							<td>Drive Train</td>
							<td><?php echo($teamData[5]); ?></td>
					  </tr>

						<tr class="info">
						 <td>Drive Skills</td>
						 <td><?php echo($teamData[11]); ?></td>
					 </tr>

					 <tr class="success">
						<td>Can Climb With Us</td>
						<td><?php echo($teamData[12]); ?></td>
					</tr>

				 <tr class="danger">
					<td>Can Cheescake</td>
					<td><?php echo($teamData[13]); ?></td>
				</tr>


					  <tr class="danger">
							<td>Pit Comments</td>
							<td><?php echo($teamData[6]); ?></td>
							<tr class="success">
							 <td>Camera Stream</td>
							 <td><?php echo($teamData[10]); ?></td>
						 </tr>
					  </tr>

						<tr class="info">
							<td>Sand Storm</td>
							<td><?php echo($teamData[7]); ?></td>
						</tr>
					</tbody>
					</table>
				</div>
				<div>
					<canvas id="myCanvas" width="300" height="330" style="border:1px solid #d3d3d3;"></canvas>
					<script type="text/javascript">
						var canvas = document.getElementById('myCanvas');
						var context = canvas.getContext('2d');
						var drawLine = false;
						var oldCoor = {};
						var i = 1;
						var t;
						var coordinateList = [];
						var lastCoordinate = {};
						var imageObj = new Image();
						var matchToPoints = [];
						<?php
							for($i = 0; $i != sizeof($teamData[8]); $i++){
								echo("matchToPoints[".$teamData[8][$i][2]."] = ".$teamData[8][$i][5].";");
							}
						?>
						  imageObj.onload = function() {
							makeCanvasReady();
							var ctx = document.getElementById("dataChart").getContext("2d");
							window.myLine = new Chart(ctx).Line(lineChartData, {responsive: true});
						  };
						  imageObj.src = 'images/RedField.png';

						function makeCanvasReady(){
							context.clearRect(0, 0, 300, 330);
							context.drawImage(imageObj, 0, 0, 300, 400);
						}
						function adjustCanvas(){
							$("#canvasHolder").css('height' , $(window).height()-25);
							$("#canvasHolder").css('height' , $(window).height()-25);
							$("#main").attr('width' , $("#canvasHolder").width());
							$("#main").attr('height' , $("#canvasHolder").height());
						}

						function drawPoint(context , x , y){
							context.fillRect(x,y,1,1);
						}

						function drawPointLines(){
							makeCanvasReady();
							var matchNumber = document.getElementById("matchNum").value;
							var a = matchToPoints[matchNumber];
							var color = "#FFFFFF";
								context.beginPath();
								context.strokeStyle = color;

							for(var i = 0; i !=a.length; i++){
								if(i == 0){
									context.moveTo(a[i][0],a[i][1]);
								}
								else{
									context.lineTo(a[i][0], a[i][1]);
								}
							}
							context.stroke();
						}


					</script>
					<h4><b>Match Number -</b></h4>
					<select onclick = "drawPointLines()"id="matchNum" class="form-control">
					<?php for($i = 0;$i != sizeof($teamData[8]); $i++){
							echo("<option value='".$teamData[8][$i][2]."'>".$teamData[8][$i][2]."</option>");
						  }?>
					</select>
				</div>


				<a><h3><b><u>Climb Statistics:</u></b></h3></a>
				<div class="table-responsive">
					<table class="table">
					<tbody>
						<tr class="danger">
							<td>Total Climbs</td>
							<td><?php echo(getTotalClimb($teamNumber)); ?></td>
					  </tr>
						<tr class="danger">
							<td>Total First Level Climbs</td>
							<td><?php echo(getTotalClimb($teamNumber)); ?></td>
					  </tr>
					  <tr class="info">
							<td>Total Second Level Climbs</td>
							<td><?php echo(getTotalClimbTwo($teamNumber)); ?></td>
					  </tr>
					  <tr class="success">
							<td>Total Third Level Climbs</td>
							<td><?php echo(getTotalClimbThree($teamNumber)); ?></td>
					  </tr>
					</tbody>
					</table>
				</div>
				<a><h3><b><u>D Statistics:</u></b></h3></a>
				<div class="table-responsive">
					<table class="table">
					<tbody>
						<tr class="danger">
							<td>Total Times Defense Played</td>
							<td><?php echo(getTotalDefense($teamNumber)); ?></td>
					  </tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<?php include("footer.php"); ?>
