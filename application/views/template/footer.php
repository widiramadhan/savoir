 <!-- ***** Footer Start ***** -->
 <footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="under-footer">
                    <p><a href="https://www.instagram.com/savoir.jakarta/" target="_blank"><i class="fa fa-instagram"></i> Savoir Jakarta </a>– House of Luxury est. 2015
                    </p>
                    </div>
            </div>
    </footer>
    <script src="<?php echo base_url();?>assets/js/popper.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/owl-carousel.js"></script>
    <script src="<?php echo base_url();?>assets/js/accordions.js"></script>
    <script src="<?php echo base_url();?>assets/js/datepicker.js"></script>
    <script src="<?php echo base_url();?>assets/js/scrollreveal.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/imgfix.min.js"></script> 
    <script src="<?php echo base_url();?>assets/js/slick.js"></script> 
    <script src="<?php echo base_url();?>assets/js/lightbox.js"></script> 
    <script src="<?php echo base_url();?>assets/js/isotope.js"></script> 
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });
    </script>
  </body>
</html>