        <?php
        $page = 'home';
        include("includes/config.php");
        include("header.php");


        $selectcat = mysqli_query($connect, "select * from categorymaster where categoryStatus = 1 AND categoryIs_home = 1 AND categoryIs_delete = 0 order by categoryID desc limit 0,15");
        $loop_counter1 = 1;
        while ($rowcat = mysqli_fetch_array($selectcat)) {
            $cat_class1 = "";
            if ($loop_counter1 == 2) {
                $cat_class1 = "activeFilter";
                $loop_counter1++;
            }


            $cats .= '<div class="owl-item" style=" margin-bottom: 5px;">
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
                                    </div>W
                                </a>
                            </div>
                        </div>';
        }

        $selectTest = mysqli_query($connect, "select * from testimonial where testimonialStatus = 1 AND testimonialIs_delete = 0 order by testimonialId desc limit 0,8");

        while ($rowtest = mysqli_fetch_array($selectTest)) {

            $listTest .= '<div class="slide" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                                    <div class="testi-content">
                                        <p>' . substr($rowtest['testimonialMessage'], 0, 150) . '</p>
                                        <div class="testi-meta">
                                            ' . $rowtest['testimonialName'] . '
                                            <span>' . $rowtest['testimonialPost'] . '</span>
                                        </div>
                                    </div>
                                </div>';
        }


        $selectS = mysqli_query($connect, "select * from services where servicesStatus = 1 AND servicesIs_delete = 0 order by servicesId asc limit 0,3");

        while ($rowS = mysqli_fetch_array($selectS)) {
// preg_match_all('!\d+!', $rowS['servicesCount'], $matches);
// $out =  (int)implode('', $matches[0]);
// $mc = trim($rowS['servicesCount'], $out);

            $listS .= '<div class="col-lg-4 col-md-6 dark center col-padding" style="background-color: #ffbd53;">
                            <!-- <i class="i-plain i-xlarge mx-auto icon-line2-graph"></i> -->
                            <div class="counter counter-lined"><span data-from="0" data-to="' . $rowS['servicesCount'] . '" data-refresh-interval="50" data-speed="4000">' . $rowS['servicesCount'] . ' </span> '.$rowS['servicesType'].' 
                           <h2>' . ucwords($rowS['servicesName']) . '</h2>
                            </div>
                            <h5>' . $rowS['servicesMessage'] . '</h5>
                        </div> 
                            
                            ';
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

            .carousel-indicators li {
                background-color: #393939 !important;
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
                                    <h2>Hassle-free Procurement at the Lowest Prices <br> <p class="headingChoose1">Beyond Digital To Phygital</p></h2>
                                    <p>We purchase 1000's of construction materials required through 100's of vendors after thorough vetting & negotiation.<br>While you sit back and relish savings. </p>
                                    <a href="about.php" class="buttonLearnMore">Learn More</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="rightgif">

                                    <img src="images/bannergif.gif" alt="">
                                   
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
                                        <h2 class="headingChoose">Demand Aggregation</h2>
                                        <p class="choosePara">Through our vendor base and aggregate demand; we do bulk deals and save maximum for all our individual projects.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="feature-box fbox-center fbox-dark fbox-plain">
                                    <div class="fbox-icon">
                                        <img src="images/award.svg">
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="headingChoose">Technical expertise</h2>
                                        <p class="choosePara">Use our team of an experienced construction professionals to analyse and assess the material to be purchased to ensure that the selection is right.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="feature-box fbox-center fbox-dark fbox-plain">
                                    <div class="fbox-icon">
                                        <img src="images/smile.svg">
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="headingChoose">Transparency</h2>
                                        <p class="choosePara">TRP helps you estimate, negotiate, technically evaluate and purchase every item for your projects with complete Transparency</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Why CHoose Us -->
                <!-- About Us -->
                <div class="container-fluid">
                    <div class="row align-items-lg-center" style="background-color: #ffffff;">
                        <div class="col-xl-7 col-lg-6 px-lg-0 min-vh-50 min-vh-lg-75" style="background: url('images/section.jpg') no-repeat center center; background-size: contain;">
                        </div>
                        <div class="col-xl-5 col-lg-6 px-lg-5 py-5">
                            <h3 class="h1 mb-4 fw-normal aboutUsPara">About Us</h3>
                            <p class="aboutPara">TRP is a team of Experienced Construction Project management professionals capable of providing complete engineering solution in various Sectors. Backed by experts in the industry with a cumulative experience of more than 100 years, TRP is a Phygital Company that aims to Modernize the Construction Industry.</p>
                            <a href="javascript:void(0)" onclick="fn()" class="buttonLearnMore" id="teams">Learn More</a>
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
                                <div id="oc-images" class="owl-carousel image-carousel carousel-widget owl-loaded owl-drag with-carousel-dots" data-items-xs="5" data-items-sm="5" data-items-lg="5" data-items-xl="5">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage" style="transform: translate3d(-263px, 0px, 0px); transition: all 0.25s ease 0s; width: 4843px;">
                                            <?php echo $cats; ?>
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
                                   <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:ugcPost:6887699615135735808" height="400" width="504" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <div class="blogSection">
                                   <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:ugcPost:6884070411198443521" height="400" width="504" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <div class="blogSection">
                                   <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:share:6930749751105597440" height="400" width="504" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                <div class="blogSection">
                              <iframe src="https://www.linkedin.com/embed/feed/update/urn:li:share:6897010865812467713" height="400" width="504" frameborder="0" allowfullscreen="" title="Embedded post"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Blog -->
                <div class="section" style="background-color: #ebe7e3; padding: 100px 0;">
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
                <div class="container text-center mw-md-blog">
                    <div class="row clearfix align-items-stretch bottommargin-lg" style="margin-top:100px">
                      <?php echo $listS; ?>
                    </div>
                </div>

            </div>
        </section>
        <!-- middle-content -->
<script>
                $(document).ready(function() {

  var owl = $('.owl-carousel');
owl.owlCarousel({
    nav: true,
    items:5,
    loop:true,
    margin:10,
    

    autoplay:true,
    autoplayTimeout:2000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})

});
</script>

<script>
  
    function fn(){
       
           window.location = "https://trpmanagement.com/website/about.php#teamdata";

     

    }
</script>
        <?php include("footer.php"); ?>