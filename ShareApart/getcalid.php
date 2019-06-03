<?php

	$calid = "SELECT calendarid from apartment where apartmentid = (SELECT apartmentid from users where username = '".$_POST['user']."')";
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
	
	$res = $conn->query($calid);
	$row = $res->fetch_assoc();
	$calendarid = $row['calendarid'];
	
	echo $calendarid;
?>