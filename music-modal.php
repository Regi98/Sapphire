<?php
session_start();
error_reporting(0);
include('includes/config.php'); 
require('includes/mp3file.class.php');
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
// header('location:music.php');

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
    <link rel="stylesheet" href="css/music.css">
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
            <li class="breadcrumb-item active">Music           </li>
          </ul>
        </div>
<!--ALBUMS/TABS-->
  <ul class="nav nav-tabs" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">ALBUMS</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">TRACKS</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">PLAYLIST</a>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="tabs-1" role="tabpanel"><br>
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

<!--MODAL-->
<?php
$data2 = mysqli_query($con,"select * from albums
join artists on artists.id=albums.artist_id
join cover_images on albums.cover_image_id=cover_images.id
where albums.id = $hi");
while($row2 = mysqli_fetch_array($data2)) {  
echo '
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog modal-lg">
<!-- Modal content-->
<div class="modal-content">
 <div class="modal-body">
                <i class="fa fa-times pull-right" data-dismiss="modal"></i>
            <div class="row">
                <div class="col-6 col-sm-4 col-md-4" style="margin:auto;"><br>
                    <div class="snip1205">
<img  src="../inflightapp/storage/app/public/cover_images/'.$row2['cover_image'].'" class="stretchy">
</div><br>
</div>
                </div>
            <div class="row">
            <div class="col-12 col-sm-8 col-md-12" style="text-align: center;">
                <h5 id="album_name"><strong>'.$row2['album_name'] .'</strong></h5>
                <h6 id="artist_name">Album by '.$row2['artist_name'] .'</h6>
                <p>'.$row2['release_date'] .'</p>
                <p>'.$row2['description'] .'</p>
            <center>
            <audio src="" controls controlsList="nodownload" autostart="0" autostart="false" preload ="none"  id="audioPlayer">
        Sorry, your browser doesnt support html5!
    </audio>
    </center>
    </div>
            </div><br><br>';}?>
<?php
$data3= mysqli_query($con,"select * from musics
where musics.album_id = $hi");
while($row3 = mysqli_fetch_array($data3)) {  
    $music = $row3['music_song'];
    $mp3file = new MP3File($music);//http://www.npr.org/rss/podcast.php?id=510282
    $duration2 = $mp3file->getDuration();//(slower) for VBR (or CBR)
    $song = MP3File::formatTime($duration2);
echo '
 <table class="canvas col-md-12">
      <tr>
        <td class="list" valign="middle">
          <section class="list">
          <ul id="playlist">
        <li class="licss" style="margin-bottom:-30px;"><a href="../inflightapp/storage/app/public/music_songs/'.$row3['music_song'].'" </a>'.$row3['title'].' ~
        <p class="song-duration">'.$song.'</p>
        </li>
    </ul>
             <a class="btn btn-outline-info btn-sm pull-right" style="margin-top:-30px;" data-toggle="tooltip" data-placement="right" title="Favorites" href="music.php?mid='.$row3['id'].'&&action=favorites">
										<i class="fa fa-plus fa-xs"></i>
									</a></div>
            </section>
        </td>
      </tr>
    </table>';}?>
    </div>
</div>
    </div>
    </div>
<!--tracks tabs-->
<div class="tab-pane" id="tabs-2" role="tabpanel"><br>
<div class="container-fluid trackscss" style="overflow-x:auto;">
<table class="table">
<tbody>
<center>
<h8>All Songs</h8>
</center>
<br>
<tr class="musicheader">
      <th>TITLE</th>
      <th>DURATION</th>
      <th>ARTIST</th>
      <th>ALBUM</th>
      <th>GENRE</th>
      <th>STATUS</th>
      <th>FAVORITE</th>
</tr>
<?php
$data3 = mysqli_query($con,"select musics.music_song as song, musics.title as title, albums.album_name as album_name, artists.artist_name as artist_name, musics.id as music_id, musics.genre as genre from musics join albums on album_id=albums.id join artists on albums.artist_id=artists.id");
	if($num>0)
	{
while($row3 = mysqli_fetch_array($data3)) {
$num=mysqli_num_rows($data3);
 $music = $row3['song'];
 $mp3file = new MP3File($music);//http://www.npr.org/rss/podcast.php?id=510282
 $duration2 = $mp3file->getDuration();//(slower) for VBR (or CBR)
 $song = MP3File::formatTime($duration2);
echo'
            <tr class="playlistcss">
            <td>
            '.$row3['title'].'
			</td>
            <td>
            <div class="song-duration">'.$song.'</div> 
			</td>
            <td>
            '.$row3['artist_name'].'
            </td>
            <td>
            '.$row3['album_name'].'
            </td>
            <td>
            '.$row3['genre'].'
			</td>'
            ?>
            <?php echo'
            <td>
            <div class="play-wrap">
            <audio src="../inflightapp/storage/app/public/music_songs/'.$row3['song'].'" class="music" autostart="0" autostart="false" preload ="none"  ></audio>
            <i class="btn btn-outline-info btn-sm text-center fa fa-play fa-xs play"></i>
            </td>
            <td>
            <a class="btn btn-outline-info btn-sm text-center" data-toggle="tooltip" data-placement="right" title="Favorites" href="music.php?mid='.$row3['music_id'].'&&action=favorites">
										<i class="fa fa-plus fa-xs"></i>
                                    </a>
            </td>
            </div>'?>
            </td>
			</tr>
            <?php } } else{ ?>
			<tr>
			<td style="font-size: 18px; font-weight:bold ">No Songs Uploaded</td>
            </tr>
            <?php } ?>
            
			</tbody>
			</table>
			</div>
            </div>
<!--playlist tabs-->
<div class="tab-pane" id="tabs-3" role="tabpanel"><br>
<div class="container-fluid trackscss" style="overflow-x:auto;">
<table class="table">
<tbody>
<center>
<h8>My Own Playlist</h8>
</center>
<br>
<tr class="musicheader">
      <th>TITLE</th>
      <th>DURATION</th>
      <th>ARTIST</th>
      <th>ALBUM</th>
      <th>GENRE</th>
      <th>STATUS</th>
      <th>DELETE</th>
</tr>
<?php
$data4 = mysqli_query($con,"select albums.album_name as alname, artists.artist_name as aname, cover_images.cover_image as mc_image, musics.title as mtitle, musics.genre as mgenre, musics.music_song as msong from cover_images join musics on musics.cover_image_id=cover_images.id left join favorites on musics.id=favorites.musicId join albums on albums.id=musics.album_id join artists on artists.id=albums.artist_id where favorites.userId='".$_SESSION['id']."'");
	if($num>0)
	{
while($row4 = mysqli_fetch_array($data4)) {
$num=mysqli_num_rows($data4);
$music = $row4['msong'];
$mp3file = new MP3File($music);//http://www.npr.org/rss/podcast.php?id=510282
$duration2 = $mp3file->getDuration();//(slower) for VBR (or CBR)
$song = MP3File::formatTime($duration2);
echo'
			<tr class="playlistcss">
            <td>
            '.$row4['mtitle'].'
			</td>
            <td>
            <div class="song-duration">'.$song.'</div> <!--time-->
			</td>
            <td>
            '.$row4['aname'].'
            </td>
            <td>
            '.$row4['alname'].'
            </td>
            <td>
            '.$row4['mgenre'].'
			</td>                            
            <td>'
            ?>
			<?php echo'
            <div class="play-wrap">
            <audio src="../inflightapp/storage/app/public/music_songs/'.$row4['msong'].'" class="music" autostart="0" autostart="false" preload ="none" ></audio>
            <i class="btn btn-outline-info btn-sm text-center fa fa-play fa-xs play"></i>
            </div>'?>
            </td>
			<td class=" close-btn">
			<?php echo'<a class="btn btn-outline-info btn-sm text-center" data-toggle="tooltip" data-placement="right" title="Favorites" href="music.php?del='.$row4['favorites_id'].'&&action=del"><i class="fa fa-times fa-xs"></i>
			</a>'?>
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
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/front.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="js/custom.js"></script>
        <script type="text/javascript">
      $(window).on('load',function(){
        $('#myModal').modal('show');
      }
                  );
      function goBack(){
        window.location.href = "music.php";
      }
      $(".music-song").on("click", function() {
        var title = $(this).data('title');
       document.getElementById(title).play();
      });
    </script>
    <script>
        // loads the audio player
        audioPlayer();
    </script>
  </body>
</html>


<?php } ?>
