<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>            
        <section id="content">   <!-- Start: Content -->
            
            <div id="topbar">
                
                <div class="col-xs-6 col-sm-3 stater">
                    <span class="count" id="count-rec-10">1989</span>
                    <span class="title">RECORDED</span><br>
                    <span class="time">grade 10</span><br>
                </div>
                
                <div class="col-xs-6 col-sm-3 stater">
                    <span class="count" id="count-to-edit-10">525</span>
                    <span class="title">FINISHED</span><br>
                    <span class="time">grade 10</span>
                    <div class="progress progress-sm">
                    	<div id="present-rec-10" class="progress-bar progress-bar-danger" style="width: 40%"></div>
                	</div>
                </div>
                
                <div class="col-xs-6 col-sm-3 stater">
                    <span class="count" id="count-to-mer-10">408</span>
                    <span class="title">ON GOING EDITINGS</span><br>
                    <span class="time">grade 10</span>
                </div>
                
                <div class="col-xs-6 col-sm-3 stater">
                    <span class="count" id="count-to-back-10">152</span>
                    <span class="title">TO BACKUP</span><br>
                    <span class="time">grade 10</span>
                </div><br>
                
            </div>
            
            <div id="topbar-2">
                
                <div class="col-xs-6 col-sm-3 stater">
                    <span class="count" id="count-rec-11">1989</span>
                    <span class="title">RECORDED</span><br>
                    <span class="time">grade 11</span>
                </div>
                
                <div class="col-xs-6 col-sm-3 stater">
                    <span class="count" id="count-to-edit-11">525</span>
                    <span class="title">FINISHED</span><br>
                    <span class="time">grade 11</span>
                    <div class="progress progress-sm">
                    	<div id="present-rec-10" class="progress-bar progress-bar-warning" style="width: 60%"></div>
                	</div>
                </div>
                
                <div class="col-xs-6 col-sm-3 stater">
                    <span class="count" id="count-to-mer-11">408</span>
                    <span class="title">ON GOING EDITINGS</span><br>
                    <span class="time">grade 11</span>
                </div>
                
                <div class="col-xs-6 col-sm-3 stater">
                    <span class="count" id="count-to-back-11">152</span>
                    <span class="title">TO BACKUP</span><br>
                    <span class="time">grade 11</span>
                </div>
                
            </div>

            <div class="container" style="padding-top: 240px;">
                <div class="row">

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Daily progress Grade 10</h3>

                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="chart" id="hBarChart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Daily progress Grade 11</h3>

                                <div class="panel-tools">
                                    <a class="btn btn-xs btn-link panel-collapse collapses" href="javascript:void(0);"></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="chart" id="morrisLine"></div>
                            </div>
                        </div>
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

    <script src="<?php echo base_url()."assets/plugins/morris/raphael-min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/morris/morris.min.js"?>"></script>

    <script>
        $(document).ready(function(){
            FlotCharts.init();
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
