<?php include 'header.php' ?>
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="img/contactbanner.jpg" style="width: 100%;height: 300px;" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Contact</h2>
        <ol class="breadcrumb">
          <li><a href="index.php">Home</a></li>         
          <li class="active">Contact</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
<!-- start contact section -->
 <section id="aa-contact">
   <div class="container-fluid">
     <div class="row">
       <div class="col-md-12">
         <div class="aa-contact-area">
           <div class="aa-contact-top">
             <h2>We are waiting to assist you..</h2>
           </div>
           <!-- contact map -->
           <div class="aa-contact-map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.9366050984745!2d67.01786341447826!3d24.90014394979941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33ff0c30f00e5%3A0xecf536b915de793c!2sFJ%20Holdings%20(Faisal%20House)!5e0!3m2!1sen!2s!4v1622724216022!5m2!1sen!2s" style="width:100%;"  height="450"></iframe>
           </div>
        <?php 
        include 'db/conn.php';
        if(isset($_POST['btn_submit'])){
              $name=$_POST['name'];
              $email=$_POST['email'];
              $subject=$_POST['subject'];
              $phone=$_POST['number'];
              $mes=$_POST['message'];
              $sql=mysqli_query($conn,"insert into contact (your_name,email	,subject,	number	,message) VALUES('$name','$email','$subject','$phone','$mes')");
              ?>
               <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                    <script>swal("Message Send!", "Successfully ❤️️");

                    setTimeout(function(){
                          window.location.href = 'contact.php';
                      }, 800);
                      


                    </script>
              <?php
        } ?>


           <!-- Contact address -->
           <div class="aa-contact-address">
             <div class="row">
               <div class="col-md-8">
                 <div class="aa-contact-address-left">
                   <form class="comments-form contact-form" method="post" action="">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" name="name" placeholder="Your Name" required class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="email" name="email" placeholder="Email" required class="form-control">
                        </div>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="text" placeholder="Subject" name="subject" required class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">                        
                          <input type="number" placeholder="Phone Number" name="number" required class="form-control">
                        </div>
                      </div>
                    </div>                  
                     
                    <div class="form-group">                        
                      <textarea class="form-control" rows="3" style="width: 100%;" name="message" placeholder="Message"></textarea>
                    </div>
                    <button class="btn btn-success Hbtn" id="redBtn" name="btn_submit">Send</button>
                  </form>
                 </div>
               </div>
               <div class="col-md-4">
                 <div class="aa-contact-address-right">
                   <address>
                     <h2>ArtVirsa.com</h2>
                     <p><span class="fa fa-home"></span>Office 101, First Floor, Faisal House, M-1, Modern Colony, Manghopir Road, SITE, Karachi, Pakistan.</p>
                     <p><span class="fa fa-phone"></span>0333-4476542</p>
                     <p><span class="fa fa-envelope"></span>Email: info@artvirsa.com</p>
                   </address>
                 </div>
                 <style>
                    #redBtn{
          height: 60px;
          width: 300px;
          border-radius: 0;
          padding: 18px;
        }
        .Hbtn{
                background-color: #700f1a;
                border-color: #700f1a;
            }
            .Hbtn:hover{
                background-color: white;
                color: #700f1a;
                border-color:#700f1a ;
            }
                 </style>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

<?php include 'footer.php' ?>