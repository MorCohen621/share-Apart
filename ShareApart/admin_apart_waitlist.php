<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/family-logo.png">
    <title>ShareApart</title>


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mina:700" rel="stylesheet">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script/admin.js"></script>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/chores.css">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="css/adminPanel.css">
    <!--Data Table-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <!--JS-->
    <script src="script/admin.js"></script>
    <script src="script/script.js"></script>	  
    <script src="script/paging.js"></script>
    <script src="script/multi_pagination.js"></script>
	
	 <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
	</head>
<!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->

<body>
<!-- DIV for users that arn't logged in! hide everything - show msg -->
    <?php
        session_start();
                               
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
          echo "<script>console.log('DB Connection failed');</script>";
            
        } 
        else{
          echo "<script>console.log('DB Connection succeded');</script>";
        }

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
            document.getElementById('welcome-user').innerHTML ='<h3><span id=\'currUser\'>".$_SESSION['user']."</span></h3>';
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
    <li><a href="admin_apart_waitlist.php"><img src="https://i1.wp.com/lavaprotocols.com/wp-content/uploads/2014/09/google-apps-admin-panel-icon.png?ssl=1" width=20px alt="">   Admin Panel</a></li>
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
         <a href="homepage.php">Homepage</a>
         <a href="chores.php">Chores</a>
         <a href="gifts.php">Gifts</a>
         <a href="shoppinglist.php">Shopping</a>
         <a href="calendar.php">Calendar</a> 
    <a href="bills.php">Bills</a>      
      </div>



