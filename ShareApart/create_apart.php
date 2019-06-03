<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="img/family-logo.png">
      <title>ShareApart</title>

          <!-- FONTS -->
      <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="script/script.js"></script>
      <script src="script/group.js"></script>
      <script src="script/newcalendar.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Mina:700" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
      <link rel="stylesheet" type="text/css" href="css/homepage.css">  
      <link rel="stylesheet" type="text/css" href="css/creategroup.css">  
     
	  <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
      <link rel="stylesheet" type="text/css" href="css/myprofile.css">
	  
	   <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	  
	  
	  
    <style>
      #join-apartment-form,#create-apartment-form{
        display:none;
      }
      .grp-buttons{
        display: inline-block;
        margin:2%;
        width:45%;
        height: 50px;
        background-color:rgba(33,183,212,0.9);
        font-size: 16px;
        font-weight: bold;
        outline:0;
        font-family: 'Ubuntu', sans-serif;
        border-radius: 10px;
        letter-spacing: 2px;
      }
    </style>
   </head>
   <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
   <body>
 <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default" role="navigation">
                        <span style="float:left;color:white;font-size:35px;cursor:pointer" class="burger-btn">&#9776;</span>
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a class="navbar-brand" href="homepage.php">Homies<span class="dot"></span></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
						
<div class="dropdown pull-right" style='margin-top:6px'>
  <button style="vertical-align: top;display:inline-block" class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown">
   <div id="welcome-user"></div> <span style="float:left;" class="caret"></span>
  </button> <?php echo "<form style='vertical-align: top;display:inline-block' action='logout.php' method='post'><input style='margin-right:10px; border-radius:2px;' type='submit' value='Logout'>
</button></form>";
  ?>
  <ul class="dropdown-menu">
    <li><a href="myprofile.php"><img src="http://pluspng.com/img-png/user-png-icon-male-user-icon-512.png" style='width:20px'> My Profile</a></li>
    
  </ul>
</div>

                     <!-- /.navbar-collapse -->
                  </nav>
               </div>
            </div>
         </div>
      </header>
	  
	  <?php
        session_start();
      /*  if(!isset($_SESSION['user'])){
          header("Location: index.php");
          exit;
        }
        else{
            echo 
            "
            <script> console.log('password match'); 
            $(document).ready(function(){
            document.getElementById('welcome-user').innerHTML ='<h3><span>".$_SESSION['user']."</span></h3>';
            });
            </script>
        ";       
        }*/  
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
    //get permission for user
    $q_user = "SELECT * FROM users where username ='".$_SESSION['user']."'";
    $result = $conn->query($q_user);
    $row = $result->fetch_assoc();
    $permission = $row["permission"];
        if($permission == 0){    //if user is child - show points in dropdown
        $score = $row['score'];
            echo 
        "
        <script>
        $(document).ready(function(){
          $('.dropdown-menu li:nth-child(2)').html('<img src=\'img/coin.png\' width=35px>  ".$score."');
          //alert(".$score.");
        });
        </script>
        ";
        }

