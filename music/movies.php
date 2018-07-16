<?php include 'includes/connect.php';
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: index.php');
  }

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: index.php");
  }
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapphire | Movies</title>
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
                <li class="active"><a href="movies.php"> <i class="fa fa-play-circle"></i>Movies </a></li>
                <li><a href="series.php"> <i class="fa fa-play-circle"></i>Series </a></li>
                <!--<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>-->
                <li><a href="shop/index.php"> <i class="fa fa-shopping-bag"></i>Shop</a></li>
                <li><a href="games.php"> <i class="fa fa-gamepad"></i>Games</a></li>
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
            <li class="breadcrumb-item active">Movies            </li>
          </ul>
        </div>
 <h4 class="my-content">New Releases</h4>
      <div class="regular text-center">
         <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category = '3'");
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fas fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                            <a class="clean-link movie-label" href="#"" id="movie-title">'. $row['title'] .'</a>
                                </div>';
                                $dataid = $row['id'];
                
                }
            ?>
         <!-- <script type="text/javascript">
            $(document).ready(function(){
                $('').on('click', '', function(){
            
                });
            });
            </script> -->
      </div>
      <h4 class="my-content">Top Movies</h4>
      <div class="regular text-center">
         <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category = '1'");
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fas fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                            <a class="clean-link movie-label" href="#"" id="movie-title">'. $row['title'] .'</a>
                                </div>';
                                $dataid = $row['id'];
                
                }
            ?>
         <!-- <script type="text/javascript">
            $(document).ready(function(){
                $('').on('click', '', function(){
            
                });
            });
            </script> -->
      </div>
      <h4 class="my-content">Featured</h4>
      <div class="regular text-center">
         <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category = '2'");
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fas fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                            <a class="clean-link movie-label" href="#"" id="movie-title">'. $row['title'] .'</a>
                                </div>';
                                $dataid = $row['id'];
                
                }
            ?>
         <!-- <script type="text/javascript">
            $(document).ready(function(){
                $('').on('click', '', function(){
            
                });
            });
            </script> -->
      </div>
    </div>
        <footer class="footer text-center">
<img src="images/logo.png" width="70%">
        </footer>
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