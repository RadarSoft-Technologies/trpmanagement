<!-- footer -->


<script>
  
    function newf(){
       
       
           window.location = "https://trpmanagement.com/website/about.php#faq";

     

    }
</script>

        <footer id="footer" class="border-0 bg-white">
            <div class="container">

                <div class="footer-widgets-wrap py-lg-6">
                    <div class="row col-mb-30">



                        <div class="col-lg-3 col-md-3 col-12">
                            <div class="widget widget_links widget-li-noicon">
                                <img src="images/logo.svg" alt="..." height="42">
                                <p class="paraFree">We purchase 1000's of construction materials required through 100's of vendors after thorough vetting & negotiating; While you sit back and relish savings.</p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-12">
                            <div class="widget widget_links widget-li-noicon">
                                <h4 class="ls0">Links</h4>
                                <ul class="list-unstyled iconlist ms-0">
                                    <li><a class="nav-link <?php if ($page == "three"){ echo "active"; }else{ echo "";} ?>" href="about.php">About Us</a></li>
                                    <li><a class="nav-link <?php if ($page == "two"){ echo "active"; }else{ echo "";} ?>" href="product.php">Products</a></li>
                                    <li onclick="newf();"><a href="javascript:void(0)"  onclick="newf();" id="faq">FAQs</a></li>
                                    <li> <a class="nav-link <?php if ($page == "four"){ echo "active"; }else{ echo "";} ?>" href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-3 col-12">
                            <div class="widget widget_links widget-li-noicon">

                                <div class="footerAddress">
                                    <h4>share location</h4>
                                    <span>Headquarters: India <br>
                                   26 , Vipul Agora Mall, MG Road ,<br> Gurugram, Haryana-122002</span>
                                </div>

                                <div class="footerAddress">
                                    <h4>schedule</h4>
                                    <span>Mon - Fri: 10:00 - 18:00</span>
                                </div>

                                <div class="footerAddress">
                                    <h4>call</h4>
                                    <a class="color" href="tel:+91-92-688-27-001"><span class="numberText">+91-7011558052</span></a>
                                </div>

                                <div class="footerAddress">
                                    <h4>email</h4>
                                    <a class="color" href="mailto:procure@trpmanagement.com"><span class="numberText">procure@trpmanagement.com</span></a>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-6">
                            <div class="widget widget_links widget-li-noicon">
                                <h4 class="ls0">Social</h4>
                                <ul class="list-unstyled iconlist ms-0">
                                    <li>
                                        <a href="https://www.facebook.com/digitaltrp/" target="_blank"><img src="images/social/facebook.svg"> Facebook</a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/digital-trp/" target="_blank"><img src="images/social/linkedin.png" style="width: 25px !important;"> linkedin</a>
                                    </li>
                                    <!--<li>-->
                                    <!--    <a href="https://twitter.com/" target="_blank"><img src="images/social/twitter.svg"> Twitter</a>-->
                                    <!--</li>-->
                                    <li>
                                        <a href="https://www.youtube.com/channel/UCrwrhMW8BBfUd52_CwwyxXA/featured" target="_blank"><img src="images/social/youtube.svg"> YouTube</a>
                                    </li>
                                    <li>
                                        <a href="https://wa.me/917011558052" target="_blank"><img src="images/social/whatsapp.svg"> WhatsApp</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div id="copyrights" class="py-3 bg-color-light">
                <div class="container">
                    <div class="d-flex justify-content-between">
                        <span>&copy; 2022 All Rights Reserved by TRP Management.</span>
                        <!--<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>-->
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer -->

    </div>

    <div id="gotoTop" class="bg-color op-07 h-op-1">
        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><polygon points="48 208 128 128 208 208 48 208" opacity="0.2"></polygon><polygon points="48 208 128 128 208 208 48 208" fill="none" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polygon><polyline points="48 128 128 48 208 128" fill="none" stroke="#FFF" stroke-linecap="round" stroke-linejoin="round" stroke-width="16"></polyline></svg>
    </div>

    
    <script src="js/jquery.js"></script>
    <script src="js/plugins.min.js"></script>
    <script src="js/functions.js"></script>
