        <?php
        $page = 'home';
        include("includes/config.php");
        include("header.php");


        $selectcat = mysqli_query($connect, "select * from categorymaster where categoryStatus = 1 AND categoryIs_home = 1 AND categoryIs_delete = 0 order by categoryID desc limit 0,5");
        $loop_counter1 = 1;
        while ($rowcat = mysqli_fetch_array($selectcat)) {
            $cat_class1 = "";
            if ($loop_counter1 == 2) {
                $cat_class1 = "activeFilter";
                $loop_counter1++;
            }


            $cats .= '<div class="owl-item" style="width: 243.2px; margin-right: 20px; margin-bottom: 5px;">
                                                <div class="oc-item">
                                                    <a>
                                                        <img src="images/category/' . $rowcat['categoryImage'] . '" alt="Image 1">
                                                        <div class="imgOnText">
                                                            <h2>' . $rowcat['categoryName'] . '</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>';
        }

        $selectcat2 = mysqli_query($connect, "select * from categorymaster where categoryStatus = 1 AND categoryIs_home = 1 AND categoryIs_delete = 0 order by categoryID desc limit 5,10");
        $loop_counter12 = 1;
        while ($rowcat2 = mysqli_fetch_array($selectcat2)) {
            $cat_class1 = "";
            if ($loop_counter12 == 2) {
                $cat_class12 = "activeFilter";
                $loop_counter12++;
            }


            $cats1 .= '<div class="owl-item" style="width: 243.2px; margin-right: 20px; margin-bottom: 5px;">
                                                <div class="oc-item">
                                                    <a>
                                                        <img src="images/category/' . $rowcat2['categoryImage'] . '" alt="Image 1">
                                                        <div class="imgOnText">
                                                            <h2>' . $rowcat2['categoryName'] . '</h2>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>';
        }

 $selectTest = mysqli_query($connect, "select * from testimonial where testimonialStatus = 1 AND testimonialIs_delete = 0 order by testimonialId desc limit 0,8");
       
        while ($rowtest = mysqli_fetch_array($selectTest)) {
           
           $listTest .='<div class="slide" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                                    <div class="testi-content">
                                        <p>' .substr($rowtest['testimonialMessage'],0,150). '</p>
                                        <div class="testi-meta">
                                            ' . $rowtest['testimonialName']. '
                                            <span>' .$rowtest['testimonialPost']. '</span>
                                        </div>
                                    </div>
                                </div>'; 
            
        }
        
        
    $selectS = mysqli_query($connect, "select * from services where servicesStatus = 1 AND servicesIs_delete = 0 order by servicesId asc limit 0,3");
       
        while ($rowS = mysqli_fetch_array($selectS)) {
           
           $listS .=' <div class="col-md-4">
                                <div class="feature-box fbox-center fbox-dark fbox-plain">
                                    <div class="fbox-content countNumber">
                                        <span>' . $rowS['servicesCount']. '</span>
                                        <h2>' . $rowS['servicesName']. '</h2>
                                        <p>' . $rowS['servicesMessage']. '</p>
                                    </div>
                                </div>
                            </div>'; 
            
        }        

        ?>
        
        
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
  
  .carousel-control-prev-icon {
    background-image: url(images/arrow-left.svg) !important;
}

.carousel-control-next-icon {
    background-image: url(images/arrow-right.svg) !important;
}
.carousel-indicators li{
    background-color:#393939 !important;
}
  </style>
        <!-- middle-content -->
        <section id="content">
            <div class="content-wrap py-0">

                <!-- banner -->
                <div class="bannerSection px-lg-0 min-vh-50 min-vh-lg-75" style="background: url('images/bannerBG.jpg') no-repeat center center; background-size: cover;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="leftSideHeading">
                                    <h2>Hassle-free Procurement at the Lowest Prices</h2>
                                    <p>We purchase 1000's of materials required through 100's of vendors after thorough vetting & negotiating;<br>while you sit back and have complete visibility of every detail. </p>
                                    <a href="about.php" class="buttonLearnMore">Learn More</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="rightgif">
                                    
                                    <!--<img src="images/bannergif.gif" alt="">-->
                                    <div id="demo" class="carousel slide" data-ride="carousel">

                              <!-- Indicators -->
                              <ul class="carousel-indicators">
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <li data-target="#demo" data-slide-to="2"></li>
                              </ul>
                              
                              <!-- The slideshow -->
                              <div class="carousel-inner">
                                <div class="carousel-item active">
                                  <img src="images/bannergif.gif" alt="Los Angeles" width="1100" height="500">
                                </div>
                                <div class="carousel-item">
                                  <img src="images/bannergif.gif" alt="Chicago" width="1100" height="500">
                                </div>
                                <div class="carousel-item">
                                  <img src="images/bannergif.gif" alt="New York" width="1100" height="500">
                                </div>
                              </div>
                              
                              <!-- Left and right controls -->
                              <a class="carousel-control-prev" href="#demo" data-slide="prev">
                           <span class="carousel-control-prev-icon"></span>

                              </a>
                              <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>

                              </a>
                            </div>
                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- banner -->
                <!-- Why CHoose Us -->
                <div class="section chooseUsBg mt-0">
                    <div class="container text-center mw-md bottommargin">
                        <h2 class="display-4 whyChooseUsText">Why Choose Us?</h2>
                        <div class="clear"></div>

                        <div class="row col-mb-50 mb-0 mt-5 justify-content-center">
                            <div class="col-sm-6 col-lg-4">
                                <div class="feature-box fbox-center fbox-dark fbox-plain">
                                    <div class="fbox-icon">
                                        <img src="images/globe.svg">
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="headingChoose">Track Project Cost</h2>
                                        <p class="choosePara">Ability to track estimated & actual costs at any time, from anywhere on our system.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="feature-box fbox-center fbox-dark fbox-plain">
                                    <div class="fbox-icon">
                                        <img src="images/award.svg">
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="headingChoose">View Material Status</h2>
                                        <p class="choosePara">Know whether the material is indented, ordered or delivered on our dashboards.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="feature-box fbox-center fbox-dark fbox-plain">
                                    <div class="fbox-icon">
                                        <img src="images/smile.svg">
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="headingChoose">Learn Specification</h2>
                                        <p class="choosePara">Access to detailed material specifications of each & every item purchased for your project.
