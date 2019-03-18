var increment = 1;
var updateMode = true;
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
	if(updateMode){
		cargoShipCargo += increment;
	} else if(cargoShipCargo>0){
			cargoShipCargo -= increment;
	}
	document.getElementById("cargoShipCargo").innerHTML=cargoShipCargo;

}

function updateShipHatch(){
	if(updateMode){
		cargoShipHatch += increment;
	} else if(cargoShipHatch>0){
			cargoShipHatch -= increment;
	}
	document.getElementById("cargoShipHatch").innerHTML=cargoShipHatch;

}

function changeMode(){
	var updateModeToggle = document.getElementById('updateModeToggle');

	if(updateMode){
		updateMode=false;
		updateModeToggle.innerHTML="<b><u>Subtracting</u></b>";
	} else{
		updateMode=true;
		updateModeToggle.innerHTML="<b><u>Adding</u></b>";
	}
}

//Auto Experimental

//Rocket
function updateRocketL1Cargo(){
	if(updateMode){
	rocket1Cargo += increment;
	} else if(rocket1Cargo>0){
			rocket1Cargo -= increment;
	}
	document.getElementById("rocket1Cargo").innerHTML=rocket1Cargo;

}

function updateRocketL1Hatch(){
	if(updateMode){
	rocket1Hatch += increment;
} else if(rocket1Hatch>0){
			rocket1Hatch -= increment;
	}
	document.getElementById("rocket1Hatch").innerHTML=rocket1Hatch;

}

function updateRocketL2Cargo(){
	if(updateMode){
	rocket2Cargo += increment;
} else if(rocket2Cargo>0){
			rocket2Cargo -= increment;
	}
	document.getElementById("rocket2Cargo").innerHTML=rocket2Cargo;

}

function updateRocketL2Hatch(){
	if(updateMode){
	rocket2Hatch += increment;
	} else if(rocket2Hatch>0){
			rocket2Hatch -= increment;
	}
	document.getElementById("rocket2Hatch").innerHTML=rocket2Hatch;

}

function updateRocketL3Cargo(){
	if(updateMode){
	rocket3Cargo += increment;
} else if(rocket3Cargo>0){
			rocket3Cargo -= increment;
	}
	document.getElementById("rocket3Cargo").innerHTML=rocket3Cargo;

}

function updateRocketL3Hatch(){
	if(updateMode){
	rocket3Hatch += increment;
} else if(rocket3Hatch>0){
			rocket3Hatch -= increment;
	}
	document.getElementById("rocket3Hatch").innerHTML=rocket3Hatch;

}
