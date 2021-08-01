<?php
 session_start(); 

 include ('includes/db_config.php');

/* if(!isset($_SESSION["username"])){

  header("Location: login.php");

}*/
 if (isset($_GET['logout'])=='yes') {
  # code...
  session_destroy();
  header("Location: login.php");
}
  
    
// PHP script for displaying assets.
if (isset($_GET['location'])) {
  # code...
  $location=$_GET['location'];
  $result = $conn->query("SELECT * FROM it_asset INNER JOIN it_asset_inventory 
ON it_asset.asset_id=it_asset_inventory.asset_id INNER JOIN asset_category ON it_asset.asset_category_id=asset_category.asset_category_id WHERE  location_id='".$location."' AND status=1 AND has_edit=0 ");
$itasset = $result->fetchAll();

}


$message=array();
if (isset($_GET['disable'])) {
     // sql to delete a record
     $dis=$_GET['disable'];
     $sql = "DELETE FROM it_asset_inventory  WHERE it_asset_inventory_id='".$dis."'";

     // Prepare statement
     $stmt = $conn->prepare($sql);
 
     // execute the query
     $stmt->execute();

     if ($stmt->execute()) {array_push($message, "Asset Disabled successfully");}
 
 
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

  <title>Asset Overview</title>

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
          <li class="breadcrumb-item active">Asset Inventory </li>
        </ol>

       
 <!-- Asset overview-->
 <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white  o-hidden h-100" style="background-color: #003F75;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-layer-group"></i>
                </div>
                <?php 
                $t=$conn->query("SELECT COUNT(DISTINCT(asset_id)) as total FROM it_asset WHERE location_id='".$location."' ");
                $v=$t->fetch();

                
                ?>
                <div class="mr-5"><h4><?php echo $v['total']; ?></h4></div>
                <hr style="background-color: #fff;"/>
                <div class="mr-5">TOTAL ASSET</div>
              </div>
            
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white  o-hidden h-100" style="background-color: #003F75;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-cog"></i>
                </div>
                <?php 
                $ut=$conn->query("SELECT COUNT(con) as userstotal FROM it_asset WHERE con='in service' AND location_id='".$location."' ");
                $uv=$ut->fetch();

                
                ?>
               
                <div class="mr-5"><h4><?php echo $uv['userstotal']; ?></h4></div>
                <hr style="background-color: #fff;"/>
                <div class="mr-5">TOTAL ACTIVE ASSET </div>
              </div>
              
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white o-hidden h-100" style="background-color: #003F75;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-cog"></i>
                </div>
                <?php 
                $t=$conn->query("SELECT COUNT(con) as of FROM it_asset WHERE con='out of service' AND location_id='".$location."' ");
                $v=$t->fetch();

                
                ?>
                <div class="mr-5"><h4><?php echo $v['of']; ?></h4></div>
                <hr style="background-color: #fff;"/>
                <div class="mr-5">TOTAL INACTIVE ASSET</div>
              </div>
              
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white  o-hidden h-100" style="background-color: #003F75;">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-building"></i>
                </div>
                <?php 
                $t=$conn->query("SELECT location_name as dep FROM location WHERE location_id='".$location."'");
                $v=$t->fetch();

                
                ?>
                <div class="mr-5"><h4><?php echo $v['dep']; ?></h4></div>
                <hr style="background-color: #fff;"/>
                <div class="mr-5">LOCATION</div>
              </div>
              
            </div>
          </div>
        </div>
       
<!-- DataTables Example -->
<div class="card mb-3">
          <div class="card-header bg-white">
            
            Asset Categories</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                  <?php $value = $conn->query("SELECT * FROM asset_category");
      $result= $value->fetchAll(); ?>
      <?php foreach ($result as $cat) :?>
        <th>Total <?php echo $cat['asset_category_desc']?></th>
      <?php endforeach; ?>
                 
              
                  </tr>
                </thead>
                <tbody>
                <tr>
                
     <?php $as = $conn->query("SELECT COUNT(description) AS ar FROM it_asset  WHERE location_id='".$location."' GROUP BY asset_category_id");
      $re= $as->fetchAll(); ?>
      <?php foreach ($re as $a) :?>
        <td><?php echo $a['ar'];?></td>
      <?php endforeach; ?>
                                                 
                 </tr>                        
                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
        </div>


        

        <!-- DataTables Example -->
        <!-- <h3>Asset Overview</h3> -->
        <div class="card mb-3">
        <?php foreach ($message as $msg) : ?>
              <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <?php echo $msg ?>
                <!--## php Script to display successfully execution END-->
              </div>
              <?php endforeach; ?>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                  <th>Asset_id</th>
                  <th>Asset description</th>
                  <th>Category</th>
                  <th>Serial no</th>
                   <th>Specification</th>
                   <th>Entry Date</th>
                    <th>Condition</th>
                    <th>Salvage value</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($itasset as $asset ) : ?>  
                                    
                <tr>
                <td><?php echo $asset['asset_id'] ?></td>
                <td><?php echo $asset['description'] ?></td>
                <td><?php echo $asset['asset_category_desc'] ?></td>
                <td><?php echo $asset['serialno'] ?></td>
                <td>
                <?php echo $asset['ram'] ?>
                <?php echo $asset['hdd'] ?>
                <?php echo $asset['os'] ?>
                <?php echo $asset['processor'] ?>
                </td>
                <td><?php echo $asset['entry_date'] ?></td>
                <td>
                <?php
                if ($asset['con']=='in service') {
                 echo '<h6><span class="badge badge-success">in service</span></h6>  ';
                }
                   elseif ($asset['con']=='out of service') {
                    echo ' <h6><span class="badge badge-warning">out of service</span></h6>   ';
                   }
                   else {
                       echo 'no data in column';
                   }
                   
                
                
                
                ?>
                  </td>
                    <td><?=$asset['salvage_value']?></td>

                  <td>
                  <div class="dropdown open">
                 <button class="btn  btn-sm dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">
                          <i class="fas fa-cog    "></i> options
                         </button>
                 <div class="dropdown-menu" aria-labelledby="triggerId">
                 <a class=" dropdown-item" href="update_asset.php?edit=<?php echo $asset["asset_id"];?>">Edit</a>
                 <a   class="dropdown-item " href="?disable=<?php echo $asset["it_asset_inventory_id"];?>">Remove</a>
   
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
          <div class="row">
              <div class="col-12">
                  <div class="text-center text-150">
                  </div>
              </div>
          </div>
      </div>
      <!-- /.container-fluid -->

     <!-- Sticky Footer -->
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
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
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
