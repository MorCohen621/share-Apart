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
       //Generate note id by current max (id+1)
        $max_eventid = "SELECT COALESCE(max(eventid) ,0) as max FROM events";
        $res = $conn->query($max_eventid);
        $row = $res->fetch_assoc();
        $e_id = $row["max"];
        $e_id = $e_id + 1;
        
 //insert query
 
   $q_insertEvent = "INSERT INTO events (`eventid`, `apartmentId` , `title`, `date`, `start_time`, `end_date`, `location`,`description`) VALUES (".$e_id.", (SELECT apartmentId FROM users WHERE username='".$_SESSION['user']."') , '".$_POST['title']."' ,'".$_POST['start_date']."','".$_POST['start_time']."','".$_POST['end_date']."','".$_POST['location']."','".$_POST['description']."')";
  $conn->query($q_insertEvent);
echo $e_id;
?>