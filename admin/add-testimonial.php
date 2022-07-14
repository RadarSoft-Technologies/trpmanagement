   <?php 
   $page = "et";
   include("includes/config.php");

session_start();
if(!isset($_SESSION['LOGIN']['BOM']))
  {
    header("location:index.php");
  }
  
  if($_REQUEST['lid'] !=''){

     $selectRole = "SELECT * FROM testimonial WHERE testimonialID ='".$_REQUEST['lid']."'";
     $fireRole = mysqli_query($connect, $selectRole);
     $rowRole = mysqli_fetch_array($fireRole);
  }
  
    
   $selectRole1 = "SELECT * FROM testimonial WHERE testimonialIs_delete = 0";
     $fireRole1 = mysqli_query($connect, $selectRole1);
     $count = mysqli_num_rows($fireRole1);
     $rowRole1 = mysqli_fetch_array($fireRole1);   
    
  if($_POST)
  {         
            if($_REQUEST['lid'] !=''){

           

             $insert1 ="update testimonial set                 
                testimonialName          = '".filter_var(ucfirst($_REQUEST['testimonialName']),FILTER_SANITIZE_STRING)."',
              testimonialPost           = '".filter_var($_REQUEST['testimonialPost'],FILTER_SANITIZE_STRING)."',
              testimonialMessage       = '".addslashes($_REQUEST['testimonialMessage'])."'
               where testimonialId ='".$_REQUEST['lid']."' ";  

              $result=mysqli_query($connect,$insert1) or die(mysqli_error());
              header("location:testimonial-list.php?msg=u");
            }else{ 
    
           if($count == 8){
             header("location:add-testimonial.php?msg=m");
  
           }else{
    
            
            $insert1 ="insert into  testimonial set                 
              testimonialName          = '".filter_var(ucfirst($_REQUEST['testimonialName']),FILTER_SANITIZE_STRING)."',
              testimonialPost           = '".filter_var($_REQUEST['testimonialPost'],FILTER_SANITIZE_STRING)."',
              testimonialMessage       = '".addslashes($_REQUEST['testimonialMessage'])."'";  

              $result=mysqli_query($connect,$insert1) or die(mysqli_error());
              header("location:testimonial-list.php?msg=c");
              }
           }

    }

   include("header.php");



   if($_REQUEST['msg'] == "m"){
    $msgs = '<div class="text-danger text-center text-bold p-20">Testimonial added Limit exits you can add only 8. </div>';
   }
   ?>









 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Testimonial</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active">Add Testimonial </li>
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
                <h3 class="card-title"> Add Testimonial</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6 form-group">
                   
                    <label for="testimonialName"> Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputTextBox" name="testimonialName" placeholder="Enter  Name" value="<?php echo $rowRole['testimonialName'];?>" required="">
                  </div>
                  <div class="col-md-6  form-group ">
                    <label for="testimonialPost">Designation <span class="text-danger">*</span></label>
                    
                      <input type="text" class="form-control"  id="inputTextBox" name="testimonialPost" value="<?php echo $rowRole['testimonialPost'] ; ?>" required="">

                     

                      </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                    <label for="testimonialMessage">Message <span class="text-danger">*</span></label>
                  <textarea class="form-control" rows="5" id="testimonialMessage" name="testimonialMessage" placeholder="message here ..." required=""><?php echo $rowRole['testimonialMessage'] ; ?></textarea>
                      
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