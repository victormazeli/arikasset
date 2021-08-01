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

if (isset($_GET['q'])) {

    $location=$_SESSION["location"]??null;
    $asset_detail=explode(":", $_GET['q']);
    $id = $asset_detail[0];

    $details = $conn->query(" SELECT * FROM it_asset INNER JOIN asset_category ON it_asset.asset_category_id = asset_category.asset_category_id WHERE asset_id = '$id'");
    $assets = $details->fetchAll();

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

    <title>Asset Details</title>

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
</nav>

<div id="wrapper">


    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
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
                                <th>Asset</th>
                                <th>Category</th>
                                <th>Serial No</th>
                                <th>Specification</th>
                                <th>Condition</th>
                                <th>Salvation value</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($assets as $asset ) : ?>

                                <tr>
                                    <!--## php Script to display  asset details of selected user-->
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
                                        if ( $asset['con']== 'In service' ) {
                                            echo '
                  <h6 > <span class="badge badge-success">in service</span></h6>
                  
                  ';
                                        }else/*if ($asset['con']== 'out of service' )*/ {
                                            echo '
                  <h6 "> <span class="badge badge-warning">out of service</span></h6>
                  
                  ';
                                        }
                                        ?>
                                    </td>
                                    <td><?=$asset['salvage_value']?></td>
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
