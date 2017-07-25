<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <link rel="text/javascript" src="<?php echo base_url()."assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css"?>" />
    <link rel="text/javascript" src="<?php echo base_url()."assets/plugins/jquery-file-upload/css/jquery.fileupload-ui.css"?>" />
<?php if ($this->session->user_level == '1'){ ?>
    <style>
        #content{ margin-left: 0; }
        .sidebar-toggle{display: none;}
    </style>
        <div class="main-wrapper"> 
<?php } ?>

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
                        <a role="button" class="btn btn-white btn-xs" style="margin-top:10px; margin-left:auto; margin-right:auto;" data-toggle="modal" data-target="#profilePicModal" >Change/ Add Profile picture</a>
                    </div>
                    
                    <!-- Modal -->
                        <div id="profilePicModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Upload profile image</h4>
                              </div>
                                
                            <?php echo form_open() ?> 
                              <div class="modal-body">
                                <div class="col-md-12">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <input type="file" name="file" id="file">
                                        <span class="fileinput-filename"></span>
                                    </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="image_submit">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            <?php echo form_close() ?>
                            </div>

                          </div>
                        </div>
                    
                    <div class="panel panel-success" style="margin-top:20px;">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">Salary Details</h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            <table  class="table table-striped table-hover" border="0">
                                <tr valign="top">
                                    <th width="60%" style="padding-right: 0px;">Current Salary</th>
                                    <td></td>
                                </tr>
                                <tr valign="top">
                                    <th style="padding-right: 0px;">Salary Step</th>
                                    <td></td>
                                </tr>
                                <tr valign="top">
                                    <th style="padding-right: 0px;">Next Increment Date</th>
                                    <td><?php echo date("Y-m-d", strtotime(date( 'Y' ) . date("-m-d", strtotime($user_details[general][0]['date_join'])) ."+1 year" )); ?></td>
                                </tr>
                            </table>
                            <?php if($this->session->user_level != '1'){ ?>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <a href="<?php echo base_url()."index.php/increment/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Increment</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="panel panel-success">
                        <div class="panel-heading reg-main-panel">
                            <h3 class="panel-title">Change Request</h3>
                        </div><!--End of panel-heading-->
                        <div class="panel-body">
                            
                            <?php if($this->session->user_level == '1'){ ?>
                                <?php echo form_open("admin/changeRequest", 'role="form" id="changeRequestForm"'); ?>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Title" >  
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" name="message" placeholder="Write your message here"></textarea>
                                </div>

                                <div class="form-actions pull-right">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                                <?php echo form_close(); ?>
                            <?php }else { ?>
                            <?php if($requests){ ?>
                                    <?php foreach($requests as $row){ ?>
                                        <label><?php echo $row['message_title'] ?> </label> <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#messageModal" data-message='{"id":"<?php echo $row['person_id'] ?>","message_title":"<?php echo $row['message_title'] ?>","message":"<?php echo $row['message'] ?>"}' data-msgID="<?php echo $row['msg_id'] ?>" id="messagetoggle"> View </button>

                                    <?php }  ?>
                            <?php }  ?>
                            
                            <!-- Modal -->
                                <div id="messageModal" class="modal fade" role="dialog">
                                  <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                      </div>
                                      <div class="modal-body">
                                        <p id="messagebody">Some text in the modal.</p>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                            
                            <?php } ?>
                            
                        </div>
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
                                <div class="col-md-6">
                                    <table border="0" width="100%">
                                        <tr valign="top">
                                            <td><label style="margin-bottom:15px;"> Active/ inactive </label></td>
                                            <td><label>- Active </label></td>
                                        </tr>
                                        <tr valign="top">
                                            <td width="150px"><label style="margin-bottom:15px;"> NIC Number </label></td>
                                            <td>- <label id="fname:1"><?php echo $user_details[0]['NIC'] ;?> </label>
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
                                <div class="col-md-6">
                                    <table border="0" width="100%">
                                        <tr valign="top">
                                            <td width="130px"><label style="margin-bottom:15px;"> Address 1 </label></td>
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
                                <thead>
                                    <tr valign="top">
                                        <th> Date Joined </th>
                                        <th> Way of Joined </th>
                                        <th> Cadre when joining </th>
                                        <th> Medium </th>
                                        <th> Confirmation </th>
                                        <th> Pensionable Date </th>
                                    </tr>
                                </thead>
                                <tr valign="top">
                                    <td><?php echo $user_details[general][0]['date_join'] ;?> </td>
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
                                        <th> Date</th>
                                        <th> Service mode</th>
                                        <th> Work place</th>
                                        <th> Institute / Branch</th>
                                        <th> Designation</th>
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
                            <?php if($this->session->user_level != '1'){ ?>
                            <div class="col-md-12" style="margin-bottom:10px;">
                                <p>Add Service History</p>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Transfer</a>
                                <a href="<?php echo base_url()."index.php/promotion/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Promotion</a>
                                <a href="<?php echo base_url()."index.php/promotionTransfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Promotion Transfer</a>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Attachment</a>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Secondment</a>
                                <a href="<?php echo base_url()."index.php/transfer/add/".$user_details[0]['ID']?>" role="button" class="btn btn-white btn-xs">Add Releasement</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php //print_r($user_details); ?>
            </div><!--End of Conainer-->
        </section>

        <script>
            $(document).ready(function(){ 
                $(".trigger").bind("click", function () {
                    alert($(this).prev().text());
                });

                $('#messageModal').on('show.bs.modal', function(e) {
                    var person_id = $('#messagetoggle').data('message').id;
                    var message_body = $('#messagetoggle').data('message').message;
                    var message_title = $('#messagetoggle').data('message').message_title;
                    $('#messagebody').text(message_body);
                    $('.modal-title').text(message_title);
                });

                $('#image_submit').click(function(){
                    console.log("ssssss");
                    var post_url = "index.php/FormControl/setProfileImage/"+'2';
                    var form_data = new FormData();
                    var file_data = $('#file').prop('files')[0];
                    form_data.append('<?php echo $this->security->get_csrf_token_name(); ?>','<?php echo $this->security->get_csrf_hash(); ?>');
                    form_data.append('file', file_data);
                    form_data.append( 'user_id', '<?php echo $user_details[0]['ID'] ?>');
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'text',
                        data: form_data,
                        contentType: false,
                        processData: false,
                        success: function(response){
                             $('#msg').html(response); // display success response from the PHP script
                            },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the PHP script
                        }
                    });
                });
            });

        </script>