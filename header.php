
<?php  error_reporting(0);
ini_set('display_errors', 0);
	session_start();

include("includes/config.php");
	
	
if(isset($_POST['saveenq'])){
       
        // $Clienttype = implode(',',$_REQUEST['penquiryClient']);

   $insert =mysqli_query($connect, "INSERT INTO   projectenquiry SET 
                    penquiryProjectname = '".$_REQUEST['penquiryProjectname']."',
                    penquiryLocation = '".$_REQUEST['penquiryLocation']."',
                    penquiryProjecttype = '".$_REQUEST['penquiryProjecttype']."',
                    penquiryPhone = '".$_REQUEST['penquiryPhone']."',
                    penquiryEmail = '".$_REQUEST['penquiryEmail']."',
                    penquiryProductids = '".$_REQUEST['penquiryProductids']."'"); 
    
  
                 header("Location:product.php?msg=s");
                 unset($_SESSION['cart']);
    }
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;family=Zilla+Slab:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="stylesheet" href="css/custom.css" type="text/css" />
    <link rel="stylesheet" href="css/colors9bb7.css?color=193532" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/trp.css" type="text/css" />
    <link rel="stylesheet" href="css/fonts.css" type="text/css" />
    <link rel="icon" type="favicon" href="images/favicon.svg">
    <title>TRP Management</title>
    <style>
        .navbar-dark .navbar-nav .nav-link {
     color: #393939 !important; 
}

.headingChoose1 {
    font-size: 28px !important;
    font-weight: 550!important;
    margin-bottom: 1rem!important;
    text-transform: none!important;
     margin-top: 0px; 
     padding: 0px  ; 
}
    </style>
</head>

<body class="stretched">

    <div id="wrapper" class="clearfix">

        <!-- header -->
        <div id="top-bar" class="py-3 text-center bg-color-light">
            <div class="container clearfix">
                <div class="d-md-flex justify-content-md-between align-items-md-center">
                    <marquee><h4 class="mb-2 mb-md-0 h6 fw-normal">TRP is not a marketplace, We help you remove multi-party involvement
and making tech-enabled negotiations.</h4></marquee>
                   
                </div>
            </div>
        </div>
        <header id="header" class="header-size-sm border-bottom-0">
            <div id="header-wrap">
                <div class="container">
                    <div class=" row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg navbar-dark static-top">
                                <a class="navbar-brand" href="index.php">
                                    <img src="images/logo.svg" alt="..." height="50">
                                </a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                              </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    
                                    
                                    <ul class="navbar-nav ms-auto">
                                        
                                         <li class="nav-item">
                                            <a class="nav-link <?php if ($page == "one"){ echo "active"; }else{ echo "";} ?>" href="buyer.php">I am a buyer</a>
                                        </li>
                                        
                                         <li class="nav-item">
                                            <a class="nav-link <?php if ($page == "two"){ echo "active"; }else{ echo "";} ?>" href="vendor.php">I am a Vendor</a>
                                        </li>
                                        <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link <?php //if ($page == "one"){ echo "active"; }else{ echo "";} ?>" href="index.php">Home</a>-->
                                        <!--</li>-->
                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($page == "three"){ echo "active"; }else{ echo "";} ?>" href="product.php">Products</a>
                                        </li>
                                        <!--<li class="nav-item">-->
                                        <!--    <a class="nav-link <?php //if ($page == "three"){ echo "active"; }else{ echo "";} ?>" href="about.php">About Us</a>-->
                                        <!--</li>-->
                                        <li class="nav-item">
                                            <a class="nav-link <?php if ($page == "four"){ echo "active"; }else{ echo "";} ?>" href="contact.php">Contact</a>
                                        </li>
                                        <!--only-product-page-->
                                        <li class="nav-item">
                                            <a class="nav-link btn-register" href="#myModal1" data-lightbox="inline">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"> <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg>
                                                <span class="total-cart"><?php if($_SESSION['cart'] !='' ){ echo count($_SESSION['cart']);}else{ echo "0"; } ?></span>
                                            </a>
                                        </li>
                                        <!--only-product-page-->
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header -->
