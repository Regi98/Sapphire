<nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h6>Welcome Aboard,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']);?></h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus-->
        <span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="home.php"> <i class="fa fa-home"></i>Home </a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'music' ? ' active' : '' ?>"><a href="music/music.php?action=music"> <i class="fa fa-music"></i>Music </a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'movies' ? ' active' : '' ?>"><a href="movies.php?action=movies"> <i class="fa fa-play-circle"></i>Movies </a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'series' ? ' active' : '' ?>"><a href="series.php?action=series"> <i class="fa fa-play-circle"></i>Series </a></li>
                <!--<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>-->
                <li><a href="shop/index.php"> <i class="fa fa-shopping-bag"></i>Shop</a></li>
                <li><a href="music/games.php"> <i class="fa fa-gamepad"></i>Games</a></li>
                <li class="<?= isset($_GET['action']) && $_GET['action'] == 'news' ? ' active' : '' ?>"><a href="news.php?action=news"> <i class="fa fa-file"></i>News</a></li>

        </ul><span class="heading">User</span>
        <ul class="list-unstyled">
          <li> <a href="#"> <i class="fa fa-money"></i>Payments</a></li>
          <li> <a href="#"> <i class="fa fa-user"></i>Profile</a></li>
        </ul>
      </nav>