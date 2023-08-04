<?php
    $host = "localhost";
    $uname = "root";
    $dbpassword = "";
    $dbname = "crud";

    $conn = mysqli_connect($host, $uname, $dbpassword, $dbname);

    if ($conn->connect_error) {
        die("Connection to DB failed: ") .$conn->connect_error;
    }
?>