</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Why CHoose Us -->
                <!-- About Us -->
                <div class="container-fluid">
                    <div class="row align-items-lg-center" style="background-color: #EBE7E3;">
                        <div class="col-xl-6 col-lg-6 px-lg-0 min-vh-50 min-vh-lg-75" style="background: url('images/section.jpg') no-repeat center center; background-size: cover;">
                        </div>
                        <div class="col-xl-6 col-lg-6 px-lg-5 py-5">
                            <h3 class="h1 mb-4 fw-normal aboutUsPara">About Us</h3>
                            <p class="aboutPara">TRP is a team of Experienced Construction Project management professionals capable of providing complete engineering solution in various Sectors.Backed by experts in the industry with a cumulative experience of more than 100 years, TRP is a Phygital Company that aims to Modernize the Construction Industry.</p>
                            <a href="#" class="buttonLearnMore">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- About Us -->
                <!-- categories -->
                <div class="categoriesSlider">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sliderHeading">
                                    <h3>Products by categories</h3>
                                </div>
                                <div id="oc-images" class="owl-carousel image-carousel carousel-widget owl-loaded owl-drag with-carousel-dots" data-items-xs="2" data-items-sm="3" data-items-lg="4" data-items-xl="5">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(-263px, 0px, 0px); transition: all 0.25s ease 0s; width: 1843px;">
                                            <?php echo $cats; ?>
                                        </div>
                                    </div>
                                </div>
                                
                                 <div id="oc-images" class="owl-carousel image-carousel carousel-widget owl-loaded owl-drag with-carousel-dots" data-items-xs="2" data-items-sm="3" data-items-lg="4" data-items-xl="5">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(-263px, 0px, 0px); transition: all 0.25s ease 0s; width: 1843px;">
                                            <?php echo $cats1; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- categories -->
                <!-- Blog -->
                <div class="outerBlog">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blogHeading">
                                    <h3>Latest From The Blog</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mainOuterBlog">
                    <div class="container text-center mw-md-blog">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <div class="blogSection">
                                    <img src="images/1.png">
                                    <h4>Bloomberg smart cities; change-makers economic security</h4>
                                    <p>Prevention effect, advocate dialogue rural development lifting people up community civil society. Catalyst, grantees leverage.</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <div class="blogSection">
                                    <img src="images/2.png">
                                    <h4>Medicine new approaches communities, outcomes partnership</h4>
                                    <p>Cross-agency coordination clean water rural, promising development turmoil inclusive education transformative community.</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <div class="blogSection">
                                    <img src="images/3.png">
                                    <h4>Significant altruism planned giving insurmountable challenges liberal</h4>
                                    <p>Micro-finance; vaccines peaceful contribution citizens of change generosity. Measures design thinking accelerate progress medical initiative.</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <div class="blogSection">
                                    <img src="images/4.png">
                                    <h4>Compassion conflict resolution, progressive; tackle</h4>
                                    <p>Community health workers best practices, effectiveness meaningful work The Elders fairness. Our ambitions local solutions globalization.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog -->
                <div class="section bottommargin-lg" style="background-color: #ebe7e3; padding: 100px 0;">
                    <div class="fslider testimonial testimonial-full bg-transparent border-0 shadow-none" data-animation="fade" style="max-width: none;">
                        <div class="flexslider" style="height: 350.172px;">
                            <div class="slider-wrap mx-auto" style="max-width: 650px;">
                              
                              <?php echo $listTest; ?>
                            </div>
                            <ul class="flex-direction-nav">
                                <li class="flex-nav-prev"><a class="flex-prev" href="#"><i class="icon-angle-left"></i></a></li>
                                <li class="flex-nav-next"><a class="flex-next" href="#"><i class="icon-angle-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- client Count -->
                <div class="section custom-bg mt-lg-0 mb-0" style="--custom-bg: #ffffff;">
                    <div class="container">
                        <div class="row col-mb-50">
                           <?php echo $listS ; ?>
                        </div>
                    </div>
                </div>
                <!-- client Count -->

            </div>
        </section>
        <!-- middle-content -->

        <?php include("footer.php"); ?>