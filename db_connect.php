<?php
$conn = mysqli_connect('us-cdbr-east-05.cleardb.net', 'bcf74884c944ba', '99285d5e') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($conn, 'heroku_d5cda30792e5a40' ) or die(mysqli_error($conn));
?>