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
  
    
// PHP script for displaying assets.
$result = $conn->query("SELECT * FROM employees WHERE has_edit=0 ");
$employees = $result->fetchAll();

$message=array();
$error=array();

if (isset($_GET['dis_able'])) {
  // sql to delete a record
  $di=$_GET['dis_able'];
  $sql = "UPDATE employees SET status=0  WHERE employee_id='".$di."'";

  // Prepare statement
  $stmt = $conn->prepare($sql);

  // execute the query
  $stmt->execute();

  if ($stmt->execute()) {array_push($error, "Employee Disabled successfully");}

}elseif (isset($_GET['enable'])) {
  // sql to delete a record
  $en=$_GET['enable'];
  $query = "UPDATE employees SET status=1  WHERE employee_id='".$en."'";

  // Prepare statement
  $stmt = $conn->prepare($query);

  // execute the query
  $stmt->execute();

  if ($stmt->execute()) {array_push($message, "Employee Enabled successfully");}
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

  <title>Employee Asset Overview</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link href="icon/arik wing.png" rel="short icon" type="img/png">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="vendor/datatables/buttons.dataTables.css" rel="stylesheet">
  <link href="vendor/datatables/responsive.dataTables.css" rel="stylesheet">
  <link href="vendor/datatables/scroller.dataTables.css" rel="stylesheet">

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
          <li class="breadcrumb-item active">Employee Asset</li>
        </ol>

       
            <!-- DataTables  -->
            <!--## php Script to display successfully execution (for disabling employee)-->
      <?php foreach ($error as $er) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <?php echo $er ?>
                <!--## php Script to display successfully execution END-->
              </div>
              <?php endforeach; ?>
      <!--## php Script to display successfully execution (for enabling employee) -->
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
        <div class="card mb-3">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <th>Ara</th>
                  <th>User</th>
                   <th>Department</th>
                   <th>Unit</th>
                    <th>Office</th>
                    <th>Extension</th>
                    <th>Status</th>
                    <th>Options</th>
                    
                  </tr>
                </thead>
                
                <tbody>
                <?php foreach ($employees as $employee ) : ?>  
                                    
                <tr>
                <td><?php echo $employee['employee_id'] ?></td>
                <td><?php echo $employee['user'] ?></td>
                <td><?php echo $employee['department'] ?></td>
                <td><?php echo $employee['unit'] ?></td>
                <td><?php echo $employee['office'] ?></td>
                <td><?php echo $employee['extension'] ?></td> 
                <td>
                <?php
                if ($employee['status']== 1) {
                 echo ' 
                 <h6 ><span class="badge badge-success">Active</span></h6>
                 
                 ';
                }
                elseif ($employee['status']== 0) {
                    echo ' 
                    <h6><span class="badge badge-danger">In Active</span></h6>
                 
                    ';
                   }
                  
                   else {
                       echo 'no data in column';
                   }
                
                ?>
               
                  </td> 

                  <td>
                  <div class="dropdown" style="text-align:center; color:#003479;">
                    <button class="btn btn-sm dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-cog    "></i> Options
                        </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="asset_transfer_details.php?check=<?php echo $employee['employee_id']; ?>" ><i class="fas fa-exchange-alt    "></i> Transfer</a>
                    <a  class="dropdown-item" href="update.php?edit=<?php echo $employee['employee_id']; ?>" ><i class="fas fa-edit    "></i> Edit</a>
                  <a class=" dropdown-item " href="detail.php?employee_id=<?php echo $employee['employee_id']; ?>" ><i class="fas fa-eye   "></i> View</a>
                  <a  class=" dropdown-item " href="?dis_able=<?php echo $employee['employee_id']; ?>" ><i class="fas fa-stop    "></i> Disable</a>
                  <a  class=" dropdown-item " href="?enable=<?php echo $employee['employee_id']; ?>" ><i class="fas fa-check    "></i> Enable</a>

                    </div>
                  </div>
                  
                  
                  </td> 
                                                      
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
  <script src="vendor/datatables/dataTables.buttons.js"></script>
  <script src="vendor/datatables/buttons.bootstrap4.js"></script>
  <script src="vendor/datatables/buttons.flash.js"></script>
  <script src="vendor/datatables/buttons.html5.js"></script>
  <script src="vendor/datatables/buttons.print.js"></script>
  <script src="vendor/datatables/scroller.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.responsive.js"></script>



  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script type="text/javascript">
  $(document).ready(function() {
  $('#dataTable').DataTable();
});

  
  
  
  
  
  
  </script>



</body>

</html>
