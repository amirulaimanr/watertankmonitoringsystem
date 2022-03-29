
<?php

error_reporting(-1);
include_once 'db_params_wt.php';
include_once '../util/db_query.php';
include_once 'util_functions_wt.php';

$sql= "SELECT * FROM logs1 WHERE 1 order by timestamp desc limit 1";
$row= db_select_row($sql);	
$x_cm=$row['sensor2'];
$timestamp=$row['timestamp'];

$sql= "SELECT MAX(sensor2) AS max FROM logs1 ";
$row = db_select_row($sql);
$highestValue = $row['max'];

$sql= "SELECT MIN(sensor2) AS min FROM logs1 ;";
$row = db_select_row($sql);
$lowestValue = $row['min'];

//$result = mysqli_query($conn,"select MAX(sensor2) as max
//from logs1 ");
//$row = mysql_num_rows($result);
//$highestValue = $row["max"];

// = mysqli_query($conn,"select MIN(sensor2) as max
//from logs1 ");
//$row = mysqli_fetch_array($result);
//$lowestValue = $row["min"];



global $dia, $height;
//$level= $height-$x_cm;
$level= $x_cm;

$volume=calculate_volume($dia,$level);


$widget=@$_GET["widget"];
?>

<?php

if($widget=="info"){
	$currentTime = time();
	$diff=$currentTime-$timestamp;
	$seconds_left=60-$diff;
	
	if($diff<5){
		$style="background-color:lightgreen";
		$msg="<h2>Data Arrived !!!!</h2>";
		$img="<img src='data.gif' alt='Data Arrived !!!' width='80%' height='100'>";
	}
	else{
		$style="background: transparent; color:grey;";
		$msg="Data expected in:<br> <b style='color:brown;font-size:40px'>$seconds_left</b> seconds";
		$img="";
	}
	
	if($diff>60){
		$str=timeago2($timestamp);
		$ago="(<txt style='color:brown' text-align='center'>$str</txt>)";
	}
	else{
		$ago="";
	}
	
	if($seconds_left < -4){
		$msg="<p style='color:red;font-size:20px' text-align='center'>Data from sensor not available temporarily. Pls check after some time.</p>";
	}
	
	echo"<div style='$style' text-align='center'>
        	$msg $img
			<br><br>
			Last value: $x_cm <br>$ago
			<hr>
			Current Water Level:<br> <b style='color:blue'>$level cm</b><br>
	        <hr>
			Maximum Water Level:<br> <b style='color:blue'>15.00 cm </b><br>
			<hr>
			Minimum Water Level:<br> <b style='color:blue'>1.15 cm</b><br>
	";
	
}

if($widget=="tank_animation"){
	$str="&value=".$volume;
	echo"$str";
}


?>