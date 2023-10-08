
<?php 
session_start();
include '../../db/conn.php';
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['btn_submit'])){
    
  $name=$_POST['email'];
  $pass=$_POST['password'];

  $sql=mysqli_query($conn,"select * from users where email='$name' AND password='$pass' AND type='1'" );
  $result=mysqli_fetch_array($sql);
   $status = $result[3];
   $_SESSION['id']=$result[0];
   $_SESSION['email1']=$result[1];
  $password=$result[2];

  if($status == 1){
    echo "<script>window.location.href='../index.php'</script>";
  }
  else{
    echo "<script>alert('Incorrect Password !!!')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>ArtVirsa Admin</title>
  <!-- MDB icon -->
  <link rel="icon" href="../../img/favicon.png" type="image/x-icon" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/bootstrap-login-form.min.css" />
</head>

<body>
  <!-- Start your project here-->
  <style>
    .gradient-custom {
      /* fallback for old browsers */
      /* background: #6a11cb; */

      /* Chrome 10-25, Safari 5.1-6 */
      /* background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1)); */

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background-image: url("img/9Q2fOG.jpg");
      background-repeat: none;
      background-size: cover; 
    }
  </style>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase"><img src="../../img/logo1.png" style="width: 200px;" alt=""></h2>
              <form action="" method="post" >
                <div class="form-outline form-white mb-4">
                  <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" required />
                  <label class="form-label" for="typeEmailX">Email</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg"  required/>
                  <label class="form-label" for="typePasswordX">Password</label>
                </div>


                <button class="btn btn-outline-light btn-lg px-5" name="btn_submit" type="submit">Login</button>
                </form>
                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                 
                </div>

              </div>

              

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End your project here-->

  <!-- MDB -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>

</html>