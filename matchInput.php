<html>
<?php
	include("navBar.php");
?>
<script src="Orange-Rind/js/orangePersist.js"></script>
<script src="matchInputDynamic.js"></script>
<script>

function postwith(to){
	if(document.getElementById('penalties').value==""){
		document.getElementById('penalties').value=0;
	}

	if(document.getElementById('matchNum').value=="" || document.getElementById('teamNum').value==""){
		return;
	}

		var nums = {
		'userName' : document.getElementById('userName').value,
		'matchNum' : document.getElementById('matchNum').value,
		'teamNum' : document.getElementById('teamNum').value,
		'allianceColor' : document.getElementById('allianceColor').value,
		'autoPath' : JSON.stringify(coordinateList),
		'crossLineA' : document.getElementById('crossLineA').checked?1:0,

		'cargoShipCargo' : cargoShipCargo,
		'cargoShipHatch' : cargoShipHatch,
		'rocket1Cargo' : rocket1Cargo,
		'rocket1Hatch' : rocket1Hatch,
		'rocket2Cargo' : rocket2Cargo,
		'rocket2Hatch' : rocket2Hatch,
		'rocket3Cargo' : rocket3Cargo,
		'rocket3Hatch' : rocket3Hatch,

		'cargoShipCargoT' : cargoShipCargoT,
		'cargoShipHatchT' : cargoShipHatchT,
		'rocket1CargoT' : rocket1CargoT,
		'rocket1HatchT' : rocket1HatchT,
		'rocket2CargoT' : rocket2CargoT,
		'rocket2HatchT' : rocket2HatchT,
		'rocket3CargoT' : rocket3CargoT,
		'rocket3HatchT' : rocket3HatchT,


		'climb' : document.getElementById('climb').checked?1:0,
		'climbTwo' : document.getElementById('climbTwo').checked?1:0,
		'climbThree' : document.getElementById('climbThree').checked?1:0,
		'issues' : document.getElementById('issues').value,
		'defenseBot' : document.getElementById('defenseBot').checked?1:0,
		'defenseComments' : document.getElementById('defenseComments').value,
		'matchComments' : document.getElementById('matchComments').value,

		'penalties' : document.getElementById('penalties').value,
		};

		var id = document.getElementById('matchNum').value + "-" + document.getElementById('teamNum').value;
		console.log(JSON.stringify(nums));
		console.log("Hello");
		orangePersist.collection("avr").doc(id).set(nums);
		$.post( "dataHandler.php", nums).done(function( data ) {
		});
	}
</script>
<body>

