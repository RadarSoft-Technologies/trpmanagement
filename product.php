<?php 
$page = 'three';
include("includes/config.php");
session_start();
	//initialize cart if not set or is unset
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
	}

	//unset qunatity
	unset($_SESSION['qty_array']);

 $searchtext = isset($_POST['typeId']) ? $_POST['typeId'] : '';

  

  
 
 if($searchtext == "product")
 {
     
      $selectcat = mysqli_query($connect, "select * from producttype where producttypeStatus = 1 AND typeId_delete = 0 order by producttypeID desc");
 $loop_counter1 =1;
 $ptype = array();
 while($rowcat = mysqli_fetch_array($selectcat))
  {
      $cat_class1 = "";
     if($loop_counter1 == 2){
      $cat_class1 = "activeFilter";
       $loop_counter1++;

     }

   $ptype[] = $rowcat['producttypeID'];
    $cats .='<li class="'.$cat_class1.'"><a href="#" data-filter=".pf-'.$rowcat['producttypeID'].'">'.$rowcat['producttypeName'].'</a></li>';

  }  
  
    //  $limit = 100;  
        
    // if (isset($_GET["page"])) {    
    // $page  = $_GET["page"];    
    // }    
    // else { $page=1;    
    // } 
     //determine the sql LIMIT starting number for the results on the displaying page  
   // $page_index = ($page-1) * $limit;      // 0
//echo "select * from product where productStatus = 1  And  categoryID='".$rowcat['categoryCode']."' limit $page_index, $limit";

// echo "select * from product where  productProducttypeid IN (" . implode(',', $ptype) . ") AND productStatus = 1 ORDER BY productid ASC limit $page_index, $limit";
  $selectproduct = mysqli_query($connect, "select * from product where  productProducttypeid IN (" . implode(',', $ptype) . ") AND productStatus = 1 ORDER BY productid DESC ");

  while($rowpr = mysqli_fetch_array($selectproduct))
  {
            $ps = explode(",",$rowpr['productProducttypeid']);
            
    if(in_array($rowpr['productid'], $_SESSION['cart']))
     {
         $btns = 'Added';
     }
     else{
      $btns = 'Enquiry';  
     }

      foreach ($ps as $catn)
      {
    $prods .=' <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-'.$catn.'" >
                            <div class="grid-inner product-grid">
                                <div class="portfolio-image">
                                    <img src="images/product/'.$rowpr['images'].'" alt="">
                                </div>
                                <div class="portfolio-desc">
                                    <h3>'.$rowpr['productname'].'</h3>
                                    <!--  <span>'.$rowpr['productweight'].'</span>
                                    <p>'.$rowpr['mrp'].'</p> -->
                                    <a href="add_cart.php?id='.$rowpr['productid'].'">'.$btns.'</a>
                                </div>
                            </div>
                        </article>';
      }
  }  
 
     
 

}elseif(isset($_POST['searchdata'])){
    
     $selectcat = mysqli_query($connect, "select * from categorymaster where categoryStatus = 1 AND  categoryIs_delete = 0 order by categoryID ASC");
 $loop_counter1 =1;
 while($rowcat = mysqli_fetch_array($selectcat))
  {
      $cat_class1 = "";
     if($loop_counter1 == 2){
      $cat_class1 = "activeFilter";
       $loop_counter1++;

     }


    $cats .='<li class="'.$cat_class1.'"><a href="#" data-filter=".pf-'.$rowcat['categoryCode'].'">'.$rowcat['categoryName'].'</a></li>';

  }  
    
      // $limit = 100;  
        
   // if (isset($_GET["page"])) {    
   // $page  = $_GET["page"];    
  //  }    
   // else { $page=1;    
   // } 
     //determine the sql LIMIT starting number for the results on the displaying page  
    //$page_index = ($page-1) * $limit;      // 0
//echo "select * from product where productStatus = 1  And  categoryID='".$rowcat['categoryCode']."' limit $page_index, $limit";

  $selectproduct = mysqli_query($connect, "select * from product where productname LIKE '%".$_REQUEST['productName']."%' AND productStatus = 1 ORDER BY productid DESC");

  while($rowpr = mysqli_fetch_array($selectproduct))
  {
            $ps = explode(",",$rowpr['categoryID']);

     if(in_array($rowpr['productid'], $_SESSION['cart']))
     {
         $btns = 'Added';
     }
     else{
      $btns = 'Enquiry';  
     }
      foreach ($ps as $catn)
      {
    $prods .=' <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-'.$catn.'">
                            <div class="grid-inner product-grid">
                                <div class="portfolio-image">
                                    <img src="images/product/'.$rowpr['images'].'" alt="">
                                </div>
                                <div class="portfolio-desc">
                                    <h3>'.$rowpr['productname'].'</h3>
                                    <!-- <span>'.$rowpr['productweight'].'</span>
                                    <p>'.$rowpr['mrp'].'</p> -->
                                    <a href="add_cart.php?id='.$rowpr['productid'].'">'.$btns.'</a>
                                </div>
                            </div>
                        </article>';
     }
  } 
    
    
    
    
}else{
    
    $selectcat = mysqli_query($connect, "select * from categorymaster where categoryStatus = 1 AND  categoryIs_delete = 0 order by categoryID ASC");
 $loop_counter1 =1;
 while($rowcat = mysqli_fetch_array($selectcat))
  {
      $cat_class1 = "";
     if($loop_counter1 == 2){
      $cat_class1 = "activeFilter";
       $loop_counter1++;

     }


    $cats .='<li class="'.$cat_class1.'"><a href="#" data-filter=".pf-'.$rowcat['categoryCode'].'">'.$rowcat['categoryName'].'</a></li>';

  }  
  
   //  $limit = 100;  
        
    // if (isset($_GET["page"])) {    
    // $page  = $_GET["page"];    
    // }    
    // else { $page=1;    
    // } 
     //determine the sql LIMIT starting number for the results on the displaying page  
    //$page_index = ($page-1) * $limit;      // 0
//echo "select * from product where productStatus = 1  And  categoryID='".$rowcat['categoryCode']."' limit $page_index, $limit";

  $selectproduct = mysqli_query($connect, "select * from product where productStatus = 1 ORDER BY productid DESC");

  while($rowpr = mysqli_fetch_array($selectproduct))
  {
            $ps = explode(",",$rowpr['categoryID']);

     if(in_array($rowpr['productid'], $_SESSION['cart']))
     {
         $btns = 'Added';
     }
     else{
      $btns = 'Enquiry';  
     }
      foreach ($ps as $catn)
      {
    $prods .=' <article class="portfolio-item col-lg-3 col-md-4 col-sm-6 col-12 pf-'.$catn.'" >
                            <div class="grid-inner product-grid">
                                <div class="portfolio-image">
                                    <img src="images/product/'.$rowpr['images'].'" alt="">
                                </div>
                                <div class="portfolio-desc">
                                    <h3>'.$rowpr['productname'].'</h3>
                                   <!--  <span>'.$rowpr['productweight'].'</span>
                                    <p>'.$rowpr['mrp'].'</p> -->
                                    <a href="add_cart.php?id='.$rowpr['productid'].'">'.$btns.'</a>
                                </div>
                            </div>
                        </article>';
      }
  }  

  
}



  
  if($_REQUEST['msg'] == "s")
  {
      $msgs ='<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
  <strong>Thank you for sharing your requirements with TRP. Our team will connect with you.</strong> 
  
</div>';
  }
