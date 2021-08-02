<?php
 session_start(); 
 include ('includes/db_config.php');

 if(!isset($_SESSION["username"]) && !isset($_SESSION["location"])){

$locate=$_SESSION["location"];
  header("Location: index.php");

}if (isset($_GET['logout'])=='yes') {

  header("Location: index.php");
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


//inputs validation check for empty values
if (empty($user_ara)) {array_push($error, "please insert  Employee ara");}
if (empty($office)) {array_push($error, "please insert office");}
if (empty($unit)) {array_push($error, "please insert unit");}
if (empty($department)) {array_push($error, "please insert department");}
if (empty($condition)) {array_push($error, "please insert asset condition");}
if (empty($region)) {array_push($error, "please insert building extension");}


if (count($error) == 0 ) {
    $sql= "INSERT INTO employees (employee_id, user, department, office, unit, extension, has_edit, status, location_id)
    VALUES ('".$user_ara."','".$user."','".$department."','".$office."','".$unit."','".$region."','".$has_edit."','".$status."','".$location."')";
   $en= $conn->exec($sql);

if ($en) { array_push($success, "Data Submitted successfully");}

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

  <title>New Employee Data</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <!-- <link href="icon/arik wing.png" rel="short icon" type="img/png"> -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="vendor/datatables/buttons.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
<?php
include_once "nav.php";
?>

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
   
  <div class="form-row mt-3 ">
   

    <div class="col">
    <input type="text" id="text-input" name="user" placeholder="Employee Name" class="form-control" required>
                                   
    </div>
    <div class="col">
    <input type="text" id="text-input" name="ara" placeholder="Enter user's ara" class="form-control" required>
                                   
    </div>

    <div class="col">
    <input type="text" id="text-input" name="unit" placeholder="Enter unit" class="form-control" required>
                                   
    </div>

  </div>

  <div class="form-row mt-3">
   
    <div class="col">
    <input type="text" id="text-input" name="office" placeholder="Enter office" class="form-control"required>
                                    
    </div>

    <div class="col">
    <input type="text" id="text-input" name="department" placeholder="Enter department" class="form-control"required>
                                
    </div>
    <div class="col">
    <input type="text" id="text-input" name="region" placeholder="Location" class="form-control"required>
                                                              
    </div>

  </div>

  
 

  <div class="text-center mt-3">
  <button type="submit" name="insert" class="btn btn-primary" style="background-color:#003479; color:#ffff">
 Submit <i class="fas fa-arrow-right    "></i>
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
            <span>Copyright © IT Asset Portal</span>
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

</php>
