<?php 

 if(isset($_Get['action'])){
		if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;
			}
		}
		}
	}
?>
<div class="main-header">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-4 logo-holder">
				<!-- ============================================================= LOGO ============================================================= -->
					<a href="index.php">
						<img src="assets/images/logo.png" width="350" height="55">
					</a>
					
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 top-search-holder" style="margin-top:7px;">
				<div class="search-area">
					<form name="search" method="post" action="search-result.php">
						<div class="control-group">

							<input class="search-field form-control-sm" placeholder="Search here..." name="product" required="required" />

							<button class="search-button" type="submit" name="search"></button>

						</div>
					</form>
				</div>
				<!-- /.search-area -->
				<!-- ============================================================= SEARCH AREA : END ============================================================= -->
			</div>
			<!-- /.top-search-holder -->
			<div class="top-bar animate-dropdown">
				<div class="container">
					<div class="header-top-inner">
						<div class="cnt-account">
							<ul class="list-unstyled">

							</ul>
						</div>
						<!-- /.cnt-account -->
					</div>
					<!-- /.header-top-inner -->
				</div>
				<!-- /.container -->
			</div>
			<!-- /.header-top -->
			<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">

				<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
				<?php
if(!empty($_SESSION['cart'])){
	?>
				<div class="dropdown dropdown-cart">
					<a href="#" class="lnk-cart" data-toggle="dropdown">
						<div class="items-cart-inner">
							<div class="total-price-basket">
								<span class="lbl">cart -</span>
								<span class="total-price">
									<span class="sign">$</span>
									<span class="value">
										<?php echo $_SESSION['tp']; ?>
									</span>
								</span>
							</div>
							<div class="basket">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<div class="basket-item-count">
								<span class="count">
									<?php echo $_SESSION['qnty'];?>
								</span>
							</div>

						</div>
					</a>
					<ul class="dropdown-menu">

						<?php
    $sql = "SELECT * FROM products WHERE id IN(";
			foreach($_SESSION['cart'] as $id => $value){
			$sql .=$id. ",";
			}
			$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
			$query = mysqli_query($con,$sql);
			$totalprice=0;
			$totalqunty=0;
			if(!empty($query)){
			while($row = mysqli_fetch_array($query)){
				$quantity=$_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $_SESSION['cart'][$row['id']]['quantity']*$row['product_price'];
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;

	?>


							<li>
								<div class="cart-item product-summary">
									<a style="text-decoration:none;" href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
										<div class="row">
											<div class="col-4">
												<div class="image">
													<img src="../../inflightapp/storage/app/public/product_images/<?php echo $row['product_image_1'];?>" width="30" height="35"
													    alt="">
												</div>
											</div>
											<div class="col-7">
												<h3 class="name">
													<?php echo $row['product_name']; ?>
												</h3>
												<div class="price">$
													<?php echo ($row['product_price']); ?>x
													<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>
												</div>
											</div>

										</div>
									</a>
								</div>
								<!-- /.cart-item -->

								<?php } }?>
								<div class="clearfix"></div>
								<hr>

								<div class="clearfix cart-total">
									<div>

										<span class="text">Total :</span>
										<span class='price'>$<?php echo $_SESSION['tp']; ?>
										</span>

									</div>

									<div class="clearfix"></div>

									<a href="my-cart.php" class="btn btn-upper btn-primary btn-block m-t-20 ml-auto">My Cart</a>
								</div>
								<!-- /.cart-total-->


							</li>
					</ul>
					<!-- /.dropdown-menu-->
				</div>
				<!-- /.dropdown-cart -->
				<?php } else { ?>
				<div class="dropdown dropdown-cart">
					<a href="#" class="lnk-cart" data-toggle="dropdown">
						<div class="items-cart-inner">
							<div class="total-price-basket">
								<span class="lbl">cart -</span>
								<span class="total-price">
									<span class="sign">$</span>
									<span class="value">00.00</span>
								</span>
							</div>
							<div class="basket">
								<i class="fa fa-shopping-cart"></i>
							</div>
							<div class="basket-item-count">
								<span class="count">0</span>
							</div>

						</div>
					</a>
					<ul class="dropdown-menu">




						<li>
							<div class="cart-item product-summary">
								<div class="row">
									<div class="col-xs-12">
										Your Shopping Cart is Empty.
									</div>


								</div>
							</div>
							<!-- /.cart-item -->


							<hr>

							<div class="clearfix cart-total">

								<div class="clearfix"></div>

								<a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20 ml-auto">Continue Shopping</a>
							</div>
							<!-- /.cart-total-->


						</li>
					</ul>
					<!-- /.dropdown-menu-->
				</div>
				<?php }?>




				<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
			</div>
			<!-- /.top-cart-row -->
		</div>
		<!-- /.row -->

	</div>
	<!-- /.container -->

</div>