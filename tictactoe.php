<?php include 'includes/connect.php' ?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css"/>

    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/music-css/snip.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/tictac.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!--sapphireDTXcss-->
    <link rel="stylesheet" href="css/music-css/snip.css">
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Mark Stephen</h1>
            <p>Web Designer</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="index.php"> <i class="icon-home"></i>Home </a></li>
                <li><a href="music.php"> <i class="fa fa-music"></i>Music </a></li>
                <li><a href="#"> <i class="fa fa-bar-chart"></i>Movies </a></li>
                <li><a href="#"> <i class="icon-padnote"></i>Series </a></li>
                <li><a href="#"> <i class="icon-logout"></i>Shop</a></li>
                <li class="active"><a href="#"> <i class="icon-logout"></i>Games</a></li>
                <li><a href="#"> <i class="icon-logout"></i>News</a></li>

        </ul><span class="heading">User</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="icon-settings"></i>Payments</a></li>
          <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Profile</a></li>
          <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <!-- Page Header-->
        <!-- Breadcrumb-->
        <div class="container-fluid">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="games.php">Games</a></li>
            <li class="breadcrumb-item active">TIC-TAC-TOE          </li>
          </ul>
        </div>

                <table id="scoreboard" align="center">
                <tr>
                    <td> Player 1 </td>
                    <td width="50"> &nbsp; </td>
                    <td> Player 2 </td>
                </tr>
                <tr>
                    <td class="score" id="player1">
                    0 
                    </td>
                    <td> &nbsp; </td>
                    <td class="score" id="player2">
                    0 
                    </td>
                </tr>
                </table>


                <div id="placeholder"></div>

<center>
                <button onclick="restart()">
                Reset
                </button>
                <select onchange="restart(this.value)">
                <option value="2">
                    2 X 2
                </option>
                <option value="3" selected="">
                    3 X 3
                </option>
                <option value="4">
                    4 X 4
                </option>
                <option value="5">
                    5 X 5
                </option>
                <option value="6">
                    6 X 6
                </option>
                </select>
</center>
    <!-- /.container-fluid -->
    <!-- JQuery scripts -->
      </div>
    </div>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
              <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
              <p class="no-margin-bottom">2018 &copy; Design by Dornier Technology Inc.</a>.</p>
            </div>
          </div>
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
    <!-- Bootstrap Core scripts -->
    <script src="js/music-js/bootstrap.min.js"></script>
    <script src="js/music-js/mine.js"></script>
    <script src="js/tictac.js"></script>
  </body>
</html>