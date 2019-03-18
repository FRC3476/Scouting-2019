function postwith(to){

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
		'matchComments' : document.getElementById('matchComments').value
		};

		var id = document.getElementById('matchNum').value + "-" + document.getElementById('teamNum').value;
		console.log(JSON.stringify(nums));
		orangePersist.collection("avr").doc(id).set(nums);
		$.post( "dataHandler.php", nums).done(function( data ) {
		});
	}
