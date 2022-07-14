<?php 

   include("includes/config.php");

session_start();
if(isset($_SESSION['LOGIN']['BOM']))
  {
    header("location:dashboard.php");
  }


if($_POST)
  {

 
     $sql = "select * from  admin where  adminEmail = '".$_REQUEST['member_name']."' AND  adminPassword = '".md5($_REQUEST['member_password'])."'";
  
    $result = mysqli_query($connect, $sql);
    $user = mysqli_fetch_array($result);
    if($user) {
              $_SESSION['LOGIN']['BOM']  = $user;

            if(!empty($_POST["remember"])) {
                setcookie ("member_login",$_POST["member_name"],time()+ (10 * 365 * 24 * 60 * 60));
                setcookie ("member_password",$_POST["member_password"],time()+ (10 * 365 * 24 * 60 * 60));
            } else {
                if(isset($_COOKIE["member_login"])) {
                    setcookie ("member_login","");
                }
                if(isset($_COOKIE["member_password"])) {
                    setcookie ("member_password","");
                }
            }
             header("location:dashboard.php");
    } else { 
        $EnqMsg = '<div class="text-danger text-bold text-center">Password Incorrect with this email</div>';
    }
    
   
  }















  ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="icon" type="favicon" href="dist/img/favicon.svg">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <a href="#" class="h3"><b>Sign in to account</b></a>
    </div>
    <div class="card-body">
      <h5><?php echo $EnqMsg; ?></h5>
      <!-- <p class="login-box-msg">
Enter your email & password to login</p> -->

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="member_name" required="" value="<?php if(isset($_COOKIE["member_login"])) { echo $_COOKIE["member_login"]; } ?>" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="member_password"  required="" value="<?php if(isset($_COOKIE["member_password"])) { echo $_COOKIE["member_password"]; } ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" class="square" <?php if(isset($_COOKIE["member_login"])) { ?> checked <?php } ?>>
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-dark btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     <!--  <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->
      <!-- /.social-auth-links -->

     <!--  <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<style>
    /*.btn-primary{*/
    /*    background-color: #1c1f23 !important;*/
    /*border-color: #1c1f23 !important;*/
    /*}*/
</style>
</body>
</html>
