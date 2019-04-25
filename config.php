<?php
    // // phpinfo();
    // $servername = "localhost";
    // $username = "root";
    // $password = "";

    // // Create connection
    // $conn = new mysqli($servername, $username, $password);
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    //     exit;
    // } 

    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully"; 
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>