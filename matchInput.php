<html>
<?php
include("navBar.php");
	?>
<script src="Orange-Rind/js/orangePersist.js"></script>
<script>
var increment = 1;
var keyPressOk = true;
var mode = true;
var removeStuff = 0;
var cargoShipCargo = 0;
var cargoShipHatch = 0;
var rocket1Cargo = 0;
var rocket1Hatch = 0;
var rocket2Cargo = 0;
var rocket2Hatch = 0;
var rocket3Cargo = 0;
var rocket3Hatch = 0;

var cargoShipCargoT = 0;
var cargoShipHatchT = 0;
var cargoShipCargoT = 0;
var cargoShipHatchT = 0;
var rocket1CargoT = 0;
var rocket1HatchT = 0;
var rocket2CargoT = 0;
var rocket2HatchT = 0;
var rocket3CargoT = 0;
var rocket3HatchT = 0;

//Auto
//Cargo Ship
function incrCargoCargoShip(){
	cargoShipCargo = cargoShipCargo + increment;
	document.getElementById("cargoShipCargo").innerHTML=cargoShipCargo;
}

function decCargoCargoShip(){
	cargoShipCargo = cargoShipCargo - increment;
	if (cargoShipCargo < 0){
		cargoShipCargo = 0;
	}
	document.getElementById("cargoShipCargo").innerHTML=cargoShipCargo;
}
function incrHatchCargoShip(){
	cargoShipHatch = cargoShipHatch + increment;
	document.getElementById("cargoShipHatch").innerHTML=cargoShipHatch;
}
function decHatchCargoShip(){
	cargoShipHatch = cargoShipHatch - increment;
	if (cargoShipHatch < 0){
		cargoShipHatch = 0;
	}
	document.getElementById("cargoShipHatch").innerHTML=cargoShipHatch;
}

//Rocket
function incrRocket1Cargo(){
	rocket1Cargo = rocket1Cargo + increment;
	document.getElementById("rocket1Cargo").innerHTML=rocket1Cargo;
}
function decRocket1Cargo(){
	rocket1Cargo = rocket1Cargo - increment;
	if (rocket1Cargo < 0){
		rocket1Cargo = 0;
	}
	document.getElementById("rocket1Cargo").innerHTML=rocket1Cargo;
}

function incrRocket1Hatch(){
	rocket1Hatch = rocket1Hatch + increment;
	document.getElementById("rocket1Hatch").innerHTML=rocket1Hatch;
}
function decRocket1Hatch(){
	rocket1Hatch = rocket1Hatch - increment;
	if (rocket1Hatch < 0){
		rocket1Hatch = 0;
	}
	document.getElementById("rocket1Hatch").innerHTML=rocket1Hatch;
}

//Rocket 2
function incrRocket2Cargo(){
	rocket2Cargo = rocket2Cargo + increment;
	document.getElementById("rocket2Cargo").innerHTML=rocket2Cargo;
}
function decRocket2Cargo(){
	rocket2Cargo = rocket2Cargo - increment;
	if (rocket2Cargo < 0){
		rocket2Cargo = 0;
	}
	document.getElementById("rocket2Cargo").innerHTML=rocket2Cargo;
}

function incrRocket2Hatch(){
	rocket2Hatch = rocket2Hatch + increment;
	document.getElementById("rocket2Hatch").innerHTML=rocket2Hatch;
}
function decRocket2Hatch(){
	rocket2Hatch = rocket2Hatch - increment;
	if (rocket2Hatch < 0){
		rocket2Hatch = 0;
	}
	document.getElementById("rocket2Hatch").innerHTML=rocket2Hatch;
}

//Rocket 3
function incrRocket3Cargo(){
	rocket3Cargo = rocket3Cargo + increment;
	document.getElementById("rocket3Cargo").innerHTML=rocket3Cargo;
}
function decRocket3Cargo(){
	rocket3Cargo = rocket3Cargo - increment;
	if (rocket3Cargo < 0){
		rocket3Cargo = 0;
	}
	document.getElementById("rocket3Cargo").innerHTML=rocket3Cargo;
}

