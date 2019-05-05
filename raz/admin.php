<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Handlee|Lobster|Open+Sans|Poiret+One|Roboto" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<style>
    table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
    .tableHeaders{
        font-family: 'Handlee', cursive;
        font-size: 15px;


    }
    
    h4{
                font-family: 'Handlee', cursive;

    }
    </style>
</head>
   
      <style>
          .family_res{
font-family: 'Handlee', cursive;
        font-size: 17px;

          }
          .family_res1{
          font-family: 'Handlee', cursive;
          font-size: 15px;
          }

              

    </style>
    
<body id="page-top">

 
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="homepage.php">ShareApart</a>
      

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

         
      
         <script>
            function log_out(){
                window.location='logout.php';
            }
        </script>

    <!-- Navbar -->
   

    
      
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-bell fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
  <a class="navbar-brand mr-1 text-white" 
     
           <?php 
                     session_start();
                if(!isset($_SESSION['user'])){
                  header("Location: index.php");
                  exit;
                }
                else{
                 /*   echo 
                    "
                    <script> console.log('password match'); 
                    $(document).ready(function(){
                    document.getElementById('welcome-user').innerHTML ='<h3><span>".$_SESSION['user']."</span></h3>';
                    });
                    </script>
                "; 
                */
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
             /*   echo 
                "
                <script>
                $(document).ready(function(){
                  $('.dropdown-menu li:nth-child(2)').html('<img src=\'img/coin.png\' width=35px>  ".$score."');
                  //alert(".$score.");
                });
                </script>
                "; */
                }
                

						echo '<h5> Hello '.$_SESSION['user'].'</h5><br>';   
      
					?>
       
     
     
     
     
     </a>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
          
           
          
       
      </li>
    </ul>

  </nav>

  <div id="wrapper">


    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Apartment Members</span>
        </a>
      </li>
   
          <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>calender</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="homepage.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Apartment Members Management </li>
        </ol>
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


          <main>

        <div class="box">
            <div class="row">
                <div class="hidden-xs voffset6"></div>
                <div class="col-md-12 col-lg-12" panel>
                    <br>
                    <div class="panel-heading" id="syllabus">
                        <div class="tabbable">
                            <ul class="nav nav-tabs" id="myTabs">
                                <li class="active"><a href="#p1" data-toggle="tab"><strong>Show Waitlist members</strong></a></li>
                                <!--<li><a href="#p2" data-toggle="tab"><strong>Permissions</strong></a></li>
                                <li><a href="#p3" data-toggle="tab"><strong>Points</strong></a></li>-->

                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <!--  ------- tab 1 ------- -->
                            <div class="tab-pane fade  in active " id="p1">
                                <div id="add_member_form" class="">




        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Apartment Waitlist<br> Approve or decline users that want to join your Apartment .</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <!--------------WAITING LIST TABLE----------------------------- -->		
                <div style='overflow-x:scroll'>
                               <h4>Apartment Waitinglist: </h4>

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
                                       
                                        </tr>
                                    </thead>
                                    <tbody>";
								 // output data of each row
								 while($row = $result->fetch_assoc()) {
									 echo "<tr>
                                           						 
                                            <td id='firstName'> " . $row['fname']. "</td>
                                            <td id='lastName'> " . $row['lname']. " </td>
											 <td id='userName'>" . $row['username']. " </td>	
                                           
											
				
							
                                            <td>
                                            <input type='button' title='remove user from group' onclick=\"edituser('".$row['username']."','".$_SESSION['user']."',1);\" value='Approve user' id='removeUser'>
                                            
                                       </td>
                                       
                                       
                                                  <td>
                                            <input type='button' title='remove user from group' onclick=\"edituser('".$row['username']."','".$_SESSION['user']."',0);\" value='Deny user' id='removeUser'>
                                            
                                       </td>
                                       
                                       
									
                                        </tr>
									 ";
								 }
								 echo "</tbody></table>";
							} else {
									 echo "<h4 style='text-align:center; font: padding:5px; border: solid white 3px ;'>There are no users in the group's waiting list<h4> ";
							}
								?>
							
								<br><br>

                            </div>
                        </div>
                             <div style='overflow-x:scroll'>
               

      <!-- /.container-fluid -->

    
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

    <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
                                    <!--------------GROUP USERS TABLE----------------------------- -->									
								<?php

								
							$group_members = "SELECT * FROM users WHERE apartmentId=(SELECT apartmentId from users WHERE username='".$_SESSION['user']."') ORDER BY permission DESC";

							$result = $conn->query($group_members);

							if ($result->num_rows > 0) {
								 echo "<h4>My Apartment Members: </h4>
                                    <table class='homiesTables' style='width:100%'>
                                    <br>
                                    <thead>
                                        <tr class='tableHeaders'>
                                            <th>First name </th>
                                            <th>Last name</th>
                                            <th>Username</th>
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
                                            <th></th>
											<th></th>
                                        </tr>
                                    </thead>
							  </table>";
							}
								?>
                            </div>
								
                  
                        </div>
                            <!--  end tab 1-->
							
							
						
								
								
			
                                    

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
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
						  window.location="admin.php";
						  
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
						  window.location="admin.php";
						  
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
						  window.location="admin.php";
						  
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


                     <!-- /.navbar-collapse -->
                  </nav>
               </div>
            </div>
         </div>
      </header>
  


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


?>


</body>

</html>
