<?php
 session_start(); 

 include ('includes/db_config.php');

 if(!isset($_SESSION["username"]) && !isset($_SESSION["location"])){

  header("Location: login.php");

}if (isset($_GET['logout'])=='yes') {
  # code...
  session_destroy();
  header("Location: login.php");
}
    
// PHP script for displaying user details.
if (isset($_GET['check'])) {
  # code...
$location=$_SESSION["location"];
$ara=$_GET['check'];
$getresult = $conn->query("SELECT * FROM employees WHERE employee_id='".$ara."' ");
$employees = $getresult->fetch();

$result = $conn->query(" SELECT * FROM it_asset INNER JOIN asset_category ON it_asset.asset_category_id = asset_category.asset_category_id 
INNER JOIN employee_asset ON it_asset.asset_id = employee_asset.asset_id
 WHERE employee_id = '".$ara."' ");
$check = $result->fetchAll();

}
$success=array();
$error=array();

if (isset($_POST['transfer'])) {
  $assetid=$_POST['assetid'];
  $new_ara=$_POST['newara'];
  $transfer_status=$_POST['tr_status'];
  $transfer_date=$_POST['tr_date'];
  $locate=$_POST['location'];
  $tr_response=$_POST['tr_response'];
   // begin the transaction
   $conn->beginTransaction();
   // our SQL statements
   $conn->exec("INSERT INTO employee_asset (asset_id, employee_id, transfer_status, transfer_date, location_id, tr_response)
   VALUES ('".$assetid."','".$new_ara."','".$transfer_status."','".$transfer_date."','".$locate."','".$tr_response."') ");
   $conn->exec("UPDATE employee_asset SET tr_response=1 WHERE employee_id='".$ara."' AND asset_id='".$assetid."'  ");
   $conn->exec("UPDATE employee_asset SET transfer_status=1 WHERE employee_id='".$new_ara."' AND asset_id='".$assetid."' ");
   $conn->exec("UPDATE employee_asset SET transfer_date=now() WHERE employee_id='".$new_ara."' AND asset_id='".$assetid."'  ");
  
   // commit the transaction
 $exc=$conn->commit();
if ($exc) {
  array_push($success, "Transfer Successful");
}else {
  array_push($error, "Transfer Not Successful");
  
}

}


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Asset transfer-Details</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link href="icon/arik wing.png" rel="short icon" type="img/png">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

<nav class="navbar navbar-expand-md static-top " style="background: linear-gradient(252.3deg, #003F75 57.2%, #7f2347 94.08%), #7f2347;">
<a class="navbar-brand mr-1" href="index.php"> <img src="icon/Arik logo white backgroung gud.png" width="189" height="68" alt="arik logo" /></a>
    <button class="navbar-toggler d-lg-none text-white" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item dropdown no-arrow">
       <a class="nav-link dropdown-toggle text-white" href="#" id="assetDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <i class="fas fa-clipboard    "></i> Asset register</a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="assetDropdown" style="text-color: #003F75;">
       <a class="nav-link " href="new asset.php" > <i class="fas fa-file    "></i> New asset</a> 
       <a class="nav-link " href="employee_register.php" > <i class="fas fa-user    "></i> New Employee</a> 
       <a class="nav-link " href="assign_asset.php" > <i class="fas fa-cog    "></i> Assign asset</a> 
       </div>
     </li>
   
      <li class="nav-item  dropdown no-arrow">
      <a class="nav-link dropdown-toggle text-white" href="#" id="empDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class=" fas fa-users   "></i> Employee asset</a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="empDropdown" style="text-color: #003F75;">
       <a class="nav-link" href="Employee_Asset_list.php"><i class=" fas fa-eye   "></i> View asset</a>
       </div>
      </li>
     
      <li class="nav-item">
          <a class="nav-link text-white" href="location.php"><i class="fas fa-layer-group     "></i> Asset inventory</a>
      </li>
      <!-- <li class="nav-item">
      <a  class="nav-link text-white" href="transfer history.php" ><i class="fas fa-clipboard-list    "></i> Transfer History</a>
      </li> -->
      
            
        </ul>
        <ul class="navbar-nav ml-auto mr-0">
     
      
     <li class="nav-item dropdown no-arrow">
       <a class="nav-link dropdown-toggle text-white" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <img src="icon/man.png" alt="John Doe" width="45" height="45" />  <?php echo $_SESSION['username']; ?>
       </a>
       <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
       
         <a class="dropdown-item" href="?logout=yes">Logout</a>
       </div>
     </li>
   </ul>
      
    </div>
</nav>

  <div id="wrapper">


    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb bg-white">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Asset transfer</li>
        </ol>

       

        <!-- Details display -->
        
       <div class="col-lg-10 mx-auto mb-3">
       <?php foreach($success as $s) :?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $s; ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         <span class="sr-only">Close</span>
     </button>
    
 </div>
           
                <?php endforeach;?>
                <?php foreach($error as $errors) :?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $errors; ?>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         <span class="sr-only">Close</span>
     </button>
    
     </div>
           
      <?php endforeach;?>
       <div class="card ">
        <div class="card-header"style="background-color:#ffff;">
        <div class="container">
       <div class="row">
       <div class="col-md-1-12 ml-2 mt-2 mb-2">
      <i class="fas fa-user    "></i>
         </div>
         <div class="col-md-1-12 ml-2 mt-2 mb-2">
         <?php echo $employees['user']; ?> 
         </div>
       </div>
     </div>
        </div>      
        <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered"  width="100%" cellspacing="0">
        <thead>
         <tr>
         <th>Asset id</th>
        <th>Asset</th>
        <th>Category</th>
        <th>Serial no</th>
        <th>Specification</th>
        <th>Condition</th>         
        </tr>
        </thead>
        <tbody>
              
                                    
      <?php foreach ($check as $loop) : ?>   
        <tr>
        <td><?php echo $loop['asset_id'] ?></td>
        <td><?php echo $loop['description'] ?></td>
        <td><?php echo $loop['asset_category_desc'] ?></td>
        <td><?php echo $loop['serialno'] ?></td>
        <td>
        <?php echo $loop['ram'] ?>
         <?php echo $loop['os'] ?>
         <?php echo $loop['processor'] ?>
         <?php echo $loop['hdd'] ?>                                            
        </td>
      <td>
      <?php
      if ($loop['con']== 'in service' ) {
                  echo '
                  <h6 > <span class="badge badge-success">in service</span></h6>
                  
                  ';
                }elseif ($loop['con']== 'out of service' ) {
                  echo '
                  <h6 "> <span class="badge badge-warning">out of service</span></h6>
                  
                  ';
                }
                 ?>
      
    </td>
                                  
        </tr>       
      <?php endforeach; ?>                                                     
              
   </tbody>
  </table>
  </div> 
  <form method="post">
  <input type="hidden"  name="location" Value="<?php echo $_SESSION['location']; ?>" >
  <input type="hidden"  name="tr_status" Value="0">
  <input type="hidden"  name="tr_date" Value="0" >
  <input type="hidden"  name="tr_response" Value="0">
  <div class="form-row ">
  <div class="col">
      <input type="text" class="form-control" placeholder="Enter Asset id " name="assetid" required>
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="Enter Employee Ara" name="newara" required>
    </div>
    <div class="col">
    <button name="transfer" type="submit" class="btn btn-primary btn-md" style="background-color:#003479; color:#ffff">
<i class="fas fa-exchange-alt    "></i> Transfer</button>
 </button>
    </div>
 </div>
</form>

</div>
  </div>                                 
  </div>
      <!-- /.container-fluid -->

   <!-- Sticky Footer -->
<footer class="">
        <div class="container-fluid my-auto">
          <div class="copyright text-center my-auto" style=" color: #003F75">
            <span>Copyright © Arik Air IT Asset Portal</span>
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
  


</body>

</php>
