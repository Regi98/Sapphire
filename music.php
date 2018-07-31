<?php
session_start();
error_reporting(0);
include('includes/config.php'); 
$hi = $_GET['id'];
$mid = $_GET['mid'];

if(isset($_GET['mid']) && $_GET['action']=="favorites" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
$mpid=intval($_GET['del']);
if(isset($_GET['del']))
{
$query=mysqli_query($con,"delete from favorites where id='$fid'");
}


if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
		$query=mysqli_query($con,"delete from favorites where musicId='$id'");
	}else{
		$sql_p="SELECT * FROM musics WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			$query=mysqli_query($con,"delete from favorites where musicId='$id'");
header('location:music.php');
}
		else{
			$message="Music ID is invalid";
		}
	}
}
mysqli_query($con,"insert into favorites(userId,musicId) values('".$_SESSION['id']."','$mid')");
echo "<script>alert('Music added in Favorites');</script>";
header('location:music.php');

}
}
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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">

    <!-- MY INCLUDES-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="css/spinners.css"/>
    <!--mp3 player with playlist-->
    <link href="assets/delete-this-css.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/normalise.css">
    <link rel="stylesheet" type="text/css" href="assets/css/delete-this-css.css">
    <link rel="stylesheet" type="text/css" href="assets/css/music-player.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
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

	<ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Albums</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Playlist</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div id="home" class="container tab-pane active"><br>
    <br>
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
  </div>

<!--playlist tabs-->
<div id="menu1" class="container tab-pane fade"><br>

 <!--<div class="sq-boxed">
    <div class="sq-player clearfix">
        <div class="sq-ms-player">
            <div class="image-thumb album-art-is-responsive">
                <img src="assets/data/cover1.png">
            </div>
            <div class="sq-music-details">
                <div class="artist"> </div>
                <p> @oziri emeka </p>
            </div>
            <p class="sq-song-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu velit dolor. Nulla facilisi. Donec at viverra tortor. Vestibulum quis quam ut nibh mattis viverra sit amet id orci. Nunc… </p>

            <div class="controls">
                <div class="col-md-12  col-xs-12">
                    <div class="tracker"></div>
                </div>

                <div class="the-volume-ctr"><i class="fa fa-volume-up"></i>
                    <div class="volume"></div>
                </div>
                <button class="volume-button"> <i class="fa fa-volume-up"></i></button>
                <button class="rew"> <i class="fa fa-backward"></i></button>
                <button class="play"> <i class="fa fa-play"></i></button>
                <button class="pause"> <i class="fa fa-pause"></i></button>
                <button class="fwd"> <i class="fa fa-forward"></i></button>
                <a class="download" href="#"><button> <i class="fa fa-download"></i></button></a>

            </div>

        </div>
        <div class="play-list clearfix">
            <button class="playlist-title"><i class="fa fa-play"></i> Ozir emeka : syco album</button>
            <ul class="playlist col-md-12">
                <li audiourl="assets/data/01.mp3" cover="assets/data/cover1.png" artist="Say yo love by wizkid">dera</li>
                <li audiourl="assets/data/02.mp3" cover="assets/data/cover2.jpg" artist="Wizkid ">Ma lo- wizkid ft tiwa savage</li>
                <li audiourl="assets/data/03.mp3" cover="assets/data/cover3.jpg" artist="druk - by oziri">druk - by oziri</li>
                <li audiourl="assets/data/04.mp3" cover="assets/data/cover4.jpg" artist="Bad by wizkid">Bad by wizkid </li>
                <li audiourl="assets/data/05.mp3" cover="assets/data/cover5.jpg" artist="Yemi Alade - Mr. Stamina">Yemi Alade - Mr. Stamina </li>
                <li audiourl="assets/data/06.mp3" cover="assets/data/cover6.jpg" artist="Yemi Alade - Bum Bum">Yemi Alade - Bum Bum</li>
                <li audiourl="assets/data/07.mp3" cover="assets/data/cover7.jpg" artist="Ronaldo- Ronaldo">Ronaldo- Ronaldo </li>


            </ul>
        </div>
    </div>
    </div>-->
<div class="container-fluid">
  <div class="sq-boxed">
    <div class="sq-player clearfix">
        <div class="sq-ms-player">
            <div class="image-thumb album-art-is-responsive">
                <img src="assets/data/cover1.png">
            </div>
            <div class="sq-music-details">
                <div class="artist"> </div>
                <p></p>
            </div>
            <p class="sq-song-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas eu velit dolor. Nulla facilisi. Donec at viverra tortor. Vestibulum quis quam ut nibh mattis viverra sit amet id orci. Nunc… </p>

            <div class="controls">
                <div class="col-md-12  col-xs-12">
                    <div class="tracker"></div>
                </div>

                <div class="the-volume-ctr"><i class="fa fa-volume-up"></i>
                    <div class="volume"></div>
                </div>
                <button class="volume-button"> <i class="fa fa-volume-up"></i></button>
                <button class="rew"> <i class="fa fa-backward"></i></button>
                <button class="play"> <i class="fa fa-play"></i></button>
                <button class="pause"> <i class="fa fa-pause"></i></button>
                <button class="fwd"> <i class="fa fa-forward"></i></button>
                <br>
                
<div class="body-content outer-top-bd">
			<div class="container">
				<div class="my-wishlist-page inner-bottom-sm">
					<div class="row">
						<div class="col-md-12 my-wishlist">
							<div class="table-responsive">
								<table class="table">
									<tbody>
								<?php
                $data = mysqli_query($con,"select cover_images.cover_image as mc_image, musics.title as mtitle, musics.genre as mgenre, musics.music_song as msong from cover_images join musics on musics.cover_image_id=cover_images.id join favorites on musics.id=favorites.musicId where favorites.userId='".$_SESSION['id']."'");
$num=mysqli_num_rows($data);
	if($num>0)
	{
while($row2 = mysqli_fetch_array($data)) {
?>
											<tr class="background">
												<td>
                          <?php
                               echo'<img src="../inflightapp/storage/app/public/cover_images/'.$row2['mc_image'].'" width="70" height="80">';
                          ?>
												</td>
                        <td>
													<div class="song_fave">
                            <h8><?php echo htmlentities($row2['mtitle']);?>&nbsp; - <?php echo htmlentities($row2['mgenre']);?></h8>
                                                    </div>
												</td>
												<td>
														<?php
                                                    echo'
                                                    <audio id="myAudio">
                                                        <source src="../inflightapp/storage/app/public/music_songs/'.$row2['music_song'].'"> 
                                                         </audio>'?>
                                                </td>
												<td class=" close-btn">
													<a href="music.php?del=<?php echo htmlentities($row['mpid']);?>" onClick="return confirm('Are you sure you want to delete?')"
													    class="">
														<i class="fa fa-times"></i>
													</a>
												</td>
											</tr>
											<?php } } else{ ?>
											<tr>
												<td style="font-size: 18px; font-weight:bold ">Your Playlist is Empty</td>

											</tr>
											<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<!-- /.row -->
				</div>
				<!-- /.sigin-in-->
			</div>
		</div>
		</section>
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
    <script src="assets/js/jquery-ui-1.8.21.custom.min.js"></script>
    <script src="assets/js/music-player.js"></script>
  </body>
</html>

<?php } ?>