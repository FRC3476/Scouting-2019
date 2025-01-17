<?php
include("databaseName.php");
	//Input- runQuery, establishes connection with server, runs query, closes connection.
	//Output- queryOutput, data to/from the tables in phpMyAdmin databases.
	function runQuery($queryString){
		global $servername;
		global $username;
		global $password;
		global $dbname;
		global $pitScoutTable;
		global $matchScoutTable;
		//Establish Connection
		try{
			$conn = connectToDB();
		}
		catch(Exception $e){
			error_log("CREATING DB");
			createDB();
			$conn = connectToDB();
		}
		//new mysqli($servername, $username, $password, $dbname);
		//error_log($queryString);
		try{
			$statement = $conn->prepare($queryString);
		}
		catch(PDOException $e){
			error_log($e->getMessage());
			error_log($e->getCode());
			if($e->getCode() == "42S02"){
				error_log("CREATING TABLES");
				createTables();
			}
			$statement = $conn->prepare($queryString);
		}
		if(!$statement->execute()){
			die("Failed!" );
		}
		try{
			//error_log("".$statement->fetchAll());
			return $statement->fetchAll();
		}
		catch(Exception $e){
			return;
		}
		// Check connection
		/*if ($conn->connect_error) {
			//Try to create tables
			createTables();
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		}
		//Assign output of query to seperate var
		$queryOutput = 0;
		try {
			$queryOutput = $conn->query($queryString);
		}catch (mysqli_sql_exception $e) {
			error_log("Error Code <br>".$e->getCode());
			error_log("Error Message <br>".$e->getMessage());
			error_log("Strack Trace <br>".nl2br($e->getTraceAsString()));
		}
		//$queryOutput = $conn->query($queryString);
		//Close connection
		$conn->close();
		//Return output
		return($queryOutput);*/
	}
	function createDB(){
		global $dbname;
		$connection = connectToServer();
		$statement = $connection->prepare('CREATE DATABASE IF NOT EXISTS '.$dbname);
		if(!$statement->execute()){
			throw new Exception("constructDatabase Error: CREATE DATABASE query failed.");
		}
	}
	function connectToServer(){
		global $servername;
		global $username;
		global $password;
		global $dbname;
		global $charset;
		$dsn = "mysql:host=".$servername.";charset=".$charset;
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false
		];
		return(new PDO($dsn, $username, $password, $opt));
	}
	function connectToDB(){
		global $servername;
		global $username;
		global $password;
		global $dbname;
		global $charset;
		$dsn = "mysql:host=".$servername.";dbname=".$dbname.";charset=".$charset;
		$opt = [
			PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES   => false
		];
		return(new PDO($dsn, $username, $password, $opt));
	}
	function createTables(){
		global $servername;
		global $username;
		global $password;
		global $dbname;
		global $pitScoutTable;
		global $matchScoutTable;
		global $headScoutTable;
		$conn = connectToDB();
		$query = "CREATE TABLE ".$dbname.".".$pitScoutTable. " (
			teamNumber VARCHAR(50) NOT NULL PRIMARY KEY,
			teamName VARCHAR(60) NOT NULL,
			weight VARCHAR(20) NOT NULL,
			height VARCHAR(20) NOT NULL,
			numBatteries VARCHAR(20) NOT NULL,
			chargedBatteries VARCHAR(20) NOT NULL,
			driveTrain VARCHAR(20) NOT NULL,
			pitComments VARCHAR(100) NOT NULL,
			auto VARCHAR(20) NOT NULL,
			cameraStream VARCHAR(4) NOT NULL,
			driveSkills VARCHAR(20) NOT NULL,
			doubleClimb VARCHAR(4) NOT NULL,
			cheesecake VARCHAR(4) NOT NULL
		)";
		$statement = $conn->prepare($query);
		if(!$statement->execute()){
			throw new Exception("constructDatabase Error: CREATE TABLE pitScoutTable query failed.");
		}
		$query = "CREATE TABLE ".$dbname.".".$matchScoutTable. " (
			user VARCHAR(20) NOT NULL,
			ID VARCHAR(8) NOT NULL PRIMARY KEY,
			matchNum INT(11) NOT NULL,
			teamNum INT(11) NOT NULL,
			allianceColor TEXT NOT NULL,
			autoPath LONGTEXT NOT NULL,
			crossLineA INT(11) NOT NULL,
			cargoShipCargo INT(11) NOT NULL,
			cargoShipHatch INT(11) NOT NULL,
			rocket1Cargo INT(11) NOT NULL,
			rocket1Hatch INT(11) NOT NULL,
			rocket2Cargo INT(11) NOT NULL,
			rocket2Hatch INT(11) NOT NULL,
			rocket3Cargo INT(11) NOT NULL,
			rocket3Hatch INT(11) NOT NULL,
			cargoShipCargoT INT(11) NOT NULL,
			cargoShipHatchT INT(11) NOT NULL,
			rocket1CargoT INT(11) NOT NULL,
			rocket1HatchT INT(11) NOT NULL,
			rocket2CargoT INT(11) NOT NULL,
			rocket2HatchT INT(11) NOT NULL,
			rocket3CargoT INT(11) NOT NULL,
			rocket3HatchT INT(11) NOT NULL,
			climb TINYINT(4) NOT NULL,
			climbTwo TINYINT(4) NOT NULL,
			climbThree TINYINT(4) NOT NULL,
			issues LONGTEXT NOT NULL,
			defenseBot TINYINT(4) NOT NULL,
			defenseComments LONGTEXT NOT NULL,
			matchComments LONGTEXT NOT NULL,
			penalties INT(11) NOT NULL
		)";
		$statement = $conn->prepare($query);
		if(!$statement->execute()){
			throw new Exception("constructDatabase Error: CREATE TABLE pitScoutTable query failed.");
		}
		$query = "CREATE TABLE ".$dbname.".".$headScoutTable. " (
			matchNum INT(11) NOT NULL PRIMARY KEY,
			team1 INT(11) NOT NULL,
			team2 INT(11) NOT NULL,
			team3 INT(11) NOT NULL,
			team4 INT(11) NOT NULL,
			team5 INT(11) NOT NULL,
			team6 INT(11) NOT NULL,
			strategy1 LONGTEXT NOT NULL,
			strategy2 LONGTEXT NOT NULL,
			strategy3 LONGTEXT NOT NULL,
			strategy4 LONGTEXT NOT NULL,
			strategy5 LONGTEXT NOT NULL,
			strategy6 LONGTEXT NOT NULL,
			driveRank1 INT(11) NOT NULL,
			driveRank2 INT(11) NOT NULL,
			driveRank3 INT(11) NOT NULL,
			driveRank4 INT(11) NOT NULL,
			driveRank5 INT(11) NOT NULL,
			driveRank6 INT(11) NOT NULL
		)";
		$statement = $conn->prepare($query);
		if(!$statement->execute()){
			throw new Exception("constructDatabase Error: CREATE TABLE pitScoutTable query failed.");
		}
	}
	//Input- pitScoutInput, Data from pit scout form is assigned to columns in 17template_pitscout.
	//Output- queryString and "Success" statement, data put in columns.
	function pitScoutInput($teamNum, $teamName, $weight, $height, $numBatteries,$chargedBatteries, $driveTrain, $pitComments, $auto, $cameraStream, $driveSkills, $doubleClimb, $cheesecake){
		global $pitScoutTable;
		$queryString = "REPLACE INTO `".$pitScoutTable."` (`teamNumber`, `teamName`, `weight`, `height`, `numBatteries`,`chargedBatteries`, `driveTrain`, `pitComments`, `auto`, `cameraStream`, `driveSkills`, `doubleClimb`, `cheesecake`)";
		$queryString = $queryString.' VALUES ("'.$teamNum.'", "'.$teamName.'", "'.$weight.'", "'.$height.'", "'.$numBatteries.'", "'.$chargedBatteries.'", "'.$driveTrain.'", "'.$pitComments.'", "'.$auto.'", "'.$cameraStream.'", "'.$driveSkills.'", "'.$doubleClimb.'", "'.$cheesecake.'")';
		$queryOutput = runQuery($queryString);
	}
	/*function pitScoutInput($matchNum,$teamNum,){
		global $pitScoutTable;
		$queryString = "REPLACE INTO `".$pitScoutTable."` (`teamNumber`, `teamName`, `weight`, `height`, `numBatteries`,`chargedBatteries`, `driveTrain`, `pitComments`, `auto`, `cameraStream`)";
		$queryString = $queryString.' VALUES ("'.$teamNum.'", "'.$teamName.'", "'.$weight.'", "'.$height.'", "'.$numBatteries.'", "'.$chargedBatteries.'", "'.$driveTrain.'", "'.$pitComments.'", "'.$auto.'", "'.$cameraStream.'")';
		$queryOutput = runQuery($queryString);
	}*/
	//Input- getTeamList, accesses pit scout table and gets team numbers from it.
	//Output- array, list of teams in teamNumber column of 17template_pitscout table.
	function getTeamList(){
		global $pitScoutTable;
		$queryString = "SELECT `teamNumber` FROM `".$pitScoutTable."`";
		$result = runQuery($queryString);
		$teams = array();
			foreach ($result as $row_key => $row){
				array_push($teams, $row["teamNumber"]);
			}
		return($teams);
	}

	//Experimental scoreEstimate
	function getScoreEstimate($team1, $team2, $team3){
		$scoreEstimate = 0;
		$Sum=0;
		$teamList=[$team1,$team2,$team3];

		for($i=0; $i<3; $i++){
			$Sum+=3*getAvgCargo($teamList[$i]);
			$Sum+=2*getAvgHatch($teamList[$i]);
			$Sum+=3*getAvgCargoA($teamList[$i]);
			$Sum+=2*getAvgHatchA($teamList[$i]);
		}

		$cachedClimb2=[0,0,0,0];
		$cachedClimb3=[0,0];


		for($i=0;$i<3;$i++){


			if($cachedClimb3[1]!=1){
				if(getAvgLevel3Climb($teamList[$i])>0){

					$cachedClimb3=[$teamList[$i],1];
					$Sum+=12;
				}
			}

			if($cachedClimb2[1]!=1&&$cachedClimb2[0]!=$teamList[$i]){
				if(getAvgLevel2Climb($teamList[$i])>0){
					$cachedClimb2[0]=$teamList[$i];
					$cachedClimb2[1]=1;
					$Sum+=6;
				}
			}

			if($cachedClimb2[1]==1&&$cachedClimb2[0]!=$teamList[$i]&&$cachedClimb3[0]!=$teamList[$i]){
				if(getAvgLevel2Climb($teamList[$i])>0){
					$cachedClimb2[3]=$teamList[$i];
					$cachedClimb2[4]=1;
					$Sum+=6;
				}

			}

				if($cachedClimb2[0]!=$teamList[$i]&&$cachedClimb2[3]!=$teamList[$i]&&$cachedClimb3[0]!=$teamList[$i]){
					$Sum+=3;
			}

		}

		$scoreEstimate=$Sum;
		return($scoreEstimate);
	}


	function getAvgLevel3Climb($teamNumber){
		$teamData = getTeamData($teamNumber);
		$climbSum=0;
		$matchCount=0;

		for($i = 0; $i != sizeof($teamData[8]); $i++){
			 $climbSum += $teamData[8][$i][25];
			 $matchCount++;
		}

		return $climbSum/$matchCount;

	}

	function getAvgLevel2Climb($teamNumber){
		$teamData = getTeamData($teamNumber);
		$climbSum=0;
		$matchCount=0;

		for($i = 0; $i != sizeof($teamData[8]); $i++){
			 $climbSum += $teamData[8][$i][24];
			 $matchCount++;
		}

		return $climbSum/$matchCount;

	}


	//Input- pitScoutInput, Data from pit scout form is assigned to columns in 17template_matchinput.
	//Output- queryString and "Success" statement, data put in columns.
	function matchInput( $user,
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
             $matchComments,
					 	 $penalties){
		global $servername;
		global $username;
		global $password;
		global $dbname;
		global $matchScoutTable;
		$queryString = "REPLACE INTO `".$matchScoutTable.'`(  `user`,
															 `ID`,
															 `matchNum`,
															 `teamNum`,
															 `allianceColor`,
															 `autoPath`,
															 `crossLineA`,
															 `cargoShipCargo`,
															 `cargoShipHatch`,
															 `cargoShipCargoT`,
															 `cargoShipHatchT`,
															 `rocket1Cargo`,
															 `rocket1Hatch`,
															 `rocket2Cargo`,
															 `rocket2Hatch`,
															 `rocket3Cargo`,
															 `rocket3Hatch`,
															 `rocket1CargoT`,
															 `rocket1HatchT`,
															 `rocket2CargoT`,
															 `rocket2HatchT`,
															 `rocket3CargoT`,
															 `rocket3HatchT`,
															 `climb`,
															 `climbTwo`,
															 `climbThree`,
															 `issues`,
															 `defenseBot`,
															 `defenseComments`,
															 `matchComments`,
														 		`penalties`)
													VALUES ( "'.$user.'",
															 "'.$ID.'",
															 "'.$matchNum.'",
															 "'.$teamNum.'",
															 "'.$allianceColor.'",
															 "'.$autoPath.'",
															 "'.$crossLineA.'",
															 "'.$cargoShipCargo.'",
															 "'.$cargoShipHatch.'",
															 "'.$cargoShipCargoT.'",
															 "'.$cargoShipHatchT.'",
															 "'.$rocket1Cargo.'",
															 "'.$rocket1Hatch.'",
															 "'.$rocket2Cargo.'",
															 "'.$rocket2Hatch.'",
															 "'.$rocket3Cargo.'",
															 "'.$rocket3Hatch.'",
															 "'.$rocket1CargoT.'",
															 "'.$rocket1HatchT.'",
															 "'.$rocket2CargoT.'",
															 "'.$rocket2HatchT.'",
															 "'.$rocket3CargoT.'",
															 "'.$rocket3HatchT.'",
															 "'.$climb.'",
															 "'.$climbTwo.'",
															 "'.$climbThree.'",
															 "'.$issues.'",
															 "'.$defenseBot.'",
															 "'.$defenseComments.'",
															 "'.$matchComments.'",
														   "'.$penalties.'")';
		$queryOutput = runQuery($queryString);
	}
	function headScoutInput($matchNum,
							$team1,
							$team2,
							$team3,
							$team4,
							$team5,
							$team6,
							$strategy1,
							$strategy2,
							$strategy3,
							$strategy4,
							$strategy5,
							$strategy6,
							$driveRank1,
							$driveRank2,
							$driveRank3,
							$driveRank4,
							$driveRank5,
							$driveRank6){
		global $servername;
		global $username;
		global $password;
		global $dbname;
		global $headScoutTable;
		$queryString = "REPLACE INTO `".$headScoutTable.'`(  `matchNum`,
															`team1`,
															`team2`,
															`team3`,
															`team4`,
															`team5`,
															`team6`,
															`strategy1`,
															`strategy2`,
															`strategy3`,
															`strategy4`,
															`strategy5`,
															`strategy6`,

															`driveRank1`,
															`driveRank2`,
															`driveRank3`,
															`driveRank4`,
															`driveRank5`,
															`driveRank6`)
															VALUES
															("'.$matchNum.'",
															"'.$team1.'",
															"'.$team2.'",
															"'.$team3.'",
															"'.$team4.'",
															"'.$team5.'",
															"'.$team6.'",
															"'.$strategy1.'",
															"'.$strategy2.'",
															"'.$strategy3.'",
															"'.$strategy4.'",
															"'.$strategy5.'",
															"'.$strategy6.'",
															"'.$driveRank1.'",
															"'.$driveRank2.'",
															"'.$driveRank3.'",
															"'.$driveRank4.'",
															"'.$driveRank5.'",
															"'.$driveRank6.'")';
		error_log($queryString);
		$queryOutput = runQuery($queryString);
	}
	function getTeamData($teamNumber){
		global $servername;
		global $username;
		global $password;
		global $dbname;
		global $pitScoutTable;
		global $matchScoutTable;
		global $headScoutTable;
		$qs1 = "SELECT * FROM `".$pitScoutTable."` WHERE teamNumber = ".$teamNumber."";
		$qs2 = "SELECT * FROM `".$matchScoutTable."`  WHERE teamNum = ".$teamNumber."";
		$qs3 = "SELECT * FROM `".$headScoutTable."`";
		$result = runQuery($qs1);
		$result2 = runQuery($qs2);
		$result3 = runQuery($qs3);
		$teamData = array();
		$pitExists = False;
		if($result != FALSE){
			// output data of each row
			foreach ($result as $row_key => $row){
			array_push( $teamData, $row["teamName"], $row["weight"], $row["height"], $row["numBatteries"], $row["chargedBatteries"], $row["driveTrain"], $row["pitComments"], $row["auto"], array(), array(), $row["cameraStream"], $row["driveSkills"], $row["doubleClimb"], $row["cheesecake"]);
				$pitExists = True;
			}
		}
		if(!$pitExists){
			array_push( $teamData, $teamNumber, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA', array(), array());
		}
		if($result2 != FALSE){
					foreach ($result2 as $row_key => $row){
						array_push(	$teamData[8], array($row["user"], $row["ID"], $row["matchNum"],
									$row["teamNum"], $row["allianceColor"], $row["autoPath"],
									$row["crossLineA"], $row["cargoShipCargo"], $row["cargoShipHatch"],
									$row["rocket1Cargo"], $row["rocket1Hatch"], $row["rocket2Cargo"],
									$row["rocket2Hatch"],  $row["rocket3Cargo"], $row["rocket3Hatch"],
									$row["cargoShipCargoT"], $row["cargoShipHatchT"],
									$row["rocket1CargoT"], $row["rocket1HatchT"], $row["rocket2CargoT"],
									$row["rocket2HatchT"],  $row["rocket3CargoT"], $row["rocket3HatchT"],
									$row["climb"], $row["climbTwo"], $row["climbThree"], $row["issues"],
									$row["defenseBot"], $row["defenseComments"], $row["matchComments"], $row["penalties"]));
					}
				}
				if($result3 != FALSE){
					foreach ($result3 as $row_key => $row){
						array_push(	$teamData[9], array($row["matchNum"], $row["team1"], $row["team2"],
									$row["team3"], $row["team4"], $row["team5"], $row["team6"],
									$row["strategy1"], $row["strategy2"], $row["strategy3"],
									$row["strategy4"], $row["strategy5"], $row["strategy6"],
									$row["driveRank1"],$row["driveRank2"],$row["driveRank3"],
								$row["driveRank4"],$row["driveRank5"],$row["driveRank6"]));
					}
				}
				//print_r($teamData);
				return($teamData);
			}
//Teleop Cargo and Hatch statistics

function getHighestRocket($teamNumber){

	$teamData = getTeamData($teamNumber);
	$highestLevel = 0;


	for($i = 0; $i != sizeof($teamData[8]); $i++){
		if($teamData[8][$i][21]>=1 ||$teamData[8][$i][22]>=1){
			$highestLevel=3;
			break;
		}
		else if($teamData[8][$i][19]>=1 ||$teamData[8][$i][20]>=1){
			$highestLevel=2;
		}
		else if($teamData[8][$i][17]>=1 || $teamData[8][$i][18]>=1){
			$highestLevel=1;
		}
	}

	return($highestLevel);
}

function getAvgCargo($teamNumber){
	$teamData = getTeamData($teamNumber);
	$cargoCount = 0;
	$matchCount  = 0;
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][15];
		$matchCount++;
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][17];
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][19];
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][21];
	}
	return($cargoCount/$matchCount);
}
function getAvgHatch($teamNumber){
	$teamData = getTeamData($teamNumber);
	$cargoCount = 0;
	$matchCount  = 0;
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][16];
		$matchCount++;
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][18];
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][20];
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][22];
	}
	return($cargoCount/$matchCount);
}
//Auto Cargo and Hatch statistics
function getAvgHatchA($teamNumber){
	$teamData = getTeamData($teamNumber);
	$cargoCount = 0;
	$matchCount  = 0;
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][8];
		$matchCount++;
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][10];
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][12];
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][14];
	}
	return($cargoCount/$matchCount);
}
function getAvgCargoA($teamNumber){
	$teamData = getTeamData($teamNumber);
	$cargoCount = 0;
	$matchCount  = 0;
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][7];
		$matchCount++;
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][9];
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][11];
	}
	for($i = 0; $i != sizeof($teamData[8]); $i++){
		$cargoCount = $cargoCount + $teamData[8][$i][13];
	}
	return($cargoCount/$matchCount);
}
function getMaxCargoshipCargo($teamNumber){
	$teamData = getTeamData($teamNumber);
	$maxCargo = 0;
	for($i = 0; $i != sizeof($teamData[8]); $i++){
			if($maxCargo < $teamData[8][$i][15]){
				$maxCargo = $teamData[8][$i][15];
			}
	}
	return($maxCargo);
}
function getMaxCargoshipHatch($teamNumber){
	$teamData = getTeamData($teamNumber);
	$maxHatch = 0;
	for($i = 0; $i != sizeof($teamData[8]); $i++){
			if($maxHatch < $teamData[8][$i][16]){
				$maxHatch = $teamData[8][$i][16];
			}
	}
	return($maxHatch);
}
function getMaxRocketCargo($teamNumber){
	$teamData = getTeamData($teamNumber);
	$maxCargo = 0;
	$cargoSum = 0;
	for($i = 0; $i != sizeof($teamData[8]); $i++){
			$cargoSum = $teamData[8][$i][17]+$teamData[8][$i][19]+$teamData[8][$i][21];
			if($maxCargo < $cargoSum){
				$maxCargo = $cargoSum;
			}
	}
	return($maxCargo);
}
function getMaxRocketHatch($teamNumber){
	$teamData = getTeamData($teamNumber);
	$maxHatch = 0;
	$cargoSum = 0;
	for($i = 0; $i != sizeof($teamData[8]); $i++){
			$cargoSum = $teamData[8][$i][18]+$teamData[8][$i][20]+$teamData[8][$i][22];
			if($maxHatch < $cargoSum){
				$maxHatch = $cargoSum;
			}
	}
	return($maxHatch);
}
	function getAllMatchData(){
		global $matchScoutTable;
		$qs1 = "SELECT * FROM `".$matchScoutTable."`";
		return runQuery($qs1);
	}
	function getAllHeadScoutData(){
		global $headScoutTable;
		$qs1 = "SELECT * FROM `".$headScoutTable."`";
		return runQuery($qs1);
	}
	function getTotalClimb($teamNumber){
		$teamData = getTeamData($teamNumber);
		$climbCount = 0;
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$climbCount = $climbCount + $teamData[8][$i][23];
		}
		return ($climbCount);
	}

	function getAvgDriveRank($teamNumber){
		$result = getAllHeadScoutData();
		$driveRankSum= 0;
		$matchCount = 0;
		foreach ($result as $row_key => $row){
			foreach ($row as $key => $value){
				$num = $key;
				if($value==$teamNumber){
					$matchCount++;
					if($key=="team1"){
					 	$driveRankSum+=$row['driveRank1'];
					}

					else if($key=="team2"){
						$driveRankSum+=$row['driveRank2'];
					}

					else if($key=="team3"){
						$driveRankSum+=$row['driveRank3'];
					}


				}
			}
		}
		return $driveRankSum/$matchCount;
	}


	function getTotalClimbTwo($teamNumber){
		$teamData = getTeamData($teamNumber);
		$climbCount = 0;
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$climbCount = $climbCount + $teamData[8][$i][24];
		}
		return ($climbCount);
	}
	function getTotalClimbThree($teamNumber){
		$teamData = getTeamData($teamNumber);
		$climbCount = 0;
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$climbCount = $climbCount + $teamData[8][$i][25];
		}
		return ($climbCount);
	}
	function getTotalDefense($teamNumber){
		$teamData = getTeamData($teamNumber);
		$defenseCount = 0;
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$defenseCount = $defenseCount + $teamData[8][$i][27];
		}
		return ($defenseCount);
	}
	function matchNum($teamNumber){
		$teamData = getTeamData($teamNumber);
		$matchNum = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			array_push($matchNum, $teamData[8][$i][2]);
		}
		sort($matchNum);
		return ($matchNum);
	}
	function defenseComments($teamNumber){
		$teamData = getTeamData($teamNumber);
		$defenseComments = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			array_push($defenseComments, $teamData[8][$i][28]);
		}
		return ($defenseComments);
	}
	function matchComments($teamNumber){
		$teamData = getTeamData($teamNumber);
		$matchComments = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			array_push($matchComments, $teamData[8][$i][29]);
		}
		return ($matchComments);
	}
	function headScoutComments($teamNumber){
		$teamData = getTeamData($teamNumber);
		$headScoutComments = array();
		for($i = 0; $i != sizeof($teamData[9]); $i++){
			if($teamData[9][$i][1] == $teamNumber){
				array_push($headScoutComments, $teamData[9][$i][7]);
			}
			if($teamData[9][$i][2] == $teamNumber){
				array_push($headScoutComments, $teamData[9][$i][8]);
			}
			if($teamData[9][$i][3] == $teamNumber){
				array_push($headScoutComments, $teamData[9][$i][9]);
			}
			if($teamData[9][$i][4] == $teamNumber){
				array_push($headScoutComments, $teamData[9][$i][10]);
			}
			if($teamData[9][$i][5] == $teamNumber){
				array_push($headScoutComments, $teamData[9][$i][11]);
			}
			if($teamData[9][$i][6] == $teamNumber){
				array_push($headScoutComments, $teamData[9][$i][12]);
			}
		}
		return ($headScoutComments);
	}
	function getLevel3Climb($teamNumber){
		$teamData = getTeamData($teamNumber);
		$matchN = matchNum($teamNumber);
		$cubeGraphT = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$cubeGraphT[$teamData[8][$i][2]] = $teamData[8][$i][25];
		}
		$out = array();
		for($i = 0; $i != sizeof($matchN); $i++){
			array_push($out , $cubeGraphT[$matchN[$i]]);
		}
		return ($out);
	}
	function getLevel2Climb($teamNumber){
		$teamData = getTeamData($teamNumber);
		$matchN = matchNum($teamNumber);
		$cubeGraphT = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$cubeGraphT[$teamData[8][$i][2]] = $teamData[8][$i][24];
		}
		$out = array();
		for($i = 0; $i != sizeof($matchN); $i++){
			array_push($out , $cubeGraphT[$matchN[$i]]);
		}
		return ($out);
	}
	function getAutoHatches($teamNumber){
		$teamData = getTeamData($teamNumber);
		$matchN = matchNum($teamNumber);
		$cubeGraphT = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$cubeGraphT[$teamData[8][$i][2]] = $teamData[8][$i][8]+$teamData[8][$i][10]+$teamData[8][$i][12]+$teamData[8][$i][14];
		}
		$out = array();
		for($i = 0; $i != sizeof($matchN); $i++){
			array_push($out , $cubeGraphT[$matchN[$i]]);
		}
		return ($out);
	}
	function getAutoCargo($teamNumber){
		$teamData = getTeamData($teamNumber);
		$matchN = matchNum($teamNumber);
		$cubeGraphT = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$cubeGraphT[$teamData[8][$i][2]] = $teamData[8][$i][7]+$teamData[8][$i][9]+$teamData[8][$i][11]+$teamData[8][$i][13];
		}
		$out = array();
		for($i = 0; $i != sizeof($matchN); $i++){
			array_push($out , $cubeGraphT[$matchN[$i]]);
		}
		return ($out);
	}
	function getTeleopCargo($teamNumber){
		$teamData = getTeamData($teamNumber);
		$matchN = matchNum($teamNumber);
		$cubeGraphT = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$cubeGraphT[$teamData[8][$i][2]] = $teamData[8][$i][15]+$teamData[8][$i][17]+$teamData[8][$i][19]+$teamData[8][$i][21];
		}
		$out = array();
		for($i = 0; $i != sizeof($matchN); $i++){
			array_push($out , $cubeGraphT[$matchN[$i]]);
		}
		return ($out);
	}
	function getTeleopHatches($teamNumber){
		$teamData = getTeamData($teamNumber);
		$matchN = matchNum($teamNumber);
		$cubeGraphT = array();
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$cubeGraphT[$teamData[8][$i][2]] = $teamData[8][$i][16]+$teamData[8][$i][18]+$teamData[8][$i][20]+$teamData[8][$i][22];
		}
		$out = array();
		for($i = 0; $i != sizeof($matchN); $i++){
			array_push($out , $cubeGraphT[$matchN[$i]]);
		}
		return ($out);
	}

	function getAvgPenalties($teamNumber){
		$teamData = getTeamData($teamNumber);
		$penalCount = 0;
		$matchCount  = 0;
		for($i = 0; $i != sizeof($teamData[8]); $i++){
			$penalCount = $penalCount + $teamData[8][$i][30];
			$matchCount++;
		}
		error_log($penalCount/$matchCount);
		return($penalCount/$matchCount);
	}

?>
