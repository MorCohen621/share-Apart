<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ShareApart</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
    
      <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Courgette|Just+Another+Hand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans|Poiret+One" rel="stylesheet"></head>
   
      <style>
          h1{
font-family: 'Handlee', cursive;
        font-size: 30px;
              color: #32cd32

         }
          h2{
              
          font-family: 'Handlee', cursive;
          font-size: 30px;
                color: #40e0d0
           
          }

    </style>
</head>
   
      
    
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
            $apartmentId = $row["apartmentId"];
            $user_name = $row["username"];
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
     
 <li class="nav-item dropdown">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Admin</span>
        </a>
      </li>
    
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="homepage.php">Home page</a>
          </li>
          <li class="breadcrumb-item active">
                   <a href="shopping.php">Shopping List</a>
        </ol>

        <!-- Icon Cards start table-->
       <?php
   

    $pdo = new PDO("mysql:host=localhost;dbname=isshanee_shareApart_new;charset=utf8","isshaneemo","shanee123");



    if(isset($_POST['submit']) ){
                  $comment = $_POST['comment'];

        
        $sth = $pdo->prepare("INSERT INTO shopping (assign,comment,apartmentId) VALUES ('".$user_name."','".$comment."',$apartmentId)");
        $sth->bindValue(':assign', $assign, PDO::PARAM_STR);

        $sth->execute();
    }
          elseif(isset($_POST['Paid'])){
        $id = $_POST['id'];
        $conn = new mysqli($servername, $username, $password, $dbname);
        $result = $conn->query("SELECT * FROM shopping Where id=$id");
        $row = $result->fetch_assoc();

        $comment = $row['comment'];
             $assign = $row['assign'];

        
          $sth = $pdo->prepare("INSERT INTO shopping_history (assign,comment,apartmentId) VALUES ('".$assign."','".$comment."',$apartmentId)");
        $sth->bindValue(':assign', $assign, PDO::PARAM_STR);

        $sth->execute();
        
        $sth = $pdo->prepare("delete from shopping where id = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        

        
         

            
            
    
    }
          
        elseif(isset($_POST['delete'])){
        $id = $_POST['id'];
        $sth = $pdo->prepare("delete from shopping where id = :id");
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();}
        
    
    
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <title>Chores List</title>
 
</head>

    
    
<body class="container-fluid">
    <h2>Add Item</h2>
    
    
    <form method="post" action="" >
    
           Add item: <input type="text" name="comment" value="">
<br><br>

        
        
        
        <br>
            <input type="submit" name="submit" value="Add">

<br><br>

 

    </form>
    
    <br>
    
 <h1>Apartment Shopping List</h1>
              <div class="card-body">

                <div class="table-responsive">

  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <div style='overflow-x:scroll'>

      <therad><th>Date</th>
      <th>Item</th>
      <th>Add by</th>
    
</therad>
        <tbody>
<?php
    
    $sth = $pdo->prepare("SELECT * FROM shopping Where apartmentId=$apartmentId");
    $sth->execute();
    
    foreach($sth as $row) {
?>

            <tr>
                                <td><?= htmlspecialchars($row['date']) ?></td>

                                <td><?= htmlspecialchars($row['comment']) ?></td>

                         
                <td><?= htmlspecialchars($row['assign']) ?></td>
                

                <td>
                    <form method="POST" >
                        <button type="submit" name="Paid">Purchased</button>
                        <td>  <button type="submit" name="delete">Delete</button></td>
                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="delete" value="true">
                    </form>
                </td>
            </tr>
<?php
    }
?>
        </tbody>
    </table>
     <form method="post" action="shopping_history.php" >
            <input type="submit" name="name" value="Purchased History" >
<br>
    </form>
          </div>
                        </div>
</body>
                                             <div style='overflow-x:scroll'>

    </div>
</html>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
     
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

</body>

</html>
