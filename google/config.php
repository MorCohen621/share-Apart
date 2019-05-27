<?php
	session_start();
	require_once "googleapi/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("668944246838-1b9ae0lok8tp4hp83juc9j4j3n2f7u93.apps.googleusercontent.com");
	$gClient->setClientSecret("rYLHo2AE4FMlfyM-CzUIiuLF");
	$gClient->setApplicationName("shareApart");
	$gClient->setRedirectUri("http://isshaneemo.mtacloud.co.il/production/raz/google/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile");
	$con = new mysqli('localhost', 'isshaneemo','shanee123' ,'isshanee_shareApart_new');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
?>