</body>
  <?php if(count($_SESSION['cart']) > 0) {?>
 <div class="container clearfix">
        <div class="modal1 mfp-hide" id="myModal1">
            <div class="block mx-auto" style="background-color: #FFF; max-width: 600px; position: relative; border-radius: 5px;">
                <a href="#" class="button closeBtn" onClick="$.magnificPopup.close();return false;"><img src="images/close.svg"></a>
                <div class="model-popup-Padding">
                        <div class="product-list">
                          
                            <h3 class="bag-add">Bag (<?php echo count($_SESSION['cart']) ?> Product)</h3>
                            <?php 
                            
                            $total = 0;
						if(!empty($_SESSION['cart'])){
					
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 							$_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
 						}
						$sqlda = mysqli_query($connect, "SELECT * FROM product WHERE productid IN (".implode(',',$_SESSION['cart']).")");
					
							while($rowp = mysqli_fetch_assoc($sqlda)){
                            
                            
                            ?>
                            <div class="grid-product-popup">
                                <div class="portfolio-image-popup">
                                    <img src="images/product/<?php echo $rowp['images'];?>" alt="">
                                </div>
                                <div class="portfolio-details-poup">
                                    <h3><?php echo $rowp['productname']; ?></h3>
                                   
                                </div>
                                <a href="delete_item.php?id=<?php echo $rowp['productid']; ?>&index=<?php echo $index; ?>" class="button delete-product"><img src="images/close.svg"></a>
                            </div>
                           <?php }
                           
                           }
                           
                           ?>
                           
                        </div>
                        
                        <!--<div>-->
                        <!--    <button class="btn btn-checkout">Checkout</button>-->
                        <!--</div>-->
                        
                        <div class="poupSideForm">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Name *</label>
                                        <input type="hidden" name="penquiryProductids" value="<?php echo implode(',',$_SESSION['cart']); ?>" >
                                        <input type="text" required="" class="form-control" name="penquiryProjectname">
                                    </div>
                                   
                                     <div class="col-lg-12">
                                        <label>Email *</label>
                                        <input type="email" class="form-control"  name="penquiryEmail" required>
                                    </div>
                                     <div class="col-lg-12">
                                        <label>Mobile No *</label>
                                        <input type="text" class="form-control"  name="penquiryPhone" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Project Location </label>
                                        <select name="penquiryLocation">
                                            <option value="">Select</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Project Type</label>
                                        <select name="penquiryProjecttype">
                                            <option value="">Select</option>
                                            <option value="Residential">Residential</option>
                                            <option value="Commercial">Commercial</option>
                                        </select>    
                                    </div>
                                    <!--<div class="col-lg-12">-->
                                    <!--    <label>Materials to be Procured-Type option *</label>-->
                                    <!--    <select name="penquiryMaterials" required>-->
                                    <!--        <option value="">Select</option>-->
                                    <!--        <option value="Materials1">Materials1</option>-->
                                    <!--        <option value="Materials2">Materials2</option>-->
                                    <!--    </select>    -->
                                    <!--</div>-->
                                    
                                    <!--<div class="col-lg-12">-->
                                    <!--    <label>Are you A</label>-->
                                    <!--    <div id="list4" class="dropdown-check-list" tabindex="100">-->
                                    <!--      <span class="anchor">Select</span>-->
                                    <!--      <ul class="items">-->
                                    <!--        <li><input type="checkbox" name="penquiryClient[]" value="Contractor"/>Contractor </li>-->
                                    <!--        <li><input type="checkbox" name="penquiryClient[]" value="End Customer"/>End Customer</li>-->
                                    <!--      </ul>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-lg-12 text-center">
                                        <button class="btn btnsubmitbuyer" name="saveenq" style="color:#fff !important;">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }else {?>
        
        <div class="container clearfix">
        <div class="modal1 mfp-hide" id="myModal1">
            <div class="block mx-auto" style="background-color: #FFF; max-width: 600px; position: relative; border-radius: 5px;">
                <a href="#" class="button closeBtn" onClick="$.magnificPopup.close();return false;"><img src="images/close.svg"></a>
                <div class="model-popup-Padding">
                        <div class="product-list text-center text-danger">
                          Cart is empty
                        </div>
                        
                      
                    </div>
                </div>
            </div>
        </div>
        
        <?php } ?>
    </div>
    
    <script type="text/javascript">
       var checkList = document.getElementById('list4');
       
        checkList.getElementsByClassName('anchor')[0].onclick = function(evt) {
          if (checkList.classList.contains('visible'))
            checkList.classList.remove('visible');
          else
            checkList.classList.add('visible');
        }
    </script>
    
    
</html>