
<!DOCTYPE html>
<html>
<head>
 <link href="https://fonts.googleapis.com/css?family=Cantora+One|Cardo|Nobile|Quando" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: 'Nobile', sans-serif;
}
form {border: 3px solid #f1f1f1;}
     
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

    h2{
       font-family: 'Cantora One', sans-serif;
    }
button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #FFB6C1;
}



.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
    .error {color: #FF0000;}
</style>
</head>
<body>

<h2>Login Form</h2>
    
<form method="post" action="login.php"> <p id="error"><?php echo $error?></p>
 
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" type="submit" value="submit" name="submit">Login </button>
      
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <p> <a href="register.php">Back to registration<h2/></a> <p>
    <span class="psw"> <a href="index.html">Back to home page</a></span>
  </div>
    
    
</form>

</body>
</html>

<?php
    require_once('includes/init.php');
    global $session;
    $error='';
    if(isset($_POST['submit'])){
        
            $user=$_POST['user'];
            $password=$_POST['password'];
            $user_with_password=new Password();
            $error=$user_with_password->find_user($user,$password);
            if (!$error){
                $session->login($user_with_password);
                header('Location:index-homepage.php');

            }
        
        else
        {	echo $error;
         
			}
    
        }
 
    
 
?>

