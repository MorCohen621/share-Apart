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

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>
   
      
    
<body id="page-top">
 
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">ShareApart</a>
      

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
          
           
          
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
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
  
      <li class="nav-item">
        <a class="nav-link" href="create_new_apartment.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Create Apartment</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="join_apartment.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Join Apartment</span></a>
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
          <li class="breadcrumb-item active">Create Apartment</li>
        </ol>


    <div id="content-wrapper">

      <div class="container-fluid">
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Create New Apartment
                </button>
              </h5>
            </div>
                <form> 

                    <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" >Uniqe Nickname</span>
                          </div>
                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder='For example: The party apartment ' id='apartment_name'>>
                        </div>

                        <button class="btn btn-primary"  onclick='newCalendar();'>Submit</button>



                  
                    

                </form>
                
              </div>
            </div>
          </div>
        </div>



      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
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
            
                          
         $_SESSION['apartmentId'] = $row['apartmentId'];      
                          if($permission == '0'){
                            echo "
                            <script> 
                            $(document).ready(function(){
                                $('#create-family-btn').css('display','none');
                                }); 
                            </script>";
                          }

           
?>
     
 
              </div>
            </div>
          </div>
           
                
              </div>
            </div>
          </div>
        </div>


      <!-- /.container-fluid -->

    

    </div>
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>


    <script>
          
        
function newCalendar() {

    var apartment_name = document.getElementById("apartment_name").value;
	
	if(apartment_name=="")

	{document.getElementById("apartment_name").style.border = '2px solid red';
    alert('Please choose Apartment nickname');}

    else{

    	 
       $.post('createcalendar.php',   // url
            {  
              name: apartment_name}); // data to be submit

             alert('Successfully created new Apartment! ')
               
    }

    };


    





</script>

      </script>    
             

</body>

</html>
