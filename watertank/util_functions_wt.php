<?php

//----------------------Tank Dimensions--------------------------------------------
global $dia, $height;
$dia=16; //cm
$height=15; //cm (height of sensor)


//---------------utility functions-------------------------------------------------------
function calculate_volume($dia,$level){
	$radius=$dia/2;
	$vol_cubic_cm=(3.142) * $radius * $radius * $level;
	//$vol_litres = $vol_cubicInches * 0.0163871;
	$vol_litres = $vol_cubic_cm * 0.001;


	return round($vol_litres,1);
}

//read_data.php
function timeago2($timestamp) {
	   
	   $strTime = array("second", "minute", "hour", "day", "month", "year");
	   $length = array("60","60","24","30","12","10");

	   $currentTime = time();
	   if($currentTime >= $timestamp) {
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
			$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i] . "(s) ago ";
	   }
	}

/*
function get_title(){
    $str="Water Tank Level";
    return $str;
}
*/
//-----------------------------------------------------------------------------

?>