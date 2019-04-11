
<!DOCTYPE HTML>  
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Acme|Boogaloo|Bowlby+One+SC|Copse|Kalam|Mali" rel="stylesheet">
    
    <style>
    body {font-family: 'Mali', cursive;}
* {box-sizing: border-box}

    h2{
        font-family: 'Acme', sans-serif;
    }
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

    
/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
require_once('includes/init.php');

// define variables and set to empty values
$nameErr = $ageErr= $passwordErr= $Repeat_passwordErr= "";
$name = $id= $password=$Repeat_password= $city=$age= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $user=new User();
	$user_with_password=new Password();
	
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
    
	if($_POST['id'])
	{
		$check1=$user->find_user_by_id($_POST['id']);
		if(strlen($_POST['id'])!=9 && strlen($_POST['id'])!=8)
		{
			$idErr="*ID has to be 8 or 9 digits";
			
		}if($id == $check1){
				$idErr="*The ID is already in sign";
				
		}
		
	}
    
	if (empty($_POST["id"])) {
    $idErr = "id is required";
  } else {
    $id = test_input($_POST["id"]);
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
    

    
if (!($idErr || $nameErr ||$passwordErr || $Repeat_passwordErr   || $ageErr  ))
    
{
    
$register_Users = $user->add_user($id,$name,$age);
$register_Password=$user_with_password->add_password($id,$name,$Repeat_password);
    


                $session->login($user_with_password_check);
                header('Location:login.php');
  }
}
   
    
		
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
   
?>

<h2>A short registration form for our amazing App </h2>
<p><span class="error">* required field</span></p>
    
<form id="SignInform" method="post" style="border:1px solid #ccc" action="register.php"> 
    
    
    <label for="name"><b>*Name</b></label>
    <input type="text" placeholder="Enter your name" name='name' >
     <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
    
    
<label for="id"><b>*Id</b></label>
    <input type="text" placeholder="Enter your id" name='id' > 
    <span class="error"> <?php echo $idErr;?></span>
  <br><br>
    
    <label for="age"><b>*Age</b></label>
    <input type="text" placeholder="Enter your age" name='age'>
       <span class="error"> <?php echo $ageErr;?></span>
  <br><br>
    
    

    
     <label for="password"><b>*Password</b></label>
    <input type="password" placeholder="Enter Password" name='password'>
    <span class="error"> <?php echo $passwordErr;?></span>
  <br><br>
    
      <label for="Repeat_password"><b>*Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name='Repeat_password' >
    <span class="error"> <?php echo $Repeat_passwordErr;?></span>
  <br><br>
    


<label>
      <input type="checkbox" checked="checked" name='remember' style="margin-bottom:15px"> Remember me
    </label>
    
    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="resetFormFunction()" >Cancel</button>
      <button type="submit" name='submit' value="submit"  target="_blank" class="signupbtn">Sign Up</button>
    </div>
   
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
      
  </div>
</form>
    
    </body>
</html>




