<html>
  <body>
    
<?php
ob_start();
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
else{
  echo "<script>console.log('DB Connection succeded');</script>";


}

$apartment_name = $_POST['apartment_name'];


$max_query = "SELECT COALESCE(max(`apartmentId`) ,0) as max FROM `apartment`";
   	$result = $conn->query($max_query);
   	$row = $result->fetch_assoc();
   	$apartmentId = $row["max"];
   	$apartmentId = $apartmentId + 1;

$q_insert = "INSERT INTO apartment (apartmentId, name) VALUES ($apartmentId, '".$name."')";

$conn->query($q_insert);
$q_updateFamilyID = "update users SET apartmentId = $apartmentId WHERE username = '".$_SESSION['user']."'";
$conn->query($q_updateFamilyID);

echo "Assigned apartment $apartmentId, $calendarid";

						  window.location="admin.php";

?>




