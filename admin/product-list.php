   <?php 
$page = "three";
   include("includes/config.php");

session_start();
if(!isset($_SESSION['LOGIN']['BOM']))
  {
     header("location:index.php");
  }
  if($_REQUEST['act'] == "del")
  {
  
    $query="delete from product where productid=".$_REQUEST['lid'];
    $row = mysqli_query($connect,$query) or die(mysqli_error());
      ?>
      <script language="javascript" type="text/javascript">
      document.location.href="product-list.php";
      </script>
      <?php
      
  } 
  
  if($_REQUEST['productStatus'] == 1)
  {
    $query="update product set productStatus = 0  where productid =".$_REQUEST['lid'];
    mysqli_query($connect,$query);
  }
   else
  {
    $query="update product set productStatus = 1  where productid =".$_REQUEST['lid'];
    mysqli_query($connect,$query);  
  }

  if($_REQUEST['productisFeatured'] == 1)
  {
    $query="update product set productisFeatured = 0  where productid =".$_REQUEST['lid'];
    mysqli_query($connect,$query);
  }
   else 
  {
    $query="update product set productisFeatured = 1  where productid =".$_REQUEST['lid'];
    mysqli_query($connect,$query);  
  }
    $selectRole = "SELECT * FROM product ORDER BY productid  DESC";
    $fireRole = mysqli_query($connect, $selectRole);
    $n=0;
     
    while($rowRole = mysqli_fetch_array($fireRole))
    {
            
       $ps = explode(",",$rowRole['categoryID']);
       $catname ='';
       foreach ($ps as $catn)
       {
       $selectCat ="SELECT * FROM categorymaster   where categoryIs_delete = 0 AND categoryStatus = 1 AND categoryCode = '".$catn."'" ;
       $fireRolec = mysqli_query($connect, $selectCat);
       $rowRoleCat = mysqli_fetch_array($fireRolec);
       
       $catname .= $rowRoleCat['categoryName'].",";
       }
       
       
    //   $pst = explode(",",$rowRole['productProducttypeid']);
    //   $typename ='';
    //   foreach ($pst as $typen)
    //   {
    //   $selectType ="SELECT * FROM producttype   where producttypeStatus =1 AND typeId_delete = 0 AND producttypeID = '".$typen."'" ;
    //   $fireType = mysqli_query($connect, $selectType);
    //   $rowType = mysqli_fetch_array($fireType);
       
    //   $typename .= $rowType['producttypeName'].",";
    //   }

      

      if($rowRole['productStatus'] == 1)
      {
        $statusLogo = '<a href="product-list.php?lid='.$rowRole['productid'].'&productStatus=1" onclick="return active_status();"><i class=" ion ion-checkmark-circled deactive fonts" ></i> </a>';
      }
     else
      {
        $statusLogo = '<a href="product-list.php?lid='.$rowRole['productid'].'&productStatus=0" onclick="return deactive_status();"><i class=" ion ion-checkmark-circled active fonts"></i></a>';
      }



       if($rowRole['productStatus'] == 0){
            $st='<span class="btn btn-sm bg-maroon">In-Active</span>';
          }else{
            $st='<span class="btn btn-sm bg-success">Active</span>';
          }
      $n++;
       $shopList .='<tr>
                    <td>'.$n.'</td>
                  <td>'.$rowRole['productname'].'</td>
                  <td>'.rtrim($catname, ',').'</td>
                  
                  <td><img src="../images/product/'.$rowRole['images'].'" style="height: 100px; width:100px"></td>
                   <td>'.$st.'</td>
                  <td>  <a href="add-product.php?lid='.$rowRole['productid'].'"><i class=" ion ion-edit edit fonts"></i></a> '. $statusLogo.' <a href="product-list.php?lid='.$rowRole['productid'].'&act=del"  onclick="return delete_status();"><i class=" ion ion-trash-a delet text-danger fonts"></i></a>  </td> 


                  </tr>';
                  
                  
                 
    }  




   include("header.php");



   if($_REQUEST['msg'] == "c"){
    $msgs = '<div class="text-success text-center text-bold">Product Created Successfully</div>';
   }

 if($_REQUEST['msg'] == "u"){
    $msgs = '<div class="text-success text-center text-bold">Product Update Successfully</div>';
   }
   ?>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active">Product list</li>
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
           
          

            <div class="card">
              <?php echo $msgs; ?>
              <div class="card-header">
               <a href="add-product.php" class="btn btn-dark float-sm-right"><i class="fa fa-upload" aria-hidden="true"></i>  Add Product</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped dataTable dtr-inline">
                  <thead>
                  <tr>
                    <th>#ID</th>
                     <!--<th>Product Type</th>-->
                    <th>Product Name</th>
                  
                    <th>Category</th>
                 
                    <!--<th>Weight</th>-->
                   
                    <!--<th>MRP </th>-->
                  
                     <th> Image  </th>
                     <th>Status</th>
                     <th>Action</th> 
                  </tr>
                  </thead>
                  <tbody>
                  
                <?php echo  $shopList; ?>
                 
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
</style>
<script language="javascript" type="text/javascript">
function active_status()
{
  var t=confirm("Are you sure you want to in-active the product ?");
  if (t)
    {
      return true;
    }
  else
    {
      return false;
    }
}

function deactive_status()
{
  var t=confirm("Are you sure you want to active the product ?");
  if (t)
    {
      return true;
    }
  else
    {
      return false;
    }
}

function delete_status()
{
  var d=confirm("Are you sure you want to delete the product ?");
  if (d)
    {
      return true;
    }
  else
    {
      return false;
    }
}


</script>

  <?php include("footer.php");?>