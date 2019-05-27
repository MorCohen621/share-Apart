<?php
session_start();
      //--------dblogin---------

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
	
	$q = "update apartment SET isCalPublic = 1 WHERE apartmentid = (select apartmentid from users where username ='".$_SESSION['user']."')  ";

$conn->query($q); 
?>