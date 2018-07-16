<?php 
include 'connect.php';
ob_start("ob_gzhandler"); 
$hi = $_GET['id'];?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAPPHIRE - Movies
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- icons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Bootstrap Core CSS file -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="node_modules/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="node_modules/slick/slick-theme.css"/>
    <!-- Override CSS file - add your own CSS rules -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!-- Conditional comment containing JS files for IE6 - 8 -->
    <!--[if lt IE 9]>
<script src="assets/js/html5.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
  </head>
  <body>
    <div id="introLoader" class="introloader">
      <div class="spinner">
        <div class="spinner-inner">
        </div>
      </div>
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
<i class="fas fa-times pull-right" onclick="goBack();"></i>
<div class="row">
<div class="col-xs-4 col-sm-4 col-md-4 text-center">
<br>
<div class="snip1205">
<img  src="../inflightapp/storage/app/public/cover_images/'.$row2['cover_image'].'" class="stretchy">
<i class="fas fa-caret-right" id="autoplay" onclick="goFullscreen();"></i>
<a class="clean-link" href="#">'.$row2['title'] .'</a>
</div><br>'; ?>
    <button class="btn btn-default" id="inherit autoplay" onclick="goFullscreen('player'); return false">
      <i class="fas fa-play-circle">
      </i>&nbsp;Trailer
    </button>
    <button class="btn btn-success" id="inherit autoplay" onclick="goFullscreen('player'); return false">
      <i class="fas fa-play-circle">
      </i>&nbsp;Movie
    </button>
    <?php echo '
</div>
<div class="col-xs-8 col-sm-8 col-md-8">
<h4><strong></strong></h4>
<p>'.$row2['release_date'] .'&nbsp;&nbsp;&nbsp;<i class="fas fa-clock"></i>&nbsp;&nbsp;&nbsp;'.$row2['running_time'] .'</p>
<p>Action | Adventure | Fantasy</p><br>
<p>
'.$row2['movie_description'] .'
</p>
</div>
</div>
<div class="row"><br>
<div class="col-md-4">
</div>
<div class="col-md-8">
<strong>Cast:</strong> '.$row2['cast'] .'<br>
</div>
</div>
<br>        
</div>
</div>
</div>
</div>'; ?>
    <video class="video_player hide" src="../inflightapp/storage/app/public/movie_videos/<?php echo ''.$row2['movie_video'].''; ?>" id="player" width="100%" controls controlsList="nodownload"
           ads = '{  "servers": [
                  {
                  "apiAddress": "vod/testads1.xml"
                  }
                  ],
                  "schedule": [
                  {
                  "position": "pre-roll"
                  },
                  {
                  "position": "mid-roll",
                  "startTime": "00:00:10"
                  },
                  {
                  "position": "mid-roll",
                  "startTime": "00:00:17"
                  },
                  {
                  "position": "post-roll"
                  }
                  ]
                  }'>
    </video>
    <?php
/*
echo '<video autoplay muted loop id="myVideo">
<source src="../inflightapp/storage/app/public/movie_videos/'.$row2['movie_video'].'" type="video/mp4">
Your browser does not support HTML5 video.
</video>'; */
}
?>
    <!-- /.container-fluid -->
    <!-- JQuery scripts -->
    <script src="assets/js/jquery-1.11.2.min.js">
    </script>
    <script type="text/javascript" src="node_modules/jquery-migrate/dist/jquery-migrate.min.js">
    </script>
    <script src="assets/js/blurbox.js">
    </script>
    <script type="text/javascript" src="node_modules/slick/slick.min.js">
    </script>
    <script src="assets/js/vastvideoplugin.js">
    </script>
    <!-- Bootstrap Core scripts -->
    <script src="assets/js/bootstrap.min.js">
    </script>
    <script src="assets/js/mine.js">
    </script>
    <script type="text/javascript">
      $(window).on('load',function(){
        $('#myModal').modal('show');
      }
                  );
      function goBack(){
        window.location.href = "movies.php";
      }
      initAdsFor('player');
      function goFullscreen(id) {
        var element = document.getElementById(id);
        if (element.mozRequestFullScreen) {
          element.mozRequestFullScreen();
        }
        else if (element.webkitRequestFullScreen) {
          element.webkitRequestFullScreen();
        }
        document.getElementById('player').play();
      }
    </script>
  </body>
</html>
