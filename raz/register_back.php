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


$username = $_POST["username"];
$password = $_POST["password"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$permission = $_POST["permission"];
$groupid = null;


  	$sql_u = "SELECT * FROM users WHERE username='$username'";
  	
		$result = $conn->query($sql_u);

		if ($result->num_rows > 0) {
  	  echo "<script> alert('Sorry... Username  - ".$username." - already taken');window.location = 'register.php'; 
	  </script>"; 
	  
  	}
	
      else{
        $sql="Insert into users(username,password,fname,lname,email,permission,apartmentId) values ('".$username."','".$password."','".$fname."','".$lname."','".$email."','$permission','$groupid')";   

      $conn->query($sql);  
      echo "<script>console.log('registered successfuly')</script>";  
      $conn->close();
         header("Location:homepage_not_join_apart_yet.php");
          $_SESSION["permission"] = $permission;
          $_SESSION["user"] = $username;
    ob_end_flush();
          
      }
?>
  </body>
</html>




