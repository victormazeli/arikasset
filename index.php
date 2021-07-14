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

$result = $conn->query("SELECT * FROM it_asset INNER JOIN it_asset_inventory ON it_asset.asset_id=it_asset_inventory.asset_id INNER JOIN asset_category ON asset_category.asset_category_id=it_asset.asset_category_id INNER JOIN location ON location.location_id=it_asset.location_id WHERE status=1  ORDER BY it_asset_inventory_id DESC LIMIT 10  ");
$assets = $result->fetchAll();




?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Arik air IT asset: Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="icon/arik wing.png" rel="short icon" type="img/png">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

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
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Master View</li>
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
                $t=$conn->query("SELECT COUNT(DISTINCT(asset_id)) as total FROM it_asset ");
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
                $ut=$conn->query("SELECT COUNT(con) as userstotal FROM it_asset WHERE con='in service' ");
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
                $t=$conn->query("SELECT COUNT(con) as of FROM it_asset WHERE con='out of service' ");
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
                $t=$conn->query("SELECT COUNT(DISTINCT(location_name)) as dep FROM location ");
                $v=$t->fetch();

                
                ?>
                <div class="mr-5"><h4><?php echo $v['dep']; ?></h4></div>
                <hr style="background-color: #fff;"/>
                <div class="mr-5">TOTAL LOCATION</div>
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
                
     <?php $as = $conn->query("SELECT COUNT(description) AS ar FROM it_asset GROUP BY asset_category_id");
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
        <div class="card mb-3">
          <div class="card-header bg-white">
            
            Recently Added asset</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Asset</th>
                    <th>Category</th>
                    <th>Specifications</th>
                    <th>Condition</th>
                    <th>Location</th>
                    <th>Entry Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($assets as $asset ) : ?>  
                                    
                                    <tr>
                                    <td><?php echo $asset['description'] ?></td>
                                    <td><?php echo $asset['asset_category_desc'] ?></td>
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
                                    <td><?php echo $asset['location_name'] ?></td>
                                    <td><?php echo $asset['entry_date'] ?></td>
                                                                   
                                     </tr>
                                                           
                                    <?php endforeach; ?>
              
                </tbody>
              </table>
            </div>
          </div>
          <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
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
