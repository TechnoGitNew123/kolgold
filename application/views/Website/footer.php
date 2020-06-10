<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-12">
        <img class="footer-logo" src="<?php echo base_url(); ?>assets/images/kol_logo.png" alt="" width="100%">
        <p class="f-12 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
      </div>
      <div class="col-md-3 col-12">
        <div class="post text-center">
          <div class="row">
            <div class="col-4">
              <div class="cart-top">
                <img src="<?php echo base_url(); ?>assets/images/misal.png" alt="" width="100%">
              </div>
            </div>
            <div class="col-8">
              <p class="f-10 text-justify mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            </div>
          </div>
        </div>
        <br>
        <div class="post text-center">
          <div class="row">
            <div class="col-4">
              <div class="cart-top">
                <img src="<?php echo base_url(); ?>assets/images/misal.png" alt="" width="100%">
              </div>
            </div>
            <div class="col-8">
              <p class="f-10 text-justify mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 mmt-2">
        <h5  class="f-12">IMPORTANT LINKS</h5>
        <ul>
          <li>Home</li>
          <li>about Us</li>
          <li>Products</li>
          <li>Contact</li>
        </ul>
      </div>

      <div class="col-md-3 mmt-2">
        <h5  class="f-12">IMPORTANT LINKS</h5>
        <ul>
          <li>Home</li>
          <li>about Us</li>
          <li>Products</li>
          <li>Wholesale Order</li>
          <li>FAQ's</li>
        </ul>
      </div>
    </div>
  </div>

</footer>

<div class="bottom-footer m-text-center">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mmt-1">
        <p class="mb-0 f-12">Kolhapurimandai  2020. All Rights Reserved by Trichulin Business Ventures Pvt. Ltd.®</p>
      </div>
      <div class="col-md-6 mmt-1">
        <p class="mb-0 f-12">website Design & developed by <a href="https://technothinksup.com/">Technothinksup solution Pvt. Ltd </a> </p>
      </div>
    </div>
  </div>
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/popper.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js" ></script> -->

<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>

    <script type="text/javascript">
            $('.owl-one').owlCarousel({
          loop:true,
          margin:10,
          nav:true,
          navText:["<div class='nav-btn prev-slide'> < </div>","<div class='nav-btn next-slide'> > </div>"],
          dots: true,
          autoplay:true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:5
              }
          }
        })
    </script>

    <script type="text/javascript">
            $('.owl-two').owlCarousel({
          loop:true,
          margin:10,
          nav:true,
          navText:["<div class='nav-btn prev-slide'> < </div>","<div class='nav-btn next-slide'> > </div>"],
          dots: true,
          autoplay:true,
          autoplayTimeout:3000,
          autoplayHoverPause:true,
          responsive:{
              0:{
                  items:1
              },
              600:{
                  items:3
              },
              1000:{
                  items:5
              }
          }
        })
    </script>

    <script type="text/javascript">
// Sticky Header...
  $(document).ready(function(){
    var header = $(".sticky");
    var scroll = $(window).scrollTop();
    if (scroll >= 250) {
      header.fadeIn();
      header.addClass("sticky-top");
    }
  });
  $(function() {
      var header = $(".sticky");
      $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 250) {
          header.fadeIn();
          header.addClass("sticky-top");
        } else {
          header.fadeOut();
          header.removeClass("sticky-top");
        }
      });
  });
</script>
</body>
</html>
