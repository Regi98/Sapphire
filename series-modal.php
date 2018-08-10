<?php include 'includes/connect.php';
$hi = $_GET['id'];
$season_number = $_GET['season'];

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
    <title>Sapphire | Series</title>
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
    <link rel="stylesheet" href="vendor/jquery/jquery-confirm.css">

    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="css/myfont.css">
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
                <li><a href="movies.php"> <i class="fa fa-play"></i>Movies </a></li>
                <li class="active"><a href="series.php"> <i class="fa fa-play-circle"></i>Series </a></li>
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
        <div class="row">
          <ul class="col-6 col-sm-4 col-md-9 breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item active">Tv Series </li>
          </ul>
          
          <div class="col-6 col-sm-4 col-md-3 pull-right">
            <div class="form-group">
              <select id="maingenre" class="selectpicker form-control">
              <?php 
              echo '
                <option value="" disabled selected>Select Category</option>
                <option value="1">Action</option>
                <option value="2">Kids</option>
                <option value="3">Comedy</option>
                <option value="4">Drama</option>
                <option value="5">Horror</option>
                <option value="6">Romance</option>
                <option value="7">Sci-Fi &amp; Fantasy</option>
                <option value="8">Adventure</option>'
              ?>
              </select>
            </div>
          </div>
        </div>
        </div>
<div class="container-fluid">
           <?php
            $dataid;
                     $data = mysqli_query($con,"select *,series.id as series_id from series join series_cover_images on cover_image_id=series_cover_images.id where main_genre='1'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Action TV Shows</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '
                            <div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/series_cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['series_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingSeries(this);"></i>
                                </div>';
                                $dataid = $row['series_id'];
                
                }
                      }
                        
            ?> </div><br>
           <?php
            $dataid;
                     $data = mysqli_query($con,"select *,series.id as series_id from series join series_cover_images on cover_image_id=series_cover_images.id where main_genre='8'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Adventure TV Shows</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '    
                               <div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/series_cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['series_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingSeries(this);"></i>
                                </div>';
                                $dataid = $row['series_id'];  
                }
                      }
                        
            ?> </div><br>
           <?php
            $dataid;
                     $data = mysqli_query($con,"select *,series.id as series_id from series join series_cover_images on cover_image_id=series_cover_images.id where main_genre='3'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Comedy TV Shows</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '
                            <div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/series_cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['series_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingSeries(this);"></i>
                                </div>';
                                $dataid = $row['series_id'];
                }
                      }
                        
            ?> </div><br>
  <?php
            $dataid;
                     $data = mysqli_query($con,"select *,series.id as series_id from series join series_cover_images on cover_image_id=series_cover_images.id where main_genre='4'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Drama TV Shows</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '
                            <div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/series_cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['series_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingSeries(this);"></i>
                                </div>';
                                $dataid = $row['series_id'];
                }
                      }
                        
            ?> </div><br>
         <?php
            $dataid;
                     $data = mysqli_query($con,"select *,series.id as series_id from series join series_cover_images on cover_image_id=series_cover_images.id where main_genre='5'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Horror TV Shows</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '   
                            <div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/series_cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['series_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingSeries(this);"></i>
                                </div>';
                                $dataid = $row['series_id'];
                }
                      }
                        
            ?> </div><br>
         <?php
            $dataid;
                     $data = mysqli_query($con,"select *,series.id as series_id from series join series_cover_images on cover_image_id=series_cover_images.id where main_genre='6'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Romantic TV Shows</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '      
                            <div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/series_cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['series_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingSeries(this);"></i>
                                </div>';
                                $dataid = $row['series_id'];
                }
                      }
                        
            ?> </div><br>
        <?php
            $dataid;
                     $data = mysqli_query($con,"select *,series.id as series_id from series join series_cover_images on cover_image_id=series_cover_images.id where main_genre='7'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Sci-Fi & Fantasy TV Shows</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '                         
                            <div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/series_cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['series_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingSeries(this);"></i>
                                </div>';
                                $dataid = $row['series_id'];               
                }
                      }
                        
            ?> </div><br>
         <?php
            $dataid;
                     $data = mysqli_query($con,"select *,series.id as series_id from series join series_cover_images on cover_image_id=series_cover_images.id where main_genre='2'");
                      $count = mysqli_num_rows($data);
                      if ($count != 0) {
                       echo '
                            <h8 class="my-content">Kids TV</h8>
                             <div class="regular text-center">';
                      while($row = mysqli_fetch_array($data)) { 
                            echo '                         
                            <div class="snip1205">
                                        <img src="../inflightapp/storage/app/public/series_cover_images/'. $row['cover_image'] .'" class="stretchy">
                                            <i class="fa fa-caret-right" id="trigger" class="identifyingClass" data-id="'. $row['series_id'] .'" data-toggle="modal" data-target="#myModal" onclick="goDoSomethingSeries(this);"></i>
                                </div>';
                                $dataid = $row['series_id'];               
                }
                      }
                        
            ?> </div><br>

<?php
$data2 = mysqli_query($con,"select * from series join series_cover_images on cover_image_id=series_cover_images.id left join genre_series on genre_series.series_id=series.id join genres on genres.id=genre_series.genre_id where series.id=$hi");
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
<div class="col-5 col-sm-4 col-md-4 text-center" style="margin:auto;">

