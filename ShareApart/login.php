<?php
session_start();
 require_once "google/config.php";

	if (isset($_SESSION['access_token'])) {
		header('Location: google/index.php');
		exit();
	}

	$loginURL = $gClient->createAuthUrl();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login to shareApart</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Login</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="login.php"><p id="error"><?php echo $error?></p>

                        <div class="form-row">
                            <div class="name">User Name</div>
                            <div class="value">
                               <div class="input-group">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="username" id="name" required>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">                                       
                                    <input class="input--style-5" name="userpass" id="pass1" type="password" value="password" required="required">
                                </div>
                            </div>
                        </div>
                        <center>
                        <div>
                            <button class="btn btn--radius-2 btn--red" input id="signMeUpB" type="submit" name="submit">Login</button>
                        </div>

                        <div class="container" style="background-color:#f1f1f1">
                              <p> <a href="register.php" >Join Us<img src="left-arrow.png" width =15px height =15px></a> <p>
                                 <span class="psw"> <a href="index.html" >Back to home page <img src="icon.png" width =15px height =15px> </a></span>
                         </div>

                     
                         
                         
					<input type="image" style="width:80%;" src="googlesign.png" class="goog" value="Google" onclick="window.location = '<?php echo $loginURL ?>';">
				</center>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS--->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

  <?php
        session_start();
        if(isset($_POST['username'])){
          echo "<script> </script>";
              $servername = "localhost";
        $username = "isshaneemo";
        $password = "shanee123";
        $dbname = "isshanee_shareApart_new";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
          echo "<script>console.log('DB Connection failed');</script>";
        } 
        else{
          echo "<script>console.log('DB Connection succeded');</script>";
        }
    //check login credentials in db   
        $user=$_POST['username'];
        $q ="SELECT password,permission FROM users where username ='" . $user . "'";
        
        $result = $conn->query($q);
            if ($result->num_rows > 0) {
                        // output data of each row
                $row = $result->fetch_assoc();
                $dbPass = $row["password"];
                $userpass = $_POST["userpass"];
                
             $userpass1 = md5($userpass);

                    if($dbPass == $userpass1){
                        //input pw match db pw  
                        $_SESSION['user'] = $_POST['username'];
                        $_SESSION["permission"] = $row['permission'];
                        
                        header("Location:homepage.php");
                        exit;
                    }
                    else{
                      echo "<p style='color:white; font-size:18px;'>Wrong password, try again...</p>";
                      echo 
                      " <div class='text-center'>
                         <a href='#' tabindex='5' class='forgot-password'>Forgot Password?</a>
                                      </div><br>";  
                    }
            }
            else{
              echo "<p style='color:white; font-size:18px;'>invalid username</p>";
            }
          }
            ?>