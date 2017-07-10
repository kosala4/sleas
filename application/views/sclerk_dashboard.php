<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>            
        <section id="content">   <!-- Start: Content -->
            
            <div id="topbar">
                <a href="<?php echo base_url()."index.php/register/newmember"?>">
                    <div class="col-xs-6 col-sm-4 stater" style="height:auto">
                        <div class="title text-center"> <i class="fa fs-users"> </i> Add SLEAS Officer </div>
                    </div>
                </a>
                
                <a href="#">
                    <div class="col-xs-6 col-sm-4 stater" style="height:auto">
                        <div class="title text-center"> <i class="fa fs-transfer"> </i> Add Transfer </div>
                    </div>
                </a>
                
                <a href="#">
                    <div class="col-xs-6 col-sm-4 stater" style="height:auto">
                        <div class="title text-center"> <i class="fa fa-level-up"> </i> Add Promotion </div>
                    </div>
                </a>
                
            </div>

            <div class="container" style="padding-top: 100px;">
                <div class="row">

                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"> SLEAS Officers </h3>
                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-bordered table-hover footable DynamicTable">
                                    <thead>
                                        <tr>
                                            <th> Title </th>
                                            <th> First Name </th>
                                            <th> Last Name </th>
                                            <th> Designation </th>
                                            <th> Working Place </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($officers_list) { ?>

                                        <?php foreach ($officers_list as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['title'] ;?> </td>
                                                <td><?php echo $row['f_name'] ;?> </td>
                                                <td><?php echo $row['l_name'] ;?> </td>
                                                <td><?php echo $row['designation'] ;?> </td>
                                                <td><?php echo $row['work_place'] ;?> </td>
                                            </tr>
                                        <?php    } ?>
                                    <?php    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        
                    </div>

                </div>
                                
            </div>
        </section>
    
    <script src="<?php echo base_url()."assets/plugins/flot/excanvas.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.time.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.orderBars.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.pie.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.resize.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/flot/jquery.flot.tooltip.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/iCheck-master/jquery.icheck.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/select2/select2.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/jquery.dataTables.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/datatables/js/DT_bootstrap.js"?>"></script>

    <script src="<?php echo base_url()."assets/plugins/morris/raphael-min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/morris/morris.min.js"?>"></script>

    <script>
        $(document).ready(function(){
            DataTabels.init();
            $('#menu_dashboard').addClass('active');
        });

var FlotCharts = function() {
    // Function to handel Horizontal Bar Charts
    var handelHBarChart = function () {
        var dataforBar = [
            {
                data: [[0, 4]],
                color: "#90cf02"
            },
            {
                data: [[1, 1]],
                color: "#01a7db"
            },
            {
                data: [[2, 2]],
                color: "#a37afa"
            },
            {
                data: [[3, 4]],
                color: "#fd6d6a"
            },
            {
                data: [[4, 3]],
                color: "#fe913f"
            },
            {
                data: [[10, 5]],
                color: "#fdd235"
            }
        ];

        $.plot($("#hBarChart"), dataforBar, {
            series: {
                lines: {
                    fill: false
                },
                points: {show: false},
                bars: {
                    show: true,
                    align: 'center',
                    barWidth: 0.4,
                    horizontal: true,
                    fill: 1,
                    lineWidth: 1
                }
            },
            xaxis: {
                min: 0,
                ticks: [
                    [1, "1"],
                    [2, "2"],
                    [3, "3"],
                    [4, "4"],
                    [5, "5"],
                    [6, "6"],
                    [7, "7"],
                    [8, "8"],
                    [9, "9"],
                    [10, "10"]]
            },
            yaxis: {
                tickLength: 1,
                ticks: [
                    [1, "Sinhala"],
                    [2, "Maths"],
                    [3, "Sinhala"],
                    [4, "Maths"],
                    [5, "Rating 2"],
                    [6, "Rating 1"],
                    [7, "Not Closed"]]
            },
            grid: {
                borderWidth: 0,
                hoverable: true
            },
            tooltip: true,
            tooltipOpts: {
                content: "x: %x, y: %y"
            }
        });
    }

    return {        
        init: function() {
            handelHBarChart();
        }
              
    };    
}();    // Draggable Portlets
    </script>
