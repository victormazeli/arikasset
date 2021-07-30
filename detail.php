<?php
 session_start(); 

 include ('includes/db_config.php');

 if(!isset($_SESSION["username"])){

  header("Location: login.php");

}if (isset($_GET['logout'])=='yes') {
  # code...
  session_destroy();
  header("Location: login.php");
}
  


// PHP script for displaying selected asset.

$message=array();

if (isset($_GET['employee_id'])) {

  $location=$_SESSION["location"]??null;
  $asset_detail=$_GET['employee_id'];

  $details = $conn->query(" SELECT * FROM it_asset INNER JOIN employee_asset ON it_asset.asset_id=employee_asset.asset_id 
  INNER JOIN asset_category ON it_asset.asset_category_id = asset_category.asset_category_id WHERE employee_id='".$asset_detail."' AND tr_response=0 ");
  $assets = $details->fetchAll();

  $emp_details = $conn->query("SELECT * FROM employees WHERE employee_id='".$asset_detail."'  ");
  $emp_detail = $emp_details->fetch();
 
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

  <title>Employee Asset Details</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link href="icon/arik wing.png" rel="short icon" type="img/png">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/datatables.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="vendor/datatables/buttons.bootstrap4.css" rel="stylesheet">

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
          <a class="nav-link text-white" href="Report.php"><i class="fas fa-clipboard    "></i> Report</a>
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
          <li class="breadcrumb-item active">Details</li>
        </ol>

       
        

        <!-- DataTables Example -->
        <div class="card mb-3">
        <div class="card-header"style="background-color:#ffff;">
      <i class="fas fa-user    "></i>  <?php echo $emp_detail['user']; ?>   <a name="" id="" class="btn" href="update.php?edit=<?php echo $emp_detail['employee_id'];  ?>" role="button"><i class="fas fa-pen    "></i></a>
         </div>
          <div class="card-body">
            <div class="table-responsive">
            <!--## php Script to display successfully execution-->
            <?php foreach ($message as $msg) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <?php echo $msg ?>
                <!--## php Script to display successfully execution END-->
              </div>
              <?php endforeach; ?>
            <table class="table table-bordered"  width="100%" cellspacing="0">
           
                <thead>
                  <tr>
                    <th>Asset_id</th>
                    <th>Asset</th>
                    <th>Category</th>
                    <th>Serial No</th>
                    <th>Specification</th>
                    <th>Condition</th>
                    <th>Date Assigned</th>
                    <th>Transfer Status</th>
                    <th>Transfer Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($assets as $asset ) : ?>  
                                    
                <tr>
            <!--## php Script to display  asset details of selected user-->
                <td><?php echo $asset['asset_id'] ?></td>
                <td><?php echo $asset['description'] ?></td>
                <td><?php echo $asset['asset_category_desc'] ?></td>
                <td><?php echo $asset['serialno'] ?></td>
                 <td>
                 <?php echo $asset['ram'] ?>
                 <?php echo $asset['os'] ?>
                 <?php echo $asset['processor'] ?>
                 <?php echo $asset['hdd'] ?>
                                   
                </td>
                <td>
                <?php 
                if ( $asset['con']== 'in service' ) {
                  echo '
                  <h6 > <span class="badge badge-success">in service</span></h6>
                  
                  ';
                }elseif ($asset['con']== 'out of service' ) {
                  echo '
                  <h6 "> <span class="badge badge-warning">out of service</span></h6>
                  
                  ';
                }
                 ?>
                 </td>
                <td><?php echo $asset['date_assigned'] ?></td>
                <td><?php 
                
                if ($asset['transfer_status']== 1) {
                 echo '
                 <h6> <span class="badge badge-warning">Newly Acquired</span></h6>
                 
                 ';
                }elseif ($asset['transfer_status']== 0) {
                  echo '
                  <h6 ><span class="badge badge-info">No Activity</span></h6>
                 
                 ';
                  
                }
        
                ?>
                </td> 
                <td><?php echo $asset['transfer_date'] ?></td>                         
                 </tr>
                                       
                <?php endforeach; ?>
                 </tbody>
              </table>
            </div>
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
  <script src="vendor/datatables/buttons.bootstrap4.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script type="text/JavaScript">
    $(document).ready(function() {
    $('#dataTable').DataTable();
} );    
    
  </script>



</body>

</html>
