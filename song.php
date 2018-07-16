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
                <li class="active"><a href="music.php"> <i class="fa fa-music"></i>Music </a></li>
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
                <li><a href="music/games.php"> <i class="fa fa-gamepad"></i>Games</a></li>
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
            <li class="breadcrumb-item active">Music         </li>
          </ul>
        </div>
<div class="container-fluid">
<h4 class="my-content">New Album Release</h4>
      <div class="regular text-center">
         <div class="snip1205">
                        <img  src="images/music_albums/adel.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link movie-label" href="#">ADELE 25</a>-->
                        </div>
                        <div class="snip1205">
                            <img  src="images/music_albums/jonas.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link movie-label" href="#">Game of Thrones - Season 1 (7 Episodes)</a>-->
                        </div>
                        <div class="snip1205">
                            <img  src="images/music_albums/bavenue.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link  movie-label" href="#">Episode 3</a>-->
                        </div>
                        <div class="snip1205">
                                <img  src="images/music_albums/bmars.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <!--<a class="clean-link movie-label" href="#">Episode 4</a>-->
                        </div>
                            <div class="snip1205">
                                <img  src="images/music_albums/charlie.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <!--<a class="clean-link movie-label" href="#">Episode 5</a>-->
                        </div>
      </div><br>
      <h4 class="my-content">Top 5 Albums of the Month</h4>
      <div class="regular text-center">
        <div class="snip1205">
                        <img  src="images/music_albums/coldplay.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link movie-label" href="#">ADELE 25</a>-->
                        </div>
                        <div class="snip1205">
                            <img  src="images/music_albums/divide.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link movie-label" href="#">Game of Thrones - Season 1 (7 Episodes)</a>-->
                        </div>
                        <div class="snip1205">
                            <img  src="images/music_albums/dualipa.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link  movie-label" href="#">Episode 3</a>-->
                        </div>
                        <div class="snip1205">
                                <img  src="images/music_albums/imagine.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <!--<a class="clean-link movie-label" href="#">Episode 4</a>-->
                        </div>
                            <div class="snip1205">
                                <img  src="images/music_albums/magic.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <!--<a class="clean-link movie-label" href="#">Episode 5</a>-->
                        </div>
      </div><br>
      <h4 class="my-content">Playlist</h4>
      <div class="regular text-center">
         <div class="snip1205">
                        <img  src="images/music_albums/malaya.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link movie-label" href="#">ADELE 25</a>-->
                        </div>
                        <div class="snip1205">
                            <img  src="images/music_albums/maroon5.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link movie-label" href="#">Game of Thrones - Season 1 (7 Episodes)</a>-->
                        </div>
                        <div class="snip1205">
                            <img  src="images/music_albums/paramore.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <!--<a class="clean-link  movie-label" href="#">Episode 3</a>-->
                        </div>
                        <div class="snip1205">
                                <img  src="images/music_albums/script.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <!--<a class="clean-link movie-label" href="#">Episode 4</a>-->
                        </div>
                            <div class="snip1205">
                                <img  src="images/music_albums/westlife.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <!--<a class="clean-link movie-label" href="#">Episode 5</a>-->
                        </div>
      </div><br>

      <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
        
          <!-- Modal content-->
          <div class="modal-content">
            <!--<div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Modal Header</h4>
            </div> -->

            <div class="modal-body">
                <i class="fa fa-times pull-right" data-dismiss="modal"></i>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4" style="margin:auto;"><br>
                    <div class="snip1205">
                            <img  src="images/music_albums/adel.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="autoplay" onclick="goFullscreen('player'); return false;" data-dismiss="modal"></i>
                    </div><br>
                  
                </div>
                </div>
            <div class="row">
            <div class="col-12 col-sm-8 col-md-12" style="text-align: center;">
                <h5><strong><br>Adele 25</strong></h5>
                <p><b>Artist:</b> Adele<br><b>Release Date:</b> July 8, 2018<br><b>Genre:</b> Pop, Folk</p>
            </div>
        </div>
            <div class="row">
                <p class="col-12 col-sm-8 col-md-12">

<div id="audioPanel">
  <ul id="playlist">
    <li data-mp3="songs/adele/Adele - I Miss You.mp3">I Miss Your &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - All I Ask.mp3">All I Ask &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - Hello.mp3">Hello &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - Love In The Dark.mp3">Love In The Dark &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - Million Years Ago.mp3M">Million Years Ago &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - Remedy.mp3">Remedy &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - River Lea.mp3">River Lea &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - Send My Love (To Your New Lover).mp3">Send My Love &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - Sweetest Devotion.mp3">Sweetest Devotion &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - Water Under the Bridge.mp3">Water Under the Bridge &nbsp;<button class="btAdd">+</button></li>
    <li data-mp3="songs/adele/Adele - When We Were Young.mp3">When We Were Young &nbsp;<button class="btAdd">+</button></li>
  </ul>
</div>
</p>
</div>
</div>
</div>
</div>
</div>
    <!-- /.container-fluid -->

        <footer class="footer text-center">
        <img src="images/logo.png" width="60%">
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
    <script src="js/song.js"></script>
  </body>
</html>