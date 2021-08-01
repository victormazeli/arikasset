

<?php 
include ('includes/db_config.php');

//php script for login in admin

//declare variables
$username="";
$password="";
$location="";
$error =  array(); 

 if (isset($_POST['login'])) {

  $username=trim($_POST['username']);
  $password=trim($_POST['password']);
 
 $sql="SELECT * FROM user_table WHERE username=:username AND password=:password ";
 $stmt= $conn->prepare($sql);
 $stmt->bindValue(':username', $username);
 $stmt->bindValue(':password', $password);
 $stmt->execute();
 $row= $stmt->fetch();

//check if user exist in table
if ($row==false){
 array_push($error, "Invalid or Incorrect Login Credentials");
                         
   }else {
  
   // start session
  session_start(); 
  $_SESSION['user_id']= $row['user_id'];
  $_SESSION['username']= $row['username'];
  header("Location:index.php");                            

   }



 }
 
 //#####End----php login script ended---####//
 
 
 ?>









<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>::Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="icon/arik wing.png" rel="short icon" type="img/png">
  <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link href="css/background.css" rel="stylesheet">

</head>

<body class="bg">

  <div class="container">
 
    <div class="card card-login mx-auto mt-5 mb-3">
   <div style="text-align: center;"  class=" mb-2 mt-3 text-lg-center">
 <!-- <img  src="icon/ARIK.png" alt="logo" width="150" height="45"/> -->


 </div>
<?php foreach ($error as $er ) : ?>

<div class="container">
<div class="alert alert-danger mt-5">
 <?php echo $er; ?>
</div>
</div>
<?php endforeach; ?>
      <div class="card-body mb-2">
      <form method="POST">
  <div class="form-group">
    <label for="username" style="text-align: center; color: #003F75">Username</label>
    <input type="text" class="form-control" name="username"  placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password" style="text-align: center; color: #003F75">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  
  <button class="btn btn-primary btn-block" name="login"  style="background: #003F75; border-radius:10px;">Login</button>
</form>
        
      </div>
    </div>
  </div>
<!-- Sticky Footer -->
<footer class="">
        <div class="container-fluid my-auto">
          <div class="copyright text-center my-auto" style=" color: #fff">
            <span>Copyright ©  IT Asset Portal</span>
          </div>
        </div>
      </footer>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
