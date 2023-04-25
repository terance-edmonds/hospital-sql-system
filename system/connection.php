<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "suwa_sahana_hospital_db";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "<script> console.log('Database Connected successfully') </script>";
?>