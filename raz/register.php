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

<body>
    
   

    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Sign Up for shareApart</h2>
                </div>
                <div class="card-body">
                    <form action="register_back.php" method="POST" id="msform">
                        <div class="form-row m-b-55">
                          <div class="name">User Name</div>
                             <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="username" id="name" required="required" placeholder="Choose your username ">
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
      
                         <div class="form-row m-b-55">
                           <div class="name">First Name</div>
                             <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="fname" id="age" required="required"  placeholder="Enter your first name" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>

                        
                         <div class="form-row m-b-55">
                           <div class="name">Last Name</div>
                             <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="lname" id="age" required="required"  placeholder="Enter your last name">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>


                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" id="email" required="required" placeholder="Enter your Email address" >
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">                                       
                                    <input class="input--style-5" name="password" id="pass1" type="password" placeholder="Choose A password" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                                <div class="name">Confirm Password</div>
                                <div class="value">
                                    <div class="input-group">   
                                        <input class="input--style-5" name="cpass" id="pass2" type="password" placeholder="Confirm your password" required="required">
                                    </div>
                                </div>
                            </div>
                        
                        
                        <div>
                            <button class="btn btn--radius-2 btn--red" input id="signMeUpB" type="submit" name="submit" value="submit" onclick="passvalid()" >Register</button>
                        </div>
                        <div class="container signin">
                              <p>Already have an account? <a href="login.php">Sign in</a>.</p>
      
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
                window.location = 'register.php'; 
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