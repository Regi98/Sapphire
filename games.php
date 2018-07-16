<?php
session_start();
error_reporting(0);
include('includes/config.php'); 
if(strlen($_SESSION['login'])==0){   ?>
              <script language="javascript">
                document.location="index.php";
              </script>
<?php } else{ ?>  
<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapphire | Games</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">

    <!-- MY INCLUDES-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/spinners.css"/>

    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/music-css/style.default.css">
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
                <li><a href="music.php"> <i class="fa fa-music"></i>Music </a></li>
                <li><a href="movies.php"> <i class="fa fa-play-circle"></i>Movies </a></li>
                <li><a href="series.php"> <i class="fa fa-play-circle"></i>Series </a></li>
                <!--<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>-->
                <li><a href="shop/index.php"> <i class="fa fa-shopping-bag"></i>Shop</a></li>
                <li class="active"><a href="games.php"> <i class="fa fa-gamepad"></i>Games</a></li>
                <li><a href="news.php"> <i class="fa fa-file"></i>News</a></li>

        </ul><span class="heading">User</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="fa fa-money"></i>Payments</a></li>
          <li> <a href="#"> <i class="fa fa-user"></i>Profile</a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Games           </li>
          </ul>
        </div>
<div class="container-fluid">
<h4 class="my-content">Games</h4>
        <div class="row text-center text-lg-left">
        <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM games");
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="col-lg-3 col-md-4 col-sm-6 col-6 portfolio-item">
                                  <div class="card h-100">
                                        <img class="card-img-top" src="../inflightapp/storage/app/public/games_cover_images/'. $row['cover_image'] .'">
                                        <div class="card-body">
                                        <center>
                                        <a class="btn btn-default btn-sm" href="../inflightapp/storage/app/public/games_apks/'. $row['game_apk'] .'"">
                                        <i class="fa fa-download fa-2x"></i></a>
                                         </center>
                                </div>
                                </div>
                                </div>'; 
                                $dataid = $row['id'];
                }
            ?>

          
       
      <!-- /.row -->
      <div class="container">
        <div class="content-section-heading">
                <h4 class="mb-5">Embedded Games</h4>
                <div class="row text-center text-lg-left">
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                  <a href="tictactoe.php" class="btn btn-light buttons" role="button" tabindex="0" style="width: 100%; display: inline-block;">TIC-TAC-TOE</a>
                </div>
                 <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                  <a href="puzzle.php" class="btn btn-light buttons" role="button" tabindex="0" style="width: 100%; display: inline-block;">PUZZLE</a>
                </div>
                  <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                  <a href="jello.php" class="btn btn-light buttons" role="button" tabindex="0" style="width: 100%; display: inline-block;">EYE AND MEMORY</a>
                </div>
                <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                  <a href="connect.php" class="btn btn-light buttons" role="button" tabindex="0" style="width: 100%; display: inline-block;">CONNECT FOUR</a>
                </div>
                <div class="row text-center text-lg-left">
                  <img src="img/smart.gif" width="50%" height="90%">
                  <img src="img/mb.jpg" width="50%" height="90%">
                
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

<?php } ?>