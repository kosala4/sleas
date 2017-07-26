<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>            
        <section id="content">
            <div class="container" style="padding-top: 20px;">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading reg-main-panel">
                        <h3 class="panel-title">Add <?php echo $class ?></h3>

                        <div class="panel-tools">
                            <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                        </div>
                    </div><!--End of panel-heading-->
                    <div class="panel-body">
                    <?php echo form_open("$class/$method", 'role="form" id="addIncrementForm"'); ?>
                        <div class="col-md-12">
                            <div class="form-group">
                            <label>Add <?php echo $class ?> for</label>
                            <?php if ($result) { ?>
                                <label><?php echo $result[0]['title'] . ' ' ;?> <?php echo $result[0]['f_name'] ;?> <?php echo $result[0]['l_name'] ;?></label>
                            <?php    } ?>
                                    
                                <input type="hidden" name="person_id" id="person_id" value="<?php echo $result[0]['ID'] ;?>">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>NIC Number</label>
                                <input type="text" class="form-control " name="nic" id="nic" value="<?php echo $result[0]['NIC'] ;?>" readonly>
                            </div>
                            <div class="form-group">
                                <label><span style="color:red;">*</span>Increment Date</label>
                                <input type="text" class="form-control date-picker" name="increment_date" id="increment_date">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="form-group ">
                                <label>Present SLEAS Grade</label>
                                <select class="select2 " name="present_grade" id="present_grade" style="width:100%">
                                    <option value="">  Select </option>
                                    <option value="Grade I">  Grade I </option>
                                    <option value="Grade II">  Grade II </option>
                                    <option value="Grade III">  Grade III </option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><span style="color:red;">*</span>Present Salary Step</label>
                                <input type="text" class="form-control" name="salary_step" id="salary_step" maxlength="2">
                            </div>

                        </div>
                        <div class="col-md-8">
                            <label> Salary Increment </label>
                            <input type="text" class="form-control" name="increment" id="increment" readonly>
                            <label> New Salary </label>
                            <input type="text" class="form-control" name="new_salary" id="new_salary" readonly>
                        </div>
                        
                        <div class="form-actions fluid">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="reset" id="reset-button" class="btn btn-info form-reset">Clear</button>
                                <button type="button" id="calc-button" class="btn btn-success"> Calculate Increment </button>
                                <button type="submit" class="btn btn-info"><i class="fa fa-print"></i> Print letter </button>
                            </div>
                        </div>
                            
                    <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/additional-methods.js"?>"></script>

    <script>
    $(document).ready(function(){ 
        
                
        $("#addIncrementForm").validate({
            errorElement: 'span', //default input error message container
            errorClass: 'help-block error', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            ignore: "",

            rules: {
                increment_date: "required",
                present_grade: "required",
                salary_step: "required"
            }
        });

        $('#<?php echo $sidemenu ?>').addClass('active');

        $('#calc-button').click(function(){
            var person_id = $('#person_id').val();
            var increment_date = $('#increment_date').val();
            var grade = $('#present_grade').val();
            var salary_step = $('#salary_step').val();
            
            var post_url = "index.php/Increment/calculate/";
            var dataarray = {'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>',person_id: person_id, increment_date: increment_date, grade: grade, salary_step: salary_step };
            
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + post_url,
                dataType :'json',
                data: dataarray,
                success: function(res){
                    var salary = res['new_salary'].toFixed(2).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    var increment = res['increment'].toFixed(2).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
                    $('#new_salary').val(salary);
                    $('#increment').val(increment);
                }
            });
        });

        
    });
</script>