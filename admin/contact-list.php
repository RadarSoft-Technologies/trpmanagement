   <?php 
$page = "four";
   include("includes/config.php");

session_start();
if(!isset($_SESSION['LOGIN']['BOM']))
  {
        header("location:index.php");

  }
  

   
    $selectRole = "SELECT * FROM `contactus`   ORDER BY id DESC";
    $fireRole = mysqli_query($connect, $selectRole);
    $m=0;
    
    while($rowRole = mysqli_fetch_array($fireRole))
    {

       $m++; 
     
   
       $contactList .='<tr>
                    <td>'.$m.'</td>
                  <td>'.$rowRole['fullname'].'</td>
                  <td>'.$rowRole['email'].'</td>
                  <td>'.$rowRole['phoneno'].'</td>
                  <td>'.$rowRole['whoareyou'].'</td>
                  <td>'.$rowRole['message'].'</td>
                    <td>'.$rowRole['date'].'</td>
                   
                  </tr>';
     

       
    }  




   include("header.php");



   
   ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active">Contact list</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
           
          

            <div class="card">
             
              <div class="card-header">
              <!--  <a href="add-shop.php" class="btn btn-primary float-sm-right"><i class="fa fa-upload" aria-hidden="true"></i>  Add Shop</a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>               <th>#</th>
                                    <th>Full name</th>
                                    <th>Email</th>
                                    <th>Phone no</th>
                                    <th>Who you are</th>
                                    <th>Message</th>
                                    <th>Date & Time</th>
                                   
                                    
                  </tr>
                  </thead>
                  <tbody>
                  
                <?php echo  $contactList; ?>
                 
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<style type="text/css">
  .deactive{ color: #ccc !important;}
  .table td, .table th {
    padding: .40rem !important;}
</style>

  <?php include("footer.php");?>