<?php
	require_once "config.php";
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: login.php');
		exit();
	}

	    

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

	
	$permission=null;
	$groupid=null;
	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();
	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
	$email=$_SESSION['email'];
	$fname=	$_SESSION['givenName'];
	$lname = $_SESSION['familyName'];
	$username=$_SESSION['email'];


 $sql="Insert into users(username,password,fname,lname,email,permission,apartmentId)
  values ('".$username."','".$password."','".$fname."','".$lname."','".$email."','$permission','$groupid')";   

$conn->query($sql);  
echo "<script>console.log('registered successfuly')</script>";  
$conn->close();
 header("Location:../homepage_not_join_apart_yet.php");
  $_SESSION["permission"] = $permission;
  $_SESSION["user"] = $username;
ob_end_flush();
  



?>