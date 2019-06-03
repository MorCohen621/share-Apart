<?php

 session_start();
      //  dblogin 
$servername = "localhost";
$username = "isshaneemo";
$password = "shanee123";
$dbname = "isshanee_shareApart_new";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    else{
      echo "<script>console.log('DB Connection succeded');</script>";
    }

    $apartmentId = $_POST['apartmentId'];

    $q_join_family = "INSERT INTO apart_Waitlist (apartmentId, username) VALUES(".$apartmentId." , '".$_SESSION['user']."' ) ";
    $conn->query($q_join_family);

?>