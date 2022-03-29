<?php
$conn = mysqli_connect('sql212.unaux.com', 'unaux_31404632', 'b3uoo5s4') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($conn, 'unaux_31404632_db_watertank' ) or die(mysqli_error($conn));
?>