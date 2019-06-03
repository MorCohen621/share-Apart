<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="img/family-logo.png">
      <title>Homies - Calendar</title>
      <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
      <link rel="stylesheet" type="text/css" href="css/calendar.css">
      <link rel="stylesheet" type="text/css" href="css/jquery.timepicker.css">
      <script src="script/script.js"></script>
      <script src="script/jquery.timepicker.js"></script>

      <link href="https://fonts.googleapis.com/css?family=Mina:700" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
 <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
      <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.css">
   </head>
   <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->
<body>
  <!-- DIV for users that arn't logged in! hide everything - show msg -->
    <?php
        session_start();
        if(!isset($_SESSION['user'])){
          header("Location: index.php");
          exit;
        }
        else{
            echo 
            "
        <script> console.log('password match'); 
          $(document).ready(function(){
            $('.nav.navbar-nav').css('display','none');
            document.getElementById('welcome-user').innerHTML ='<h3><span>".$_SESSION['user']."</span></h3><form action=\'logout.php\' method=\'post\'><input type=\'submit\' value=\'Logout\'></form></h1>';
          });
        </script>
        ";       
        }  
	?>
<!-- /DIV for users that arn't logged in! hide everything - show msg -->
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
    <li><a href="myprofile.php"><img src="http://pluspng.com/img-png/user-png-icon-male-user-icon-512.png" style='width:20px'>   My Profile</a></li>
    <li><a href="adminpanel.php"><img src="https://i1.wp.com/lavaprotocols.com/wp-content/uploads/2014/09/google-apps-admin-panel-icon.png?ssl=1" width=20px alt="">   Admin Panel</a></li>
  </ul>
</div>
                     <!-- /.navbar-collapse -->
                  </nav>
               </div>
            </div>
         </div>
      </header>
      <div id="mySidenav" class="sidenav">
         <span style="color:white;font-size:50px;cursor:pointer" class="burger-btn">
         </span>
         <a href="homepage.php"><span class="glyphicon glyphicon-home"></span>Homepage</a>
         <a href="chores.php">Chores</a>
         <a href="gifts.php">Gifts</a>
         <a href="shoppinglist.php">Shopping</a>
         <a href="calendar.php">Calendar</a> 
  	 <a id="billsPage" href="bills.php">Bills</a>        
      </div>


<?php
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

	$permissions = "select permission from users WHERE username ='".$_SESSION['user']."' ";
	$user_permission = $conn->query($permissions);
	$row = $user_permission->fetch_assoc();
	$u_permission = $row['permission'];
	
	
	if($row['permission'] == 0){
      echo "<script>
      $(document).ready(function(){
        $('#billsPage').hide();
      });
      </script>";
	}

?>

<!--  PHP -->
    <?php
        session_start();
        if(!isset($_SESSION['user'])){
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
        }  
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
         <div class="box cal" style="padding:1%">
           <h2 class="header"> Our Calendar </h2>
            <br>
            <br>
            <div id="public-alert" style="display:none">
            	<center>
	<span style='color:red; font-size: 28px'><u>Warning!</u><br>Your calendar is not public to your family!</span>
                  <ol style='list-style-position: inside; font-size:16px;'>
                    <li>
                      <strong>Enter the following link: <a style='font-size:18px; color:blue' target='_blank' href='https://calendar.google.com'>https://calendar.google.com</a></strong>
                    </li><br>
                    <li>
                      Enter 'Settings and sharing' for the new calendar you created.<br>
                      <img style = 'margin:5px;' src='img/public-calendar/1.png' height=300px>
                    </li><br>
                    <li>
                      Tick 'Make available to public' so you're family members can also see this calendar.<br>
                      <img style = 'margin:5px;' src='img/public-calendar/2.png' height=200px>
                    </li>
                  </ol>
                  <form action="#">
                 <label> <input id="declaration" required type="checkbox">
						By clicking the 'FINISH' button I declare that I have performed the steps above.
                 </label><br>
				<button  id='make-public'  style='background-color: lightgray; border:1px solid black'>FINISH</button>
              </form>
              </center>
                 </div>
        
