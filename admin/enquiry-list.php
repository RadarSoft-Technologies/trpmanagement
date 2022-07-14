   <?php 
$page = "sevent";
   include("includes/config.php");

session_start();
if(!isset($_SESSION['LOGIN']['BOM']))
  {
        header("location:index.php");

  }
  

   
    $selectRole = "SELECT * FROM `projectenquiry` ORDER BY `penquiryId` DESC";
    $fireRole = mysqli_query($connect, $selectRole);
    $m=0;
    
    while($rowRole = mysqli_fetch_array($fireRole))
    {
        $mk = explode(',',$rowRole['penquiryProductids']);
        
        foreach ($mk as $vals)
        {
         $selectRole1 = "SELECT * FROM `product`  WHERE productid = '".$vals."'";
         $fireRole1 = mysqli_query($connect, $selectRole1);
         $rowRole1 = mysqli_fetch_array($fireRole1);
         
         $productsn .= $rowRole1['productname'].',';
        }
       $m++; 
     
   
       $contactList .='<tr>
                    <td>'.$m.'</td>
                  <td>'.$rowRole['penquiryProjectname'].'</td>
                  <td>'.$rowRole['penquiryLocation'].'</td>
                  <td>'.$rowRole['penquiryProjecttype'].'</td>
                  <td>'.$rowRole['penquiryPhone'].'</td>
                    <td>'.$rowRole['penquiryEmail'].'</td>
                  <td>'.rtrim($productsn,',').'</td>
                    <td>'. date('d-m-Y h:i A',strtotime($rowRole['penquiryDate'])).'</td>
                  </tr>';
     
       $productsn='';
       
    }  




   include("header.php");



   
   ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enquiry List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active">Enquiry list</li>
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
                <table id="example1" class="table table-bordered table-striped" style="width:100%">
                  <thead>
                  <tr>                <th>#</th>
                                    <th>Project Name</th>
                                    <th>Location</th>
                                    <th>Project Type</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>Item</th>
                                    <th>Date</th>
                                  
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