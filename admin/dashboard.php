<?php 
$page = "zero";
  session_start();
  if(!isset($_SESSION['LOGIN']['BOM']))
  {
   header("location:index.php");
  }

include("header.php");
 include("includes/config.php");
 
 $getEq = mysqli_query($connect, "SELECT count(*) as total from projectenquiry");
  $datae=mysqli_fetch_assoc($getEq);
  
  
  $getPd = mysqli_query($connect, "SELECT count(*) as total from product");
  $datap=mysqli_fetch_assoc($getPd);
  
  
   $getVendor = mysqli_query($connect, "SELECT count(*) as total from vendors");
  $dataV=mysqli_fetch_assoc($getVendor);
  
  
   $getBuyer = mysqli_query($connect, "SELECT count(*) as total from buyers");
  $dataB=mysqli_fetch_assoc($getBuyer);
  
  
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $dataB['total']; ?></h3>

                <p>Buyer</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="buyer-list.php" class="small-box-footer" target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3 style="color:#fff !important;"><?php echo $dataV['total']; ?></h3>

                <p style="color:#fff !important;">Vendor </p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="vendor-list.php" class="small-box-footer" style="color:#fff !important;" target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $datae['total']; ?></h3>

                <p>Enquiry</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="enquiry-list.php" class="small-box-footer" target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
         
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $datap['total']; ?></h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="product-list.php" class="small-box-footer" target="_blank">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <?php include("footer.php");?>