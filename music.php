<?php
session_start();
error_reporting(0);
include('includes/config.php'); 
$hi = $_GET['id'];
if(strlen($_SESSION['login'])==0){   ?>
              <script language="javascript">
                document.location="index.php";
              </script>

<?php } else{
      $id= $_SESSION['id'];
      $query = "SELECT * FROM shopusers WHERE id=$id";
      $results = mysqli_query($con, $query);
      $num=mysqli_fetch_assoc($results);
 ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapphire | Music</title>
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
    <link rel="stylesheet" href="css/song.css">
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
      <?php include 'includes/sidebar.php'; ?>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Music            </li>
          </ul>
        </div>
<div class="container-fluid">
  <?php
            $dataid;
                     $data = mysqli_query($con,"select *,albums.id as album_id from albums join cover_images on cover_image_id=cover_images.id and albums.id and albums.category='2'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">New Albums Releases</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['album_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingMusic(this);"></i>
                                            <a class="clean-link movie-label" href="#"" id="album_name">'. $row['album_name'] .'</a>
                                </div>';
                                $dataid = $row['id'];  
                }
                      }
                        
            ?> </div><br>
     <?php
            $dataid;
                     $data = mysqli_query($con,"select *,albums.id as album_id from albums join cover_images on cover_image_id=cover_images.id and albums.id and albums.category='1'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Top Albums of The Month</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['album_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingMusic(this);"></i>
                                            <a class="clean-link movie-label" href="#"" id="album_name">'. $row['album_name'] .'</a>
                                </div>';
                                $dataid = $row['id'];  
                }
                      }
                        
            ?> </div><br>
     <?php
            $dataid;
                     $data = mysqli_query($con,"select *,albums.id as album_id from albums join cover_images on cover_image_id=cover_images.id and albums.id and albums.category='3'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Popular Albums</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['album_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingMusic(this);"></i>
                                            <a class="clean-link movie-label" href="#"" id="album_name">'. $row['album_name'] .'</a>
                                </div>';
                                $dataid = $row['id'];  
                }
                      }
                        
            ?> </div><br>
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
    <script src="js/song.js"></script>
  </body>
</html>

<?php } ?>