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
/*
    $email = $_POST['email'];
   $subject = "ShareApart";
   $body = "Hi, you have been approved. Now you can log in and enter your apartment http://isshaneemo.mtacloud.co.il/production/raz/";
   $headers = "From: ShareApart@gmail.com";
 
   if ( mail($email, $subject, $body, $headers)) {
      echo("Email successfully sent to $email...");
   } else {
      echo("Email sending failed...");
   }*/
?>