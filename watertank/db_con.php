<?php  
  
$conn = mysqli_connect("us-cdbr-east-05.cleardb.net","bcf74884c944ba","99285d5e","heroku_d5cda30792e5a40");
 	 if(!$conn){
	die('Could not Connect My Sql:' .mysql_error());
	}
?>