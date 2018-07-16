<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapphire | Series</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
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
                <li><a href="music.php"> <i class="fa fa-music"></i>Music </a></li>
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
                <li><a href="#"> <i class="fa fa-gamepad"></i>Games</a></li>
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
            <li class="breadcrumb-item active">Series           </li>
          </ul>
        </div>

                  
                <h4 class="my-content">TV Series</h4>
                <div class="regular text-center">
                        <div class="snip1205">
                            <img  src="images/thumbnails/series1a.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <a class="clean-link movie-label" href="#">13 Reasons Why - Season 1 (13 Episodes) </a>
                        </div>
                        <div class="snip1205">
                            <img  src="images/thumbnails/series1b.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <a class="clean-link movie-label" href="#">Game of Thrones - Season 1 (7 Episodes)</a>
                        </div>
                        <div class="snip1205">
                            <img  src="images/thumbnails/series2a.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <a class="clean-link  movie-label" href="#">Episode 3</a>
                        </div>
                        <div class="snip1205">
                                <img  src="images/thumbnails/series2a.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link movie-label" href="#">Episode 4</a>
                        </div>
                            <div class="snip1205">
                                <img  src="images/thumbnails/series2a.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link movie-label" href="#">Episode 5</a>
                        </div>
                        <div class="snip1205">
                                <img  src="images/thumbnails/series2a.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link movie-label" href="#">Episode 6</a>
                        </div>
                </div>
                <h4 class="my-content">Game of Thrones - Season 7 (7 Episodes)</h4>
                <div class="regular">
                        <div class="snip1205">
                                <img  src="images/thumbnails/series1b.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link" href="#">Episode 1</a>
                            </div>
                            <div class="snip1205">
                                <img  src="images/thumbnails/series2b.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link" href="#">Episode 2</a>
                            </div>
                            <div class="snip1205">
                                <img  src="images/thumbnails/series2b.jpg" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link" href="#">Episode 3</a>
                            </div>
                            <div class="snip1205">
                                    <img  src="images/thumbnails/series2b.jpg" class="stretchy">
                                        <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                        <a class="clean-link" href="#">Episode 4</a>
                            </div>
                                <div class="snip1205">
                                    <img  src="images/thumbnails/series2b.jpg" class="stretchy">
                                        <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                        <a class="clean-link" href="#">Episode 5</a>
                            </div>
                            <div class="snip1205">
                                    <img  src="images/thumbnails/series2b.jpg" class="stretchy">
                                        <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                        <a class="clean-link" href="#">Episode 6</a>
                            </div>
                </div>
                <h4 class="my-content">Vikings (10 Episodes)</h4>
                <div class="regular">
                        <div class="snip1205">
                                <img  src="images/thumbnails/series3a.png" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link" href="#">Episode 1</a>
                            </div>
                            <div class="snip1205">
                                <img  src="images/thumbnails/series3a.png" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link" href="#">Episode 2</a>
                            </div>
                            <div class="snip1205">
                                <img  src="images/thumbnails/series3a.png" class="stretchy">
                                    <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                    <a class="clean-link" href="#">Episode 3</a>
                            </div>
                            <div class="snip1205">
                                    <img  src="images/thumbnails/series3a.png" class="stretchy">
                                        <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                        <a class="clean-link" href="#">Episode 4</a>
                            </div>
                                <div class="snip1205">
                                    <img  src="images/thumbnails/series3a.png" class="stretchy">
                                        <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                        <a class="clean-link" href="#">Episode 5</a>
                            </div>
                            
                </div>
      
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
                            <img  src="images/thumbnails/series2a.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="autoplay" onclick="goFullscreen('player'); return false;" data-dismiss="modal"></i>
                                <a class="clean-link" href="#">13 Reasons Why</a>
                    </div><br>
                  
                </div>
                </div>
            <div class="row">
            <div class="col-12 col-sm-8 col-md-12" style="text-align: center;">
                <h6><strong><br>13 Reasons Why</strong></h6>
                <p>2018-04-25 &nbsp;&nbsp;&nbsp;<i class="fa fa-clock"></i>&nbsp;&nbsp; 2:45:02</p>
                <p>Teen | Drama | Mystery</p><br>
            </div>
        </div>
             <div class="row">
                <p class="col-12 col-md-12">
                        Follows teenager Clay Jensen, in his quest to uncover the story behind his classmate and crush, Hannah, and her decision to end her life.
                </p>
        </div>
        <div class="row"><br>
             <div class="col-12 col-md-8">
             <p>
             <strong>Cast:</strong>  
                    Dylan Minnette,
                    Katherine Langford,
                    Christian Navarro,
                    Alisha Boe,
                    Brandon Flynn,
                    Justin Prentice,
                    Miles Heizer,
                    Ross Butler,
                    Devin Druid,
                    Amy Hargreaves,
                    Derek Luke,
                    Kate Walsh,
                    Brian d'Arcy James<br></p>
                </div>
        </div>
        <div class="row"><br>
             <div class="col-6 col-md-6">

            </div>
            <div class="col-6 col-md-6">
            </div>

        </div>
              <br>
              
            </div>
          </div>
          
        </div>
      </div>
    <!-- /.container-fluid -->
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