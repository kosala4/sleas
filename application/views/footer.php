</div>
        <footer class="footerOutBox" style="background-color:#363636; color:#fff;"> 
            <div class="row push">
                <div class="col-md-12">
                        <center>
                            &copy; 2107-All Rights Reserved with Data Management Branch, Ministry of Education, Sri Lanka.<br>
                            T.P/Fax 011-2075854 | email: <a href="mailto:director.dmr@moe.gov.lk" >director.dmr@moe.gov.lk</a>

                        </center>
                </div>
            </div>
          </footer>

    <a href="javascript:void(0);" class="scrollup">Scroll</a>

    <script src="<?php echo base_url()."assets/plugins/common/bootbox.js"?>"></script>        
    
    
    <script src="<?php echo base_url()."assets/js/main.js"?>"></script>
    <script src="<?php echo base_url()."assets/js/plugins.js"?>"></script>

    <script>
        $(document).ready(function(){
            var user_type = $('#hidden-user-type').val();
            if (user_type == "editor") {
                $('.admin-menu').hide();
            };
        });
    </script>
</body>
</html>

