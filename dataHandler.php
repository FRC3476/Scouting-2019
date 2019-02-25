<?php
include("matchInput.php");
if( isset( $_POST['matchNum'] ) ) {
include("databaseLibrary.php");
 $user = filter_var($_POST['userName'], FILTER_SANITIZE_STRING);//($_SESSION['userIDCookie']);
 $matchNum = filter_var($_POST['matchNum'], FILTER_SANITIZE_STRING);  
 $teamNum = filter_var($_POST['teamNum'], FILTER_SANITIZE_STRING);  
 $ID = $matchNum."-".$teamNum;
 $allianceColor = filter_var($_POST['allianceColor'], FILTER_SANITIZE_STRING); 
 $autoPath = filter_var($_POST['autoPath'], FILTER_SANITIZE_STRING);  
 $crossLineA = filter_var($_POST['crossLineA'], FILTER_SANITIZE_STRING);  
 $cargoShipCargoA = filter_var($_POST['cargoShipCargoA'], FILTER_SANITIZE_STRING); 
 $cargoShipHatchA = filter_var($_POST['cargoShipHatchA'], FILTER_SANITIZE_STRING); 
 $cargoShipCargoT = filter_var($_POST['cargoShipCargoT'], FILTER_SANITIZE_STRING); 
 $cargoShipHatchT = filter_var($_POST['cargoShipHatchT'], FILTER_SANITIZE_STRING); 
 $rocket2Cargo = filter_var($_POST['rocket2Cargo'], FILTER_SANITIZE_STRING); 
 $rocket2Hatch = filter_var($_POST['rocket2Hatch'], FILTER_SANITIZE_STRING); 
 $climb = filter_var($_POST['climb'], FILTER_SANITIZE_STRING); 
 $climbTwo = filter_var($_POST['climbTwo'], FILTER_SANITIZE_STRING); 
 $climbThree = filter_var($_POST['climbThree'], FILTER_SANITIZE_STRING); 
 $issues = filter_var($_POST['issues'], FILTER_SANITIZE_STRING);  
 $defenseBot = filter_var($_POST['defenseBot'], FILTER_SANITIZE_STRING);  
 $defenseComments = filter_var($_POST['defenseComments'], FILTER_SANITIZE_STRING);  
 $matchComments = filter_var($_POST['matchComments'], FILTER_SANITIZE_STRING);  
 matchInput( $user,
			 $ID,
			 $matchNum,
			 $teamNum,
			 $allianceColor,
			 $autoPath,
			 $crossLineA,
			 $cargoShipCargo,
			 $cargoShipHatch,
			 $rocket1Cargo,
			 $rocket1Hatch,
			 $rocket2Cargo,
			 $rocket2Hatch,
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