function incrRocket3Hatch(){
	rocket3Hatch = rocket3Hatch + increment;
	document.getElementById("rocket3Hatch").innerHTML=rocket3Hatch;
}
function decRocket3Hatch(){
	rocket3Hatch = rocket3Hatch - increment;
	if (rocket3Hatch < 0){
		rocket3Hatch = 0;
	}
	document.getElementById("rocket3Hatch").innerHTML=rocket3Hatch;
}

//Teleop Scouting
//Teleop Cargo Ship
function incrCargoCargoShipT(){
	cargoShipCargoT = cargoShipCargoT + increment;
	document.getElementById("cargoShipCargoT").innerHTML=cargoShipCargoT;
}

function decCargoCargoShipT(){
	cargoShipCargoT = cargoShipCargoT - increment;
	if (cargoShipCargoT < 0){
		cargoShipCargoT = 0;
	}
	document.getElementById("cargoShipCargoT").innerHTML=cargoShipCargoT;
}
function incrHatchCargoShipT(){
	cargoShipHatchT = cargoShipHatchT + increment;
	document.getElementById("cargoShipHatchT").innerHTML=cargoShipHatchT;
}
function decHatchCargoShipT(){
	cargoShipHatchT = cargoShipHatchT - increment;
	if (cargoShipHatchT < 0){
		cargoShipHatchT = 0;
	}
	document.getElementById("cargoShipHatchT").innerHTML=cargoShipHatchT;
}


// Teleop Rocket L1

function nice(){
	console.log("Nice");
	cargoShipHatchT = cargoShipHatchT + increment;
	document.getElementById("cargoShipHatchT").innerHTML=cargoShipHatchT;
}


function incrRocket1CargoT(){
	rocket1CargoT = rocket1CargoT + increment;
	document.getElementById("rocket1CargoT").innerHTML=rocket1CargoT;
}
function decRocket1CargoT(){
	rocket1CargoT = rocket1CargoT - increment;
	if (rocket1CargoT < 0){
		rocket1CargoT = 0;
	}
	document.getElementById("rocket1CargoT").innerHTML=rocket1CargoT;
}

function incrRocket1HatchT(){
	rocket1HatchT = rocket1HatchT + increment;
	document.getElementById("rocket1HatchT").innerHTML=rocket1HatchT;
}
function decRocket1HatchT(){
	rocket1HatchT = rocket1HatchT - increment;
	if (rocket1HatchT < 0){
		rocket1HatchT = 0;
	}
	document.getElementById("rocket1HatchT").innerHTML=rocket1HatchT;
}

//Teleop Rocket L2
function incrRocket2CargoT(){
	rocket2CargoT = rocket2CargoT + increment;
	document.getElementById("rocket2CargoT").innerHTML=rocket2CargoT;
}
function decRocket2CargoT(){
	rocket2CargoT = rocket2CargoT - increment;
	if (rocket2CargoT < 0){
		rocket2CargoT = 0;
	}
	document.getElementById("rocket2CargoT").innerHTML=rocket2CargoT;
}

function incrRocket2HatchT(){
	rocket2HatchT = rocket2HatchT + increment;
	document.getElementById("rocket2HatchT").innerHTML=rocket2HatchT;
}
function decRocket2HatchT(){
	rocket2HatchT = rocket2HatchT - increment;
	if (rocket2HatchT < 0){
		rocket2HatchT = 0;
	}
	document.getElementById("rocket2HatchT").innerHTML=rocket2HatchT;
}


//Teleop Rocket L3
function incrRocket3CargoT(){
	rocket3CargoT = rocket3CargoT + increment;
	document.getElementById("rocket3CargoT").innerHTML=rocket3CargoT;
}
function decRocket3CargoT(){
	rocket3CargoT = rocket3CargoT - increment;
	if (rocket3CargoT < 0){
		rocket3CargoT = 0;
	}
	document.getElementById("rocket3CargoT").innerHTML=rocket3CargoT;
}

function incrRocket3HatchT(){
	rocket3HatchT = rocket3HatchT + increment;
	document.getElementById("rocket3HatchT").innerHTML=rocket3HatchT;
}
function decRocket3HatchT(){
	rocket3HatchT = rocket3HatchT - increment;
	if (rocket3HatchT < 0){
		rocket3HatchT = 0;
	}
	document.getElementById("rocket3HatchT").innerHTML=rocket3HatchT;
}

//-----------------------------------------------------------------
$(function(){
  		$('#teleopscouting').hide();
	});

