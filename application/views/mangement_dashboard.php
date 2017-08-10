<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

        <section id="content">   <!-- Start: Content -->
	        <div class="container" style="padding-top: 20px;">
                <div id="topbar">
                
                    <div class="col-xs-6 col-sm-3 stater">
                        <span class="count"><?php echo $countAll; ?></span>
                        <span class="title"> Total </span><br>
                        <span class="time">SLEAS Officers</span>
                    </div>

                    <div class="col-xs-6 col-sm-3 stater">
                        <span class="count"><?php echo $countgr1; ?></span>
                        <span class="title">GRADE I</span><br>
                        <span class="time">SLEAS Officers</span>
                    </div>

                    <div class="col-xs-6 col-sm-3 stater">
                        <span class="count"><?php echo $countgr2; ?></span>
                        <span class="title">GRADE II</span><br>
                        <span class="time">SLEAS Officers</span>
                    </div>

                    <div class="col-xs-6 col-sm-3 stater">
                        <span class="count"><?php echo $countgr3; ?></span>
                        <span class="title">GRADE III</span><br>
                        <span class="time">SLEAS Officers</span>
                    </div>
                
                </div>
                
                <div class="col-md-12" style="margin-top:20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> SLEAS Officers by Area </h3>

                            <div class="panel-tools">
                                <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                                <a class="btn btn-xs btn-link panel-close" href="javascript:void(0);"><i class="fs-close-2"></i></a>
                            </div>
                        </div>
                        <div id="columnchart_material" style="width: 100%; height: 350px; padding-left:20px; padding-right:20px;"></div>

                    </div>
                </div>
            </div>
        </section>

    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/jquery.validate.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/validation/additional-methods.js"?>"></script>    

    <script src="<?php echo base_url()."assets/plugins/flot/excanvas.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/iCheck-master/jquery.icheck.min.js"?>"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script>
        
    $(document).ready(function(){



    });
    </script>
<!--'P01', 'P02', 'P03', 'P03', 'P04', 'P05', 'P06', 'P07', 'P08', 'P09'-->
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Province', 'Grade I', 'Grade II', 'Grade III'],
          ['MoE', <?php echo $moe_1; ?>, <?php echo $moe_2; ?>, <?php echo $moe_3; ?>],
          ['Exams', <?php echo $exam_1; ?>, <?php echo $exam_2; ?>, <?php echo $exam_3; ?>],
          ['Publications', <?php echo $epub_1; ?>, <?php echo $epub_2; ?>, <?php echo $epub_3; ?>],
          ['Western', <?php echo $P01_1; ?>, <?php echo $P01_2; ?>, <?php echo $P01_3; ?>],
          ['Central', <?php echo $P02_1; ?>, <?php echo $P02_2; ?>, <?php echo $P02_3; ?>],
          ['Southern', <?php echo $P03_1; ?>, <?php echo $P03_2; ?>, <?php echo $P03_3; ?>],
          ['Northern', <?php echo $P04_1; ?>, <?php echo $P04_2; ?>, <?php echo $P04_3; ?>],
          ['Eastern', <?php echo $P05_1; ?>, <?php echo $P05_2; ?>, <?php echo $P05_3; ?>],
          ['North Western', <?php echo $P06_1; ?>, <?php echo $P06_2; ?>, <?php echo $P06_3; ?>],
          ['North Central', <?php echo $P07_1; ?>, <?php echo $P07_2; ?>, <?php echo $P07_3; ?>],
          ['Uva', <?php echo $P08_1; ?>, <?php echo $P08_2; ?>, <?php echo $P08_3; ?>],
          ['Sabaragamuwa', <?php echo $P09_1; ?>, <?php echo $P09_2; ?>, <?php echo $P09_3; ?>]
        ]);

        var options = {
          chart: {
            title: 'SLEAS Officers',
            subtitle: 'Officers in areas',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
