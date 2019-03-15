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