function autotele(){
		if(mode == true){
			$('#autoscouting').hide();
			$('#teleopscouting').show();
			document.getElementById("Switch").innerHTML = "Auto";
		}
		else{
			$('#autoscouting').show();
			$('#teleopscouting').hide();
			document.getElementById("Switch").innerHTML="Teleop";
		}
		mode = !mode;
	}
	function toggleColor(){

		 var colorTog = document.getElementById("allianceColor");
		if (colorTog.innerHTML !== "Blue <b>(a)</b>") {
			colorTog.innerHTML = "Blue <b>(a)</b>";
			document.getElementById("allianceColor").value="Blue";
		}
		else {
			colorTog.innerHTML = "Red <b>(a)</b>";
			document.getElementById("allianceColor").value="Red";
		}
	}
	</script>

<body>

<script>
function postwith(to){



		var nums = {
		'userName' : document.getElementById('userName').value,
		'matchNum' : document.getElementById('matchNum').value,
		'teamNum' : document.getElementById('teamNum').value,
		'allianceColor' : document.getElementById('allianceColor').value,
		'autoPath' : JSON.stringify(coordinateList),
		'crossLineA' : document.getElementById('crossLineA').checked?1:0,
		//'cargoShipCargoA' : cargoShipCargoA,
		//'cargoShipHatchA' : cargoShipHatchA,
		//'cargoShipCargoT' : cargoShipCargoT,
		//'cargoShipHatchT' : cargoShipHatchT,
		'cargoShipCargo' : cargoShipCargo,
		'cargoShipHatch' : cargoShipHatch,
		'rocket1Cargo' : rocket1Cargo,
		'rocket1Hatch' : rocket1Hatch,
		'rocket2Cargo' : rocket2Cargo,
		'rocket2Hatch' : rocket2Hatch,
		'climb' : document.getElementById('climb').checked?1:0,
		'climbTwo' : document.getElementById('climbTwo').checked?1:0,
		'climbThree' : document.getElementById('climbThree').checked?1:0,
		'issues' : document.getElementById('issues').value,
		'defenseBot' : document.getElementById('defenseBot').checked?1:0,
		'defenseComments' : document.getElementById('defenseComments').value,
		'matchComments' : document.getElementById('matchComments').value
		};
		var id = document.getElementById('matchNum').value + "-" + document.getElementById('teamNum').value;
		console.log(JSON.stringify(nums));
		//console.log(nums);
		orangePersist.collection("avr").doc(id).set(nums);
		$.post( "dataHandler.php", nums).done(function( data ) {
		});
	}
