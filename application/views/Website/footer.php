<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-12">
        <img class="footer-logo" src="<?php echo base_url(); ?>assets/images/kol_logo.png" alt="" width="100%">
        <p class="f-12 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, </p>
      </div>
      <div class="col-md-3 col-12">
        <a class="no-a" href="#">
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
        </a>
        <br>
        <a  class="no-a" href="#">
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
        </a>
      </div>

      <div class="col-md-3 mmt-2">
        <h5  class="f-12">IMPORTANT LINKS</h5>
        <ul>
        <a href="<?php echo base_url(); ?>"><li>Home</li></a>
        <a href="<?php echo base_url(); ?>Website/about">  <li>About Us</li></a>
        <a href="<?php echo base_url(); ?>Website/contact"><li>Contact Us</li></a>
        <a href="<?php echo base_url(); ?>Website/faq"><li>Help & FAQ's</li></a>
        <a href="<?php echo base_url(); ?>Website/payment_methode"><li>Payment Methode</li></a>
        <a href="<?php echo base_url(); ?>Website/disclaimer"><li>Disclaimer</li></a>
        </ul>
      </div>

      <div class="col-md-3 mmt-2">
        <h5  class="f-12">POLICIES</h5>
        <ul>
          <a href="<?php echo base_url(); ?>Website/privacy_policy"><li>Privacy Policy</li></a>
          <a href="<?php echo base_url(); ?>Website/shipping_policy"><li>Shipping Policy</li></a>
          <a href="<?php echo base_url(); ?>Website/cancel_policy"><li>Cancellation Policy</li></a>
          <a href="<?php echo base_url(); ?>Website/return_policy"><li>Return Policy</li></a>
          <a href="<?php echo base_url(); ?>Website/terms"><li>Terms & Conditions </li></a>
        </ul>
      </div>
    </div>
  </div>
</footer>

<div class="bottom-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="mb-0 f-12">Kolhapurimandai  2020. All Rights Reserved by Trichulin Business Ventures Pvt. Ltd.®</p>
      </div>
      <div class="col-md-6">
        <p class="mb-0 f-12">website Design & developed by <a href="https://technothinksup.com/">Technothinksup solution Pvt. Ltd </a> </p>
      </div>
    </div>
  </div>
</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo base_url(); ?>assets/js/jquery.js" ></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="<?php echo base_url(); ?>assets/js/popper.js" ></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js" ></script>

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



<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>

<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage", 2);
</script>
</body>
</html>
