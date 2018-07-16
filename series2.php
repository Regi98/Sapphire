<?php include 'includes/connect.php'; ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sapphire | Series</title>
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
                <li><a href="shop.php"> <i class="fa fa-shopping-bag"></i>Shop</a></li>
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
            <li class="breadcrumb-item active">Series           </li>
          </ul>
        </div>

<div class="container-fluid">

    <?php
        $data = mysqli_query($con,"SELECT * FROM series");
            while($row = mysqli_fetch_array($data)) {   
            echo '<div><h4 class="my-content">'. $row['title'] .'</h4>'; 

            
        ?>

    <div class="regular text-center">

     <?php
     $row_cover_image_id = $row['cover_image_id'];
            $data2 = mysqli_query($con,"SELECT * FROM `episodes` join series_cover_images WHERE $row_cover_image_id = series_cover_images.id");
                while($row2 = mysqli_fetch_array($data2)) {   
                 echo '           
                    <div class="snip1205">
                            <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                <i class="fa fa-caret-right" id="trigger" data-toggle="modal" data-target="#myModal"></i>
                                <a class="clean-link movie-label" href="#">Episode 6</a>
                    </div>
                ';
            }
        }
    ?>
    </div>
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
                <div class="col-xs-4 col-sm-4 col-md-4 text-center"><br>
                    <div class="snip1205">
                            <img  src="images/thumbnails/series2a.jpg" class="stretchy">
                                <i class="fa fa-caret-right" id="autoplay" onclick="goFullscreen('player'); return false;" data-dismiss="modal"></i>
                                <a class="clean-link" href="#">13 Reasons Why</a>
                    </div><br>
                    <button class="btn btn-default" id="inherit autoplay" onclick="goFullscreen('player'); return false"><i class="fa fa-play-circle"></i>&nbsp;Trailer</button>
                    <button class="btn btn-success" id="inherit autoplay" onclick="goFullscreen('player'); return false"><i class="fa fa-play-circle"></i>&nbsp;Movie</button>
                </div>
            <div class="col-xs-8 col-sm-8 col-md-8">
                <h4><strong>13 Reasons Why</strong></h4>
                <p>2018-04-25 &nbsp;&nbsp;&nbsp;<i class="fa fa-clock"></i>&nbsp;&nbsp;&nbsp; 2:45:02</p>
                <p>Teen | Drama | Mystery</p><br>
                <p>
                        Follows teenager Clay Jensen, in his quest to uncover the story behind his classmate and crush, Hannah, and her decision to end her life.
                </p>
            </div>
        </div>
        <div class="row"><br>
            <div class="col-md-4">
                <strong>Director:</strong> Brian Yorkey<br>
                <strong>Writer:</strong>  Joseph Incaprera<br>
                
                <strong>Classification:</strong> R18+ <br>
                <strong>Reference:</strong> IMDb <br>
            </div>
            <div class="col-md-8">
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
                    Brian d'Arcy James<br>
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