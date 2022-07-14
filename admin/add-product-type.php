   <?php 
 $page = "two";
   include("includes/config.php");

session_start();
if(!isset($_SESSION['LOGIN']['BOM']))
  {
    header("location:index.php");
  }
  
  if($_REQUEST['lid'] !=''){

     $selectRole = "SELECT * FROM producttype WHERE producttypeID ='".$_REQUEST['lid']."'";
     $fireRole = mysqli_query($connect, $selectRole);
     $rowRole = mysqli_fetch_array($fireRole);
  }
  if($_POST)
  {         
            if($_REQUEST['lid'] !=''){

            $temp_name1=$_FILES['producttypeImage']['tmp_name'];
            $file_name21=$_FILES['producttypeImage']['name'];   
            $fl = time();
            $nefilename =   $fl.$file_name21;
            $file_path1="../images/product-type/".$nefilename;
            move_uploaded_file($temp_name1,$file_path1);
            if($file_name21 ==""){
              $nefilename = $rowRole['producttypeImage'];
            }else{
                unlink("../images/product-type/".$rowRole['producttypeImage']);

            }

             $insert1 ="update producttype set                 
                producttypeName          = '".filter_var(ucfirst($_REQUEST['producttypeName']),FILTER_SANITIZE_STRING)."',
               producttypeImage           = '".$nefilename."'
               where producttypeID ='".$_REQUEST['lid']."' ";  

              $result=mysqli_query($connect,$insert1) or die(mysqli_error());
              header("location:product-type-list.php?msg=u");
            }else{ 

            $temp_name1=$_FILES['producttypeImage']['tmp_name'];
            $file_name21=$_FILES['producttypeImage']['name'];   
            $fl = time();
            $nefilename =   $fl.$file_name21;
            $file_path1="../images/product-type/".$nefilename;
            move_uploaded_file($temp_name1,$file_path1);
            
            $insert1 ="insert into  producttype set                 
              producttypeName          = '".filter_var(ucfirst($_REQUEST['producttypeName']),FILTER_SANITIZE_STRING)."',
               producttypeImage           = '".$nefilename."'
              
              ";  

              $result=mysqli_query($connect,$insert1) or die(mysqli_error());
              header("location:product-type-list.php?msg=c");
            }
  }



   include("header.php");

   ?>









 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product Type</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active">Add Product Type </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="card card-dark">
              <div class="card-header">
                <h3 class="card-title"> Add Product Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6 form-group">
                   
                 
                    <label for="producttypeName">Product Type Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputTextBox" name="producttypeName" placeholder="Enter product type name" value="<?php echo $rowRole['producttypeName']?>" required="">
                  </div>
                  <div class="col-md-6  form-group ">
                    <label for="producttypeImage">Logo </label>
                    
                      <input type="file" class="form-control" accept="image/*" id="producttypeImage" name="producttypeImage" value="<?php echo $rowRole['producttypeImage']?>" onchange="loadFile(event)">
                     
                      <h6 class="form-text text-muted">Allowed file types: png, jpg, jpeg.</h6>
                     <h6 class="form-text text-muted">File Ratio: 2:1 | File size limit is 2Mb</h6>
                      <?php if($rowRole['producttypeImage'] !='') {?>
                      <img src="../images/product-type/<?php echo $rowRole['producttypeImage'];?>" style="width: 100px; height: 100px; margin-top: 10px;" />
                    <?php 
                    }
                    ?>
                      <img id="preview-image-before-upload" src="../images/pre.jpeg"
                      alt="preview image" class="img-fluid top-radius-blog show" style="margin-top:10px !important; height:100px !important; width:200px !important;">


                     

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
          <button type="button" class="close" data-dismiss="modal">&times;</button>
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
 
   
   $('#producttypeImage').change(function(){
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

          $('#producttypeImage').val('');
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