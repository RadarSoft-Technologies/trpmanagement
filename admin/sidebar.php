 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="contact-list.php" class="brand-link">
      <img src="dist/img/logo.svg" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
      <!--<span class="brand-text font-weight-light"></span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div> -->

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link  <?php if ($page == "zero"){ echo "active"; }else{ echo "";} ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
           
          </li>
          
            
          
         
           <li class="nav-item">
            <a href="category-list.php" class="nav-link <?php if ($page == "one"){ echo "active"; }else{ echo "";} ?>">
            <i class="nav-icon fas fa-tag"></i> 
              <p>
                Category Master
                
              </p>
            </a>
          </li> 
          
          
          
          <!-- <li class="nav-item">-->
          <!--  <a href="product-type-list.php" class="nav-link  /*if ($page == "two"){ echo "active"; }else{ echo "";} */?>">-->
          <!--  <i class="nav-icon fas fa-list"></i> -->
          <!--    <p>-->
          <!--      Product Type Master-->
                
          <!--    </p>-->
          <!--  </a>-->
          <!--</li> -->
           
           
          
           <li class="nav-item">
            <a href="testimonial-list.php" class="nav-link <?php if ($page == "et"){ echo "active"; }else{ echo "";} ?>">
            <i class="nav-icon fas fa-tags"></i>
              <p>
               Testimonial Master
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="services-list.php" class="nav-link <?php if ($page == "ten"){ echo "active"; }else{ echo "";} ?>">
            <i class="nav-icon fas fa-wrench"></i>
              <p>
               Services Master
              </p>
            </a>
          </li> 
          
            <li class="nav-item">
            <a href="product-list.php" class="nav-link <?php if ($page == "three"){ echo "active"; }else{ echo "";} ?>">
            <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
               Product Master
              </p>
            </a>
          </li>
         
           <li class="nav-item">
            <a href="contact-list.php" class="nav-link <?php if ($page == "four"){ echo "active"; }else{ echo "";} ?>">
         <i class="nav-icon fas fa-envelope"></i> 
              <p>
                Contact Master
                
              </p>
            </a>
          </li> 
           <li class="nav-item">
            <a href="buyer-list.php" class="nav-link <?php if ($page == "five"){ echo "active"; }else{ echo "";} ?>">
         <i class="nav-icon fas fa-shopping-cart"></i> 
              <p>
                Buyer Master
                
              </p>
            </a>
          </li> 
          
           <li class="nav-item">
            <a href="vendor-list.php" class="nav-link <?php if ($page == "six"){ echo "active"; }else{ echo "";} ?>">
         <i class="nav-icon fas fa-users"></i> 
              <p>
                Vendor Master
                
              </p>
            </a>
          </li> 
             <li class="nav-item">
            <a href="enquiry-list.php" class="nav-link <?php if ($page == "sevent"){ echo "active"; }else{ echo "";} ?>">
         <i class="nav-icon fas fa-list"></i> 
              <p>
                Enquiry Master
                
              </p>
            </a>
          </li> 
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>