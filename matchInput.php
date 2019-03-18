<html>
<?php
	include("navBar.php");
?>
<script src="Orange-Rind/js/orangePersist.js"></script>
<script src="matchInputButtons.js"></script>
<script src="matchInputDynamic.js"></script>
<script src="matchInputPost.js"></script>
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
							<button type="button" onClick="updateRocketL1Cargo()" class="enlargedtext stylishCargo"><a id="rocket1Cargo" class="enlargedtext">0</a> Cargo</button>
							<button type="button" onClick="updateRocketL1Hatch()" class="enlargedtext stylishHatch">Hatches <a id="rocket1Hatch" class="enlargedtext">0</a></button>
							<br/>
							<br/>

							<!--Rocket Level 2-->
							<button type="button" onClick="updateRocketL2Cargo()" class="enlargedtext stylishCargo"><a id="rocket2Cargo" class="enlargedtext">0</a> Cargo</button>
							<button type="button" onClick="updateRocketL2Hatch()" class="enlargedtext stylishHatch">Hatches <a id="rocket2Hatch" class="enlargedtext">0</a></button>
							<br/>
							<br/>

							<!--Rocket Level 3-->
							<button type="button" onClick="updateRocketL3Cargo()" class="enlargedtext stylishCargo"><a id="rocket3Cargo" class="enlargedtext">0</a> Cargo</button>
							<button type="button" onClick="updateRocketL3Hatch()" class="enlargedtext stylishHatch">Hatches <a id="rocket3Hatch" class="enlargedtext">0</a></button>
							<br>
							<br>
							<br>

							<!--Cargo Ship-->
							<a><h3><b><u>Cargo Ship:</u></b></h3></a>
							<button type="button" onClick="updateShipCargo()" class="enlargedtext stylishCargo"><a id="cargoShipCargo" class="enlargedtext">0</a> Cargo</button>
							<button type="button" onClick="updateShipHatch()" class="enlargedtext stylishHatch">Hatches <a id="cargoShipHatch" class="enlargedtext">0</a></button>
							<br>
							<br>
							<br>

							<!--Toggle between adding and subtracting values-->
						<div class="togglebutton" id="reach">
							<h4 id="updateModeToggle"><b><u>Adding</u></b></h4>
							<label>
								<input id="updateMode" type="checkbox" onclick="changeMode()" checked>
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
						}
					</script>

						<!--Cargo Ship-->
						<a><h3><b><u>Cargo Ship:</u></b></h3></a>
						<button type="button" onClick="updateShipCargoT()" class="enlargedtext stylishCargo"><a id="cargoShipCargoT" class="enlargedtext">0</a> Cargo</button>
						<button type="button" onClick="updateShipHatchT()" class="enlargedtext stylishHatch">Hatches <a id="cargoShipHatchT" class="enlargedtext">0</a></button>
						<br>
						<br>
						<br>

						<a><h3><b><u>Rocket Levels:</u></b></h3></a>
						<button type="button" onClick="updateRocketL1CargoT()" class="enlargedtext stylishCargo"><a id="rocket1CargoT" class="enlargedtext">0</a> Cargo</button>
						<button type="button" onClick="updateRocketL1HatchT()" class="enlargedtext stylishHatch">Hatches <a id="rocket1HatchT" class="enlargedtext">0</a></button>
						<br>
						<br>

						<button type="button" onClick="updateRocketL2CargoT()" class="enlargedtext stylishCargo"><a id="rocket2CargoT" class="enlargedtext">0</a> Cargo</button>
						<button type="button" onClick="updateRocketL2HatchT()" class="enlargedtext stylishHatch">Hatches <a id="rocket2HatchT" class="enlargedtext">0</a></button>
						<br>
						<br>

						<button type="button" onClick="updateRocketL3CargoT()" class="enlargedtext stylishCargo"><a id="rocket3CargoT" class="enlargedtext">0</a> Cargo</button>
						<button type="button" onClick="updateRocketL3HatchT()" class="enlargedtext stylishHatch">Hatches <a id="rocket3HatchT" class="enlargedtext">0</a></button>
						<br>
						<br>
						<div class="togglebutton" id="reach">
							<h4 id="updateModeToggle2"><b><u>Adding</u></b></h4>
							<label>
								<input id="updateMode" type="checkbox" onclick="changeMode2()" checked>
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
					<div class="togglebutton" id="reach">
						<h4><b>Successful Carry another robot?(Only for Full Climb)</b></h4>
						<label>
							<input id="bodyClimb" type="checkbox">
						</label>
					<div class="togglebutton" id="reach">
						<h4><b>Successful Carry two other robots?(Only for Full Climb)</b></h4>
						<label>
							<input id="doubleBodyClimb" type="checkbox">
						</label>
				<a><h3><b><u>Defense:</u></b></h3></a>
					<div class="togglebutton" id="reach">
						<h4><b>Defense Played?</b></h4>
						<label>
							<input id="defenseBot" type="checkbox">
						</label>
					</div>
					<br> <br>
					<div style="padding: 5px; padding-bottom: 10;" >
					<h4><b><u>Defense Comments: </u></b></h4>
					<textarea placeholder="How well they played defense, Strategy for defense" type="text" id="defenseComments" class="form-control md-textarea" rows="6"></textarea>
					</div>
					<br> <br>
					<div style="padding: 5px; padding-bottom: 10;" >
					<h4><b><u>Comments / Strategy: </u></b></h4>
					<textarea placeholder="Please write strategy of the robot or interesting observations of the robot" type="text" id="matchComments" class="form-control md-textarea" rows="6"></textarea>
					<br>
					<input type="button" value="Submit Data" id="submitButton" class="btn btn-primary" onclick="postwith('');" />
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
</style>
</body>
</html>
<?php include ("footer.php"); ?>
