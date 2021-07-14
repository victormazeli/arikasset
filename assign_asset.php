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
  
   
//PHP script for inserting data into database

$success=array();
$error=array();
$message="";
if (isset($_POST['insert'])) {
# code...
$user_ara=trim($_POST['user_ara']);
$itasset_id=trim($_POST['ar_no']);
$has_edit=$_POST['has_edit'];
$status=$_POST['status'];
$tr_status=$_POST['tr_status'];
$tr_date=$_POST['tr_date'];
$location=$_POST['location'];
$tr_res=$_POST['tr_res'];




//inputs validation check for empty values
if (empty($user_ara)) {array_push($error, "please insert  Employee ara");}
if (empty($office)) {array_push($error, "please insert asset id no");}



if (count($error) == 0 ) {
      // begin the transaction
      $conn->beginTransaction();
      // our SQL statements
      $conn->exec("INSERT INTO employee_asset (asset_id, employee_id, transfer_status, transfer_date, location_id, tr_response)
      VALUES ('".$itasset_id."','".$tr_status."','".$tr_date."','".$location."','".$tr_res."')");
      $conn->exec("INSERT INTO it_asset_inventory (asset_id,  status, location_id)
      VALUES ('".$itasset_id."','".$status."','".$location."')");
     
      // commit the transaction
      $ass=$conn->commit();
   

if ($ass) { array_push($success, "Asset assigned successfully");}

}else {
    $message="Error inserting data";
    echo $message;
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

  <title>Assign User Asset</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="icon/arik wing.png" rel="short icon" type="img/png">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

  <!-- Page level plugin CSS-->
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
          <li class="breadcrumb-item active">Asset register</li>
        </ol>

       
        

        <!-- DataTables Example -->

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
        
       <div class="col-lg-6 mx-auto mb-3">
     <div class="card ">
    <div class="card-header"style="background-color:#ffff;">
     <h3 style="color:#003479;"><i class="fas fa-tag    "></i> Assign asset</h3>
    </div>
            

     <div class="card-body card-block">
     <form  method="post"  class="form-horizontal"  enctype="multipart/form-data">
     <input type="hidden"  name="location"  value="<?php echo $_SESSION['location']; ?>">
     <input type="hidden"  name="status"  value="1">
     <input type="hidden"  name="tr_status"  value="0">
     <input type="hidden"  name="tr_date"  value="0">
     <input type="hidden"  name="tr_res"  value="0">
   
  <div class="form-row mt-3 ">
   

    <div class="col">
    <input type="text" id="text-input" name="ar_no" placeholder="Asset id no" class="form-control" required>
                                   
    </div>
    

  </div>

  <div class="form-row mt-3">
   
    <div class="col">
    <input type="text" id="text-input" name="user_ara" placeholder="Employee ara" class="form-control"required>
                                    
    </div>


  </div>

  
 

  <div class="text-center mt-3">
  <button type="submit" name="insert" class="btn btn-primary" style="background-color:#003479; color:#ffff">
  <i class="fas fa-external-link-alt    "></i> Assign
 </button>

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
  <script src="vendor/datatables/buttons.bootstrap4.js"></script>


  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script type="text/JavaScript">
    $(document).ready(function() {
    $('#mytable').DataTable();
} );    
    
  </script>



</body>

</html>
