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
