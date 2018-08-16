<header class="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header-->
            <a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase">
                <strong class="text-primary">Sapphire</strong>
                <strong>DTX</strong>
              </div>
              <div class="brand-text brand-sm">
                <strong class="text-primary">S</strong><strong>D</strong>
              </div>
            </a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle">
            <i class="fa fa-bars"></i>
            </button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">  
            
            <!-- Tasks end-->
             <div class="list-inline-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="nav-link">Coins <i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu megamenu">
                <div class="row megamenu-buttons">
                  <div class="col-lg-3 col-md-4">
                    <a href="#" class="d-block megamenu-button-link bg-default">
                      <img src="../images/gems.png" width="20px">&nbsp;&nbsp;&nbsp;<span>SPH/USD</span>
                      <strong>10,000</strong>
                    </a>
                  </div>
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-default">
                  <img src="../images/bitcoin.png" width="20px">&nbsp;&nbsp;&nbsp;<span>BTC/USD</span>
                      <strong>7,348.20</strong></a></div>
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-default">
                  <img src="../images/bitcoincash.png" width="20px">&nbsp;&nbsp;&nbsp;<span>BCH/USD</span>
                      <strong>710.27</strong></a></div>
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-default">
                  <img src="../images/ethereum.png" width="15px">&nbsp;&nbsp;&nbsp;<span>ETH/USD</span>
                      <strong>400.55</strong></a></div>
                </div>
              </div>
            </div>
            <!-- Megamenu end     -->
          <!-- Laad Balance          -->
          <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="E-Wallet"><span>&nbsp;</span><span class="pull-right"><img src="../img/dollar.png" width="15px"> &nbsp; $<?php echo $num['ewallet']; ?></span></a>
            </div>
            <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="Sapphire Crystals"> <span>&nbsp;</span><span class="pull-right"><img src="../images/gems.png" width="20px"> &nbsp; <?php echo $num['tokens']; ?>&nbsp;&nbsp;</span></a>
            </div>
             &nbsp;
            <!-- Log out               -->
              <div class="list-inline-item logout"><a id="logout" href="logout.php" class="nav-link">Logout <i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="../img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h6>Welcome Aboard,<h6>
            <h1 class="h5"><?php echo htmlentities($_SESSION['name']);?></h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li><a href="../home.php"> <i class="fa fa-home"></i>Home </a></li>
                <li><a href="../music.php"> <i class="fa fa-music"></i>Music </a></li>
                <li><a href="../movies.php"> <i class="fa fa-play"></i>Movies </a></li>
                <li><a href="../series.php"> <i class="fa fa-play-circle"></i>Series </a></li>
                <!--<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Example dropdown </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                    <li><a href="#">Page</a></li>
                  </ul>
                </li>-->
                <li><a href="index.php"> <i class="fa fa-shopping-bag"></i>Shop</a></li>
                <li><a href="../games.php"> <i class="fa fa-gamepad"></i>Games</a></li>
                <li><a href="../news.php"> <i class="fa fa-file"></i>News</a></li>

        </ul><span class="heading">User</span>
        <ul class="list-unstyled">
          <li> <a href="../myfinance.php"> <i class="fa fa-money"></i>Payments</a></li>
          <li><a href="my-account.php"><i class="icon fa fa-user"></i>My Account</a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      

        <section>