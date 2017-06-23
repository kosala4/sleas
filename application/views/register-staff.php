<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <section id="content">   <!-- Start: Content -->
	        <div class="container" style="padding-top: 20px;">

		        <div class="row">                
		            <div class="col-md-12">
		                <div class="panel panel-info">
		                    <div class="panel-heading reg-main-panel">
		                        <h3 class="panel-title">Registration Form</h3>

		                        <div class="panel-tools">
		                            <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
		                        </div>
		                    </div><!--End of panel-heading-->
		                    <div class="panel-body">
                                <?php echo form_open('admin/add_student_details', 'role="form" id="addStaffForm"'); ?>
		                            <div class="form-body">
                                        <div class="panel-group" id="accordion">
                                            
                                            <div class="panel panel-default">
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
        Personal Information</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse1" class="panel-collapse collapse in">
                                                    <div class="panel-body personal_details">
                                                    <!--<h3>Personal Information</h3><hr>-->

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><span style="color:red;">*</span>NIC</label>
                                                            <input type="text" class="form-control validate[required]" name="nic" id="nic" placeholder="NIC No" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <select class="select2 " name="title" id="title" style="width:100%;">
                                                                <option value="" disabled selected style="background-color:#fff59d">---------Please Select--------- </option>
                                                                <option value="rev">Rev.</option>
                                                                <option value="mr">Mr.</option>
                                                                <option value="mrs">Mrs.</option>
                                                                <option value="ms">Ms.</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control validate[required]" name="fname" id="fname" placeholder="Full Name" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Middle Name</label>
                                                            <input type="text" class="form-control validate[required]" name="mname" id="mname" placeholder="Middle Name" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control validate[required]" name="lname" id="lname" placeholder="Last Name" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Date of Birth</label>
                                                            <input type="text" class="form-control date-picker" name="dob" id="dob">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Ethnicity</label>
                                                            <select class="select2 " name="ethnicity" id="ethnicity" style="width:100%;">
                                                                <option value="" disabled selected>---------Please Select--------- </option>
                                                                <option value="rev">Sinhala</option>
                                                                <option value="mr">Sri Lankan Tamil</option>
                                                                <option value="mrs">Indian Tamil</option>
                                                                <option value="ms">Muslim</option>
                                                                <option value="ms">Burger</option>
                                                                <option value="ms">Malay</option>
                                                                <option value="ms">Other</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Gender</label>
                                                            <select class="select2 " name="gender" id="gender" style="width:100%;">
                                                                <option value="" disabled selected>---------Please Select--------- </option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>  

                                                        <div class="form-group">
                                                            <label>Civil Status</label>
                                                            <select class="select2 " name="civil-st" id="civil-st" style="width:100%;">
                                                                <option value="" disabled selected>---------Please Select--------- </option>
                                                                <option value="single">Single</option>
                                                                <option value="married">Married</option>
                                                                <option value="widowed">Widowed</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div><!--End of Personal details-->
                                                </div>
                                            </div><!--End of Personal details-->
                                            
                                            <div class="panel panel-default">
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        Contact Information (Permanent)</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse2" class="panel-collapse collapse">
                                                    <div class="panel-body contact_details">
                                                    <!--<h3>Contact Information (Permanent)</h3><hr>-->
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Address Line 1</label>
                                                            <input type="text" class="form-control validate[required]" name="address1" id="address1" placeholder="Address Line 1" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Address Line 2</label>
                                                            <input type="text" class="form-control validate[required]" name="address2" id="address2" placeholder="Address Line 2" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Address Line 3</label>
                                                            <input type="text" class="form-control validate[required]" name="address3" id="address3" placeholder="Address Line 3" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input type="text" class="form-control validate[required]" name="pocode" id="pocode" placeholder="Postal Code" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Land phone no 01</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="landp" id="landp" placeholder="Land No" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Land phone no 02</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="landp" id="landp" placeholder="Land No" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Mobile phone no</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="mobile" id="mobile" placeholder="Mobile No" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input type="text" class="form-control validate[custom[email]]" name="email" id="email" placeholder="Email Address" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                </div> <!--End of Contact details Permanent-->
                                                </div>
                                            </div><!--End of Contact details Permanent-->
                                            
                                            <div class="panel panel-default">
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        Contact Information (Tempory)</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse3" class="panel-collapse collapse">

                                                    <div class="panel-body contact_details-temp">
                                                    <!--<h3>Contact Information (Tempory)</h3><hr>-->
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Address Line 1</label>
                                                            <input type="text" class="form-control validate[required]" name="address1" id="address1" placeholder="Address Line 1" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Address Line 2</label>
                                                            <input type="text" class="form-control validate[required]" name="address2" id="address2" placeholder="Address Line 2" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Address Line 3</label>
                                                            <input type="text" class="form-control validate[required]" name="address3" id="address3" placeholder="Address Line 3" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Postal Code</label>
                                                            <input type="text" class="form-control validate[required]" name="pocode" id="pocode" placeholder="Postal Code" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Land phone no 01</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="landp" id="landp" placeholder="Land No" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Land phone no 02</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="landp" id="landp" placeholder="Land No" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Mobile phone no</label>
                                                            <input type="text" class="form-control validate[custom[phone]]" name="mobile" id="mobile" placeholder="Mobile No" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Email address</label>
                                                            <input type="text" class="form-control validate[custom[email]]" name="email" id="email" placeholder="Email Address" data-prompt-position="topLeft" />
                                                        </div>

                                                    </div>
                                                </div> <!--End of Contact details Tempory-->
                                                </div>
                                            </div><!--End of Contact details Tempory-->
                                            
                                            <div class="panel panel-default"><!--General Service-->
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        General service information</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse4" class="panel-collapse collapse">

                                                    <div class="panel-body general-service">
                                                   <!-- <h3>General service information</h3><hr>-->

                                                    <div class="col-md-12">
                                                        <div class="col-md-6">

                                                            <div class="form-group">
                                                                <label>Date of first join to the SLEAS</label>
                                                                <input type="text" class="form-control date-picker" name="date-join" id="date-join-gen">
                                                            </div>

                                                            <div class="form-group ">
                                                                <label>Way of joined the SLEAS</label>
                                                                <select class="select2 " name="way_joined" id="way_joined" style="width:100%;">
                                                                    <option value="" disabled selected>---------Please Select--------- </option>
                                                                    <option value="open">Open</option>
                                                                    <option value="limited">Limited</option>
                                                                    <option value="merit">Merit</option>
                                                                    <option value="supern">Super Numeral (PVC)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">

                                                            <div class="gen-serv-set1 hidden">

                                                                <div class="form-group ">
                                                                    <label>SLEAS Cadre when joining the SLEAS</label>
                                                                    <select class="select2 gen-serv-set1-cadre" name="cadre" id="cadre" style="width:100%;">
                                                                        <option value="" disabled selected>---------Please Select--------- </option>
                                                                        <option value="general-carder">General Cadre</option>
                                                                        <option value="special-carder">Special Cadre</option>
                                                                    </select>
                                                                </div>
                                                                
                                                                    <div class="form-group gen-serv-set1-general hidden">
                                                                        <label>SLEAS Grade  when joining the SLEAS</label>
                                                                        <select class="select2 " name="grade-general" id="grade-join" style="width:100%;">
                                                                            <option value="" disabled selected>---------Please Select--------- </option>
                                                                            <option value="special">Special</option>
                                                                            <option value="grade1">Grade I</option>
                                                                            <option value="grade2">Grade II</option>
                                                                            <option value="grade3">Grade III</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group gen-serv-set1-special hidden">
                                                                        <label>SLEAS Grade  when joining the SLEAS</label>
                                                                        <select class="select2 " name="grade-general" id="grade-join" style="width:100%;">
                                                                            <option value="" disabled selected>---------Please Select--------- </option>
                                                                            <option value="grade2">Grade II</option>
                                                                            <option value="grade3">Grade III</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group gen-serv-set1-special hidden ">
                                                                        <label>Subject</label>
                                                                        <select class="select2Search " name="grade-special-subject" id="grade-join2-subject" style="width:100%;">
                                                                            <option value="" disabled selected>---------Please Select--------- </option>
                                                                            <?php if ($subjects) { ?>
                                                                                    <?php foreach ($subjects as $row) { ?>
                                                                                        <option value=<?php echo $row['ID'];?> > <?php echo $row['sub_name'] ;?> </option>
                                                                            <?php    } ?>
                                                                                <?php } ?>
                                                                        
                                                                            </select>
                                                                    </div>
                                                            </div>
                                                            <div class="gen-serv-set2 hidden">

                                                                <div class="form-group ">
                                                                    <label>SLEAS Cadre when joining the SLEAS</label>
                                                                    <select class="select2 " name="cadre" id="cadre2" style="width:100%;">
                                                                        <option value="" disabled selected>---------Please Select--------- </option>
                                                                        <option value="general-carder">General Cadre</option>
                                                                        <option value="not-specified">Not Specified</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group ">
                                                                    <label>SLEAS Grade  when joining the SLEAS</label>
                                                                    <select class="select2 " name="grade-special" id="grade-join2" style="width:100%;">
                                                                        <option value="" disabled selected>---------Please Select--------- </option>
                                                                        <option value="grade1">Grade I</option>
                                                                        <option value="grade2">Grade II</option>
                                                                        <option value="grade3">Grade III</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label>Medium in which recruited</label>
                                                                <select class="select2 " name="medium-rec" id="medium-rec" style="width:100%;">
                                                                    <option value="" disabled selected>---------Please Select--------- </option>
                                                                    <option value="sinhala">Sinhala</option>
                                                                    <option value="tamil">Tamil</option>
                                                                    <option value="english">English</option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label>Confirmed</label>
                                                                <select class="select2 " name="confirm" id="confirm" style="width:100%;">
                                                                    <option value="" disabled selected>---------Please Select--------- </option>
                                                                    <option value="yes">Yes</option>
                                                                    <option value="no">No</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div><!--End of General-Service-->
                                                </div>
                                            </div><!--End of General-Service-->
                                            
                                            <div class="panel panel-default"><!--Current Service-->
                                                <div class="panel-heading reg-sec-panel">
                                                  <h4 class="panel-title">
                                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        Current service information</a>
                                                    </h4>
                                                </div>
                                                <div id="collapse5" class="panel-collapse collapse">

                                                    <div class="current-service">
                                        <!--<h3>Current service information</h3><hr>-->
                                        
                                            <div class="col-md-12">
                                                <div class="col-md-6">

                                                    <div class="form-group ">
                                                        <label>Mode of service status</label>
                                                        <select class="select2 " name="c-mood" id="c-mood" style="width:100%">
                                                            <option value="" disabled selected>---------Please Select---------</option>
                                                            <option value="firstappoint"> First Appointment </option>
                                                            <option value="promo"> Promotion </option>
                                                            <option value="trans"> Transfer </option>
                                                            <option value="attach"> Attachment </option>
                                                            <option value="second"> Secondment </option>
                                                            <option value="release"> Releasement </option>
                                                            <option value="acting"> Acting Duty </option>
                                                            <option value="perform"> Performing Duty </option>
                                                        </select>
                                                    </div> 

                                                    <div class="form-group hidden">
                                                        <label>Present SLEAS Class</label>
                                                        <select class="select2 " name="prclass" id="prclass" style="width:100%">
                                                            <option value="" disabled selected> ---------Please Select--------- </option>
                                                            <option value="1open">  I Open </option>
                                                            <option value="1limited"> I Limited </option>
                                                            <option value="1merit"> I Merit </option>
                                                            <option value=""> II Open (General) </option>
                                                            <option value=""> II Open (Special) </option>
                                                            <option value=""> II Limited (General) </option>
                                                            <option value=""> II Limited (Special) </option>
                                                            <option value=""> II Merit </option>
                                                            <option value=""> III Open (General) </option>
                                                            <option value=""> III Open (Special) </option>
                                                            <option value=""> III Limited (General) </option>
                                                            <option value=""> III Limited (Special) </option>
                                                            <option value=""> III Merit </option>
                                                            <option value=""> performing as </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Date of appoint to the present SLEAS Class</label>
                                                        <input type="text" class="form-control date-picker" name="dappoint" id="dappoint">
                                                    </div>
                                                </div>
                                                
                                                <div class="c-firstapp_block hidden">
                                                    <div class="col-md-6">

                                                        <div class="form-group ">
                                                            <label>Working place</label>
                                                            <?php if ($workPlaces) { ?>
                                                                <select class="select2 col-md-12 workPlaces" name="c-firstapp-place" id="c-firstapp-place" style="padding-left:0;" required >
                                                                    <option value="" disabled selected> ---------Please Select--------- </option>
                                                                    <?php foreach ($workPlaces as $row) { ?>
                                                                        <option value="<?php echo $row['ID'];?>" data-code="<?php echo $row['work_place_code'];?>" > <?php echo $row['work_place'] ;?> </option>
                                                            <?php    } ?>
                                                                    <option value="other" class="c-other hidden"> Other </option>
                                                                </select>
                                                                <?php } ?>
                                                        </div>
                                                        
                                                            <div class="form-group hidden c-work-other">
                                                                <label>Other</label>
                                                                <input type="text" class="form-control" name="moccu" id="moccu" placeholder="Mother’s Occupation" data-prompt-position="topLeft" />
                                                            </div>

                                                        <div class="c-province-office hidden">
                                                            <div class="form-group ">
                                                                <label>Province</label>
                                                                <select class="select2 " name="c-province-office" id="c-province-office" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select---------</option>
                                                                </select>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="c-firstapp-work-main-institue hidden">

                                                            <div class="form-group ">
                                                                <label>Division</label>
                                                                <select class="select2 main-division" name="c_firstapp_main_division" id="c_firstapp_main_division" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select--------- </option>\
                                                                </select>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label>Branch</label>
                                                                <select class="select2Search main-branch" name="c_firstapp_main_branch" id="c_firstapp_main_branch" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select--------- </option>\
                                                                </select>
                                                            </div>

                                                        </div><!--End of work-main-institue-->  <!--Hidden when loading-->
                                                        
                                                        <div class="c-firstapp-work-institute hidden" >
                                                            <div class="form-group ">
                                                                <label>Province</label>
                                                                <select class="select2 province" name="c-firstapp-province" id="c-firstapp-province" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select--------- </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label>District</label>
                                                                <select class="select2 district" name="c-firstapp-district" id="c-firstapp-district" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select--------- </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group c-firstapp-work-institute-zone">
                                                                <label>Zone</label>
                                                                <select class="select2 zone" name="c-firstapp-zone" id="c-firstapp-zone" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select--------- </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group c-firstapp-work-institute-division">
                                                                <label>Division</label>
                                                                <select class="select2 division" name="c-firstapp-devision" id="c-firstapp-devision" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select--------- </option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group c-firstapp-work-institute-school">
                                                                <label>School / institute</label>
                                                                <select class="select2 institute" name="c-firstapp-institute" id="c-firstapp-institute" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select---------</option>
                                                                </select>
                                                            </div>
                                                        </div> <!--End of work-institute--> <!--Hidden when loading-->

                                                        <div class="form-group">
                                                            <label>Designation</label>
                                                            <input type="text" class="form-control validate[required]" name="c-firstapp-designation" id="c-firstapp-designation" placeholder="Designation" data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group ">
                                                            <label>Present SLEAS Grade</label>
                                                            <select class="select2 " name="c-firstapp-grade" id="c-firstapp-grade" style="width:100%">
                                                                <option value="">  Select </option>
                                                                <option value="1open">  Grade I </option>
                                                                <option value="1open">  Grade II </option>
                                                                <option value="1open">  Grade III </option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group hidden date-promoted">
                                                            <label>Date Promoted</label>
                                                            <input type="text" class="form-control date-picker" name="c-promo-date-promo" id="c-promo-date-promo">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Date of assumed duties at the present working place</label>
                                                            <input type="text" class="form-control date-picker" name="c-firstapp-date-assumed" id="c-firstapp-date-assumed">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Respective official letter no.</label>
                                                            <input type="text" class="form-control validate[required]" name="c-firstapp-letter" id="c-firstapp-letter" placeholder="Respective official letter no." data-prompt-position="topLeft" />
                                                        </div>

                                                        <div class="form-group hidden salary-drawn">
                                                            <label>Place where salary drawn</label>
                                                            <select class="select2 " name="c-salary-drawn" id="c-salary-drawn" style="width:100%">
                                                                <option value="" disabled selected> ------------------Please Select------------------ </option>
                                                                <option value="moe"> MoE </option>
                                                                <option value="exam"> Exams </option>
                                                                <option value="epd"> EPD </option>
                                                                <option value="nie" class="c-attach hidden"> NIE </option>
                                                                <option value="province"> Province </option>
                                                                <option value="zone"> Zone </option>
                                                                <option value="division"> Division </option>
                                                                <option value="ncoe"> NCoE </option>
                                                                <option value="ttc"> TTC </option>
                                                                <option value="school"> School </option>
                                                                <option value="other" class="c-other hidden"> Other </option>
                                                            </select>
                                                        </div>

                                                    </div><!--End of first appointment block--> 
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="c-releasement_block hidden">

                                                        <div class="form-group">
                                                            <label>Releasement Type</label>
                                                            <?php if ($release_type) { ?>
                                                                <select class="select2 " name="release_type" id="release_type" style="width:100%">
                                                                    <option value="" disabled selected> ---------Please Select--------- </option>
                                                                    <?php foreach ($release_type as $row) { ?>
                                                                        <option value="<?php echo $row['ID'];?>" data-type="<?php echo $row['rel_type'];?>" > <?php echo $row['rel_type'] ;?> </option>
                                                            <?php    } ?>
                                                                    <option value="other" class="c-other hidden"> Other </option>
                                                                </select>
                                                                <?php } ?>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Place</label>
                                                            <select class="select2 " name="release_place" id="release_place" style="width:100%">
                                                                <option value="" disabled selected> ---------Please Select---------</option>
                                                            </select>
                                                        </div>

                                                        
                                                        <div class="release_study_block hidden">

                                                            <div class="form-group release_study_institute">
                                                                <label>Institute name</label>
                                                                    <input type="text" class="form-control validate[required]" name="rel_institute_name" id="rel_institute_name" placeholder="Institute name" data-prompt-position="topLeft" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Start date</label>
                                                                <input type="text" class="form-control date-picker" name="release_study_st_date" id="release_study_st_date">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>End date</label>
                                                                <input type="text" class="form-control date-picker" name="release_study_end_date" id="release_study_end_date">
                                                            </div>
                                                            
                                                        </div>

                                                        
                                                        <div class="release_work_block hidden">

                                                            <div class="form-group">
                                                                <label>Designation</label>
                                                                <input type="text" class="form-control validate[required]" name="release_work_designation" id="release_work_designation" placeholder="Designation" data-prompt-position="topLeft" />
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Date of assumed duties at the present working place</label>
                                                                <input type="text" class="form-control date-picker" name="release_work_date_assumed" id="release_work_date_assumed">
                                                            </div>
                                                            
                                                        </div>

                                                    </div><!--End of promotion block-->
                                                    
                                                </div>
                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                            </div><!--End of current-service-->
                                                </div>
                                            </div><!--End of current-service-->
                                          
                                        </div><!--End of accordian-->
                                        
                                        <div class="form-actions fluid">
		                                <div class="col-md-offset-3 col-md-9">
                                            <button type="reset" id="reset-button" class="btn btn-info">Clear</button>
		                                    <button type="submit" class="btn btn-info form-reset">Submit</button>
		                                </div>
		                            </div>
                                    </div><!--End of form body-->
		                        <?php echo form_close(); ?>

		                      </div><!--End of panel-body-->
                            </div>
                    
                    </div>
                </div><!--End of row-->
                <div class="row" id="selected_profile">
                    
                </div>

            </div><!--End of container-->
        </section>

    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validationEngine/languages/jquery.validationEngine-en.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validationEngine/jquery.validationEngine.js"?>"></script>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/footable/js/footable.min.js"?>"></script>

    <script>
        $(document).ready(function(){ 
            FormValidationTooltip.init();  
           // $('#username').lostfocus
            
            //Check Way joind in general service
            $('#way_joined').change(function(){
                var gr = $(this).val();
                if ($.inArray(gr, ['open', 'limited', 'merit']) >=0){
                    $(".gen-serv-set1").removeClass("hidden");
                    $(".gen-serv-set2").addClass("hidden");
                }else if(gr == "supern"){
                    $(".gen-serv-set1").addClass("hidden");
                    $(".gen-serv-set2").removeClass("hidden");
                    
                }
            });
            
            //Check When joining SLEAS
            $('.gen-serv-set1-cadre').change(function(){
                var gr = $(this).val();
                if (gr == "general-carder"){
                    $(".gen-serv-set1-general").removeClass("hidden");
                    $(".gen-serv-set1-special").addClass("hidden");
                }else if(gr == "special-carder"){
                    $(".gen-serv-set1-general").addClass("hidden");
                    $(".gen-serv-set1-special").removeClass("hidden");
                    
                }
            });
            
            $('#c-mood').change(function(){
                var gr = $(this).val();
                if ($.inArray(gr, ['firstappoint', 'promo', 'trans', 'attach', 'second', 'acting', 'perform']) >=0){
                    $(".c-firstapp_block").removeClass("hidden");
                    $(".c-releasement_block").addClass("hidden");
                }else if(gr == "release"){
                    $(".c-firstapp_block").addClass("hidden");
                    $(".c-releasement_block").removeClass("hidden");
                    
                }
                switch(gr){
                    case 'firstappoint':
                        $('.date-promoted').addClass("hidden");
                        $('.c-nie').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        break;
                    case 'promo':
                        $('.date-promoted').removeClass("hidden");
                        $('.c-nie').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        break;
                    case 'attach':
                        $('.c-nie').removeClass("hidden");
                        $('.salary-drawn').removeClass("hidden");
                        $('.date-promoted').addClass("hidden");
                        break;
                    case 'second':
                        $('.date-promoted').addClass("hidden");
                        $('.salary-drawn').removeClass("hidden");
                        $('.c-nie').removeClass("hidden");
                        break;
                    case 'acting':
                        $('.date-promoted').addClass("hidden");
                        $('.salary-drawn').removeClass("hidden");
                        $('.c-nie').removeClass("hidden");
                        break;
                    case 'perform':
                        $('.date-promoted').addClass("hidden");
                        $('.salary-drawn').removeClass("hidden");
                        $('.c-nie').removeClass("hidden");
                        break;
                    case 'release':
                        $('.date-promoted').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        $('.c-nie').addClass("hidden");
                        break;
                    default:
                        $('.date-promoted').addClass("hidden");
                        $('.c-nie').addClass("hidden");
                        $('.salary-drawn').addClass("hidden");
                        break;
                         }
            });
            
            $('#c-firstapp-place').change(function(){
                var gr = $(this).find(':selected').data('code');
                var workplace_id = $(this).val();
                
                if ($.inArray(gr, ['moe','exam','epd']) >=0){
                    $(".c-firstapp-work-institute").addClass("hidden");
                    $(".c-province-office").addClass("hidden");
                    $(".c-firstapp-work-main-institue").removeClass("hidden");
                    getMainDivision(workplace_id);
                    getMainBranch(workplace_id);    
                    
                }else if($.inArray(gr, ['zone','division','ncoe','ttc','school']) >=0){
                    $(".c-firstapp-work-main-institue").addClass("hidden");
                    $(".c-province-office").addClass("hidden");
                    $(".c-firstapp-work-institute").removeClass("hidden");
                    if(gr == "zone"){
                        $(".c-firstapp-work-institute-division").addClass("hidden");
                        $(".c-firstapp-work-institute-school").addClass("hidden");
                    }else if(gr == "division"){
                        $(".c-firstapp-work-institute-school").addClass("hidden");
                        $(".c-firstapp-work-institute-division").removeClass("hidden");
                    }else{
                        $(".c-firstapp-work-institute-division").removeClass("hidden");
                        $(".c-firstapp-work-institute-school").removeClass("hidden");
                    }
                    
                }else if($.inArray(gr, ['provinced','provincem']) >=0){
                    $(".c-firstapp-work-main-institue").addClass("hidden");
                    $(".c-firstapp-work-institute").addClass("hidden");
                    $(".c-province-office").removeClass("hidden");
                    
                    var post_url = "index.php/FormControl/getProvinceOffices/"+workplace_id;
                    var dataarray = {workplace_id: workplace_id};
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>" + post_url,
                        dataType :'json',
                        data: dataarray,
                        success: function(res){
                            $('#c-province-office').empty();
                            $.each(res, function(ID,provine_office){
                                $('#c-province-office').append('<option value='+res[ID].ID+'>'+res[ID].provine_office+'</option>');
                            });
                        }
                    });
                }
            });
            
            $('#release_type').change(function(){
                var gr = $(this).find(':selected').data('type');
                var id = $(this).val();
                
                if(gr == "Study"){
                    $(".release_study_block").removeClass("hidden");
                    $(".release_work_block").addClass("hidden");
                }else if(gr == "Work"){
                    $(".release_work_block").removeClass("hidden");
                    $(".release_study_block").addClass("hidden");
                }
                
                var post_url = "index.php/FormControl/getReleaseWorkPlaces/"+id;
                var dataarray = {rel_type_id: id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('#release_place').empty();
                        $.each(res, function(ID,provine_office){
                            $('#release_place').append('<option value='+res[ID].ID+'>'+res[ID].rel_place+'</option>');
                        });
                    }
                });
                

            });
            
            function getMainDivision(workPlace_id){
                var post_url = "index.php/FormControl/getMainDivision/"+workPlace_id;
                var dataarray = {workplace_id: workPlace_id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        $('#c_firstapp_main_division').empty();
                        $.each(res, function(ID,provine_office){
                            $('#c_firstapp_main_division').append('<option value='+res[ID].ID+'>'+res[ID].office_division+'</option>');
                        });
                    }
                });
            }
            
            function getMainBranch(workPlace_id){
                console.log(workPlace_id);
                var post_url = "index.php/FormControl/getMainBranch/"+workPlace_id;
                var dataarray = {workplace_id: workPlace_id};
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + post_url,
                    dataType :'json',
                    data: dataarray,
                    success: function(res){
                        console.log(res);
                        $('#c_firstapp_main_branch').empty();
                        $.each(res, function(ID,provine_office){
                            $('#c_firstapp_main_branch').append('<option value='+res[ID].ID+'>'+res[ID].office_branch+'</option>');
                        });
                    }
                });
            }

            $('#reset-button').click(function(){
               //$('.formErrorContent').addClass('hidden'); 
               //$('.formErrorArrow').remove(); 
               validater.resetForm(); 
            });

            /*$('#username').focusout(function(){
                alert("sssss");
                $.ajax({
                    type :post,
                    url :,
                    dataType :json,
                    data :dataset,
                    success :function(response){
                        
                    }
                })
            });  */

            $('#list-staff').on('click','tr', function(e){
                var selected_id = $(this.cells[1]).text();
                //alert(selected_id);
                get_profile(selected_id);
            });

            function get_profile (selected_id) {
                var p = new {};
                p['selected_id'] = selected_id;
                $('#selected_profile').load('/admin/load_profile',p);
            }

            function get_province(){
                
            }
            
            DataTabels.init();
        });    
    </script>