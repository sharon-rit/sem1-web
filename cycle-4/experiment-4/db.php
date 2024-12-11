<?php
    $host = 'localhost';
    $user = 'root';
    $pass = 'root';
    $db = 'student';
    $table_name = 'student';

    $conn = mysqli_connect($host,$user,$pass,$db);

    if(!$conn) {
        die("Connection with database unsuccessfull".mysqli_connect_error());
    }

?> 