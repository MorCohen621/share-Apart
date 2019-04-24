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
    <title>Au Register Forms by Colorlib</title>

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
                    <form method="POST" action="login_new.php"><p id="error"><?php echo $error?></p>

                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                               <div class="input-group">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="email" id="name" required>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">                                       
                                    <input class="input--style-5" name="password" id="pass1" type="password" value="password" required="required">
                                </div>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn--radius-2 btn--red" input id="signMeUpB" type="submit" name="submit">Login</button>
                        </div>

                        <div class="container" style="background-color:#f1f1f1">
                              <p> <a href="register_new.php" >Back to registration<img src="left-arrow.png" width =15px height =15px></a> <p>
                                 <span class="psw"> <a href="index.html" >Back to home page <img src="icon.png" width =15px height =15px> </a></span>
                         </div>

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
    require_once('includes/init.php');
    global $session;
    $error='';
    if(isset($_POST['submit'])){
            if (!$_POST['email']){
            $error='Please enter email';
            }
            else if(!$_POST['password']){
            $error='Please enter password';
            }
            else{

                $email=$_POST['email'];
                $password=$_POST['password'];
                $user_with_password=new User();
                $error=$user_with_password->find_user($email,$password);
                if (!$error){
                    $session->login($user_with_password);
                    header('Location:index-homepage.php');
                   }
                else{
                    
            	echo $error;
         
		    	}   
            
            

            }
        
    
        }
 
    
 
?>