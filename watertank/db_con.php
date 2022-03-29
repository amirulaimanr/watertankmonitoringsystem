<?php  
  
$conn = mysqli_connect("localhost","root","","db_watertank");
 	 if(!$conn){
	die('Could not Connect My Sql:' .mysql_error());
	}
?>