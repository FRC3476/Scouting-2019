<html>
<?php session_start();
include("header.php")?>
<body>
	<?php include("navbar.php")?>

	<div class="container row-offcanvas row-offcanvas-left">
		<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
			<h2>Team Ranking</h2>
			<table  class="sortable table table-hover" id="RawData" border="1">
				<tr>
					<th>Team Number</th>
					<th>Avg Teleop Cargo</th>
					<th>Avg Teleop Hatch</th>
					<th>Max Rocket Cargo</th>
					<th>Max Rocket Hatch</th>
					<th>Max Cargoship Cargo</th>
					<th>Max Cargoship Hatch</th>
					<th>Avg Auto Cargo</th>
					<th>Avg Auto Hatch</th>
					<th>Second Level Climb</th>
					<th>Third Level Climb</th>
					<th>Times Playes Defense</th>
				</tr>
			<?php
				include("databaseLibrary.php");
				$teamList = getTeamList();
				//$TeamDat = array();

				foreach($teamList as $TeamNumber){

					   $i=0;
					   $avgTeleopCargo = getAvgCargo($TeamNumber);
					   $avgTeleopHatch = getAvgHatch($TeamNumber);
					   $maxShipCargo = getMaxCargoshipCargo($TeamNumber);
					   $maxShipHatch = getMaxCargoshipHatch($TeamNumber);
					   $maxRocketCargo = getMaxRocketCargo($TeamNumber);
					   $maxRocketHatch = getMaxRocketHatch($TeamNumber);
					   $avgAutoCargo = getAvgCargoA($TeamNumber);
					   $avgAutoHatch = getAvgHatchA($TeamNumber);
						 $secondClimb = getTotalClimbTwo($TeamNumber);
						 $thirdClimb = getTotalClimbThree($TeamNumber);
						 $timesDefense = getTotalDefense($TeamNumber);


					echo("<tr>
					<td><a href='teamData.php?team=".$TeamNumber."'>".$TeamNumber."</a></td>
					<th>".$avgTeleopCargo."</th>
					<th>".$avgTeleopHatch."</th>
					<th>".$maxShipCargo."</th>
					<th>".$maxShipHatch."</th>
					<th>".$maxRocketCargo."</th>
					<th>".$maxRocketHatch."</th>
					<th>".$avgAutoCargo."</th>
					<th>".$avgAutoHatch."</th>
					<th>".$secondClimb."</th>
					<th>".$thirdClimb."</th>
					<th>".$timesDefense."</th>

					</tr>");
				}

			?>
			</table>
		</div>
	</div>
</body>
<?php include("footer.php") ?>
