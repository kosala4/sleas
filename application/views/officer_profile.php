<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <section id="content">   <!-- Start: Content -->
	        <div class="container" style="padding-top: 20px;">
                
                
                <div class="col-md-3 col-sm-4">
                    <img class="img-responsive" src="assets/images/users/user_01-b.jpg" alt="User Profile">
                    <div id="SkillDiv" style="height: 200px;"></div>
                </div>
                
                <div class="col-md-9 col-sm-8">
                    
                    <div class="tabbable tabbable-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1_1" data-toggle="tab">OVERVIEW</a></li>
                            <li><a href="#tab_1_2" data-toggle="tab">EDIT</a></li>
                        </ul>
                        <div class="tab-content">
                            
                            <div class="tab-pane active" id="tab_1_1">
                                <h3><?php echo $user_details[0]['f_name'] .' '.$user_details[0]['l_name'] ?></h3>
                                <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.</p>
                                <?php echo $user_details[0]['NIC'] ?>
                                <?php echo $user_details[0]['sub_location'] ?>
                                <p><a href="#">www.website.com</a></p>
                                
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th><i class="fa fa-briefcase"></i> Date</th>
                                            <th class="hidden-xs"><i class="fa fa-comments-o"></i> Service mood</th>
                                            <th><i class="fa fa-bookmark"></i> Work place</th>
                                            <th><i class="fa fa-bookmark"></i> Work Location</th>
                                            <th><i class="fa fa-bookmark"></i> Designation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(is_array($user_details)) {?>
                                        <?php foreach($user_details as $row) {?>
                                        <tr>
                                            <td><?php echo $row['duty_date']; ?></td>
                                            <td><?php echo $row['mode']; ?></td>
                                            <td><?php echo $row['work_place']; ?></td>
                                            <td><?php echo $row['sub_location']; ?></td>
                                            <td><?php echo $row['designation']; ?></td>
                                        </tr>
                                        <?php }?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="tab-pane" id="tab_1_2">
                                <form role="form">
                                    <div class="form-body">
                                        
                                        <div class="form-group col-md-6">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name">                                            
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name">  
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email">  
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Mobile Number">  
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Date of birth</label>
                                            <select class="form-control">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Web site</label>
                                            <input type="url" class="form-control" placeholder="url">  
                                        </div>

                                    </div>
                                    <div class="form-actions pull-right">
                                        <button type="button" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div><!--End of Conainer-->
        </section>