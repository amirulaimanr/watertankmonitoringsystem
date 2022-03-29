<html>
<head>
    <title>Water Tank</title>
	
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>

	<script type="text/javascript" src="js/tank_animation.js"></script>
    <script type="text/javascript" src='js/jquery3.min.js'></script>
    <script type="text/javascript" src='js/data_comm.js'></script>

    <link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body onload="data_request_timer(2000)">
<?php
error_reporting(-1);

include_once 'db_params_wt.php';
include_once '../util/db_query.php';
include_once 'util_functions_wt.php';


$style="background: transparent; color:grey";


$sql= "SELECT AVG(sensor2) AS average FROM logs1 ";
$row = db_select_row($sql);
$average = $row['average'];
$english_format_number = number_format($average, 2, '.', '');

echo"<br><br>";
    
    echo"<div id='box_lt' align='center' '>";
        //echo"<b>left box</b>";
        echo"<data id='info' ></data>";
		
		
    echo"</div>";

    echo"<div id='box_rt' align='center'>";
	echo"<div id='chart-container' class='tank'>Reload Page if you don't see animation</div>";
    echo"</div>";
    
    echo"<div id='box_md' align='center' '>";
        
    
    echo"<div style='$style' text-align='center'>
			<br><br>
			TANK STATUS <br>";
	?> <img src="tank.png" width="120px"/>		
			
			<?php
			
		echo"<br><br>
		
		    Tank Height:<br> <b style='color:blue'>15 cm</b><br>
	        <hr>
			Tank Capacity:<br> <b style='color:blue'>3 Litres</b><br>
			<hr>
			Average Water Level:<br> <b style='color:blue'>$english_format_number cm</b><br>
	";


echo"</div>";


?>
</body>
</html>