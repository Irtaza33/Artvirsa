<script>
    $(document).ready(function(){
  $('.customer-logos').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    arrows: false,
    dots: false,
    pauseOnHover: true,
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 400,
      settings: {
        slidesToShow: 2
      }
    }]
  });
});
  </script>


  <!-- Client Brand -->
  <section id="aa-client-brand"  style="background-color: white;">
    
    <div class="container" >
  <section class="customer-logos slider">
  <?php 
            $sql=mysqli_query($conn,"select * from profolio_slider");
            while($row=mysqli_fetch_array($sql)){
            ?>  
    <div  class="slides" ><img src="img/portfolio/<?php echo $row[1] ?>"  style="width: 180px;"></div>
    <?php }?>
 
  </section>
</div>
  </section>
  <!-- / Client Brand -->

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3 style="font-size: 15px;"  >Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Our Products</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3 style="font-size: 15px;">Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                    <li><a href="myaccount.php?profile">My Account</a></li>
                      <li><a href="myaccount.php?address">Address</a></li>
                      <li><a href="myaccount.php?orders">My Orders</a></li>
                   
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3 style="font-size: 15px;">Useful Links</h3>
                    <ul class="aa-footer-nav">
                     
                      <li><a href="myaccount.php?wishlist">Wishlist</a></li>
                      <li><a href="bag.php">Shopping Bag</a></li>
                      <li><a href="checkout.php">Checkout</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3 style="font-size: 15px;" >Contact Us</h3>
                    <address>
                      <p style="font-size: 12px;" >Office 101, First Floor, Faisal House, M-1, Modern Colony, Manghopir Road, SITE, Karachi, Pakistan.</p>
                      <p style="font-size: 12px;" > <span class="fa fa-phone"></span>0333-4476542</p>
                      <p style="font-size: 12px;" ><span class="fa fa-envelope"></span>info@artvirsa.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-instagram"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                      <a href="#"><span class="fa fa-linkedin"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>©Copyright 2022 Powered by <a href="https://novelops.com.pk/" target="blank" style="color:#700f1a" >NPL</a> . All Rights Reserved.</p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
        
         
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="js/sequence.js"></script>
  <script src="js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="js/custom.js"></script> 

  </body>
</html>