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
    <title>Register to shareApart</title>

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


<?php
require_once('includes/init.php');

// define variables and set to empty values
$nameErr = $ageErr= $emailErr=$passwordErr= $Repeat_passwordErr= "";
$name =  $password=$Repeat_password= $email= $age= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo($_SERVER["REQUEST_METHOD"]);
    
    $user=new User();
	
	$register_Users =null;
	$register_Password=null;

    if ($_POST["name"])
    {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed"; 
        }
    }
        
   if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    }
    
    else
    {
    $name = test_input($_POST["name"]);
    }
    
	
    if($_POST['age']){
    if(strlen($_POST['age'])>2)
        $ageErr = "age can not be more then 2 digit";
      }
       
   	if (empty($_POST["age"])) {
    $ageErr = "age is required";
  } else {
    $age = test_input($_POST["age"]);
  }

  
  if ($_POST["email"])
  {
      $email = test_input($_POST["email"]);
      if (!preg_match("/^[a-zA-Z ]*$/",$email)) {
      $emailErr = "Only letters and white space allowed"; 
      }
  }
      
 if (empty($_POST["email"])) {
  $email = "Email is required";
  }
  
  else
  {
  $email = test_input($_POST["email"]);
  }
    
    
     if (empty($_POST["password"])) {
    $passwordErr = "password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
    
    if($_POST['Repeat_password'])
	{
		$Repeat_password=$_POST['Repeat_password'];
    }
		
		if($password!=$Repeat_password)
		{
			$Repeat_passwordErr="There is no match between the passowrd";
		}
        
        if (empty($_POST["Repeat_password"])) {
    $Repeat_passwordErr = "Repeat_password is required";
  } else {
    $Repeat_password = test_input($_POST["Repeat_password"]);
  }
    
    
if (!($nameErr ||$passwordErr || $Repeat_passwordErr   || $ageErr || $emailErr))
{
    echo("WORKINGGGGGGGGGGGGGGGGGGGGGG");

$register_Users = $user->add_user($name,$age,$email,$password);
                   echo("WORKINGGGGGGGGGGGGGGGGGGGGGG");


                $session->login($user_with_password_check);
                header('Location:login_new.php');
  }
 else{
    echo("1" + $nameErr );
    echo("2" +$passwordErr );
    echo("3" + $Repeat_passwordErr );
    echo("4" +$ageErr );
    echo("5" + $emailErr );
     echo("!!!!!!!XXXXELSEXXXXX!!!!!");
 } 
}
 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$user = new User();
$user->add_user("mor","12","sa@sa.com","123")  
   
?>
<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Sign Up for shareApart</h2>
                </div>
                <div class="card-body">
                    <form method="POST">

                        <div class="form-row m-b-55">
                          <div class="name">Name</div>
                             <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="name" id="name" required="required">
                                            <span class="error"> <?php echo $nameErr;?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    
  

                      

                         <div class="form-row m-b-55">
                           <div class="name">Age</div>
                             <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="age" id="age" required="required">
                                             <span class="error"> <?php echo $ageErr;?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>


                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" id="email" required="required">
                                    <span class="error"> <?php echo $emailErr;?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">                                       
                                    <input class="input--style-5" name="password" id="pass1" type="password" placeholder="Choose A Password" required="required">
                                    <span class="error"> <?php echo $passwordErr;?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                                <div class="name">Password</div>
                                <div class="value">
                                    <div class="input-group">   
                                        <input class="input--style-5" name="Repeat_password" id="pass2" type="password" placeholder="Confirm Your Password" required="required">
                                        <span class="error"> <?php echo $Repeat_passwordErr;?></span>
                                    </div>
                                </div>
                            </div>
                        
                        
                        
                        <div>
                            <button class="btn btn--radius-2 btn--red" input id="signMeUpB" type="submit" onclick="passvalid()" name="upload">Register</button>
                        </div>
                        <div class="container signin">
                              <p>Already have an account? <a href="login_new.php">Sign in</a>.</p>
      
                         </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
            function passvalid(){
            var pass1=document.getElementById("pass1").value;
            var pass2=document.getElementById("pass2").value;
            var flag=true;
          
           if(pass1!=pass2){
           flag=false;
           
           }
          
            if(flag==false){
           
            
              alert("your password is not the same please try again!");
              window.location.href = ("register_new.php")
            }
          
            }
          
             
          </script>
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
<!-- end document-->