<div class="container row-offcanvas row-offcanvas-left">
	<div class="well column  col-lg-12  col-sm-12 col-xs-12" id="content">
			<div class="row" style="text-align: center;">
				<div class="col-md-2">
					User:
					<input type="text" name="userName" onKeyUp="saveUserName()" id="userName" size="8" class="form-control">
				</div>
				<div class="col-md-2">
					Match Number:
					<input type="text" name="matchNum" id="matchNum" size="8" class="form-control">
				</div>
				<div class="col-md-2">
					Team Number:
					<input type= "text" name="teamNum"  id="teamNum" size="8" class="form-control">
				</div>
				<div class="col-md-3">
					Alliance Color:
					<select id="allianceColor" class="form-control">
						<option value='blue'>Blue</option>
						<option value='red'>Red</option>
					</select>
				</div>
				<div class="col-md-3">
					<button id="Switch" onclick="autotele();" class="btn btn-primary" >Teleop</button>
				</div>
			</div>

			<!--Auto Scouting-->
		<div id="autoscouting">
			<a><h2><b><u>Auto Scouting:</u></b></h2></a>
			<div class="row">
				<div class="col-md-4">
					<div class="togglebutton" id="reach">
						<h4><b>Crossed Auto Line:</b></h4>
						<label>
							<input id="crossLineA" type="checkbox">
						</label>
					</div>

					<a href="javascript:void(0)" class="btn btn-raised btn-boulder btn-material-teal-600" onclick="clearPath()"><b>CLEAR PATH</b></a>
						<canvas id="myCanvas" width="300" height="380" style="border:1px solid #d3d3d3;">
							<script src="Drawing.js"></script>
				</div>
				<div class="col-md-3">
							<a><h3><b><u>Rocket Levels:</u></b></h3></a>
							<!--Rocket Level 1-->
							<button type="button" onClick="updateRocketL3Cargo()" class="enlargedtext stylishCargo" id="bigFont"><a id="rocket3Cargo" class="enlargedtext">0</a> Cargo</button>
							<button type="button" onClick="updateRocketL3Hatch()" class="enlargedtext stylishHatch" id="bigFont">Hatches <a id="rocket3Hatch" class="enlargedtext">0</a></button>
							<br/>
							<br/>

							<!--Rocket Level 2-->
							<button type="button" onClick="updateRocketL2Cargo()" class="enlargedtext stylishCargo" id="bigFont"><a id="rocket2Cargo" class="enlargedtext">0</a> Cargo</button>
							<button type="button" onClick="updateRocketL2Hatch()" class="enlargedtext stylishHatch" id="bigFont">Hatches <a id="rocket2Hatch" class="enlargedtext">0</a></button>
							<br/>
							<br/>

							<!--Rocket Level 3-->
							<button type="button" onClick="updateRocketL1Cargo()" class="enlargedtext stylishCargo" id="bigFont"><a id="rocket1Cargo" class="enlargedtext">0</a> Cargo</button>
							<button type="button" onClick="updateRocketL1Hatch()" class="enlargedtext stylishHatch" id="bigFont">Hatches <a id="rocket1Hatch" class="enlargedtext">0</a></button>
							<br>
							<br>
							<br>

							<!--Cargo Ship-->
							<a><h3><b><u>Cargo Ship:</u></b></h3></a>
							<button type="button" onClick="updateShipCargo()" class="enlargedtext stylishCargo" id="bigFont"><a id="cargoShipCargo" class="enlargedtext">0</a> Cargo</button>
							<button type="button" onClick="updateShipHatch()" class="enlargedtext stylishHatch" id="bigFont">Hatches <a id="cargoShipHatch" class="enlargedtext">0</a></button>
							<br>
							<br>
							<br>

							<!--Toggle between adding and subtracting values-->
						<div class="togglebutton" id="reach">
							<h4 id="updateModeToggle"><b><u>Adding</u></b></h4>
							<label>
								<input id="updateMode" type="checkbox" onclick="changeMode();" checked>
							</label>
						</div>

					</div>
			</div>
		</div>

		<!--Tepeop scouting section-->
		<div id="teleopscouting">
			<a><h2><b><u>Teleop Scouting:</u></b></h2></a>
			<div class="row">
				<div class="col-md-6">
					<a><h3><b><u>Score:</u></b></h3></a>

					<script>

						//Teleop Cargo Ship
						function updateShipCargoT(){
							if(updateMode){
								cargoShipCargoT += increment;
							} else if(cargoShipCargoT>0){
									cargoShipCargoT -= increment;
							}
							document.getElementById("cargoShipCargoT").innerHTML=cargoShipCargoT;

						}

						function updateShipHatchT(){
							if(updateMode){
								cargoShipHatchT += increment;
							} else if(cargoShipHatchT>0){
									cargoShipHatchT -= increment;
							}
							document.getElementById("cargoShipHatchT").innerHTML=cargoShipHatchT;

						}


						function updateRocketL1CargoT(){
							if(updateMode){
							rocket1CargoT += increment;
						} else if(rocket1CargoT>0){
									rocket1CargoT -= increment;
							}
							document.getElementById("rocket1CargoT").innerHTML=rocket1CargoT;

						}

						function updateRocketL2CargoT(){
							if(updateMode){
							rocket2CargoT += increment;
						} else if(rocket2CargoT>0){
									rocket2CargoT -= increment;
							}
							document.getElementById("rocket2CargoT").innerHTML=rocket2CargoT;

						}

						function updateRocketL3CargoT(){
							if(updateMode){
							rocket3CargoT += increment;
						} else if(rocket3CargoT>0){
									rocket3CargoT -= increment;
							}
							document.getElementById("rocket3CargoT").innerHTML=rocket3CargoT;

						}


						function updateRocketL1HatchT(){
							if(updateMode){
							rocket1HatchT += increment;
						} else if(rocket1HatchT>0){
									rocket1HatchT -= increment;
							}
							document.getElementById("rocket1HatchT").innerHTML=rocket1HatchT;

						}

						function updateRocketL2HatchT(){
							if(updateMode){
							rocket2HatchT += increment;
						} else if(rocket2HatchT>0){
									rocket2HatchT -= increment;
							}
							document.getElementById("rocket2HatchT").innerHTML=rocket2HatchT;

						}

						function updateRocketL3HatchT(){
							if(updateMode){
							rocket3HatchT += increment;
						} else if(rocket3HatchT>0){
									rocket3HatchT -= increment;
							}
							document.getElementById("rocket3HatchT").innerHTML=rocket3HatchT;

						}

						function changeMode2(){
							var updateModeToggle = document.getElementById('updateModeToggle2');

							if(updateMode){
								updateMode=false;
								updateModeToggle.innerHTML="<b><u>Subtracting</u></b>";
							} else{
								updateMode=true;
								updateModeToggle.innerHTML="<b><u>Adding</u></b>";
							}
							console.log("updateMode2: "+updateMode);
						}
					</script>

					<script>
					var increment = 1;
					var updateMode2 = true;
					var cargoShipCargo = 0;
					var cargoShipHatch = 0;
					var rocket1Cargo = 0;
					var rocket1Hatch = 0;
					var rocket2Cargo = 0;
					var rocket2Hatch = 0;
					var rocket3Cargo = 0;
					var rocket3Hatch = 0;

					var cargoShipHatchT = 0;
					var cargoShipCargoT = 0;
					var rocket1CargoT = 0;
					var rocket1HatchT = 0;
					var rocket2CargoT = 0;
					var rocket2HatchT = 0;
					var rocket3CargoT = 0;
					var rocket3HatchT = 0;

					//Auto Scouting
					//Cargo Ship
					function updateShipCargo(){
						if(updateMode2){
							cargoShipCargo += increment;
						} else if(cargoShipCargo>0){
								cargoShipCargo -= increment;
						}
						document.getElementById("cargoShipCargo").innerHTML=cargoShipCargo;

					}

					function updateShipHatch(){
						if(updateMode2){
							cargoShipHatch += increment;
						} else if(cargoShipHatch>0){
								cargoShipHatch -= increment;
						}
						document.getElementById("cargoShipHatch").innerHTML=cargoShipHatch;

					}

					function changeMode(){
						var updateModeToggle = document.getElementById('updateModeToggle');

						if(updateMode2){
							updateMode2=false;
							updateModeToggle.innerHTML="<b><u>Subtracting</u></b>";
						} else{
							updateMode2=true;
							updateModeToggle.innerHTML="<b><u>Adding</u></b>";
						}
						console.log("updateMode2: "+updateMode2);
					}

					//Auto Experimental

					//Rocket
					function updateRocketL1Cargo(){
						if(updateMode2){
						rocket1Cargo += increment;
						} else if(rocket1Cargo>0){
								rocket1Cargo -= increment;
						}
						document.getElementById("rocket1Cargo").innerHTML=rocket1Cargo;

					}

					function updateRocketL1Hatch(){
						if(updateMode2){
						rocket1Hatch += increment;
					} else if(rocket1Hatch>0){
								rocket1Hatch -= increment;
						}
						document.getElementById("rocket1Hatch").innerHTML=rocket1Hatch;

					}

					function updateRocketL2Cargo(){
						if(updateMode2){
						rocket2Cargo += increment;
					} else if(rocket2Cargo>0){
								rocket2Cargo -= increment;
						}
						document.getElementById("rocket2Cargo").innerHTML=rocket2Cargo;

					}

					function updateRocketL2Hatch(){
						if(updateMode2){
						rocket2Hatch += increment;
						} else if(rocket2Hatch>0){
								rocket2Hatch -= increment;
						}
						document.getElementById("rocket2Hatch").innerHTML=rocket2Hatch;

					}

					function updateRocketL3Cargo(){
						if(updateMode2){
						rocket3Cargo += increment;
					} else if(rocket3Cargo>0){
								rocket3Cargo -= increment;
						}
						document.getElementById("rocket3Cargo").innerHTML=rocket3Cargo;

					}

					function updateRocketL3Hatch(){
						if(updateMode2){
						rocket3Hatch += increment;
					} else if(rocket3Hatch>0){
								rocket3Hatch -= increment;
						}
						document.getElementById("rocket3Hatch").innerHTML=rocket3Hatch;

					}

					</script>

						<!--Cargo Ship-->
						<a><h3><b><u>Cargo Ship:</u></b></h3></a>
						<button type="button" onClick="updateShipCargoT()" class="enlargedtext stylishCargo" id="bigFont"><a id="cargoShipCargoT" class="enlargedtext">0</a> Cargo</button>
						<button type="button" onClick="updateShipHatchT()" class="enlargedtext stylishHatch" id="bigFont">Hatches <a id="cargoShipHatchT" class="enlargedtext">0</a></button>
						<br>
						<br>
						<br>

						<a><h3><b><u>Rocket Levels:</u></b></h3></a>
						<button type="button" onClick="updateRocketL3CargoT()" class="enlargedtext stylishCargo" id="bigFont"><a id="rocket3CargoT" class="enlargedtext">0</a> Cargo</button>
						<button type="button" onClick="updateRocketL3HatchT()" class="enlargedtext stylishHatch" id="bigFont">Hatches <a id="rocket3HatchT" class="enlargedtext">0</a></button>
						<br>
						<br>

						<button type="button" onClick="updateRocketL2CargoT()" class="enlargedtext stylishCargo" id="bigFont"><a id="rocket2CargoT" class="enlargedtext">0</a> Cargo</button>
						<button type="button" onClick="updateRocketL2HatchT()" class="enlargedtext stylishHatch" id="bigFont">Hatches <a id="rocket2HatchT" class="enlargedtext">0</a></button>
						<br>
						<br>

						<button type="button" onClick="updateRocketL1CargoT()" class="enlargedtext stylishCargo" id="bigFont"><a id="rocket1CargoT" class="enlargedtext">0</a> Cargo</button>
						<button type="button" onClick="updateRocketL1HatchT()" class="enlargedtext stylishHatch" id="bigFont">Hatches <a id="rocket1HatchT" class="enlargedtext">0</a></button>
						<br>
						<br>
						<div class="togglebutton" id="reach">
							<h4 id="updateModeToggle2"><b><u>Adding</u></b></h4>
							<label>
								<input id="updateMode2" type="checkbox" onclick="changeMode2()" checked>
							</label>
						</div>

					<a><h3><b><u>Robot Issues:</u></b></h3></a>
						<select id="issues" multiple="" class="form-control">
						  <option value="N/A">None</option>
						  <option value="dead">Dead</option>
						  <option value="stopped working">Stopped Working</option>
						  <option value="fell over">Fell Over</option>
						</select>
				</div>
				<div class="col-md-6">
				<a><h3><b><u>Climb:</u></b></h3></a>
					<div class="togglebutton" id="reach">
						<h4><b>Successful First Level Climb?(Only for Full Climb)</b></h4>
						<label>
							<input id="climb" type="checkbox">
						</label>
					</div>
					<div class="togglebutton" id="reach">
						<h4><b>Successful Second Level Climb?</b></h4>
						<label>
							<input id="climbTwo" type="checkbox">
						</label>
					</div>
					<div class="togglebutton" id="reach">
						<h4><b>Successful Third Level Climb?</b></h4>
						<label>
							<input id="climbThree" type="checkbox">
						</label>
					</div>

				<a><h3><b><u>Defense:</u></b></h3></a>
					<div class="togglebutton" id="reach">
						<h4><b>Defense Played?</b></h4>
						<label>
							<input id="defenseBot" type="checkbox">
						</label>
						</div>
					</div>
					<br> <br>
					<div style="padding: 5px; padding-bottom: 10;" >
					<h4><b><u>Defense Comments: </u></b></h4>
					<textarea placeholder="How well they played defense, Strategy for defense" type="text" id="defenseComments" class="form-control md-textarea" rows="6"></textarea>
					</div>
					<br> <br>

					<div style="padding: 5px; padding-bottom: 10;" >
					<h4><b><u>Penalties: </u></b></h4>
					<textarea placeholder="Number of Penalties" type="text" id="penalties" class="form-control md-textarea" rows="6">0</textarea>
					</div>

					<br> <br>
					<div style="padding: 5px; padding-bottom: 10;" >
					<h4><b><u>Comments / Strategy: </u></b></h4>
					<textarea placeholder="Please write strategy of the robot or interesting observations of the robot" type="text" id="matchComments" class="form-control md-textarea" rows="6"></textarea>
					<br>
					<input type="button" value="Submit Data" id="submitButton" class="btn btn-primary" onclick="postwith('')" />
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<style>
	.stylishHatch{
		background-color: rgb(58,133,129);
		color:white;
		border-radius:2px;
		font-family:Helvetica;
		font-weight:bold;
		/*To get rid of weird 3D affect in some browsers*/
		border:solid rgb(58,133,129);
	}

	.stylishHatch:hover{
		background-color:Orange;
		border-color:Orange;
	}

	.stylishCargo{
		background-color: rgb(255,120,50);
		color:white;
		border-radius:2px;
		font-family:Helvetica;
		font-weight:bold;
		/*To get rid of weird 3D affect in some browsers*/
		border:solid rgb(255,120,50);
	}

	.stylishCargo:hover{
		background-color:Orange;
		border-color:Orange;
	}

	#bigFont{
		font-size:17px
	}

	.feedback:hover{
		background-color:Orange;
	}
</style>
</body>
</html>
<?php include ("footer.php"); ?>
