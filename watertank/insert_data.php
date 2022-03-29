<?php

date_default_timezone_set("Asia/Kuala_Lumpur");

//Creates new record as per request
    //Connect to database
    $servername = "us-cdbr-east-05.cleardb.net";
    $username = "bcf74884c944ba";
    $password = "99285d5e";
    $dbname = "heroku_d5cda30792e5a40";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
    

    $t=time();
    $date_time= date('Y-m-d H:i:s', $t); 
    echo "date_time=$date_time<br>";
    
      if(!empty($_POST['sensor2']) || !empty($_POST['sensor3']))
    {
        $sensorData2 = $_POST['sensor2'];
        $sensorData3 = $_POST['sensor3'];
        $sensorData4 = $_POST['sensor4'];
        $sensorData5 = $_POST['sensor5'];


        $sql = "INSERT INTO logs1 (sensor2,sensor3,sensor4,sensor5,timestamp,date_time) VALUES ('".$sensorData2."', '".$sensorData3."', '".$sensorData4."', '".$sensorData5."', '".$t."', '".$date_time."')";

               if ($conn->query($sql) === TRUE) {
            echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }




    $conn->close();
?>