<br>
<div class="snip1205">
<img src="../inflightapp/storage/app/public/series_cover_images/'.$row2['cover_image'].'" class="stretchy" height="100%" width="90%">
<a class="clean-link" href="#">'.$row2['title'] .'</a>
</div><br>
</div>
<div class="col-xs-8 col-sm-8 col-md-8"><br>
<h5><strong>'.$row2['title'] .'</strong></h5>
<p>'.$row2['release_date'] .'</p><p>
<p>'.$row2['content_rating'] .'</p><p>';
$data6 = mysqli_query($con,"select genres.name from series join series_cover_images on cover_image_id=series_cover_images.id left join genre_series on genre_series.series_id=series.id join genres on genres.id=genre_series.genre_id where series.id=$hi");
$count = mysqli_num_rows($data6);
$x = 0;
while($row6 = mysqli_fetch_array($data6)) {  
  if($x==$count-1){
    echo ''.$row6['name'] .'';
  } else {
    echo ''.$row6['name'] .' | ';
  }
$x = $x +1;
}
echo '
</p><p>
'.$row2['description'] .'
</p>
<p>
<strong>Cast:</strong> '.$row2['cast'] .'<br>
</p>
</div>
</div>       
</div>';?>
<div class="row">
  <div class="col-6 col-xs-4 col-md-4">
    <div class="form-group">
      <select id="season-number" class="selectpicker form-control">
<?php
$data4 = mysqli_query($con,"SELECT * FROM seasons where series_id=$hi");
while($row4 = mysqli_fetch_array($data4)) {  
echo '
        <option value="'.$row4['season_number'].'">Season '.$row4['season_number'].'</option>';
      }
      ?>
      </select>
    </div>
  </div>
</div>

   <table class="canvas">
      <tr>
        <td class="list" valign="middle">
          <section class="list">
<?php
$data5 = mysqli_query($con,"select * from series join seasons on series_id=series.id join episodes on season_id=seasons.id where episodes.series_id = $hi and seasons.season_number = $season_number");
while($row5 = mysqli_fetch_array($data5)) {  
echo '          
          <p>&nbsp 0'.$row5['episode_number'].'. 

          <a class="col-7 col-md-9"> 
            Episode '.$row5['episode_number'].'&nbsp - '.$row5['title'].' </a> '; ?>
            <!-- <button style="margin-top:1px; margin-left:3px;" data-toggle="tooltip" title="Play with Ads" class="btn btn-warning btn-sm pull-right series-video" data-title="<?php echo ''.$row5['title'].'';?>">Play with Ads</button>
            <button style="margin-top:1px" data-toggle="tooltip" title="Play without Ads" class="btn btn-success btn-sm pull-right series-video button-series-video" data-title="<?php echo ''.$row5['title'].'';?>">Play without Ads</button> -->
            <div style="margin-top:1px; margin-left:6px; margin-right:20px;" data-toggle="tooltip" title="Play with Ads" class="pull-right series-video" data-title="<?php echo ''.$row5['title'].'';?>"><img src="images/ads.png" width="33px"></div>
            <div style="margin-top:1px" data-toggle="tooltip" title="Play without Ads" class="pull-right button-series-video episode-title" data-id="<?php echo ''.$row5['id'].'';?>"  ><img src="images/playads.png" width="33px"></div>
            <hr color="grey">
            <video class="hide" src="../inflightapp/storage/app/public/series_videos/<?php echo ''.$row5['episode_video'].''; ?>" id="<?php echo ''.$row5['id'].'';?>" width="100%" controls controlsList="nodownload"></video>
            <video class="video_player hide series" src="../inflightapp/storage/app/public/series_videos/<?php echo ''.$row5['episode_video'].''; ?>" id="<?php echo ''.$row5['title'].''; ?>" width="100%" controls controlsList="nodownload" 
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
          <?php }}  ?>
                </section>
        </td>
      </tr>
    </table>
</div>
</div>  
</div>
    </div>
<footer class="footer text-center">

        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/jquery/jquery-confirm.js"></script>
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
        window.location.href = "series.php";
      }

      $(".series-video").on("click", function() {
        var title = $(this).data('title');
        var element = document.getElementById(title);
        if (element.mozRequestFullScreen) {
          element.mozRequestFullScreen();
        }
        else if (element.webkitRequestFullScreen) {
          element.webkitRequestFullScreen();
        }
        initAdsFor(title);
        document.getElementById(title).play();
      });
        
      //ON PLAY BUTTON
        $('.button-series-video').on("click", function(){
          var episodeid = $(this).data('id');
          var pelement = document.getElementById(episodeid);
           $.ajax({
									type: "POST",
									url: "check-series.php",
									data: {episodeid:episodeid},
									dataType: "text",
									success: function(data) {
                    
                      if(data == '1'){
                        if (pelement.mozRequestFullScreen) {
          pelement.mozRequestFullScreen();
        }
        else if (pelement.webkitRequestFullScreen) {
          pelement.webkitRequestFullScreen();
        }
        document.getElementById(pelement).play();
                      }
                        else {
                          var episodetitle = $('.series-video').data('title');
            $.confirm({
              title: 'Purchase episode?',
              content: 'You are about to buy ' + episodetitle + '.' ,
              theme: 'supervan',
              buttons: {
                  confirm: function () {
                    $.alert('Proceeding to payments page..');
                    window.location.href = "paymentmethod.php?id=" + episodeid;
                  },
                  cancel: function () {
                      $.alert('Okay. Good things take time!');
                  }
              }
          });
                           
                          
                  }
                },
									error: function(err) {
									console.log(err);
									
									}
								});
          });
    </script>
  </body>
</html>