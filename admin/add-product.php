   <?php 
$page = "three";
   include("includes/config.php");
 
session_start();
if(!isset($_SESSION['LOGIN']['BOM']))
  {
     header("location:index.php");
  } 
  
  if($_REQUEST['lid'] !=''){

     $selectRole = "SELECT * FROM product WHERE productid ='".$_REQUEST['lid']."'";
     $fireRole = mysqli_query($connect, $selectRole);
     $rowRole = mysqli_fetch_array($fireRole);
  }

        $ps = explode(",",$rowRole['categoryID']);

   $selectRoleCat = "SELECT * FROM categorymaster WHERE categoryStatus = 1 AND categoryIs_delete = 0 order by categoryID desc";
     $fireRoleCat = mysqli_query($connect, $selectRoleCat);
     while($rowRoleCat = mysqli_fetch_array($fireRoleCat)){
      if(in_array($rowRoleCat['categoryCode'], $ps)){
      $Cats .='<option value="'.$rowRoleCat['categoryCode'].'" selected="selected">'.$rowRoleCat['categoryName'].'</option>';
     }else{
      $Cats .='<option value="'.$rowRoleCat['categoryCode'].'">'.$rowRoleCat['categoryName'].'</option>';

     }
     }




     
    //   $pts = explode(",",$rowRole['productProducttypeid']);

    //   $selectRoleRel = "SELECT * FROM  producttype WHERE producttypeStatus =1 AND typeId_delete = 0  order by producttypeID desc";
    //  $fireRoleRel = mysqli_query($connect, $selectRoleRel);
    //  while($rowRoleRel = mysqli_fetch_array($fireRoleRel)){
    //   if(in_array($rowRoleRel['producttypeID'],$pts)){
    //   $Productreled .='<option value="'.$rowRoleRel['producttypeID'].'" selected="selected">'.$rowRoleRel['producttypeName'].'</option>';
    //  }else{
    //   $Productreled .='<option value="'.$rowRoleRel['producttypeID'].'">'.$rowRoleRel['producttypeName'].'</option>';

    //  }

    //  }


  if($_POST)
  {         
           if($_REQUEST['lid'] !=''){

            $temp_name1=$_FILES['images']['tmp_name'];
            $file_name21=$_FILES['images']['name'];   
            $fl = time();
            $nefilename =   $fl.$file_name21;
            $file_path1="../images/product/".$nefilename;
            move_uploaded_file($temp_name1,$file_path1);
            if($file_name21 ==""){
              $nefilename = $rowRole['images'];
            }else{
               unlink("../images/product/".$rowRole['images']);

            }
              $categoryIDs = implode(',', $_REQUEST['categoryID']);
            //   $productProducttypeids = implode(',', $_REQUEST['productProducttypeid']);
              
            if($_FILES['images']['tmp_name'] !='')
            {
               $nwnefilename = $nefilename; 
            }else{
               $nwnefilename = ''; 
            }
            
            
             $insert1 ="update product set                 
              productname   = '".filter_var(ucfirst($_REQUEST['productname']),FILTER_SANITIZE_STRING)."',
              categoryID   = '".$categoryIDs."',
              productweight   = '".filter_var($_REQUEST['productweight'],FILTER_SANITIZE_STRING)."',
              mrp   = '".filter_var($_REQUEST['mrp'],FILTER_SANITIZE_STRING)."',
              images           = '".$nefilename."'
               where productid  ='".$_REQUEST['lid']."' ";  

              $result=mysqli_query($connect,$insert1) or die(mysqli_error());
              header("location:product-list.php?msg=u");
            }else{ 
          $categoryIDs = implode(',', $_REQUEST['categoryID']);
        //   $productProducttypeids = implode(',', $_REQUEST['productProducttypeid']);
            $temp_name1=$_FILES['images']['tmp_name'];
            $file_name21=$_FILES['images']['name'];   
            $fl = time();
            $nefilename =   $fl.$file_name21;
            $file_path1="../images/product/".$nefilename;
            move_uploaded_file($temp_name1,$file_path1);
            
            if($_FILES['images']['tmp_name'] !='')
            {
               $nwnefilename = $nefilename; 
            }else{
               $nwnefilename = ''; 
            }
            $insert1 ="insert into  product set                 
               productname   = '".filter_var(ucfirst($_REQUEST['productname']),FILTER_SANITIZE_STRING)."',
              categoryID   = '".$categoryIDs."',
              productweight   = '".$_REQUEST['productweight'].' Order'."',
              mrp   = '".$_REQUEST['mrp'].' Delivered'."',
              images           = '".$nwnefilename."'";  

              $result=mysqli_query($connect,$insert1) or die(mysqli_error());
              header("location:product-list.php?msg=c");
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
            <h1>Add Product </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active">Add Product </li>
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
                <h3 class="card-title">Product Add</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                  <div class="col-md-6 form-group">
                    <label for="productname">Product  Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputTextBox" name="productname" placeholder="Enter product name" value="<?php echo $rowRole['productname']?>" required="" >
                  </div>
                 
                  <!--    <div class="col-md-6 form-group">-->
                  <!--  <label for="productProducttypeid">Product Type <span class="text-danger">*</span></label>-->
                  
                      
                  <!--      <select class="form-control select2"  name="productProducttypeid[]" id="productProducttypeid"  required="" multiple data-placeholder="Select Product Type" style="width: 100%;">-->
                  <!--        <option value="">Select Product Type </option>-->
                  <!--        -->
                        
                  <!--      </select>-->
                      
                  <!--</div>-->
                  
                 <div class="col-md-6 form-group">
                    <label for="categoryID">Category Name <span class="text-danger">*</span></label>
                  
                      
                        <select class="form-control  select2" data-placeholder="Select category" style="width: 100%;"  name="categoryID[]" id="categoryID" required="" multiple>
                          <option value="">Select category</option>
                          <?php echo $Cats; ?>
                        
                        </select>
                      
                  </div>
                </div>
                 
                  <div class="row">
                   
               
                 <div class="col-md-12  form-group ">
                    <label for="images">Product Images </label>
                    
                      <input type="file" class="form-control" accept="image/*" id="images" name="images" value="<?php echo $rowRole['images']?>" onchange="loadFile(event)">
                      <h6 class="form-text text-muted">Allowed file types: png, jpg, jpeg.</h6>
                     <h6 class="form-text text-muted">File Ratio: 2:1 | File size limit is 2Mb</h6>
                      <?php if($rowRole['images'] !='') {?>
                      <img src="../images/product/<?php echo $rowRole['images'];?>" style="width: 100px; height: 100px; margin-top: 10px;" />
                    <?php }else{ ?>
                    
                        <img id="preview-image-before-upload" src="../images/pre.jpg"
                      alt="preview image" class="img-fluid top-radius-blog show" style="margin-top:10px !important; height:100px !important; width:200px !important;">

                      <?php 
                    }
                    ?>

                      </div>
                      
                         
                <!--  <div class="col-md-6 form-group">-->
                <!--    <label for="productweight">No of order<span class="text-danger">*</span></label>-->
                <!--    <input type="text" class="form-control" value=""  id="productweight" name="productweight" placeholder="Enter no of order" required="">-->
                <!--  </div>-->
                   
                <!--</div>-->

               
                  <!-- <div class="row">-->
                  <!--  <div class="col-md-6 form-group">-->
                  <!--  <label for="mrp">Order Delivered <span class="text-danger">*</span></label>-->
                  <!--  <input type="text" class="form-control" value=""  id="mrp" name="mrp" placeholder="Enter Order Delivered " required="">-->
                  <!--</div>-->
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
   <style type="text/css">
    .os-host, .os-host-textarea {    position: absolute !important;}
    
  </style>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#images').change(function(){
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

          $('#images').val('');
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