?>

      <main>
         <div class="box">
		 
            <h1 style="color:#f05768;">Welcome to Homies!</h1>
			<br>
              <center>
                   
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
            $msg="<div class=''>
                <button class='grp-buttons' id='join-family-btn'>Join a family</button>  
                <button class='grp-buttons' id='create-family-btn'>Create new family group</button>
                  <br>
                  <div id='join-family-form'>
                      <form method='GET' action='create_apart.php'>
                        <label><h3 style='display:inline-block'> Search your family: </h3> <input style='display:inline-block; margin-right:10px; font-weight:normal;' type='text' placeholder='search for username...' title='enter name or username of someone in the family you want to join to' name='search-username'></label>
                        <input style='font-size:15px;' type='submit' value='search'>
                      </form>                         
                  </div>
				  
				  
                  <div id='create-family-form'>
				  <ol style='text-align:left;'>
                      <li style = 'font-size:20px;'><h3 style='display:inline-block'>Choose a unique nickname for your family: </h3><input style='width:33%; font-size:16px;' type='text' placeholder='For example: the coolest Levys' id='apartmentname'></label></li>
					  
                      <li style = 'font-size:20px;'><h3>Create a new family calendar:</h3>
					  <p class='empty_data' style='margin:3px; padding:1px; color:gray;'> to start use Homies, first create your family calendar. A detailed instructions will appear after you press the button:</p>
					  <a href='#instructions'>
					  <br><br>
					  <center>
                         <button style = 'font-size:20px; border:3px solid #32bad4; border-radius:5px;' onclick='newCalendar();'>
                          Create a family and get instructions 
                         </button></a> <br>
                       <img src='img/loader.gif' id='gif'  style='display:none'>

						 </center>
					  
					  </li>
					         
					  
                       <button id='authorize-button'>1. Log in with Google to create new family group</button><br><br>
                         <label style='display:none'>
                         
                           
					</ol>

				
							
				  <div id='instructions' style='width:90%;display:none;'>
				   <h3>Make your new calendar public for your family</h3>	
                  	<span style='color:red; font-size: 28px'><u>important!</u></span>
                  <ol style='text-align:left; font-size:16px;'>
                    <li>
                      <strong>Enter the following link: <a style='font-size:18px' target='_blank' href='https://calendar.google.com'>https://calendar.google.com</a></strong>
                    </li><br>
                    <li>
                      Enter 'Settings and sharing' for the new calendar you created.
                      <img style = 'margin:5px;' src='img/public-calendar/1.png' height=300px>
                    </li><br>
                    <li>
                      Tick 'Make available to public' so you're family members can also see this calendar.
                      <img style = 'margin:5px;' src='img/public-calendar/2.png' height=200px>
                    </li>
                  </ol>
                     <h2 style = 'font-size:27px; text-align:center; color:#f05768'>Homies team wish you a pleasant family life ! <h2>
                  <label style='text-align:center;margin:auto'> <input style='zoom: 1.5;' type='checkbox' id='finish-instructions'>I have finished the process</label><br><br>
                  <button style='display:none; padding:10px' id='goto-hp'>GO TO HOMEPAGE <span class='dot'></span></button>
                </div>
                           </div>

                        </div>
                        ";
                          echo $msg;
                          
            $_SESSION['apartmentid'] = $row['apartmentid'];      
                          if($permission == '0'){
                            echo "
                            <script> 
                            $(document).ready(function(){
                                $('#create-family-btn').css('display','none');
                                }); 
                            </script>";
                          }
                          if(isset($_GET['search-username'])){
                          $q_apartment = "SELECT DISTINCT apartmentId, fname, lname, username, apartment.name, permission
                                        FROM users INNER JOIN apartment using(apartmentId)
                                        WHERE username LIKE '%" . $_GET['search-username'] ."%' ";
                                        $result = $conn->query($q_apartment);

              if ($result->num_rows > 0){
				   echo "<strong id='search-res'>Search results for '".$_GET['search-username']."'... </strong><br>";
                  
                 // output data of each row
                 while($row = $result->fetch_assoc()) {
                   $s_result=$s_result. "
                    <div class='family-circle col-lg-3 col-sm-6'>
                      <h4> <span style=''>#". $row['apartmentid'] ."</span><br><span class='family_res'>Full name:</span> ".$row['fname']." ".$row['lname']."<br> 
					  <span class='family_res'>user:</span> ".$row['username']." <br><span class='family_res'>Family name:</span>".$row['name'] . " </h4>
                      <button onclick='joinFamily(".$row['apartmentid'].");'> JOIN Group </button>
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
?>

                   
  
    <script type="text/javascript">
     // Client ID and API key from the Developer Console
      var CLIENT_ID = '239449554461-8fffml3cdc2t6pupn7ahv4rc1rg8fj6n.apps.googleusercontent.com';
      var API_KEY = 'AIzaSyDFS0JGmEHNOod0raa53D6d4KEK19cT4VE';

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = "https://www.googleapis.com/auth/calendar";

      var authorizeButton = document.getElementById('authorize-button');
      

      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {
        gapi.load('client:auth2', initClient);
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES
        }).then(function () {
          // Listen for sign-in state changes.
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

          // Handle the initial sign-in state.
          updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
          authorizeButton.onclick = handleAuthClick;
        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(isSignedIn) {
        if (!isSignedIn) {
          authorizeButton.style.display = 'block';
        }
        else{
         authorizeButton.style.display = 'none'; 
         $("#create-family-form label").show();
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      
      

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }
function newCalendar() {

    var apartmentname = document.getElementById("apartmentname").value;
	
	if(apartmentname=="")

	{document.getElementById("apartmentname").style.border = '2px solid red';
    alert('Please choose a Apartment nickname');}
else{
    $("a[href='#instructions'] button, #apartmentname").hide();
      $('#gif').show();
    var request = gapi.client.calendar.calendars.insert({
      "resource" :
            {"summary": apartmentname}
    });
    request.execute(function(calendar){
    	/*alert(calendar.id);*/ //
      var name = calendar.summary;
    	var calid = calendar.id;
    	 
       $.post('createcalendar.php',   // url
            { calendarid:calid ,
              name: name}, // data to be submit
            function(response) {// success callback
setTimeout(function(){
      $('#gif').hide();
},1000);
			alert('Successfully created new Apartment! ');
              	$("#instructions").slideDown();
            }
        );          
    });
}


}

</script>

<script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
</script>


            </center>
         </div>
		 <br><br><br><br><br>
      </main>
      <script>
          function joinApartment(apartmentid){
                $.post('joingroup.php',   // url
                          { apartmentid:apartmentid }, // data to be submit
                          function(data, status, jqXHR) {// success callback
                            window.location='create_apart.php';
                            alert("Your join request has been sent, Please wait until your roommates approve your request.");
                            window.location = 'myprofile.php';
                          }
                      );          
              }

      </script>


      <!-- Calendar API - create new event -->
     
   </body>
</html>