<script>
$("#make-public").click(function(){
if(document.getElementById("declaration").checked == true){
		$.post(
			'toggleCalendar.php',
			{
				isPublic:1
			},
			function(){
				window.location='calendar.php';		
			}
		);
	}	
});
</script>
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
          echo "<script>console.log('DB Connection failed');</script>";
        } 
        else{
          echo "<script>console.log('DB Connection succeded');</script>";
        }

          $q_calid = "SELECT calendarid, isCalPublic FROM family WHERE familyid =(SELECT familyid FROM users where username = '".$_SESSION['user']."')";
                $res = $conn->query($q_calid);
                $row = $res->fetch_assoc();
                $c_id = $row["calendarid"];

                if($row['isCalPublic'] == '1'){
          echo "<iframe id='google-cal' src='https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;wkst=1&amp;bgcolor=%239999ff&amp;src=".$c_id."&amp;color=%23AB8B00&amp;ctz=Asia%2FJerusalem' style='border-width:0' width='100%' height='600' frameborder='1' scrolling='no'>
          </iframe>";
          }
          else{
          	echo "
				<script>
				$(document).ready(function(){
					$('#public-alert').show();
					$('#newEventBtn').hide();
				});

				</script>
          	";
          }


         ?>


         </div>

         <center>
          <div id="new-event-msg"></div>         

          <div class="form box">
            <button id="newEventBtn">Add New Event</button>
            <div class="addEvent" id="addEventForm">
               <hr> 
                <button id="authorize-button" style="display: none;">Sign in to create event! <br><img src="https://i.stack.imgur.com/xAiqi.png" width=200px></button>
               <form action="#" method="POST">
                                
                  <table>
				  <br>
                    <tr><th><span style="color:red; margin-left: -50px"><i>* required fields</i></span></th></tr>
                     <tr>
                        <td>Start Date<span style='color:red'>*</span>:</td>
                        <td>
                           <div id="sandbox-container">
                              <input type="text" name="start_date" class="form-control" autocomplete="off">
                           </div>
                        </td>
                     </tr>
                      <tr>
                        <td>End Date:</td>
                        <td>
                           <div id="sandbox-container">
                              <input type="text" name="end_date" class="form-control" autocomplete="off">
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <td>Title:</td>
                        <td><input type="text" name="summary" autocomplete="off"></td>
                     </tr>
                     <tr>
                        <td>Location:</td>
                        <td><input type="text" name="location" autocomplete="off"></td>
                     </tr>
                     <tr>
                        <td>Start Time<span style='color:red'>*</span>:</td>
                        <td>
                          <input type="text" class="timepicker-e" name="start-time" data-time-format="H:i" data-step="15" data-min-time="06:00" data-max-time="05:00" data-show-2400="true" autocomplete="off" />
                        </td>
                     </tr>
                     <tr>
                        <td>End Time<span style='color:red'>*</span>:</td>
                        <td>
                          <input type="text" class="timepicker-e" name="end-time" data-time-format="H:i" data-step="30" data-min-time="06:00" data-max-time="05:00" data-show-2400="true" autocomplete="off" />
                        </td>
                     </tr>
                     <tr>
                        <td>Description:</td>
                        <td> <input type="text" name="description" autocomplete="off"></td>
                     </tr>

                   

                    <script> 
                    $(document).ready(function(){
                        $(function(){
                         $('.timepicker-e').timepicker(); 
                         $('.timepicker-e').timepicker({ 'scrollDefault': 'now' });
                      });
                    });
                    </script>

    <script type="text/javascript">
     
      // Client ID and API key from the Developer Console
     var CLIENT_ID = '523673487903-j4ubr12ssbki5ma1b68qdgodhub52ngu.apps.googleusercontent.com';
      var API_KEY = 'AIzaSyBh_KiZjSngiPQvapniDx_njbzqmElYGFM';

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
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }

      /**
       * Print the summary and start datetime/date of the next ten events in
       * the authorized user's calendar. If no events are found an
       * appropriate message is printed.
       */
