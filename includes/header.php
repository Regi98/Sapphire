    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="index.php" class="navbar-brand">
              <div class="brand-text brand-big visible"><strong class="text-primary">Sapphire</strong><strong>DTX</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">S</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-bars"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            <!-- Megamenu-->
            <div class="list-inline-item dropdown menu-large"><a href="#" data-toggle="dropdown" class="nav-link">Coins <i class="fa fa-ellipsis-v"></i></a>
              <div class="dropdown-menu megamenu">
                <!-- <div class="row">
                  <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Elements Heading</strong>
                    <ul class="list-unstyled mb-3">
                      <li><a href="#">Lorem ipsum dolor</a></li>
                      <li><a href="#">Sed ut perspiciatis</a></li>
                      <li><a href="#">Voluptatum deleniti</a></li>
                      <li><a href="#">At vero eos</a></li>
                      <li><a href="#">Consectetur adipiscing</a></li>
                      <li><a href="#">Duis aute irure</a></li>
                      <li><a href="#">Necessitatibus saepe</a></li>
                      <li><a href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Elements Heading</strong>
                    <ul class="list-unstyled mb-3">
                      <li><a href="#">Lorem ipsum dolor</a></li>
                      <li><a href="#">Sed ut perspiciatis</a></li>
                      <li><a href="#">Voluptatum deleniti</a></li>
                      <li><a href="#">At vero eos</a></li>
                      <li><a href="#">Consectetur adipiscing</a></li>
                      <li><a href="#">Duis aute irure</a></li>
                      <li><a href="#">Necessitatibus saepe</a></li>
                      <li><a href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Elements Heading</strong>
                    <ul class="list-unstyled mb-3">
                      <li><a href="#">Lorem ipsum dolor</a></li>
                      <li><a href="#">Sed ut perspiciatis</a></li>
                      <li><a href="#">Voluptatum deleniti</a></li>
                      <li><a href="#">At vero eos</a></li>
                      <li><a href="#">Consectetur adipiscing</a></li>
                      <li><a href="#">Duis aute irure</a></li>
                      <li><a href="#">Necessitatibus saepe</a></li>
                      <li><a href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                  <div class="col-lg-3 col-md-6"><strong class="text-uppercase">Elements Heading</strong>
                    <ul class="list-unstyled mb-3">
                      <li><a href="#">Lorem ipsum dolor</a></li>
                      <li><a href="#">Sed ut perspiciatis</a></li>
                      <li><a href="#">Voluptatum deleniti</a></li>
                      <li><a href="#">At vero eos</a></li>
                      <li><a href="#">Consectetur adipiscing</a></li>
                      <li><a href="#">Duis aute irure</a></li>
                      <li><a href="#">Necessitatibus saepe</a></li>
                      <li><a href="#">Maiores alias</a></li>
                    </ul>
                  </div>
                </div> -->
                <div class="row megamenu-buttons">
                  <div class="col-lg-3 col-md-4">
                    <a href="#" class="d-block megamenu-button-link bg-info">
                      <img src="images/gems.png" width="20px">&nbsp;&nbsp;&nbsp;<span>SPH/USD</span>
                      <strong>10,000</strong>
                    </a>
                  </div>
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-warning">
                  <img src="images/bitcoin.png" width="20px">&nbsp;&nbsp;&nbsp;<span>BTC/USD</span>
                      <strong>7,348.20</strong></a></div>
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-success">
                  <img src="images/bitcoincash.png" width="20px">&nbsp;&nbsp;&nbsp;<span>BCH/USD</span>
                      <strong>710.27</strong></a></div>
                  <div class="col-lg-3 col-md-4"><a href="#" class="d-block megamenu-button-link bg-danger">
                  <img src="images/ethereum.png" width="15px">&nbsp;&nbsp;&nbsp;<span>ETH/USD</span>
                      <strong>400.55</strong></a></div>
                </div>
              </div>
            </div>
            <!-- Megamenu end     -->
            <!-- Laad Balance          -->
            <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="E-Wallet"><span>&nbsp;</span><span class="pull-right"><img src="img/dollar.png" width="15px"> &nbsp; $<?php echo $num['ewallet']; ?></span></a>
            </div>
            <div class="list-inline-item logout">
              <a rel="nofollow" href="#" data-toggle="tooltip" title="Sapphire Crystals"> <span>&nbsp;</span><span class="pull-right"><img src="images/gems.png" width="15px"> &nbsp; <?php echo $num['tokens']; ?>&nbsp;&nbsp;</span></a>

            </div>
             &nbsp;
            <!-- Log out               -->
            <div class="list-inline-item logout">
              <a id="logout" href="logout.php" class="nav-link">Logout <i class="icon-logout"></i></a>
            </div>
          </div>
        </div>
      </nav>
    </header>