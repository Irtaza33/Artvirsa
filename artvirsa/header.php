<?php include 'db/conn.php';

session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>ArtVirsa</title>
  
    <link rel="icon" type="image/x-icon" href="img/favicon.png">

    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">
  
    <!-- Main style sheet -->
    <link href="css/style.css" rel="stylesheet">    
    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <body> 
      
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
<style>
  *{font-size: 14px;}
.dropbtn {
  background-color: white;

}

.dropdown {
  position: relative;
  display: inline-block;

}

.dropdown-content {
  float:left ;
  display: none;
  position: absolute;

 min-width: 200px;
  text-align: left;
  background-color: white;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-left: -100px;

}

.dropdown-content a {
  color: black;
  width: 100%;
  padding: 12px 16px;
  text-decoration: none;
 background-color: white;

}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

</style>

  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top" style="height: 70px;padding:20px ;" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                
                <div class="aa-logo">
                  
                <a href="index.php">
                 <img src="img/logo.png" style="width: 160px;margin-top: -30px;" alt="logo img">
                </a>
                
              </div>
              
              </div>
              <div class="aa-header-top-right">
                
                <ul class="aa-head-top-nav-right ">

                <li ><img src="img/search.svg" style="width: 20px; cursor: pointer;" id="btn1">&nbsp&nbsp</li>
          
                
                  <li> <?php 
                    $cart_sql=mysqli_query($conn,"select * from cart where user_id='".$_SESSION['user_id']."' ");
                    $count=mysqli_num_rows($cart_sql);
                    ?>

               <div class="aa-cartbox">
                <a class="aa-cart-link" href="bag.php">
                    <img src="img/basket.svg" style="width: 21px;" alt="">&nbsp
                    
                    <span style="font-size: 13px;" ><?php  echo $count ?></span>  
                </a>
              </div>
            </li>
                 
                  <?php 
               
                  if($_SESSION['email'] == ''){
                  ?>                  
                  <li ><a href="registration.php"><img src="img/user.svg" style="width: 20px;" alt=""></a></li>
                  <?php }
                  else{ ?>
                
              
                    <li><div class="dropdown"  >
                    <a class="dropbtn"><img src="img/user.svg" style="width: 20px;" alt=""></a>
                    <div class="dropdown-content"><br>
                      <a href="myaccount.php?profile"><i class="fa fa-user" aria-hidden="true"></i> &nbsp My Account</a><br><br>
                      <a href="myaccount.php?address"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp Address</a><br><br>
                      <a href="myaccount.php?wishlist"><i class="fa fa-heart" aria-hidden="true"></i>&nbsp Wishlist</a><br><br>
                      <a href="myaccount.php?orders"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp Orders</a><br><br>
                      <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp Logout</a><br><br>

                    </div>
                  </div></li>
       
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->
<!-- 
    <form action="actions/search.php" method="post">
                    <div  class="input-group">
                    <input type="text" name="search"   id="" placeholder="Search here... ">
                    <button type="submit"  ><span class="fa fa-search"></span></button>
                    </div>
                  </form> -->
    


    <!-- start header bottom  -->
    <!-- <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          
          </div>
        </div>
      </div>
    </div> -->
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">


              <li><a href="index.php">Home</a></li>
              <li><a href="products.php">Shop</a></li>
              <?php 
              $article_group=mysqli_query($conn,"select * from article_group");
              while($row=mysqli_fetch_array($article_group)){ ?>
              <li>
              <a href="article_group.php?id=<?php echo $row[0] ?> "><?php echo $row[1] ?> <span class="caret"></span></a>
              
                <ul class="dropdown-menu"> 
                <?php 
              $cat=mysqli_query($conn,"select * from category where AG_id = '".$row[0]."'");
              while($row1=mysqli_fetch_array($cat)){ ?>
                  
                  <li style="width: 200px;">
                    <a href="category.php?id=<?php echo $row1[0] ?>"><?php echo $row1[2] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu" style="width: 200px;" >
                     <?php 
                       $sub_cat=mysqli_query($conn,"select * from sub_category where sub_cat_cat_id = '".$row1[0]."'");
                       while($row2=mysqli_fetch_array($sub_cat)){ ?>
                  
                    <li><a href="sub_category.php?id=<?php echo $row2[0] ?>"><?php echo $row2[2] ?></a></li>
                      <?php } ?>                             
                    </ul>
                  </li>
                  <?php }?>
                
                
                </ul>
              </li>
              <?php }?>

      
              
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <script>
$(document).ready(function(){
  
    $("#show1").hide();

    $("#btn1").click(function() {
    $("#show1").toggle('fast');
    
  });

});
</script>
  <div class="row" id="show1">
    <div class="container-fluid">
      <div class="col-lg-1"></div>
      <div class="col-lg-11" style="margin-top: 8px;padding-bottom: 10px;" >
      <form action="actions/search.php" method="post">
                    <div  class=""  >
                    <input type="text" name="search"  style="height: 50px;width: 90%;"   id="" placeholder="Search here... ">&nbsp
                    <button type="submit" class="btn btn-success" style="height: 50px;background-color: #700f1a;border-color: #700f1a;border-radius: 0;margin-top: -5px;" ><span class="fa fa-search"></span></button>
                    </div>
                  </form>
                  
      </div>
      

    </div>
  </div>


  <!-- / menu -->