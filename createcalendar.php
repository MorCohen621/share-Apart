<?php
session_start();
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


$calendarid= $_POST['calendarid'];
$name = $_POST['name'];


$max_query = "SELECT COALESCE(max(`apartmentid`) ,0) as max FROM `apartment`";
   	$result = $conn->query($max_query);
   	$row = $result->fetch_assoc();
   	$apartmentid = $row["max"];
   	$apartmentid = $apartmentid + 1;

$q_insert = "INSERT INTO apartment (apartmentid, name, calendarid) VALUES ($apartmentid, '".$name."', '".$calendarid."')";

$conn->query($q_insert);
$q_updateApartmentID = "update users SET apartmentid = $apartmentid WHERE username = '".$_SESSION['user']."'";
$conn->query($q_updateApartmentID);

echo "Assigned apartment $apartmentid, $calendarid";




?>