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
  
   $post = false;
//PHP script for inserting data into database

$success=array();
$error=array();
$message="";

if (isset($_POST['insert'])) {
$device_name=trim($_POST['Description']);
$category=trim($_POST['category']);
$serial_no=trim($_POST['serialno']);
$processor=trim($_POST['processor']);
$hdd=trim($_POST['harddrive']);
$ram=trim($_POST['ram']);
$os=trim($_POST['os']);
$has_edit=$_POST['has_edit'];
$condition=trim($_POST['cond']);
$location=trim($_POST['location'])??0;
$salvage=trim($_POST['salvage'])??'';
// $verified=trim($_POST['verify']);

//inputs validation check for empty values
if (empty($device_name)) {array_push($error, "please insert asset name");}
if (empty($serial_no)) {array_push($error, "Please insert serial no");}
if (empty($category)) {array_push($error, "please insert category");}
if (empty($ram)) {array_push($error, "Please insert Ram");}
if (empty($processor)) {array_push($error, "please insert processor type");}
if (empty($hdd)) {array_push($error, "please insert hard disk size");}
if (empty($os)) {array_push($error, "please insert os type");}



if (count($error) == 0 ) {
  $sql ="INSERT INTO it_asset(asset_category_id, description, serialno, ram, hdd, os, processor, con, has_edit, location_id, salvage_value)
  VALUES ('".$category."','".$device_name."','".$serial_no."','".$ram."','".$hdd."','".$os."','".$processor."','".$condition."','".$has_edit."','".$location."', '".$salvage."')";
  // use exec() because no results are returned
    $ap=$conn->exec($sql);
    $last_id = $conn->lastInsertId();
    $url = "$last_id:$device_name:$serial_no";
if ($ap) {
    array_push($success, "Data Submitted successfully <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myCode\">
  Re-print
</button>");
    $post = true;
}

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

  <title>New Asset Data</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
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
        
       <div class="col-lg-7 mx-auto mb-3">
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
     <div class="card ">
    <div class="card-header"style="background-color:#ffff;">
     <h3 style="color:#003479;"><i class="fas fa-edit    "></i> New Asset</h3>
    </div>
            

     <div class="card-body card-block">
     <form  method="post"  class="form-horizontal"  enctype="multipart/form-data">
     <input type="hidden"  name="has_edit" value="0">
     <input type="hidden" name="location" value="<?php echo $_SESSION['location']; ?>">
   
     <div class="form-row ">
    <div class="col">
    <input type="text" id="text-input" name="Description" placeholder="Enter asset name" class="form-control" required>
                                   
    </div>
    
    <div class="col">
    <input type="text"  name="serialno" placeholder="Enter serial no" class="form-control" required>
                                  
    </div>
         <div class="col">
             <input type="text" name="salvage" required class="form-control" id="salvage" placeholder="Salvage value" autocomplete="off">
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
  <button type="submit" name="insert" class="btn btn-primary" style="background-color:#003479; color:#ffff">
<i class="fas fa-dot-circle    "></i> Submit
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
            <span>Copyright ?? IT Asset Portal</span>
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
      <script>
          $(function () {
              $("#salvage").on("click", function () {
                  $("#myModal").modal("show")
              })
          })
          $(document).ready(function() {
              $('form.myForm').on('submit', function () {
                  let cost = $("#cost").val()
                  let salvage = $("#sal").val()
                  let life = $("#life").val()

                  /**
                   * here we do the calculation
                   */
                  let calc = (cost * salvage) / life

                  /**
                   * populate the input
                   */
                  $("#salvage").val(calc)

                  /**
                   * hide modal
                   */
                  $("#myModal").modal("hide")

                  return false
              })
          });

          function PrintElem(elem)
          {
              var mywindow = window.open('', 'PRINT', 'height=400,width=600');

              mywindow.document.write('<html><head><title>' + document.title  + '</title>');
              mywindow.document.write('</head><body >');
              mywindow.document.write('<h1>' + document.title  + '</h1>');
              mywindow.document.write(document.getElementById(elem).innerHTML);
              mywindow.document.write('</body></html>');

              mywindow.document.close(); // necessary for IE >= 10
              mywindow.focus(); // necessary for IE >= 10*/

              mywindow.print();
              mywindow.close();

              return true;
          }
      </script>
      <?php
      if ($post):?>
          <script>
              $(function () {
                  $("#salp").on("click", function () {
                      $("#myCode").modal("show")
                  })
              })
              $(function () {
                  $(window).on('load', function() {
                      $('#myCode').modal('show');
                  });
              })
          </script>
      <?php
      endif;?>

</body>

</html>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="" class="form-horizontal myForm">
            <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Cost</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number"  name="cost" placeholder="Enter asset cost" class="form-control" required id="cost">

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Salvage</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number"  name="sal" placeholder="Enter salvage cost" class="form-control" required id="sal">

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Useful life</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number"  name="life" placeholder="Enter useful life" class="form-control" required id="life">
                        </div>
                    </div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button name="check" class="btn btn-primary" style="background-color:#003479; color:#ffff">
                    <i class="fas fa-check    "></i> Check
                </button>
            </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="myCode">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Make sure to Print this code</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="qrCode">
                <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=http%3A%2F%2F/localhost/view_asset.php?q=<?=$url?>%2F&choe=UTF-8" title="<?=$device_name?>" />
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" style="background-color:#003479; color:#ffff" onclick="PrintElem('qrCode')">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>

        </div>
    </div>
</div>