function insertEvent() {
    var user = document.getElementById("welcome-user").children[0].children[0].innerHTML;
    var event = {};
if(document.getElementsByName('start_date')[0].value != ""){
    event['start'] = {
    'dateTime': document.getElementsByName('start_date')[0].value +"T"+ document.getElementsByName('start-time')[0].value + ":00",
    'timeZone': "Asia/Jerusalem"
    };
    var date = true;
} 
if(document.getElementsByName('end_date')[0].value == ""){  //no end date - put end as same day+time
    event['end']= {
    'dateTime': document.getElementsByName('start_date')[0].value +"T"+ document.getElementsByName('end-time')[0].value + ":00",
    'timeZone': "Asia/Jerusalem"
    }
}
    else{  //has end date - set end as end-date+time
    event['end']= {
    'dateTime': document.getElementsByName('end_date')[0].value +"T"+ document.getElementsByName('end-time')[0].value + ":00",
    'timeZone': "Asia/Jerusalem"
    }

}
if(document.getElementsByName('summary')[0].value != ""){
    event['summary']=document.getElementsByName('summary')[0].value;
}
  else{
      event['summary'] = '(no title)';
  } 

if(document.getElementsByName('location')[0].value != ""){
    event['location']=document.getElementsByName('location')[0].value;
} 

if(document.getElementsByName('description')[0].value != ""){
    event['description']=document.getElementsByName('description')[0].value;
} 

var startFlag = document.getElementsByName('start-time')[0].value;
var endFlag = document.getElementsByName('end-time')[0].value;
if(startFlag && endFlag){
       $.post(
       'insertevent.php', //url
      {
        title: document.getElementsByName('summary')[0].value,
        start_date: document.getElementsByName('start_date')[0].value,
        start_time:document.getElementsByName('start-time')[0].value,
        location: document.getElementsByName('location')[0].value,
        description:document.getElementsByName('description')[0].value,
        end_date: document.getElementsByName('end_date')[0].value      
      },   //data
      function(response){//onsuccess function
          document.getElementById("new-event-msg").innerHTML = "<div class='alert alert-success'><strong>Success!</strong> Event created successfuly!</div>";
      }          
      );
            $.ajax({
            type: 'post',
            url: 'getcalid.php',
            data: { user:user },
              success: function (response) {
                //alert(response);//<--  'response' is the reference to the PHP echo

                    //Validetion:
var event = {};
if(document.getElementsByName('start_date')[0].value != ""){
    event['start'] = {
    'dateTime': document.getElementsByName('start_date')[0].value +"T"+ document.getElementsByName('start-time')[0].value + ":00",
    'timeZone': "Asia/Jerusalem"
    }
} 
if(document.getElementsByName('end_date')[0].value == ""){  //no end date - put end as same day+time
    event['end']= {
    'dateTime': document.getElementsByName('start_date')[0].value +"T"+ document.getElementsByName('end-time')[0].value + ":00",
    'timeZone': "Asia/Jerusalem"
    }
}
    else{  //has end date - set end as end-date+time
    event['end']= {
    'dateTime': document.getElementsByName('end_date')[0].value +"T"+ document.getElementsByName('end-time')[0].value + ":00",
    'timeZone': "Asia/Jerusalem"
    }

}
if(document.getElementsByName('summary')[0].value != ""){
    event['summary']=document.getElementsByName('summary')[0].value;
}
  else{
      event['summary'] = '(no title)';
  } 

if(document.getElementsByName('location')[0].value != ""){
    event['location']=document.getElementsByName('location')[0].value;
} 

if(document.getElementsByName('description')[0].value != ""){
    event['description']=document.getElementsByName('description')[0].value;
} 
event['attendees'] = [ {'email': response } ];
        // var event = 
        // {
        //   'summary': document.getElementsByName('summary')[0].value,
        //   'location':  document.getElementsByName('location')[0].value,
        //   'description':  document.getElementsByName('description')[0].value,
        //   'start': {
        //     'dateTime': document.getElementsByName('start_date')[0].value +"T"+ document.getElementsByName('start-time')[0].value + ":00",
        //     'timeZone': "Asia/Jerusalem"
        //   },
        //   'end': {
        //     'dateTime': document.getElementsByName('end_date')[0].value +"T"+ document.getElementsByName('end-time')[0].value+ ":00",
        //     'timeZone': "Asia/Jerusalem"
        //   }
        // };


        var request = gapi.client.calendar.events.insert({
          'calendarId': 'primary',
          'resource': event
        });
      request.execute(function(event) {
        $("#addEventForm").slideToggle();
      });
    
    setTimeout(function(){document.getElementById('google-cal').src = document.getElementById('google-cal').src;},1000);

    }
   });
  }
  else {
    document.getElementById("new-event-msg").innerHTML = "<div class='alert alert-danger'><strong>CREATE EVENT FAILED!</strong> Please fill all the required fields!</div>";
  }
}
    </script>

		   
<?php
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

	$permissions = "select permission from users WHERE username ='".$_SESSION['user']."' ";
	$user_permission = $conn->query($permissions);
	$row = $user_permission->fetch_assoc();
	$u_permission = $row['permission'];
	
	
	if($row['permission'] == 0){
      echo "<script>
      $(document).ready(function(){
        $('#newEventBtn').hide();
      });
      </script>";
	}

?>

    <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>
                     </tr>
                  </table>
               
               <br>
	
			   
               <button id="addEventBtn" type='button' class="calendar_btn" onclick="insertEvent();" style="background-color:#00c5b9;"> Add Event</button>
                <input type="reset" class="calendar_btn" value="Reset form" style="background-color: #f05768; font-style: initial;"><br> <pre id="content" style="width:75%">
                </form>
                </pre>
