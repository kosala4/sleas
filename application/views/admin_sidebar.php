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
                            <li><a href="form-wizards.html"> Divisions List </a></li>
                            <li><a href="<?php echo base_url()."index.php/main/places/branch"?>"> Branches List </a></li>
                            <li><a href="add_staff"> Institutes List </a></li>
                        </ul>
                    </li>
                    
                    <li> 
                        <a class="top-menu-toggle openable" href="#mnuTwo">
                            <span class="sicon"><i class="fa fa-book"></i></span>   
                            <span class="sidebar-title">Grades and Subjects</span>
                        </a>
                        <ul id="mnuTwo" class="nav sub-nav">
                            <li><a href="ui-general.html">General</a></li>
                            <li><a href="ui-buttons.html">Buttons</a></li>
                            <li><a href="ui-typography.html">Typography</a></li>
                            <li><a href="ui-icons.html">Icons</a></li>
                            <li><a href="ui-tree.html">Tree</a></li>
                            <li><a href="ui-panels.html">Panels</a></li>
                            <li><a href="ui-tab.html">Tabs & Accordions</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </aside>    <!-- End: Sidebar --> 
        