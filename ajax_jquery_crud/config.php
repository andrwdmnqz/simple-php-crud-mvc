<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ajax_crud";
    $conn = mysqli_connect($hostname, $username, $password, $dbname);

    if (mysqli_error($conn)) {
        die("Connection failed" .$conn->connect_error);
    }
//    else {
//        echo "Connection established";
//    }
?>