include("header.php"); 
?>

  <!-- middle-content -->
        <section id="content">

            <section class="outerBlog" style="background-color: #fdf5ee;">
                <div class="container clearfix">
                    <h1 class="productHeading">Products</h1>
                </div>
            </section>
            <div class="content-wrap">
                
                <div class="container clearfix">
                    <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6" style="margin-bottom:50px;">
                         <form method="post" action="product.php">
                <div class="input-group">
                   
  <input type="text" class="form-control rounded" name="productName" value="<?php echo isset($_REQUEST['productName'])?$_REQUEST['productName']:''; ?>" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" name="searchdata" class="btn btn-dark">Search</button>
  
</div>
</form>
</div>
       <div class="col-lg-3"></div>  </div>           <?php
                
                if(isset($_SESSION['message'])){
			?>
		
			
			<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
              <strong><?php echo $_SESSION['message']; ?></strong> 
  
            </div>
			<?php
			unset($_SESSION['message']);
		}
                ?>
                
                <?php echo  $msgs ;  ?>
                       
                    <div class="grid-filter-wrap">
                           
                        <ul class="grid-filter" data-container="#portfolio">
                           <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
                         <?php  echo $cats; ?>
                        </ul>
                    </div>

                    <div id="portfolio" class="portfolio row grid-container gutter-20 has-init-isotope" data-layout="fitRows">

                       <?php echo $prods ; ?>
                     
                    </div>
                     

                </div>
            </div>

        </section>
        
        <!-- model -->

   
        
<script type="text/javascript">
       var checkList = document.getElementById('list1');
        checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
          if (checkList.classList.contains('visible'))
            checkList.classList.remove('visible');
          else
            checkList.classList.add('visible');
        }
    </script>
<style>
    .btn-registers{
      min-width: 11% !important; 
        position: absolute !important;
    }
    .grid-filter-wrap {
        margin-left: 160px !important;
    }
    #typeId{
        height: 45px !important;
        background-color: #f2f2f2 !important;
        white-space: nowrap;
        display: inline;
        width: 100%;
        text-overflow: ellipsis;
        -webkit-appearance: none;
        -moz-appearance: none;
        background: transparent;
        background-image: url("data:image/svg+xml;utf8,<svg fill='black' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
        background-repeat: no-repeat;
        background-position-x: 99%;
        background-position-y: 10px;
        font-size: 15px;
        padding-right: 20px;
    }

    @media (max-width: 1400px){
        .grid-filter-wrap {
            margin-left: 140px !important;
        }
    }
    @media (max-width: 1200px){
        .grid-filter-wrap {
            margin-left: 125px !important;
        }
    }
    
    
    @media only screen and (min-width: 200px) and (max-width: 1024px) and (orientation : portrait) {
       .btn-registers{
        min-width: 13% !important; 
        max-width: 30% !important; 

       }
  }
  
  .btn-primary:hover {
    color: #fff !important;
    background-color: #393939  !important;
    /*border-color: #393939  !important;*/
}

.btn-dark {
    color: #fff !important;
    border-color: #393939  !important;
}
</style> 
                <?php include("footer.php"); ?>