</script>
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
								  imageObj.onload = function() {
									context.drawImage(imageObj, 0, 0, 300, 380);
								  };
								  imageObj.src = 'images/autoPath.png';

								$(document).ready(function(){
									orangePersist.initializeApp();
									console.log("GETTING USERNAME");
									$("#userName").val(localStorage.getItem("userName"));
								});

								function saveUserName(){
									console.log("SETTING USERNAME");
									localStorage.setItem("userName", $("#userName").val());
								}

								function clearPath(){
									context.clearRect(0, 0, 300, 330);
									context.drawImage(imageObj, 0, 0, 300, 380);
									coordinateList = [];
									lastCoordinate = {};
								}

								function addCoordinate(coor){
									coordinateList.push(coor);
								}

								function updateRobotHTML(){

								}

								function randomColor(){
									var choices = "0123456789abcdef";
									var out = "#";
									for(var i = 0; i < 6; i++){
										out += choices[Math.floor(Math.random() * 16)];
									}
									return(out);
								}

								function adjustCanvas(){
									$("#canvasHolder").css('height' , $(window).height()-25);
									$("#canvasHolder").css('height' , $(window).height()-25);
									$("#main").attr('width' , $("#canvasHolder").width());
									$("#main").attr('height' , $("#canvasHolder").height());
								}

								function resize(){
									//$("#main").outerHeight($(window).height()-$("#main").offset().top- Math.abs($("#main").outerHeight(true) - $("#main").outerHeight()));
									//$("#main").outerHeight(100*i);
									//$("#main").outerWidth(100*i);
									canvas.width = $(window).width() - 35;
									canvas.height = $(window).height() - 25;
								}

								//$(document).ready(function(){
									$.material.init()
									//resize();
									adjustCanvas();
									$(window).on("resize", function(){
										//resize();
										adjustCanvas();
									});
									context.stroke();
									//$("#main")[0].webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT); //Chrome
									//$("#main")[0].mozRequestFullScreen(); //Firefox
									canvas.addEventListener('touchmove', movePath, false);
									canvas.addEventListener('touchstart', startPoint, false);
									canvas.addEventListener('touchend', endPoint, false);

									canvas.addEventListener('mousemove', movePath, false);
									canvas.addEventListener('mousedown', startPoint, false);
									canvas.addEventListener('mouseup', endPoint, false);
								//});

								function getMousePos(canvas, evt) {
									var rect = canvas.getBoundingClientRect();
									var evtType = evt.constructor.name;
									if(evtType == "TouchEvent"){
										return {
											x: evt.touches[0].clientX - rect.left,
											y: evt.touches[0].clientY - rect.top
											};
									}
									else if(evtType = "MouseEvent"){
										return {
											x: evt.clientX - rect.left,
											y: evt.clientY - rect.top
											};
									}
									else{
										alert("Input type not supported!")
									}
								}

								function drawPoint(context , x , y){
									context.fillRect(x,y);
								}

								function drawPointLines(context , point){
									var color = "#FFFFFF";
									if(lastCoordinate.length == 0){
										lastCoordinate = point;
									}
									else{
										context.beginPath();
										context.strokeStyle = color;
										context.moveTo(lastCoordinate[0] , lastCoordinate[1]);
										context.lineTo(point[0] , point[1]);
										addCoordinate(point);
										lastCoordinate = point;
										context.stroke();
									}
								}

								function movePath(evt){
									t = evt;
									if(drawLine){
										var mousePos = getMousePos(canvas, evt);
										var message = mousePos.x + ' , ' + mousePos.y;
										//drawPoint(context , mousePos.x , mousePos.y);
										drawPointLines(context , [mousePos.x , mousePos.y]);
										console.log(message);
									}
										evt.preventDefault();
										return false;
								}

								function startPoint(evt){
									console.log("A");
									drawLine = true;
									evt.preventDefault();
									return false;
								}

								function endPoint(evt){
									console.log("B");
									drawLine = false;
									evt.preventDefault();
									return false;
								}

							</script>
				</div>
				<div class="col-md-2">
					<a><h3><b><u>Rocket L3:</u></b></h3></a>
						<h4><b>No. of Cargos:</b></h4>
							<button type="button" onClick="decRocket3Cargo()" class="enlargedtext stylish">-</button>
							<a id="rocket3Cargo" class="enlargedtext">0</a>
							<button type="button" onClick="incrRocket3Cargo()" class="enlargedtext stylish">+</button>
						<h4><b>No. of Hatches:</b></h4>
							<button type="button" onClick="decRocket3Hatch()" class="enlargedtext stylish">-</button>
							<a id="rocket3Hatch" class="enlargedtext">0</a>
							<button type="button" onClick="incrRocket3Hatch()" class="enlargedtext stylish">+</button>
							<br>

				<a><h3><b><u>Rocket L2:</u></b></h3></a>
					<h4><b>No. of Cargos:</b></h4>
						<button type="button" onClick="decRocket2Cargo()" class="enlargedtext stylish">-</button>
						<a id="rocket2Cargo" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket2Cargo()" class="enlargedtext stylish">+</button>
					<h4><b>No. of Hatches:</b></h4>
						<button type="button" onClick="decRocket2Hatch()" class="enlargedtext stylish">-</button>
						<a id="rocket2Hatch" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket2Hatch()" class="enlargedtext stylish">+</button>
						<br>
				<a><h3><b><u>Rocket L1:</u></b></h3></a>
					<h4><b>No. of Cargos:</b></h4>
						<button type="button" onClick="decRocket1Cargo()" class="enlargedtext stylish">-</button>
						<a id="rocket1Cargo" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket1Cargo()" class="enlargedtext stylish">+</button>
					<h4><b>No. of Hatches:</b></h4>
						<button type="button" onClick="decRocket1Hatch()" class="enlargedtext stylish">-</button>
						<a id="rocket1Hatch" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket1Hatch()" class="enlargedtext stylish">+</button>
						<br>
					</div>
				<div class="col-md-6">
				<a><h3><b><u>Cargo Ship:</u></b></h3></a>
					<h4><b>No. of Cargos:</b></h4>
						<button type="button" onClick="decCargoCargoShip()" class="enlargedtext stylish">-</button>
						<a id="cargoShipCargo" class="enlargedtext">0</a>
						<button type="button" onClick="incrCargoCargoShip()" class="enlargedtext stylish">+</button>
					<h4><b>No. of Hatches:</b></h4>
						<button type="button" onClick="decHatchCargoShip()" class="enlargedtext stylish">-</button>
						<a id="cargoShipHatch" class="enlargedtext">0</a>
						<button type="button" onClick="incrHatchCargoShip()" class="enlargedtext stylish">+</button>
						<br>
						<br>
						<br>
						<img src="images/field.png" width="500" height="250">
				</div>
			</div>
		</div>

		<!--Tepeop scouting section-->
		<div id="teleopscouting">
			<a><h2><b><u>Teleop Scouting:</u></b></h2></a>
			<div class="row">
				<div class="col-md-6">
					<a><h3><b><u>Score:</u></b></h3></a>

						<!--Cargo Ship-->
					<h4><b>No. of Cargos on Cargo Ship:</b></h4>
						<button type="button" onClick="decCargoCargoShipT()" class="enlargedtext stylish">-</button>
						<a id="cargoShipCargoT" class="enlargedtext">0</a>
						<button type="button" onClick="incrCargoCargoShipT()" class="enlargedtext stylish">+</button>

					<h4><b>No. of Hatch on Cargo Ship:</b></h4>
						<button type="button" onClick="decHatchCargoShipT()" class="enlargedtext stylish">-</button>
						<a id="cargoShipHatchT" class="enlargedtext">0</a>
						<button type="button" onClick="incrHatchCargoShipT()" class="enlargedtext stylish">+</button>


						<!--First level rocket-->
					<h4><b>No. of Cargos on 1st Level Rocekt:</b></h4>
						<button type="button" onClick="decRocket1CargoT()" class="enlargedtext stylish">-</button>
						<a id="rocket1CargoT" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket1CargoT()" class="enlargedtext stylish">+</button>

					<h4><b>No. of Hatches on 1st Level Rocekt:</b></h4>
						<button type="button" onClick="decRocket1HatchT()" class="enlargedtext stylish">-</button>
						<a id="rocket1HatchT" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket1HatchT()" class="enlargedtext stylish">+</button>

						<!--Second level rocket-->
					<h4><b>No. of Cargos on 2nd Level Rocket:</b></h4>
						<button type="button" onClick="decRocket2CargoT()" class="enlargedtext stylish">-</button>
						<a id="rocket2CargoT" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket2CargoT()" class="enlargedtext stylish">+</button>

					<h4><b>No. of Hatches on 2nd Level Rocket:</b></h4>
						<button type="button" onClick="decRocket2HatchT()" class="enlargedtext stylish">-</button>
						<a id="rocket2HatchT" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket2HatchT()" class="enlargedtext stylish">+</button>


						<!--Third level rocket-->
						<h4><b>No. of Cargos on 3nd Level Rocket:</b></h4>
							<button type="button" onClick="decRocket3CargoT()" class="enlargedtext stylish">-</button>
							<a id="rocket3CargoT" class="enlargedtext">0</a>
							<button type="button" onClick="incrRocket3CargoT()" class="enlargedtext stylish">+</button>

					<h4><b>No. of Hatches on 3rd Level Rocket:</b></h4>
					    <button type="button" onClick="decRocket3HatchT()" class="enlargedtext stylish">-</button>
						<a id="rocket3HatchT" class="enlargedtext">0</a>
						<button type="button" onClick="incrRocket3HatchT()" class="enlargedtext stylish">+</button>

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
	.stylish{
		background-color: rgb(15,129,120);
		color:white;
		border-radius:5px;
		font-family:Impact;
		/*To get rid of weird 3D affect in some browsers*/
		border:solid rgb(15,129,120);
	}

	.stylish:hover{
		background-color:Orange;
		border-color:Orange;
	}
</style>
</body>
</html>
<?php include ("footer.php"); ?>
