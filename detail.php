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
  <!-- <link href="icon/arik wing.png" rel="short icon" type="img/png"> -->

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/datatables.min.css" rel="stylesheet">
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
                    <th>Salvation value</th>
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
                    <td><?=$asset['salvage_value']?></td>
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
    $('#dataTable').DataTable();
} );    
    
  </script>



</body>

</html>
