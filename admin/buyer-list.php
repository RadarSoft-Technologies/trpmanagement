   <?php 
$page = "five";
   include("includes/config.php");

session_start();
if(!isset($_SESSION['LOGIN']['BOM']))
  {
        header("location:index.php");

  }
  

   
    $selectRole = "SELECT * FROM `buyers` ORDER BY `buyerId` DESC";
    $fireRole = mysqli_query($connect, $selectRole);
    $m=0;
    
    while($rowRole = mysqli_fetch_array($fireRole))
    {
        
        
        
         $selectRole1 = "SELECT * FROM `buyerfiles` WHERE buyerfileBid ='".$rowRole['buyerId']."' ORDER BY `buyerfileId` DESC";
    $fireRole1 = mysqli_query($connect, $selectRole1);
    $cm = mysqli_num_rows($fireRole1);
    
    $files ='';
    while($rowRole1 = mysqli_fetch_array($fireRole1))
    {
        
       if($rowRole1['buyerfilePath'] !='')
       {
         $files .= ' <a href="../images/buyer/'.$rowRole1['buyerfilePath'].'" class="btn btn-dark" style="width: 118px;" target="_blank">Download file</a>';
       }else{
               
        $files = '-';
       }  
    }        

       $m++; 
     
       $contactList .='<tr>
                    <td>'.$m.'</td>
                <td>'.$rowRole['buyerFullname'].'</td>
                  <td>'.$rowRole['buyerHoaddress'].'</td>
                  <td>'.$rowRole['buyerPhone'].'</td>
                    <td>'.$rowRole['buyerEmail'].'</td>
                   <td>'.$rowRole['buyerWebsite'].'</td>
                  <td>'.$files.'</td>
                    <td>'.$rowRole['buyerDate'].'</td>
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
            <h1>Buyer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active">Buyer list</li>
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
                  <tr>               <th>#</th>
                                    <th>Person Name</th>
                                    <th>Address</th>
                                   
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                     <th>Website</th>
                                         <th>File</th>
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
    .btn-dark {
        margin: 3px !important;
}
</style>

  <?php include("footer.php");?>