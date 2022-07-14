    <?php
    $page = 'one';
    include("includes/config.php");
    
    
    if(isset($_POST['savebuyer'])){
        $Clienttype = implode(',',$_REQUEST['buyerClienttype']);
        
         $temp_name1=$_FILES['buyerfiles']['tmp_name'];
            $file_name21=$_FILES['buyerfiles']['name'];   
            $fl = time();
            $nefilename =   $fl.$file_name21;
            $file_path1="images/buyer/".$nefilename;
            move_uploaded_file($temp_name1,$file_path1);
            
            if($_FILES['buyerfiles']['tmp_name'] !='')
            {
               $nwnefilename = $nefilename; 
            }else{
               $nwnefilename = ''; 
            }


   

   $insert =mysqli_query($connect, "INSERT INTO  buyers SET 
                    buyerCompanyname = '".$_REQUEST['buyerCompanyname']."',
                    buyerHoaddress = '".$_REQUEST['buyerHoaddress']."',
                    buyerGstno = '".$_REQUEST['buyerGstno']."',
                    buyerFullname = '".$_REQUEST['buyerFullname']."',
                    buyerPhone = '".$_REQUEST['buyerPhone']."',
                    buyerEmail = '".$_REQUEST['buyerEmail']."',
                    buyerWebsite = '".$_REQUEST['buyerWebsite']."',
                    buyerFile   = '".$nwnefilename."',          
                    buyerClienttype = '".$Clienttype."'"); 
    
  
                 header("Location:buyer.php?msg=s");
    }
  
  if($_REQUEST['msg'] == "s")
  {
      $msgs ='<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>We have received your request. We will connect with you very shortly.</strong> 
  
</div>';
  }
    include("header.php"); 
    
    ?>
    <!-- middle-content -->
   
    <section id="content">
        <div class="content-wrap py-0">

            <!-- categories -->
            <div class="custom-bg my-0" style="--custom-bg: #ffffff;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 padding0">
                            <div class="youtube-video">
                                <iframe src="https://www.youtube.com/embed/q42yZVqE6gM?autoplay=1&mute=1"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                     <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="buyerForm">
                                 <?php echo $msgs; ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <h2>Send us a message</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Organization Name *</label>
                                            <input type="text" class="form-control" required name="buyerCompanyname" id="inputTextBox">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>HO Address *</label>
                                            <input type="text" class="form-control" required name="buyerHoaddress">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>GST No *</label>
                                            <input type="text" class="form-control" required name="buyerGstno">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Contact Person Name *</label>
                                            <input type="text" class="form-control" required name="buyerFullname" id="inputTextBox">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Mobile No *</label>
                                            <input type="text" min="10" class="form-control" required name="buyerPhone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" >
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Email *</label>
                                            <input type="email" class="form-control" required name="buyerEmail">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Website</label>
                                            <input type="text" class="form-control" name="buyerWebsite">
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Type of client</label>
                                            <div id="list1" class="dropdown-check-list" tabindex="100">
                                              <span class="anchor">Select</span>
                                              <ul class="items">
                                                <li><input type="checkbox" name="buyerClienttype[]" value="Trader" />Contractor</li>
                                                <li><input type="checkbox" name="buyerClienttype[]" value="Trader" />End Client</li>
                                              </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>File</label>
                                            <input type="file" class="form-control" id="buyerfile" name="buyerfiles" style="padding:8px !important;">
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button class="btn btnsubmitbuyer" name="savebuyer">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="exampleModalc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Message</h5>
                                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color:#000 !important;">X</button>
                                       </div>  
                                      <div class="modal-body text-danger" style="text-align:center;">
                                     Please select file  less than 5 MB
                                      </div>
                                    </div>
                                  </div>
                                </div>

            <!-- mid-sec -->
            
            <!-- last-sec -->
            
            
        </div>
    </section>
    <script type="text/javascript">
       var checkList = document.getElementById('list1');
        checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
          if (checkList.classList.contains('visible'))
            checkList.classList.remove('visible');
          else
            checkList.classList.add('visible');
        }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#buyerfile').change(function(){
          $('.hide').hide(); 
         $('.show').show(); 
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
    
   var a=(this.files[0].size);
        
        if(a > 5242880) {
            //  $('.show').hide();
             $('#exampleModalc').modal('show');

          $('#buyerfile').val('');
          return false;
        }else{
        reader.readAsDataURL(this.files[0]); 
        }
   });
   
});
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
#gotoTop{
    display: none !important;
}
   .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#393939;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}

.my-float{
	margin-top:16px;
	color: #FFF;
}
</style>

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

    <!-- middle-content -->
<div class="icon-bar">
 <a href="https://wa.me/" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>
</div>
    <?php include("footer.php"); ?>