<?php
session_start();

include ('includes/db_config.php');

if(!isset($_SESSION["username"]) && !isset($_SESSION["location"])){

    header("Location: login.php");

}if (isset($_GET['logout'])=='yes') {
    # code...
    session_destroy();
    header("Location: login.php");
}


if (isset($_POST['life']))
{
    $calc = ($_POST['cost']*$_POST['salvage'])/$_POST['life'];
    $calc = "<script>
                $(document).ready(function(){
                Swal.fire('Nice', 'Value = $calc!', 'success')
                });
            </script>";
}

?>




<!DOCTYPE html>
<php lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Asset Movement</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="icon/arik wing.png" rel="short icon" type="img/png">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin.css" rel="stylesheet">
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
                    <li class="breadcrumb-item active">Asset transfer</li>
                </ol>



                <!-- DataTables Example -->

                <div class="col-lg-6 mx-auto mb-3">
                    <div class="card ">
                        <div class="card-header"style="background-color:#ffff;">
                            <h3 style="color:#003479;"><i class="fas fa-users    "></i> Check asset value</h3>
                        </div>

                        <div class="card-body card-block">
                            <?php echo (isset($calc))? $calc: "";?>
                            <form action="" method="post"  class="form-horizontal">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Cost</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number"  name="cost" placeholder="Enter asset cost" class="form-control" required>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Salvage</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number"  name="salvage" placeholder="Enter salvage cost" class="form-control" required>

                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">Useful life</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="number"  name="life" placeholder="Enter useful life" class="form-control" required>

                                    </div>
                                </div>


                                <div class="mx-auto" style="text-align: center;">
                                    <button name="check" class="btn btn-primary" style="background-color:#003479; color:#ffff">
                                        <i class="fas fa-check    "></i> Check
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
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Page level plugin JavaScript-->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>



        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin.min.js"></script>


        <!-- Demo scripts for this page-->



    </body>

</php>
