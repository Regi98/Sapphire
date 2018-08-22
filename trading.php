<?php
session_start();
include('includes/config.php'); 
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
      <title>Sapphire | Payment Method</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="all,follow">
      <!-- Bootstrap CSS-->
      <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
      <!-- Font Awesome CSS-->
      <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
      <!-- Bootstrap CSS-->
      <link rel="stylesheet" href="vendor/jquery/jquery-confirm.css">
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
                  <h6>Welcome Aboard,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']); ?></h1>
               </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
               <li class="active"><a href="home.php"> <i class="fa fa-home"></i>Home </a></li>
               <li><a href="music.php"> <i class="fa fa-music"></i>Music </a></li>
               <li><a href="movies.php"> <i class="fa fa-play"></i>Movies </a></li>
               <li><a href="series.php"> <i class="fa fa-play-circle"></i>Series </a></li>
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
            </ul>
            <span class="heading">User</span>
            <ul class="list-unstyled">
               <li> <a href="#"> <i class="fa fa-money"></i>Payments</a></li>
               <li> <a href="#"> <i class="fa fa-user"></i>Profile</a></li>
            </ul>
         </nav>
         <!-- Sidebar Navigation end-->
         <div class="page-content">
         <div class="d-flex flex-row mt-2">
	<ul class="nav nav-tabs" role="navigation">
		<li class="nav-item">
			<a href="#lorem" data-toggle="tab" role="tab" aria-controls="lorem">Lorem</a>
		</li>
		<li class="nav-item">
			<a href="#ipsum" data-toggle="tab" role="tab" aria-controls="ipsum">Ipsum</a>
		</li>
		<li class="nav-item">
			<a href="#dolor" data-toggle="tab" role="tab" aria-controls="dolor">Dolor</a>
		</li>
		<li class="nav-item">
			<a href="#sit-amet" data-toggle="tab" role="tab" aria-controls="sit-amet">Sit Amet</a>
		</li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane fade show active" id="lorem" role="tabpanel">
			<h1>Lorem</h1>
			
			<p>Aenean sed lacus id mi scelerisque tristique. Nunc sed ex sed turpis fringilla aliquet in in neque. Praesent posuere, neque rhoncus sollicitudin fermentum, erat ligula volutpat dui, nec dapibus ligula lorem ac mauris. Etiam et leo venenatis purus pharetra dictum.</p>
			
			<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin tempor mi ut risus laoreet molestie. Duis augue risus, fringilla et nibh ac, convallis cursus purus. Suspendisse potenti. Praesent pretium eros eleifend posuere facilisis. Proin ut magna vitae nulla suscipit eleifend. Ut bibendum pulvinar sapien, vel tristique felis scelerisque et. Sed elementum sapien magna, placerat interdum lacus placerat ut. Integer varius, ligula bibendum laoreet sollicitudin, eros metus fringilla lectus, quis consequat nisl nibh ut nisi. Aenean dignissim, nibh ac fermentum condimentum, ante nisl rutrum sapien, at commodo eros sapien vulputate arcu. Fusce neque leo, blandit nec lectus eu, vestibulum commodo tellus. Aliquam sem libero, tristique at condimentum ac, luctus nec nulla.</p>
		</div>
		<div class="tab-pane fade" id="ipsum" role="tabpanel">
			<h1>Ipsum</h1>
			
			<p>Aenean pharetra risus quis placerat euismod. Praesent mattis lorem eget massa euismod sollicitudin. Donec porta nulla ut blandit vehicula. Mauris sagittis lorem nec mauris placerat, et molestie elit vehicula. Donec libero ex, condimentum et mi dapibus, euismod ornare ligula.</p>
			
			<p>In faucibus tempus ante, et tempor magna luctus id. Ut a maximus ipsum. Duis eu velit nec libero pretium pellentesque. Maecenas auctor hendrerit pulvinar. Donec sed tortor interdum, sodales elit vel, tempor turpis. In tristique vestibulum eros vel congue. Vivamus maximus posuere fringilla. Nullam in est commodo, tristique ligula eu, tincidunt enim. Duis iaculis sodales lectus vitae cursus.</p>
		</div>
		<div class="tab-pane fade" id="dolor" role="tabpanel">
			<h1>Dolor</h1>
			
			<p>Ut eget lectus tristique, tempus purus sit amet, porta augue. Mauris lobortis sem nec augue ultricies blandit. Nullam sed sem venenatis, pretium urna eget, scelerisque dolor. Morbi nec volutpat leo, quis faucibus tortor. Aenean vel rutrum mauris. Pellentesque lectus massa, tincidunt quis leo non, sodales sagittis nulla. Proin interdum est at nulla laoreet, pulvinar pretium nisl rutrum. In vel elit a risus rhoncus accumsan vulputate non sapien. Sed et rhoncus velit. Nunc commodo augue fermentum, hendrerit neque at, ullamcorper arcu. Nulla tincidunt orci a lectus efficitur elementum. Donec molestie urna vestibulum augue placerat faucibus. In vitae orci vel mauris cursus viverra ac sit amet nisl. Phasellus odio tortor, ullamcorper eget ullamcorper eget, molestie eget justo. Integer elementum purus eget arcu fermentum tincidunt. Nullam erat tellus, dictum sit amet nisi eu, rutrum fermentum odio.</p>
		</div>
		<div class="tab-pane fade" id="sit-amet" role="tabpanel">
			<h1>Sit Amet</h1>
			
			<p>Aliquam hendrerit nunc vitae nisi efficitur, eu porta sem aliquam. Aenean tincidunt mi sed mi sodales bibendum. Proin dolor ipsum, mollis venenatis velit eu, iaculis laoreet mi. Mauris eget egestas felis, sit amet finibus nunc. Aliquam non dui sit amet erat auctor mollis ac eget ante. Quisque at quam augue. Nulla dignissim, augue nec cursus consequat, mi nulla efficitur augue, vel fringilla turpis quam eu nunc. Quisque rutrum vehicula lacus sodales molestie. Mauris vel felis sit amet erat maximus cursus ut a velit. In hac habitasse platea dictumst. Vestibulum vel neque sit amet nisl finibus fermentum.</p>
		</div>
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
      <script src="vendor/jquery/jquery-confirm.js"></script>
      <script src="js/front.js"></script>
      
      <script src="vendor/slick/slick.min.js"></script>
      <script src="js/custom.js"></script>
      <script>

var card = new Card({
    form: 'form',
    container: '.card-wrapper',

    placeholders: {
        number: '**** **** **** ****',
        name: 'Jon Snow',
        expiry: '**/****',
        cvc: '***'
    }
});

$("#credits-submit").click(function() {
    $.confirm({
          title: 'Confirmation',
          content: 'Proceed with payment?',
          theme: 'supervan',
          buttons: {
              confirm: function () {
                $.alert('Payment success! Redirecting you to home page.');
                window.location.replace("home.php");
              },
              cancel: function () {
                  $.alert('You have cancelled your purchase!');
              }
          }
      });
});
</script>
   </body>
</html>
<?php } ?>