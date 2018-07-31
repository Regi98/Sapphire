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
<table class="table">
<tbody>
<thead>
    <center>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Listen to Your Playlist!&nbsp;&nbsp;<i class=" fa fa-music fa-sm"></i>
        </button>
    </center>
</thead>

<br>
<?php
$data = mysqli_query($con,"select cover_images.cover_image as mc_image, musics.title as mtitle, musics.genre as mgenre, musics.music_song as msong from cover_images join musics on musics.cover_image_id=cover_images.id join favorites on musics.id=favorites.musicId where favorites.userId='".$_SESSION['id']."'");
$num=mysqli_num_rows($data);
	if($num>0)
	{
while($row2 = mysqli_fetch_array($data)) {
?>
			<tr class="background">

			<td>
            <?php echo'
            <img src="../inflightapp/storage/app/public/cover_images/'.$row2['mc_image'].'" width="70" height="80">';
            ?>
            </td>
            
            <td>
			<div class="song_fave">
            <h8>
            <?php echo htmlentities($row2['mtitle']);?>&nbsp; - <?php echo htmlentities($row2['mgenre']);?>
            </h8>
            </div>
			</td>
                                                
            <td>
			<?php echo'
            <audio id="myAudio">
                <source src="../inflightapp/storage/app/public/music_songs/'.$row2['music_song'].'"> 
            </audio>'?>
            </td>

			<td class=" close-btn">
			<a href="music.php?del=<?php echo htmlentities($row['mpid']);?>" onClick="return confirm('Are you sure you want to delete?')" class="">
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
</section>
</div>

<!--MODAL for PLAYLIST-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">YOUR PLAYLIST</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!--start of playlist modal-->
      <div id="menu1" class="container tab-pane fade"><br>
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
                    <?php echo'
                    <img src="../inflightapp/storage/app/public/cover_images/'.$row2['mc_image'].'" width="70" height="80">';
                    ?>
                </td>
                
                <td>
					<div class="song_fave">
                    <h8><?php echo htmlentities($row2['mtitle']);?>&nbsp; - <?php echo htmlentities($row2['mgenre']);?></h8>
                    </div>
				</td>
                                                
                <td>
					<div class="product-name">
                    <?php echo'
                    <audio id="myAudio">
                    <source src="../inflightapp/storage/app/public/music_songs/'.$row2['music_song'].'"> 
                    </audio>'?>
                    <a href="#" class="btn btn-success btn-sm pushme2 with-color pull-right" style="margin-top:1px" role="button" aria-pressed="true" onClick="togglePlay()" data-title="'.$row3['title'].'">PLAY</a>
					</div>
                </td>
                                                
                <td class=" close-btn">
					<a href="music-wishlist.php?del=<?php echo htmlentities($row['mpid']);?>" onClick="return confirm('Are you sure you want to delete?')" class="">
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
                <!--end of playlist modal-->
      </div>
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
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/song.js"></script>
    <script src="assets/js/jquery-ui-1.8.21.custom.min.js"></script>
    <script src="assets/js/music-player.js"></script>
  </body>
</html>

<?php } ?>