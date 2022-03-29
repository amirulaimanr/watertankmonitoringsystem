<?php
$conn = mysqli_connect('localhost', 'root', '') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($conn, 'db_watertank' ) or die(mysqli_error($conn));
?>