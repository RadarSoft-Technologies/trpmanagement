   <?php 
   $page = "ten";
   include("includes/config.php");

session_start();
if(!isset($_SESSION['LOGIN']['BOM']))
  {
    header("location:index.php");
  }
  
  if($_REQUEST['lid'] !=''){

     $selectRole = "SELECT * FROM services WHERE servicesID ='".$_REQUEST['lid']."'";
     $fireRole = mysqli_query($connect, $selectRole);
     $rowRole = mysqli_fetch_array($fireRole);
  }
  
    
   $selectRole1 = "SELECT * FROM services WHERE servicesIs_delete = 0";
     $fireRole1 = mysqli_query($connect, $selectRole1);
     $count = mysqli_num_rows($fireRole1);
     $rowRole1 = mysqli_fetch_array($fireRole1);   
    
  if($_POST)
  {         
            if($_REQUEST['lid'] !=''){

           

             $insert1 ="update services set                 
             servicesName          = '".filter_var(ucfirst($_REQUEST['servicesName']),FILTER_SANITIZE_STRING)."',
              servicesCount           = '".filter_var($_REQUEST['servicesCount'],FILTER_SANITIZE_STRING)."',
             servicesType           = '".filter_var($_REQUEST['servicesType'],FILTER_SANITIZE_STRING)."',
              servicesMessage	       = '".addslashes($_REQUEST['servicesMessage'])."'
               where servicesId ='".$_REQUEST['lid']."' ";  

              $result=mysqli_query($connect,$insert1) or die(mysqli_error());
              header("location:services-list.php?msg=u");
            }else{ 
    
           if($count == 3){
             header("location:add-services.php?msg=m");
  
           }else{
    
            
            $insert1 ="insert into  services set                 
              servicesName          = '".filter_var(ucfirst($_REQUEST['servicesName']),FILTER_SANITIZE_STRING)."',
              servicesCount           = '".filter_var($_REQUEST['servicesCount'],FILTER_SANITIZE_STRING)."',
              servicesType           = '".filter_var($_REQUEST['servicesType'],FILTER_SANITIZE_STRING)."',
              servicesMessage	       = '".addslashes($_REQUEST['servicesMessage'])."'";  

              $result=mysqli_query($connect,$insert1) or die(mysqli_error());
              header("location:services-list.php?msg=c");
              }
           }

    }

   include("header.php");



   if($_REQUEST['msg'] == "m"){
    $msgs = '<div class="text-danger text-center text-bold p-20">Services added Limit exits you can add only 3. </div>';
   }
   ?>









 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active">Add Services </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php echo $msgs; ?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title"> Add Services</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6 form-group">
                   
                    <label for="servicesName"> Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputTextBox" name="servicesName" placeholder="Enter  Title" value="<?php echo $rowRole['servicesName'];?>" required="" >
                  </div>
                  <div class="col-md-6  form-group ">
                    <label for="servicesCount">Count <span class="text-danger">*</span></label>
                    
                      <input type="number" class="form-control"  id="servicesCount" name="servicesCount" value="<?php echo $rowRole['servicesCount'] ; ?>"  required="">

                     

                      </div>
                </div>
                <div class="row">
                     <div class="col-md-6  form-group ">
                    <label for="servicesCount">Type</label>
                    
                      <input type="text" class="form-control"  id="servicesType" name="servicesType" value="<?php echo $rowRole['servicesType'] ; ?>">

                     

                      </div>
                    <div class="col-md-6 form-group">
                    <label for="servicesMessage">Message <span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="1" id="servicesMessage" name="servicesMessage" placeholder="message here ..." required=""><?php echo $rowRole['servicesMessage'] ; ?></textarea>
                      
                  </div>
                  
                </div>
                  
                  </div>
                 
               
                 
                 
               
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-dark">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <div class="modal fade" id="exampleModalc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Message</h5>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                       </div>  
                                      <div class="modal-body text-danger" style="text-align:center;">
                                     Please select image  less than 2 MB
                                      </div>
                                    </div>
                                  </div>
                                </div>
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#categoryImage').change(function(){
          $('.hide').hide(); 
         $('.show').show(); 
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
    
   var a=(this.files[0].size);
        
        if(a > 2000000) {
             $('.show').hide();
             $('#exampleModalc').modal('show');

          $('#categoryImage').val('');
          return false;
        }else{
        reader.readAsDataURL(this.files[0]); 
        }
   });
   
});
</script>

<script>
    $(document).on('keypress', '#inputTextBox', function (event) {
    var regex = new RegExp("^[a-zA-Z ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
</script>

 <?php
if($_REQUEST['lid'] !=''){ ?>
 <style type="text/css">

    .show{
        display: none;
    }
    </style>
 <?php }else{ ?>
  <style type="text/css">

 .show{
        display: block;
    }
    </style>
 <?php } ?>
  <?php include("footer.php");?>