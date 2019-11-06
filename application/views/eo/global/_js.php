	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/desain/site/docs/4.3/assets/js/vendor/jquery-slim.min.js') ?>"></script>
    <script src="<?= base_url('assets/desain/assets/js/vendor/popper.min.js') ?>"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/desain/dist/js/bootstrap.min.js') ?>"></script>

    <script type="text/javascript" src="<?= base_url('assets/slick-master/slick/slick.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            // executes when HTML-Document is loaded and DOM is ready

            // breakpoint and up  
            $(window).resize(function(){
                if ($(window).width() >= 980){	

                // when you hover a toggle show its dropdown menu
                $(".navbar .dropdown-toggle").hover(function () {
                    $(this).parent().toggleClass("show");
                    $(this).parent().find(".dropdown-menu").toggleClass("show"); 
                });

                    // hide the menu when the mouse leaves the dropdown
                $(".navbar .dropdown-menu").mouseleave(function() {
                    $(this).removeClass("show");  
                });
            
                    // do something here
                }	
            });  

        // document ready  
        });
    </script>