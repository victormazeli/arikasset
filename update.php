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
  
   
if (isset($_GET['edit'])) {

    $edit=$_GET['edit'];
    
    $sql="SELECT * FROM employees WHERE employee_id='".$edit."'";
    
    $stmt=$conn->query($sql);
    $stmt->execute();
    $result=$stmt->Fetch();
    
    }



//PHP script for inserting data into database
$success=array();
$error=array();
$message="";

if (isset($_POST['insert'])) {
  # code...
  $user_ara=trim($_POST['ara']);
  $user=trim($_POST['user']);
  $has_edit=$_POST['has_edit'];
  $unit=trim($_POST['unit']);
  $department=trim($_POST['department']);
  $office=trim($_POST['office']);
  $region=trim($_POST['region']);
  $status=trim($_POST['status']);
  $location=trim($_POST['location']);
  $logon_user=trim($_POST['logon_user']);
  
  
  //inputs validation check for empty values
  if (empty($user_ara)) {array_push($error, "please insert  Employee ara");}
  if (empty($office)) {array_push($error, "please insert office");}
  if (empty($unit)) {array_push($error, "please insert unit");}
  if (empty($department)) {array_push($error, "please insert department");}
  if (empty($condition)) {array_push($error, "please insert asset condition");}
  if (empty($region)) {array_push($error, "please insert building extension");}
  

if (count($error) == 0 ) {
    //begin transaction
    $conn->beginTransaction();
     $conn->exec( "INSERT INTO employees (employee_id, user, department, office, unit, extension, has_edit, status, location_id)
    VALUES ('".$user_ara."','".$user."','".$department."','".$office."','".$unit."','".$region."','".$has_edit."','".$status."','".$location."')");
     $conn->exec("UPDATE employees SET has_edit=1 WHERE employee_id=$edit");
     $conn->exec( "INSERT INTO history_table (user, date, table, table_row, eventdesc)
     VALUES ('".$logon_user."', CURDATE(), 'Employees','".$edit."','This  data was Edited')");
  

    if ($conn->commit()) {
        array_push($success, "Employee updated successfully");
    }


}else {
    $message="Error updating data";
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

  <title>Update Employee Data</title>

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
          <li class="breadcrumb-item active">Add asset</li>
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
        
       <div class="col-lg-7 mx-auto mb-3">
     <div class="card ">
    <div class="card-header"style="background-color:#ffff;">
     <h3 style="color:#003479;"><i class="fas fa-user    "></i> New Empolyee</h3>
    </div>
            

     <div class="card-body card-block">
     <form  method="post"  class="form-horizontal"  enctype="multipart/form-data">
    <input type="hidden"  name="has_edit"  value="0">
     <input type="hidden"  name="status"  value="0">
     <input type="hidden"  name="location"  value="<?php echo $_SESSION['location']; ?>">
     <input type="hidden"  name="logon_user"  value="<?php echo $_SESSION['username']; ?>">
   
  <div class="form-row mt-3 ">
   

    <div class="col">
    <input type="text" id="text-input" name="fname" placeholder="<?php echo $result['user']?>" class="form-control" required>
                                   
    </div>
    
    <div class="col">
    <input type="text" id="text-input" name="ara" placeholder="<?php echo $result['employee_id']?>" class="form-control" required>
                                   
    </div>

  </div>

  <div class="form-row mt-3">
   
    <div class="col">
    <input type="text" id="text-input" name="office" placeholder="<?php echo $result['unit']?>" class="form-control"required>
                                    
    </div>

    <div class="col">
    <input type="text" id="text-input" name="department" placeholder="<?php echo $result['department']?>" class="form-control"required>
                                
    </div>
    <div class="col">
    <input type="text" id="text-input" name="region" placeholder="<?php echo $result['extension']?>" class="form-control"required>
                                                              
    </div>

  </div>

  
 

  <div class="text-center mt-3">
  <button type="submit" name="insert" class="btn btn-success" style="background-color:green; color:#ffff">
<i class="fas fa-external-link-alt    "></i> Update
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
          <div class="copyright text-center my-auto"  style=" color: #003F75">
            <span>Copyright © AAS Portal</span>
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
  



</body>

</html>
