<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <section id="content">   <!-- Start: Content -->
	        <div class="container" style="padding-top: 20px;">
                
                    <?php if ($this->session->flashdata('update')=="success"){ ?>
                <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Successfully updated the member details
                            </div>
                        </div>
                </div>
                    <?php } ?>
                
                <div class="col-md-3 col-sm-4">
                    <div style="text-align:center;text-align:-moz-center;">
                        <img class="img-responsive" src="<?php echo base_url()."assets/images/users/user.png"?>" alt="User Profile">
                        <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs" style="margin-top:10px; margin-left:auto; margin-right:auto;">Change/ Add Profile picture</a>
                    </div>
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
                                <div class="col-md-5">
                                    <table border="0">
                                        <tr valign="top">
                                            <td width="53%"><label style="margin-bottom:15px;"> NIC Number </label></td>
                                            <td>- <label id="fname:1" contenteditable="true"><?php echo $user_details[0]['NIC'] ;?> </label>
                                                <!--<i class="fa fs-users trigger"></i>-->
                                            </td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Title </label></td>
                                            <td><label>- <?php echo $user_details[0]['title'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> First Name </label></td>
                                            <td><label>- <?php echo $user_details[0]['f_name'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Middle Name </label></td>
                                            <td><label>- <?php echo $user_details[0]['m_name'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Last Name </label></td>
                                            <td><label>- <?php echo $user_details[0]['l_name'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Date of Birth </label></td>
                                            <td><label>- <?php echo $user_details[0]['dob'] ;?> </label></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-7">
                                    <table border="0">
                                        <tr valign="top">
                                            <td width="25%"><label style="margin-bottom:15px;"> Address 1 </label></td>
                                            <td><label>- <?php echo $user_details['contact'][0]['address_1'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Address 2 </label></td>
                                            <td><label>- <?php echo $user_details['contact'][0]['address_2'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Address 3 </label></td>
                                            <td><label>- <?php echo $user_details['contact'][0]['address_3'] ;?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Mobile </label></td>
                                            <td><label>- <?php if($user_details['contact'][0]['mobile']){ echo $user_details['contact'][0]['mobile'] ; }?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Telephone </label></td>
                                            <td><label>- <?php if($user_details['contact'][0]['telephone']){ echo $user_details['contact'][0]['telephone'];} ?> </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Email </label></td>
                                            <td><label>- <?php echo $user_details['contact'][0]['email'] ;?> </label></td>
                                        </tr>
                                    </table>
                                </div>
                                
                                
                            </div>
                            
                            <div class="tab-pane" id="tab_1_2">
                                <?php echo form_open("admin/updateProfile", 'role="form" id="updateOfficerForm"'); ?>
                                    <div class="form-body">
                                        <input type="text" class="form-control hidden" name="id" value="<?php echo $user_details[0]['ID'] ;?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name with intials</label>
                                                <input type="text" class="form-control" name="initname" placeholder="Name with intials">  
                                            </div>

                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $user_details[0]['f_name'] ;?>">                                            
                                            </div>

                                            <div class="form-group">
                                                <label>Middle Name</label>
                                                <input type="text" class="form-control" name="mname" placeholder="Middle Name" value="<?php echo $user_details[0]['m_name'] ;?>">                                            
                                            </div>

                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="lname" placeholder="Last Name" value="<?php echo $user_details[0]['l_name'] ;?>">  
                                            </div>

                                            <div class="form-group">
                                                <label>Date of birth</label>
                                                <input type="text" class="form-control date-picker" name="dob" id="dob" value="<?php echo $user_details[0]['dob'] ;?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" class="form-control" name="mobile" placeholder="Mobile" value="<?php echo $user_details['contact'][0]['mobile'] ;?>">  
                                            </div>

                                            <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="text" class="form-control" name="telephone" placeholder="Telephone" value="<?php echo $user_details['contact'][0]['telephone'] ;?>">  
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user_details['contact'][0]['email'] ;?>">  
                                            </div>

                                            <div class="form-group">
                                                <label>Address line 1</label>
                                                <input type="text" class="form-control" name="address1" placeholder="Address line 1" value="<?php echo $user_details['contact'][0]['address_1'] ;?>">  
                                            </div>

                                            <div class="form-group">
                                                <label>Address line 2</label>
                                                <input type="text" class="form-control" name="address2" placeholder="Address line 2" value="<?php echo $user_details['contact'][0]['address_2'] ;?>">  
                                            </div>

                                            <div class="form-group">
                                                <label>Address line 3</label>
                                                <input type="text" class="form-control" name="address3" placeholder="Address line 3" value="<?php echo $user_details['contact'][0]['address_3'] ;?>">  
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions pull-right">
                                        <button type="submit" class="btn btn-info">Save</button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">General Service Details</h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                        <tr valign="top">
                                            <th><label style="margin-bottom:15px;"> Date Joined </label></th>
                                            <th><label style="margin-bottom:15px;"> Way of Joined </label></th>
                                            <th><label style="margin-bottom:15px;"> Cadre when joining </label></th>
                                            <th><label style="margin-bottom:15px;"> Medium </label></th>
                                            <th><label style="margin-bottom:15px;"> Confirmation </label></th>
                                            <th><label style="margin-bottom:15px;"> Pensionable Date </label></th>
                                        </tr>
                                        <tr valign="top">
                                            <td><?php echo $user_details [general][0]['date_join'] ;?> </td>
                                            <td><?php echo $user_details[general][0]['way_join'] ;?> </td>
                                            <td><?php echo $user_details[general][0]['cadre'] ;?> </td>
                                            <td><?php echo $user_details[general][0]['medium'] ;?> </td>
                                            <td><?php echo $user_details[general][0]['confirm'] ;?> </td>
                                            <td><?php echo date("Y-m-d", strtotime(date("Y-m-d", strtotime($user_details[0]['dob'])) . " +60 years")); ?> </td>
                                        </tr>
                                    </table>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">Service Details</h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-briefcase"></i> Date</th>
                                        <th class="hidden-xs"><i class="fa fa-comments-o"></i> Service mode</th>
                                        <th><i class="fa fa-bookmark"></i> Work place</th>
                                        <th><i class="fa fa-bookmark"></i> Institute / Branch</th>
                                        <th><i class="fa fa-bookmark"></i> Designation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(is_array($user_details)) {?>
                                    <?php foreach($user_details as $row) {?>
                                        <?php if($row['duty_date']) {?>
                                        <tr>
                                            <td><?php echo $row['duty_date']; ?></td>
                                            <td><?php echo $row['mode']; ?></td>
                                            <td><?php echo $row['work_place']; ?></td>
                                            <td><?php echo $row['sub_location'] . $row['office_branch']; ?></td>
                                            <td><?php echo $row['designation']; ?></td>
                                        </tr>
                                        <?php }?>
                                    <?php }?>
                                    <?php } ?>
                                </tbody>
                            </table>
                            
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <p>Add Service History</p>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Transfer</a>
                                <a href="<?php echo base_url()."index.php/promotion/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Promotion</a>
                                <a href="<?php echo base_url()."index.php/promotionTransfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Promotion Transfer</a>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Attachment</a>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Secondment</a>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Releasement</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php print_r($user_details); ?>
            </div><!--End of Conainer-->
        </section>

<script>
    $(document).ready(function(){ 
        $(".trigger").bind("click", function () {
            alert($(this).prev().text());
        });
    });
</script>