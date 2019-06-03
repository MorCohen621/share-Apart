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
           //get permission for user
          $q_permission = "SELECT fname ,permission FROM users where username ='".$_SESSION['user']."'";
          $result = $conn->query($q_permission);
          $row = $result->fetch_assoc();
          $permission = $row["permission"];
          
                          
         $_SESSION['apartmentId'] = $row['apartmentId'];      
                          if($permission == '0'){
                            echo "
                            <script> 
                            $(document).ready(function(){
                                $('#create-family-btn').css('display','none');
                                }); 
                            </script>";
                          }
                          if(isset($_GET['search-username'])){
                          $q_family = "SELECT DISTINCT apartmentId, fname, lname, username,email, apartment.name, permission
                                        FROM users INNER JOIN apartment using(apartmentId)
                                        WHERE username LIKE '%" . $_GET['search-username'] ."%' ";
                                        $result = $conn->query($q_family);

              if ($result->num_rows > 0){
				   echo "<strong class='family_res'>Search results for '".$_GET['search-username']."'...</strong><br>";
                  
                 // output data of each row
                 while($row = $result->fetch_assoc()) {
                   $s_result=$s_result. "
                    <div class='family-circle col-lg-3 col-sm-6' font-family: 'Just Another Hand', cursive;>
                      <h4 font-family: 'Just Another Hand', cursive;>
                      
                      
               
                       
                       
                       <br><span class='family_res'>Full name:</span>                       
                       ".$row['fname']." ".$row['lname']."<br> 
                       
				<span class='family_res'>Apartment name:</span>".$row['name'] . " </h4> 
                     <span class='family_res'>Email:</span>                       
                       ".$row['email']." <br> 
                      <button class='family_res1' onclick='joinAapartment (".$row['apartmentId'].");'> Join Apartment </button> <br>
                      

               
                       
                    </div>
                   ";
                 }
                  echo "<center>";
                     echo $s_result; 
                  echo "</center>";
              }
			  else{
				  echo "<strong id='search-res'>No results for '".$_GET['search-username']."'... </strong><br>";
			  }
          
           }
           

$email=$row['email'];
   $subject = "Simple Email Test via PHP";
   $body = "Hi,nn This is test email send by PHP Script";
   $headers = "From: ShareApart@gmail.com";
 
   if ( mail($email, $subject, $body, $headers)) {
      echo("Email successfully sent to $email...");
   } else {
      echo("Email sending failed...");
   }

?>