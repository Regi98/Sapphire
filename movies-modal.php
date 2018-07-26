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
            <h6>Welcome Aboard,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']);?></h1>
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
            <li class="breadcrumb-item active">Movies            </li>
          </ul>
        </div>
<div class="container">
         <?php
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category = '3'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h8 class="my-content">New Releases</h8>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                </div>';
                
                }
              }
            ?>
      </div><br>
         <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category = '2'");
                    $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h8 class="my-content">Top Movies</h8>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>

                                </div>';
                                $dataid = $row['id'];
                
                }
              }
            ?>
      </div><br>
         <?php
            $dataid;
                    $data = mysqli_query($con,"SELECT * FROM movies WHERE category = '1'");
                    $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '<h8 class="my-content">Featured</h8>
                             <div class="regular text-center">';
                        while($row = mysqli_fetch_array($data)) { 
                            echo '<div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomething(this);"></i>
                                </div>';
                                $dataid = $row['id'];
                
                }
              }
            ?>
      </div>

    <?php
$data2 = mysqli_query($con,"SELECT * FROM movies WHERE id = $hi ");
while($row2 = mysqli_fetch_array($data2)) {  
echo '
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">

<div class="modal-body">
        <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
<div class="row">
<div class="col-sm-4 col-md-4 text-center">

<br>
<div class="snip1205">
<img  src="../inflightapp/storage/app/public/cover_images/'.$row2['cover_image'].'" class="stretchy">
<a class="clean-link movie-title" data-id="'.$row2['title'] .'" href="#">'.$row2['title'] .'</a>
</div><br>'; ?>
    <button class="btn btn-info btn-sm col-md-12" onclick="goFullscreen('player'); return false;"id="inherit autoplay goFullscreen" >
      <i class="fa fa-play-circle">
      </i>&nbsp;Play with Ads
    </button>
<?php echo '
    <button class="btn btn-success btn-sm col-md-12 button-movie-id" id="inherit autoplay">
      <i class="fa fa-play-circle">
      </i>&nbsp;Play without Ads
    </button>
    
</div>
<div class="col-xs-8 col-sm-8 col-md-8"><br>
<h5><strong>'.$row2['title'] .'</strong></h5>
<p>'.$row2['release_date'] .'&nbsp;&nbsp;&nbsp;<i class="fa fa-clock"></i>&nbsp;&nbsp;&nbsp;'.$row2['running_time'] .'</p><p>';
$data4 = mysqli_query($con,"select genres.name from movies join genre_movie on genre_movie.movie_id=movies.id join genres on genres.id=genre_movie.genre_id where movies.id=$hi");
$count = mysqli_num_rows($data4);
$x = 0;
while($row4 = mysqli_fetch_array($data4)) {  
  if($x==$count-1){
    echo ''.$row4['name'] .'';
  } else {
    echo ''.$row4['name'] .' | ';
  }
$x = $x +1;
}
echo '
</p><p>
'.$row2['movie_description'] .'
</p>
<p>
<strong>Cast:</strong> '.$row2['cast'] .'<br>
<button class="btn btn-default">
<i class="fa fa-play-circle">
</i>&nbsp;Watch Trailer
</button>
</p>
</div>
</div>
<br>        
</div>
</div>
</div>
</div>'; ?>
    <video class="video_player hide" src="../inflightapp/storage/app/public/movie_videos/<?php echo ''.$row2['movie_video'].''; ?>" <?php } ?> id="player" width="100%" controls controlsList="nodownload"

ads = '{  
        "servers": 
          [
            {
              "apiAddress": "ads.php"
            }
          ],
        "schedule": 
          [
<?php
$data3 = mysqli_query($con,"SELECT * FROM ads");
while($row3 = mysqli_fetch_array($data3)) {  
                  echo '
            {
              "position": "'.$row3['roll'] .'",
              "startTime": "'.$row3['time'] .'"
            },'; 
} 
?>
                  
          ]
        }'> 
    </video>
    

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
    <script src="js/vastvideoplugin.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
        <script type="text/javascript">
      $(window).on('load',function(){
        $('#myModal').modal('show');
      }
                  );
      function goBack(){
        window.location.href = "movies.php";
      }
      
      function goFullscreen(id) {
        var element = document.getElementById('player');
        if (element.mozRequestFullScreen) {
          element.mozRequestFullScreen();
        }
        else if (element.webkitRequestFullScreen) {
          element.webkitRequestFullScreen();
        }
        document.getElementById(element).play();
        initAdsFor('player');
      }
/*      function goFullscreen(id) {
        var element = document.getElementById(id);
        if (element.mozRequestFullScreen) {
          element.mozRequestFullScreen();
        }
        else if (element.webkitRequestFullScreen) {
          element.webkitRequestFullScreen();
        }
        document.getElementById(element).play();
      } */
      //ON PLAY BUTTON
        $('.button-movie-id').on("click", function(){
        <?php 
        $userid=$num['id'];
        
        $results = mysqli_query($con,"SELECT * FROM mvownership WHERE user_id = $userid AND movie_id = $hi");
        $numResults = mysqli_num_rows($results);
          if($numResults == 0) { ?>
             var movieid = getUrlParameter('id');
             var movietitle = $('.movie-title').data('id');
             window.location.href = "payment-method.php?id=" + movieid + "&title=" + movietitle;
        <?php } else { ?>

        var element = document.getElementById('player');
        if (element.mozRequestFullScreen) {
          element.mozRequestFullScreen();
        }
        else if (element.webkitRequestFullScreen) {
          element.webkitRequestFullScreen();
        }
        document.getElementById(element).play();
        <?php }} ?>

             
         });
    </script>
  </body>
</html>