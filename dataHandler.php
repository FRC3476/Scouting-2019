<?php
include("matchInput.php");

function filter($str){
  return filter_var($str, FILTER_SANITIZE_STRING);
}

if( isset( $_POST['matchNum'] ) ) {
include("databaseLibrary.php");
$user = filter($_POST['user']);

$matchNum = filter($_POST['matchNum']);
$teamNum = filter($_POST['teamNum']);
$allianceColor = filter($_POST['allianceColor']);
$autoPath = filter($_POST['autoPath']);
$crossLineA = filter($_POST['crossLineA']);

$ID = $matchNum."-".$teamNum;
$cargoShipCargo = filter($_POST['cargoShipCargo']);
$cargoShipHatch = filter($_POST['cargoShipHatch']);

$rocket1Cargo = filter($_POST['rocket1Cargo']);
$rocket1Hatch = filter($_POST['rocket1Hatch']);
$rocket2Cargo = filter($_POST['rocket2Cargo']);
$rocket2Hatch = filter($_POST['rocket2Hatch']);
$rocket3Cargo = filter($_POST['rocket3Cargo']);
$rocket3Hatch = filter($_POST['rocket3Hatch']);

$cargoShipCargoT = filter($_POST['cargoShipCargoT']);
$cargoShipHatchT = filter($_POST['cargoShipHatchT']);

$rocket1CargoT = filter($_POST['rocket1CargoT']);
$rocket1HatchT = filter($_POST['rocket1HatchT']);
$rocket2CargoT = filter($_POST['rocket2CargoT']);
$rocket2HatchT = filter($_POST['rocket2HatchT']);
$rocket3CargoT = filter($_POST['rocket3CargoT']);
$rocket3HatchT = filter($_POST['rocket3HatchT']);

$climb = filter($_POST['climb']);
$climbTwo = filter($_POST['climbTwo']);
$climbThree = filter($_POST['climbThree']);
$issues = filter($_POST['issues']);
$defenseBot = filter($_POST['defenseBot']);
$defenseComments = filter($_POST['defenseComments']);
$matchComments = filter($_POST['matchComments']);

 matchInput( $user,
            $ID,
            $matchNum,
            $teamNum,
            $allianceColor,
            $autoPath,
            $crossLineA,
            $cargoShipCargo,
            $cargoShipHatch,
            $cargoShipCargoT,
            $cargoShipHatchT,
            $rocket1Cargo,
            $rocket1Hatch,
            $rocket2Cargo,
            $rocket2Hatch,
            $rocket3Cargo,
            $rocket3Hatch,
            $rocket1CargoT,
            $rocket1HatchT,
            $rocket2CargoT,
            $rocket2HatchT,
            $rocket3CargoT,
            $rocket3HatchT,
            $climb,
            $climbTwo,
            $climbThree,
            $issues,
            $defenseBot,
            $defenseComments,
            $matchComments);
}

?>
<script>
function getMatchData() {
	$.ajax({
		type : "POST",
		url : "perrythescout/dataHandler.php?matchData:",
		data : JSON.stringify(nums),
		success : success,
	});
}


</script>
