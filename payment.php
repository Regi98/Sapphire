<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Sapphire | Payment</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
      <!-- Bootstrap CSS-->
      <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome CSS-->
      <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
      <!-- Custom Font Icons CSS-->
      <link rel="stylesheet" href="css/font.css">
      <link rel="stylesheet" type="text/css" href="css/spinners.css"/>
      <!-- Google fonts - Muli-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
      <!-- MY INCLUDES-->
      <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css"/>
      <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css"/>
      <link rel="stylesheet" type="text/css" href="css/spinners.css"/>
      <!-- theme stylesheet-->
      <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
      <!-- Custom stylesheet - for your changes-->
      <link rel="stylesheet" href="css/custom.css">
      <!-- Favicon-->
      <link rel="shortcut icon" href="img/favicon.ico">
      <!-- Tweaks for older IEs--><!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <body>
      <div class="preloader">
         <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Sapphire</p>
         </div>
      </div>
      <?php include 'includes/header.php'; ?>
      <div class="d-flex align-items-stretch">
         <!-- Sidebar Navigation-->
         <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
               <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
               <div class="title">
                  <h1 class="h5">Mikha Maun</h1>
                  <p>Economy Class</p>
               </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
               <li><a href="home.php"> <i class="fa fa-home"></i>Home </a></li>
               <li><a href="music/music.php"> <i class="fa fa-music"></i>Music </a></li>
               <li><a href="movies.php"> <i class="fa fa-play-circle"></i>Movies </a></li>
               <li class="active"><a href="series.php"> <i class="fa fa-play-circle"></i>Series </a></li>
               <!--<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                  </li>-->
               <li><a href="shop/index.php"> <i class="fa fa-shopping-bag"></i>Shop</a></li>
               <li><a href="music/games.php"> <i class="fa fa-gamepad"></i>Games</a></li>
               <li><a href="news.php"> <i class="fa fa-file"></i>News</a></li>
            </ul>
            <span class="heading">User</span>
            <ul class="list-unstyled">
               <li> <a href="#"> <i class="fa fa-money"></i>Payments</a></li>
               <li> <a href="#"> <i class="fa fa-user"></i>Profile</a></li>
            </ul>
         </nav>
         <!-- Sidebar Navigation end-->
         <div class="page-content">
            <!-- Page Header-->
            <div class="container-fluid">
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item active">Payment Method           </li>
               </ul>
            </div>
            <div class="row">
               <div class="col-md-9">
                  <div class="block">
                     <div class="title"><strong class="d-block">Payment Method</strong><span class="d-block">Please select a payment method.</span></div>
                     <div class="block-body">
                        <div class="form-group">
                           <select id="selectme" class="form-control">
                              <option value="paypal">PayPal</option>
                              <option value="visa">VISA</option>
                              <option value="master">Mastercard</option>
                           </select>
                        </div>
                        <!--<div class="form-group"> <br>  
                           <input type="submit" value="Signin" class="btn btn-primary">
                           </div>-->

                     <!-- DIV START -->
                     <div class= "visa box">
                        <div class="row padding-0">
                           <div class="col-sm-6">
                              <small class="help-block-none">Card Number</small>
                              <input type="text" class="form-control" maxlength="16">
                           </div>
                           <div class="col-sm-6">
                              <small class="help-block-none">Expiration date and security code</small>
                              <div class="row">
                              <div class="col-sm-4 padding-0">
                                <select id='month' class="form-control">
                                     <option value=''>--</option>
                                     <option value='1'>01</option>
                                     <option value='2'>02</option>
                                     <option value='3'>03</option>
                                     <option value='4'>04</option>
                                     <option value='5'>05</option>
                                     <option value='6'>06</option>
                                     <option value='7'>07</option>
                                     <option value='8'>08</option>
                                     <option value='9'>09</option>
                                     <option value='10'>10</option>
                                     <option value='11'>11</option>
                                     <option value='12'>12</option>
                                     </select> 
                              </div>
                              <div class="col-sm-4 padding-0">
                                <select id='year' class="form-control">
                                     <option value=''>--</option>
                                     <option value='18'>2018</option>
                                     <option value='19'>2019</option>
                                     <option value='20'>2020</option>
                                     <option value='21'>2021</option>
                                     <option value='22'>2022</option>
                                     <option value='23'>2023</option>
                                     <option value='24'>2024</option>
                                     <option value='25'>2025</option>
                                     <option value='26'>2026</option>
                                     <option value='27'>2027</option>
                                     <option value='28'>2028</option>
                                     <option value='29'>2029</option>
                                     <option value='30'>2030</option>
                                     <option value='31'>2031</option>
                                     <option value='32'>2032</option>
                                     <option value='33'>2033</option>
                                     <option value='34'>2034</option>
                                     <option value='35'>2035</option>
                                     <option value='36'>2036</option>
                                     <option value='37'>2037</option>
                                     <option value='38'>2038</option>
                                     <option value='39'>2039</option>
                                     <option value='40'>2040</option>
                                     <option value='41'>2041</option>
                                     <option value='42'>2042</option>
                                     <option value='43'>2043</option>
                                     </select> 
                              </div>
                              <div class="col-sm-4 padding-0">
                                <input type="text" class="form-control" maxlength="3">
                              </div>
                            </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
                                    </div>
            <div class="col-md-3">
               <div class="block-white">
                  <div class="title"><strong class="d-block">Accepted Currencies</strong><span class="d-block">We accept the following secure payment methods:</span></div>
                  <div class="block-body">
                     <img src="img/pay1.png" width=80px> &nbsp;
                     <img src="img/pay2.png" width=50px> &nbsp;
                     <img src="img/pay3.png" width=40px> &nbsp;
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
      <!-- JavaScript files-->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/popper.js/umd/popper.min.js"> </script>
      <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
      <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
      <script src="js/front.js"></script>
      <script src="vendor/slick/slick.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>