<!--  PHP -->
    <?php
        
        if(!isset($_SESSION['user'])){
          header("Location: index.php");
          exit;
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
            <div class="row">
                <div class="hidden-xs voffset6"></div>
                <div class="col-md-12 col-lg-12" panel>
                    <br>
                    <div class="panel-heading" id="syllabus">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTabs">
							<span class="moduleHeader" style="margin-bottom:0px;" > Admin panel </span>
                                <li class="active"><a href="#p1" data-toggle="tab"><strong>group members</strong></a></li>
                                <!--<li><a href="#p2" data-toggle="tab"><strong>Permissions</strong></a></li>
                                <li><a href="#p3" data-toggle="tab"><strong>Points</strong></a></li>-->
								<li><a href="#p2" data-toggle="tab"><strong>gifts pricing</strong></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <!--  ------- tab 1 ------- -->
                            <div class="tab-pane fade  in active " id="p1">
                                <div id="add_member_form" class="">



<!--------------WAITING LIST TABLE----------------------------- -->		
				<h2>Group wait list:</h2>	
				<p class="empty_data">Approve or decline users that want to join your family group.</p>                     
                <div style='overflow-x:scroll'>

				<?php

						
							$waiting_list = "SELECT fname, lname, users.username, users.permission FROM users INNER JOIN apart_Waitlist ON apart_Waitlist.apartmentId=(select apartmentId from users where username='".$_SESSION['user']."') AND users.username=apart_Waitlist.username";

							$result = $conn->query($waiting_list);

							if ($result->num_rows > 0) {
								 echo "
                                 <table class='homiesTables'>
                                    <br>
                                    <thead>
                                        <tr class='tableHeaders'>
                                            <th>First name </th>
                                            <th>Last name</th>
                                            <th>Username</th>
                                            <th>Permission</th>
                                            <th></th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>";
								 // output data of each row
								 while($row = $result->fetch_assoc()) {
									 echo "<tr>
                                           						 
                                            <td id='firstName'> " . $row['fname']. "</td>
                                            <td id='lastName'> " . $row['lname']. " </td>
											 <td id='userName'>" . $row['username']. " </td>	
                                            <td id='permission'> "; 
											
											if($row['permission']=='1')
												echo "Parent";
											else
												echo "Child";
											
											echo "</td>
                                            <td><a href='#' onclick=\"edituser('".$row['username']."','".$_SESSION['user']."',1);\"><img id='approveUser' style='width:39px; height:39px; padding:2px;' src='img/addUser.png' title='Approve user'></a></td>
											<td><a href='#' onclick=\"edituser('".$row['username']."','".$_SESSION['user']."',0);\"><img id='denyUser' src='img/removeUser.png' title='Deny user'></a></td>
											
											</td>
                                        </tr>
									 ";
								 }
								 echo "</tbody></table>";
							} else {
									 echo "<h4 style='text-align:center; padding:5px; border: solid white 3px;'>There are no users in the group's waiting list<h4> ";
							}
								?>
							
								<br><br>

                            </div>
                        </div>
                             <div style='overflow-x:scroll'>

<!--------------GROUP USERS TABLE----------------------------- -->									
								<?php

								
							$group_members = "SELECT * FROM users WHERE apartmentId=(SELECT apartmentId from users WHERE username='".$_SESSION['user']."') ORDER BY permission DESC";

							$result = $conn->query($group_members);

							if ($result->num_rows > 0) {
								 echo "<h2>My Family: </h2>
								 
                                    <table class='homiesTables' style='width:100%'>
                                    <br>
                                    <thead>
                                        <tr class='tableHeaders'>
                                            <th></th>
                                            <th>First name </th>
                                            <th>Last name</th>
                                            <th>Username</th>
                                            <th>Permission</th>
											<th style='width:15%'>Score</th>
                                            <th></th>
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>";
								 // output data of each row
								 while($row = $result->fetch_assoc()) {
									 echo "<tr>                                      					
                                            <td><img src='img/".$row['gender']."-".$row['permission'].".png'></td>
                                            <td id='firstName'> " . $row['fname']. "</td>
                                            <td id='lastName'> " . $row['lname']. " </td>
											<td id='userName'>" . $row['username']. " </td>	
                                            <td id='permission'>"; 
											if($row['permission'] == 1){
                                                echo "
                                                <label>
                                                <input type='radio' value='1' name='permission_".$row['username']."' checked>Parent
                                                </label>
                                                <label>
                                                <input type='radio' value='0' name='permission_".$row['username']."'>Child
                                                </label>
                                                ";
                                            }
                                            else{
                                                echo "
                                                <label>
                                                <input type='radio' value='1' name='permission_".$row['username']."'>Parent
                                                </label>
                                                <label>
                                                <input type='radio' value='0' name='permission_".$row['username']."' checked>Child
                                                </label>
                                                ";
                                            }
										
										
											echo "</td>
											
											<td>";
											if($row['permission']=='1')
											{
												echo "<span>0</span>";
											}
											else
											{
												echo "<input type='number' pattern='.{1,}'  value='" . $row['score']. "' name='currScore'></form>";
											}
											
											
											echo "</td>
                          <td><button onclick=\"editUserScore('".$row['username']."');\" id='apply_".$row['username']."'>Apply</button></td>
											<td><input type='button' title='remove user from group' onclick=\"edituser('".$row['username']."','".$_SESSION['user']."',2);\" value='Remove user' id='removeUser'></td>
                                        </tr>
									 ";
								 }
								 echo "</tbody></table>";
							} else {
									 echo "<table class='homiesTables'>
                                    <br>
                                    <thead>
                                         <tr class='tableHeaders'>
                                            <th>First name </th>
                                            <th>Last name</th>
                                            <th>User name</th>
                                            <th>Permission</th>
                                            <th style='width:15%'>Score</th>
                                            <th></th>
											<th></th>
                                        </tr>
                                    </thead>
							  </table>";
							}
								?>
                            </div>
								
                            <script>
                             function editUserScore(user){ 
							 if(confirm('Apply changes?')){
                                //var newP = document.getElementById(id).parentElement.parentElement.children[3].children[0].value;
                                var id = "input[name='permission_"+user+"']:checked";
                                var newP = $(id).val();
                                var pointsId = "apply_"+user;
                                var newPoints = document.getElementById(pointsId).parentElement.parentElement.children[5].children[0].value;
                             $.post('apply-user-changes.php',   // url
                             { 
                              userToChange: user,                          
                              score:newPoints,
                              permission: newP
                              }, // data to be submit
                            function(response) {// success callback
                                    //alert(response);
                                    //window.location = window.location.href;
                                    $("body").load("#family-members-table");
                  
                                }
                              );
                            
							alert('Changes applied successfully');
                           }
							 }
						   

                            </script>
                        </div>
                            <!--  end tab 1-->
							
							
						<!--  ------- tab 2 ------- -->
                            <div class="tab-pane fade " id="p2">
							<h3>Family gifts:</h3>
							<p class="empty_data">price your family new and non purchased gifts: </p>
						<script>
							function editPresentPrice(presentid){ 
							
							if(confirm('Change present price?')){
                        var score = document.getElementById("apply_"+presentid).parentElement.parentElement.children[3].children[0].value;
						
						//alert(score);

                             $.post('apply-price.php',   // url
                             { presentid: presentid , score:score }, // data to be submit
                                function(response) {// success callback
                                    //alert(response);
									alert("Presents price updated");
                                }
                              );
                            
                           }
							}
							</script>
							<div style='overflow-x:scroll'>
							<?php							
								
     
								
								
							$group_presents = "SELECT presentid, p_name, p_description, p_link, p_username, p_status, p_score	 FROM presents INNER JOIN users ON p_username=username WHERE apartmentId=(select apartmentId from users where p_status='0' and username='".$_SESSION['user']."') ORDER BY p_score ASC";

							$result = $conn->query($group_presents);

							if ($result->num_rows > 0) {
								 echo "
<table class= 'homiesTables' >
                                   <thead>
                                        <tr class='tableHeaders'>  
                                            <th>Name</th>
                                            <th>Description</th>
											<th>Requested by</th>
                                            <th style='width:15%'>Price</th>
											<th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>";
								 // output data of each row
								 while($row = $result->fetch_assoc()) {
									 echo "<tr>
                                            <td >" . $row['p_name']. "</td>							 
                                            <td >" . $row['p_description']. "</td>
											
											 <td >" . $row['p_username']. "</td>											
											 <td><input type='number' value='" . $row['p_score']. "' name='currScore' name='presentScore'></td>
											 <td><a href='".$row['p_link']."' title='Go to present link:".$row['p_link']."' target='_blank' style=' margin:15px; height:35px; display:inline; color:#2fa7e0;  background-color:white; padding:3px;  border:1px solid blue; font-weight:bold;'>Link</a></td>
                                             <td>
											 <button style=' ' onclick='editPresentPrice(".$row['presentid'].");' id='apply_".$row['presentid']."'>Apply</button></td>
                          </tr>";
								 }
							echo "</tbody></table>";}
							 else {
									 echo"
<table class= 'homiesTables' >
                                   <thead>
                                        <tr class='tableHeaders'>  
                                            <th>Name</th>
                                            <th>Description</th>
											
											<th>Requested by</th>
                                            <th>Price</th>
											
											<th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
							  </table>
							  
							  <h4 style='text-align:center; padding:5px; border: solid white 3px;'>There are no gifts in the group's unpunched gifts list<h4> ";
							}
						?>
							</div>

                                <br>
                                <br>
                            </div>
                            <!--  end tab 4-->
                        </div>
                        <!-- tab-content-->
                    </div>
                    <!-- panel body -->
                    <!-- panel -->
                </div>
                <!-- end column -->
            </div>
            <!-- end row -->
        </div>
    </main>
    <!--scripts-->
    <script>
      /*  $(document).ready(function() {
            $('#score_board').DataTable();
        });
        $('#score_board').DataTable({
            autoFill: true,
            responsive: true
        });
        $(document).ready(function() {
            $('#gifts_history').DataTable();
        });
        $('#gifts_history').DataTable({
            autoFill: true,
            responsive: true
        });

        function show_alert() {
            if (document.getElementById("search_uname") == 'n') alert("The user was found");
            else alert("The user wasn't found");
        }
        $("#removeUser").click(function() {
                    var user = document.getElementById("removeUser").parentElement.parentElement.children[2].innerHTML;
                    if (confirm('Remove \'' + user + '\' from the family group?') && confirm('are you sure?')) { //remove user from table } });*/
					

		function edituser(username,user,addOrRemove){					
		   var username = username;
		   var user = user;
		   var addOrRemove = addOrRemove;
		
		
		 if(addOrRemove=='1')
		 {
			 if(confirm(' Add this user to your group?'))
			 {
				 	  $.post('edituser.php',   // url
					 { username:username ,user:user ,addOrRemove:addOrRemove}, // data to be submit
						function(data, status, jqXHR) {// success callback
						  window.location="admin_apart_waitlist.php";
						  
						  if(addOrRemove=='1')
						  alert("User successfully ADDED to your group");
						  else 
						  alert("User REMOVED successfully ");
						}
				);
			 }
		 
		 
		 
		 } 
		 
		 else if(addOrRemove=='0')
		 {if(confirm(' Delete this user from your group wating list?'))
			 
		 
		 	  $.post('edituser.php',   // url
					 { username:username ,user:user ,addOrRemove:addOrRemove}, // data to be submit
						function(data, status, jqXHR) {// success callback
						  window.location="admin_apart_waitlist.php";
						  
						  if(addOrRemove=='1')
						  alert("User successfully ADDED to your group");
						  else 
						  alert("User REMOVED successfully ");
						}
				);
		 
		 }
		
		else
		 {if(confirm(' Delete this user from group?'))
			 
		 
		 	  $.post('edituser.php',   // url
					 { username:username ,user:user ,addOrRemove:addOrRemove}, // data to be submit
						function(data, status, jqXHR) {// success callback
						  window.location="admin_apart_waitlist.php";
						  
						  if(addOrRemove=='1')
						  alert("User successfully ADDED to your group");
						  else 
						  alert("User REMOVED successfully ");
						}
				);
		 
		 }
		}
			 
		 
		
		
		
		function editUserSettings(username, currScore, permission){
		
		 var username = username;
		   var currScore = currScore;
		   var permission = permission;
		   
		   alert(currScore);
			alert(username);
			alert(permission);
		
		};

		   


    </script>

</body>

</html>
