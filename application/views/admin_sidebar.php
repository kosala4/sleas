    <div class="main-wrapper">      <!-- Start: Main Wrapper-->
        
        <aside id="sidebar">    <!-- Start: Sidebar -->
            
            <div id="sidebar-menu">
                <ul class="nav sidebar-nav">
                    <li> 
                        <a href="index">
                            <span class="sicon"><i class="fa fa-tachometer"></i></span>
                            <span class="sidebar-title">Dashboard</span>
                        </a> 
                    </li>
                    
                    <li>
                        <a class="top-menu-toggle openable" href="#mnuOne">
                            <span class="sicon"><i class="fa fs-users"></i></span>
                            <span class="sidebar-title"> Work Places </span>
                        </a>
                        <ul id="mnuOne" class="nav sub-nav">
                            <li><a href="<?php echo base_url()."index.php/main/places/work_places"?>"> Work Places List </a></li>
                            <li><a href="<?php echo base_url()."index.php/main/places/division"?>"> Divisions List </a></li>
                            <li><a href="<?php echo base_url()."index.php/main/places/branch"?>"> Branches List </a></li>
                            <li><a href="<?php echo base_url()."index.php/main/places/province"?>"> Provincial Offices List </a></li>
                            <li><a href="<?php echo base_url()."index.php/main/places/institute"?>"> Institutes List </a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </aside>    <!-- End: Sidebar --> 
        