   <?php 
$page = "ten";
   include("includes/config.php");

session_start();
  if(!isset($_SESSION['LOGIN']['BOM']))
  {
    header("location:index.php");
  }
  
   if($_REQUEST['act'] == "del")
   {
      
      
    $query="update services set servicesIs_delete = 1  where servicesId =".$_REQUEST['lid'];
    $row = mysqli_query($connect,$query) or die(mysqli_error());
      ?>
      <script language="javascript" type="text/javascript">
      document.location.href="services-list.php";
      </script>
      <?php
      
  } 
  
  if($_REQUEST['servicesStatus'] == 1)
  {
    $query="update services set servicesStatus = 0  where servicesId =".$_REQUEST['lid'];
    mysqli_query($connect,$query);
  }
   else
  {
    $query="update services set servicesStatus = 1  where servicesId =".$_REQUEST['lid'];
    mysqli_query($connect,$query);  
  }
    $selectRole = "SELECT * FROM services WHERE servicesIs_delete = 0   ORDER BY servicesId desc ";
    $fireRole = mysqli_query($connect, $selectRole);
    $n=1;
    while($rowRole = mysqli_fetch_array($fireRole))
    {
        if($rowRole['servicesStatus'] == 1)
      {
        $statusLogo = '<a href="services-list.php?lid='.$rowRole['servicesId'].'&servicesStatus=1" onclick="return active_status();"><i class=" ion ion-checkmark-circled deactive fonts"></i> </a>';
      }
    else
      {
        $statusLogo = '<a href="services-list.php?lid='.$rowRole['servicesId'].'&servicesStatus=0" onclick="return deactive_status();"><i class=" ion ion-checkmark-circled active fonts"></i></a>';
      }

       if($rowRole['servicesStatus'] == 0){
            $st='<span class="btn btn-sm bg-maroon">In-Active</span>';
          }else{
            $st='<span class="btn btn-sm bg-success">Active</span>';
          }
      
       $List .='<tr>
                   <td>'.$n++.'</td>
                  <td>'.$rowRole['servicesName'].'</td>
                   <td>'.$rowRole['servicesCount'].' '.$rowRole['servicesType'].'</td>
                   <td>'.$rowRole['servicesMessage'].'</td>
                  <td>'.$st.'</td>
                 <td>  <a href="add-services.php?lid='.$rowRole['servicesId'].'"><i class=" ion ion-edit edit fonts"></i></a> '.$statusLogo.'
                 <a href="services-list.php?lid='.$rowRole['servicesId'].'&act=del" onclick="return delete_status();"><i class=" ion ion-trash-a delet text-danger fonts"></i></a>
                 </td>


                  </tr>';
    }  




   include("header.php");



   if($_REQUEST['msg'] == "c"){
    $msgs = '<div class="text-success text-center text-bold">Services Created Successfully</div>';
   }

 if($_REQUEST['msg'] == "u"){
    $msgs = '<div class="text-success text-center text-bold">Services Update Successfully</div>';
   }
   ?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Services List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php" class="textdark">Home</a></li>
              <li class="breadcrumb-item active"> Services list</li>
            </ol>
          </div>
           
        </div>
       
<div id="ms"></div>
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
               <a href="add-services.php" class="btn btn-dark float-sm-right"><i class="fa fa-upload" aria-hidden="true"></i>  Add Services</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               
  
                <table id="example3" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <th>#</th>
                    <th> Name</th>
                    <th>Count</th>
                    <th>Message</th>
                      <th>Status</th>
                     <th>Action</th> 
                  </tr>
                  </thead>
                  <tbody>
                  
                <?php echo  $List; ?>
                 
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
  var t=confirm("Are you sure you want to in-active the services ?");
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
  var t=confirm("Are you sure you want to active the services ?");
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
  var d=confirm("Are you sure you want to delete the testimonial ?");
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

<style type="text/css">
        body{
            background:#d1d1d2;
        }
        .mian-section{
            padding:20px 60px;
            margin-top:100px;
            background:#fff;
        }
        .title{
            margin-bottom:50px;
        }
        .label-success{
            position: relative;
            top:20px;
        }


    </style>

    
  <?php include("footer.php");?>