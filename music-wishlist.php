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
mysqli_query($con,"insert into favorites(userId,musicId) values('".$_SESSION['id']."','$mid')");
echo "<script>alert('Music added in Favorites');</script>";
header('location:music-wishlist.php');

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
            <li class="breadcrumb-item active">Playlist            </li>
          </ul>
        </div>
<div class="container-fluid">
<div class="body-content outer-top-bd">
			<div class="container">
				<div class="my-wishlist-page inner-bottom-sm">
					<div class="row">
						<div class="col-md-12 my-wishlist">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
                                        <center>
                                            <h4 style="font-family: Century Gothic">Playlist&nbsp;&nbsp;<i class="fa fa-music fa-sm"></i></h4>
                                            </center>
										</tr>
									</thead>
									<tbody>
										<?php
$data = mysqli_query($con,"select cover_images.cover_image as mc_image, musics.title as mtitle, musics.genre as mgenre, musics.music_song as msong from cover_images join musics on musics.cover_image_id=cover_images.id join favorites on musics.id=favorites.musicId where favorites.userId='".$_SESSION['id']."'");
$num=mysqli_num_rows($data);
	if($num>0)
	{
while($row2 = mysqli_fetch_array($data)) {
?>
											<tr class="background">
												<td><?php
                                                    echo'<img src="../inflightapp/storage/app/public/cover_images/'.$row2['mc_image'].'" width="80" height="80">';
                                                    ?>
												</td>
                                                <td>
													<div class="song_fave">
                                                    <h8><?php echo htmlentities($row2['mtitle']);?>&nbsp; - <?php echo htmlentities($row2['mgenre']);?></h8>
                                                    </div>
												</td>
												<td>
													<div class="product-name">
														<?php
                                                    echo'<audio id="myAudio">
                                                        <source src="../inflightapp/storage/app/public/music_songs/'.$row2['music_song'].'"> 
                                                         </audio>'?>
                                                            <button style="margin-top:1px" class="btn btn-dark btn-sm fa fa-play pull-right" onclick="playAudio()"></button>
                                                            <button style="margin-top:1px" class="btn btn-dark btn-sm fa fa-pause pull-right" onclick="pauseAudio()"></button>
													</div>
                                                </td>
												<td class=" close-btn">
													<a href="music-wishlist.php?del=<?php echo htmlentities($row['mid']);?>" onClick="return confirm('Are you sure you want to delete?')"
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
    <script type="text/javascript">
      var x= document.getElementById("myAudio");

      function playAudio() {
      x.play();
      }

      function pauseAudio() {
      x.pause();
      }
      $(".music-song").on("click", function() {
        var title = $(this).data('title');
       document.getElementById(title).play();
      });
    </script>
  </body>
</html>

<?php } ?>