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
    
    $sql="SELECT * FROM it_asset WHERE asset_id='".$edit."'";
    
    $stmt=$conn->query($sql);
    $stmt->execute();
    $result=$stmt->fetch();
    
    }



//PHP script for inserting data into database

$success=array();
$error=array();
$message="";

if (isset($_POST['insert'])) {
    # code...
    $device_name=trim($_POST['Description']);
    $category=trim($_POST['category']);
    $serial_no=trim($_POST['serialno']);
    $processor=trim($_POST['processor']);
    $hdd=trim($_POST['harddrive']);
    $ram=trim($_POST['ram']);
    $os=trim($_POST['os']);
    $has_edit=$_POST['has_edit'];
    $condition=trim($_POST['cond']);
    $location=trim($_POST['location_id']);
    // $verified=trim($_POST['verify']);
    
    //inputs validation check for empty values
    if (empty($device_name)) {array_push($error, "please insert asset name");}
    if (empty($serial_no)) {array_push($error, "Please insert serial no");}
    if (empty($category)) {array_push($error, "please insert category");}
    if (empty($ram)) {array_push($error, "Please insert Ram");}
    if (empty($processor)) {array_push($error, "please inser processor type");}
    if (empty($hdd)) {array_push($error, "please insert hard disk size");}
    if (empty($os)) {array_push($error, "please insert os type");}

if (count($error) == 0 ) {
    //begin transaction
    $conn->beginTransaction();
    $conn->exec("INSERT INTO it_asset(asset_category_id, description, serialno, ram, hdd, os, processor, con, has_edit, location_id)
    VALUES ('".$category."','".$device_name."','".$serial_no."','".$ram."','".$hdd."','".$os."','".$processor."','".$condition."','".$has_edit."','".$location."')");
  
      $conn->exec("UPDATE it_asset SET has_edit=1 WHERE asset_id=$edit");
      $conn->exec( "INSERT INTO history_table (user, date, tabl, table_row, eventdesc)
      VALUES ('".$logon_user."', CURDATE(), 'it_asset','".$edit."','This  data was Edited')");

    if ($conn->commit()) {
        array_push($success, "Asset updated successfully");
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

  <title>Update Asset Data</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
  <link href="icon/arik wing.png" rel="short icon" type="img/png">

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
          <li class="breadcrumb-item active">Add asset</li>
        </ol>

       
        

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
     <h3 style="color:#003479;"><i class="fas fa-edit    "></i> New Asset</h3>
    </div>
            

     <div class="card-body card-block">
     <form  method="post"  class="form-horizontal"  enctype="multipart/form-data">
     <input type="hidden"  name="has_edit" value="0">
     <input type="hidden"  name="location_id" value="<?php echo $_SESSION['location']; ?>">
   
     <div class="form-row ">
    <div class="col">
    <input type="text" id="text-input" name="Description" placeholder="<?php echo $result['description']?>" class="form-control" required>
                                   
    </div>
    
    <div class="col">
    <input type="text"  name="serialno" placeholder="<?php echo $result['serialno']?>" class="form-control" required>
                                  
    </div>

    <div class="col">
    <select name="category" id="select" class="form-control">
     <option value="0">Select category</option>
     <?php $value = $conn->query("SELECT * FROM asset_category");
      $result= $value->fetchAll(); ?>
      <?php foreach ($result as $cat) :?>
     <option value="<?php echo $cat['asset_category_id']?>"><?php echo $cat['asset_category_desc']?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-row mt-3">
    <div class="col">
    <select name="ram" id="select" class="form-control">
                                        <option value="0">Select Ram size</option>
                                        <option value="2GB">2GB</option>
                                        <option value="3GB">3GB</option>
                                        <option value="4GB">4GB</option>
                                        <option value="6GB">6GB</option>
                                        <option value="8GB">8GB</option>
                                        <option value="16GB">16GB</option>
                                        <option value="NA">NA</option>
                                    </select>
    </div>
    <div class="col">
    <select name="os" id="select" class="form-control">
                                        <option value="0">Select O/S</option>
                                        <option value="Windows 7">Windows 7</option>
                                        <option value="Windows 8">Windows 8</option>
                                        <option value="Windows 10">Windows 10</option>
                                        <option value="NA">NA</option>
                                    </select>
    </div>

    <div class="col">
    <select name="harddrive" id="Select" class="form-control">
                                        <option value="0">Select HDD size</option>
                                        <option value="160GB">160GB</option>
                                        <option value="250GB">250GB</option>
                                        <option value="500GB">500GB</option>
                                        <option value="750GB">750GB</option>
                                        <option value="1TB">1TB</option>
                                        <option value="NA">NA</option>
                                    </select>
    </div>
  </div>

  <div class="form-row mt-3 ">
    <div class="col">
    <select name="processor" id="Select"  class="form-control">
                                        <option value="0">Select Processor type</option>
                                        <option value="Core Duo">Core Duo</option>
                                        <option value="Pentium">Pentium</option>
                                        <option value="Core i3">Core i3</option>
                                        <option value="Core i5">Core i5</option>
                                        <option value="Core i7">Core i7</option>
                                        <option value="NA">NA</option>
                                    </select>
    </div>
    <div class="col">
    <select name="cond" id="select" class="form-control">
                                        <option value="">Select Condition</option>
                                        <option value="In service">In service</option>
                                        <option value="Out of service">Out of Service</option>
                                        <option value="NA">NA</option>
                                      
                                    </select>
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
  



</body>

</html>