</td>
            </div>
         </div>
      </center>
         <script>
            $('#sandbox-container input').datepicker({
            	format:'yyyy-mm-dd',
                autoclose: true
            
            });
            
            
            
            $('#sandbox-container input').on('show', function(e){
            
                console.debug('show', e.date, $(this).data('stickyDate'));
            
                
            
                if ( e.date ) {
            
                     $(this).data('stickyDate', e.date);
            
                }
            
                else {
            
                     $(this).data('stickyDate', null);
            
                }
            
            });
            
            
            
            $('#sandbox-container input').on('hide', function(e){
            
                console.debug('hide', e.date, $(this).data('stickyDate'));
            
                var stickyDate = $(this).data('stickyDate');
            
                
            
                if ( !e.date && stickyDate ) {
            
                    console.debug('restore stickyDate', stickyDate);
            
                    $(this).datepicker('setDate', stickyDate);
            
                    $(this).data('stickyDate', null);
            
                }
            
            });
              
         </script>
         <div class="result"></div>
         <div class="box" id="notes-area">
            <div class="notesHeader">
               <h1 style="display:inline-block;">Group notes</h1>
               <div class="box newNote" style="margin:3% 1 0%;width:initial;"><img src="img/new-note.png" alt="" id="newNoteImg" width=50px>
                  <div id="newNoteContent">
                    <label style="float:left"><strong>Title:</strong><input name="note_title" style="margin:10px; width:60%" id='note-titleid'></label>
                    <textarea rows="3" name="newNote" id='note_text'></textarea>
                    </form>
                    <button id="addNoteBtn" onclick='insertNote();'>Add</button>
                  </div>
               </div>
            </div>
            
          <?php
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
            $q_notes = "SELECT noteid, n_creator, text, familyid, note_title ,note_date FROM notes WHERE familyid=(SELECT familyid FROM users WHERE username='".$_SESSION['user']."')";
                $result = $conn->query($q_notes);
                if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
                     $newNote="";
                     $newNote= $newNote."
                      <div class='note'>
                         
                        <strong><u>".$row['note_title']."</u></strong><br>                         
                         <p>
                        ".$row['text']."
                         </p>";
                         if($_SESSION['user'] == $row['n_creator']){
                          $newNote = $newNote . "<button onclick='removeNote(".$row['noteid'].");'> DELETE </button>";
                         }
                         $newNote = $newNote. "<div class='note-data'>
                            <span id='note-name'> <i><u>by: ".$row['n_creator']."</u></i>
                          </span>
                            <span id='note-date'>".$row['note_date']."</span>
                         </div></div>";
                  echo $newNote;
                      } 
                  }
                  
                  else{
                    echo "<div style='width:50%; text-align:center; background-color:rgb(255,255,255,0.5);margin:auto;margin-bottom:3%;border-radius:20px;border:3px double white;'>0 Notes have been found,<br> Be the firsts to add notes! press the <img src='img/new-note.png' height=20px  >  icon to add new note</div>";
                  }

                ?>
         </div>
        
      </main>
	  
	  <?php
	  
	  	 if($u_per=='1'){
                echo "
                <script>			
                $(document).ready(function(){
                  $(\"#addEventBtn\").hide();
                });
                </script>
                ";
              }		
	  ?>
<script>
  function insertNote(){
    var title = document.getElementsByName('note_title')[0].value;
    var note = document.getElementsByName('newNote')[0].value;
    title = title.replace("'", "\'");
    note = note.replace("'", "''");
    $.post(
       'insertnote.php', //url
      {
        title: title,
        note: note
      },   //data
      function(response){//onsuccess function
        $("body").load("#notes-area");
      }    
      );
  }

    function removeNote(noteid){
      var flag = confirm("Are you sure you want to delete this note?");
        if (flag) {
          var noteid= noteid;
         $.post('removeNote.php',   // url
                      { noteid:noteid }, // data to be submit
                      function(data, status, jqXHR) {// success callback

                        $("body").load("#notes-area");
                        //window.location=window.location.href;
                        alert("Succefully deleted note");
                      }
                  );
       } 
    }

    document.getElementsByName('summary')[0].onkeypress = function () {
    if (event.keyCode === 39) { // apostrophe
        // prevent the keypress
        return false;
    }
  }

    document.getElementById('note-titleid').onkeypress = function () {
    if (event.keyCode === 39) { // apostrophe
        // prevent the keypress
        return false;
    }
  }
    document.getElementById('note_text').onkeypress = function () {
    if (event.keyCode === 39) { // apostrophe
        // prevent the keypress
        return false;
    }
  }
</script>
   </body>
</html>