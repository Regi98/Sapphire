<?php
session_start();
error_reporting(0);
include('includes/config.php'); 
if(strlen($_SESSION['login'])==0){   ?>
	<script language="javascript">
		document.location = "../index.php";
	</script>
	<?php } else{ ?>
	<?php include 'includes/connect.php';
include('includes/config.php');
if(isset($_POST['submitaddcart'])){
	$id=$_POST['productId'];
	$quantity=$_POST['quantity'];
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => $quantity, "price" => $row_p['product_price']);
			header('location:my-cart.php');
			exit();
		}else{
			$message="Product ID is invalid";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
}
$pid=intval($_GET['pid']);
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','$pid')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

}
}
if(isset($_POST['submit']))
{
	$rate=$_POST['rate'];
	$name=$_POST['name'];
	$summary=$_POST['summary'];
	$review=$_POST['review'];
	mysqli_query($con,"insert into productreviews(productId,rate,name,summary,review) values('$pid','$rate','$name','$summary','$review')");
	$host=$_SERVER['HTTP_HOST'];
	$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
	$location = basename($_SERVER['REQUEST_URI']);
	header("location:http://$host$uri/$location");
	exit();
}
$id= $_SESSION['id'];
      $query = "SELECT * FROM shopusers WHERE id=$id";
      $results = mysqli_query($con, $query);
      $num=mysqli_fetch_assoc($results);

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="keywords" content="MediaCenter, Template, eCommerce">
		<meta name="robots" content="all">
		<title>Product Details</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="assets/css/myfont.css">
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="assets/css/main.css">
		<link rel="stylesheet" href="assets/css/blue.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<!-- NAVBAR -->
		<link rel="stylesheet" href="distribution/vendor/bootstrap/css/bootstrap.min.css">
		<!-- Font Awesome CSS-->
		<link rel="stylesheet" href="distribution/vendor/font-awesome/css/font-awesome.min.css">
		<!-- Custom Font Icons CSS-->
		<link rel="stylesheet" href="distribution/css/font.css">
		<!-- theme stylesheet-->
		<link rel="stylesheet" href="distribution/css/style.default.css" id="theme-stylesheet">
		<!-- Custom stylesheet - for your changes-->
		<link rel="stylesheet" href="distribution/css/custom.css">
	</head>

	<body class="cnt-home">

		<?php include('includes/header.php');?>

		<header class="header-style-1">

			<!-- ============================================== TOP MENU ============================================== -->
			<?php include('includes/top-header.php');?>
			<!-- ============================================== TOP MENU : END ============================================== -->
			<?php include('includes/main-header.php');?>
			<!-- ============================================== NAVBAR ============================================== -->
			<?php include('includes/menu-bar.php');?>
			<!-- ============================================== NAVBAR : END ============================================== -->

		</header>

		<!-- ============================================== HEADER : END ============================================== -->
		<div class="breadcrumb">
			<div class="container">
				<div class="breadcrumb-inner">
					<?php
$ret=mysqli_query($con,"select product_categories.product_category_name as catname,product_sub_categories.product_sub_category_name as subcatname,products.product_name as pname from products join product_category_id on product_categories.id=products.product_category_id join product_sub_category_id on product_sub_categories.id=products.product_sub_category_id where products.id='$pid'");
while ($rw=mysqli_fetch_array($ret)) {

?>


						<ul class="list-inline list-unstyled">
							<li>
								<a href="index.php">Home</a>
							</li>
							<li>
								<?php echo htmlentities($rw['catname']);?>
								</a>
							</li>
							<li>
								<?php echo htmlentities($rw['subcatname']);?>
							</li>
							<li class='active'>
								<?php echo htmlentities($rw['pname']);?>
							</li>
						</ul>
						<?php }?>
				</div>
				<!-- /.breadcrumb-inner -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.breadcrumb -->
		<div class="body-content outer-top-xs">
			<div class='container'>
				<div class='row single-product outer-bottom-sm '>
					<!-- <div class='col-md-3 sidebar'>
								<div class="sidebar-module-container">
									<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
										<?php include('includes/side-menu.php');?>
									</div>
									<div class="sidebar-widget hot-deals wow fadeInUp">

										<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">
										</div>
									</div>
								</div>
							</div> -->
					<!-- /.sidebar -->
					<?php 
$ret=mysqli_query($con,"select * from products where id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>


					<div class='col-md-9'>
						<div class="row  wow fadeInUp">
							<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
								<div class="product-item-holder size-big single-product-gallery small-gallery">

									<div id="owl-single-product" class="carousel-images">

										<div class="single-product-gallery-item" id="slide1">
											<a data-lightbox="image-1" data-title="<?php echo htmlentities($row['product_name']);?>" href="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_1']);?>">
												<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_1']);?>"
												    width="370" height="325" />
											</a>
										</div>




										<div class="single-product-gallery-item" id="slide1">
											<a data-lightbox="image-1" data-title="<?php echo htmlentities($row['product_name']);?>" href="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_1']);?>">
												<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_1']);?>"
												    width="370" height="325" />
											</a>
										</div>
										<!-- /.single-product-gallery-item -->
										<?php if($row['product_image_2'] != 'noimage.jpg'){ ?>
										<div class="single-product-gallery-item" id="slide2">
											<a data-lightbox="image-1" data-title="Gallery" href="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_2']);?>">
												<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_2']);?>"
												/>
											</a>
										</div>
										<?php } ?>
										<!-- /.single-product-gallery-item -->
										<?php if($row['product_image_3'] != 'noimage.jpg'){ ?>
										<div class="single-product-gallery-item" id="slide3">
											<a data-lightbox="image-1" data-title="Gallery" href="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_3']);?>">
												<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_3']);?>"
												/>
											</a>
										</div>
										<?php } ?>
									</div>
									<!-- /.single-product-slider -->


									<div class="single-product-gallery-thumbs gallery-thumbs">

										<div id="owl-single-product-thumbnails">
											
											<div class="item">
												<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
													<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_1']);?>"/>
												</a>
											</div>
											<?php if($row['product_image_2'] != 'noimage.jpg'){ ?>
											<div class="item">
												<a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
													<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_2']);?>"/>
												</a>
											</div>
											<?php } ?>
											<?php if($row['product_image_3'] != 'noimage.jpg'){ ?>
											<div class="item">
												<a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
													<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_3']);?>"
 />
												</a>
											</div>
											<?php } ?>




										</div>
										<!-- /#owl-single-product-thumbnails -->



									</div>

								</div>
							</div>




							<div class='col-sm-6 col-md-7 product-info-block'>
								<div class="product-info">
									<?php echo htmlentities($row['product_company']);?>
									<br>
									<h7 class="name">
										<?php echo htmlentities($row['product_name']);?>
									</h7>
									<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pid'");
$num=mysqli_num_rows($rt);
{
?>
									<div class="rating-reviews m-t-10">
										<div class="row">
											<div class="col-sm-3">
												<div class="rating rateit-small"></div>
											</div>
											<div class="col-sm-8">
												<div class="reviews">
													<a href="#generalreview" class="lnk">(<?php echo htmlentities($num);?> Reviews)</a>
												</div>
											</div>
										</div>
										<!-- /.row -->
									</div>
									<!-- /.rating-reviews -->
									<?php } ?>
									<div class="price-container info-container m-t-10">
										<div class="row">
											<div class="col-sm-3">
												<div class="stock-box">
													<span class="label">List Price:</span>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="price-box">
													<span class="price-strike">$
														<?php echo htmlentities($row['product_price_before_discount']);?>.00
													</span>
												</div>
											</div>
										</div>
										<!-- /.row -->
										<div class="row">
											<div class="col-sm-3">
												<div class="stock-box">
													<span class="label">Price:</span>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="price-box">
													$<span class="label product-unit-price"><?php 
													$prod_price = $row['product_price'];
													echo htmlentities($prod_price);?>
													</span>.00
												</div>
											</div>
										</div>
										<!-- /.row -->
										<div class="row">
											<div class="col-sm-3">
												<div class="stock-box">
													<span class="label">Sapphires:</span>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="price-box">
													<span class="price-token"><?php echo htmlentities($row['product_price_token']);?>
													</span>
												</div>
											</div>
										</div>
										<!-- /.row -->
									</div>
									<div class="stock-container info-container m-t-10">
										<div class="row">
											<div class="col-sm-3">
												<div class="stock-box">
													<span class="label">Description: </span>
												</div>
											</div>
											<div class="col-sm-9">
												<div class="stock-box">
													<span class="product-description">
														<?php echo htmlentities($row['product_description']);?>
													</span>
												</div>
											</div>
										</div>
										<!-- /.row -->
									</div>

									<!-- 
											<div class="price-container info-container m-t-20">
												<div class="row">


													<div class="col-6 col-sm-6">
														<div class="price-box">
															<span class="price">$<?php echo htmlentities($row['product_price']);?>
															</span>
															<span class="price-strike">$<?php echo htmlentities($row['product_price_before_discount']);?>
															</span>
														</div>
													</div>




													<div class="col-6 col-sm-6">
														<div class="favorite-button m-t-10">
															<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
																<i class="fa fa-heart"></i>
															</a>

															</a>
														</div>
													</div>

												</div>
											</div>
											/.price-container -->



								</div>
								<!-- /.product-info -->
							</div>
							<!-- /.col-sm-3 -->
						</div>
						<!-- /.row -->

						<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

					</div>
					<div class='col-md-3 border border-secondary rounded border-side wow fadeInRight'>
						<div class="product-info">
							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-9">
										<div class="stock-box">
											<?php
														$instock = $row['product_in_stock'];
															if($instock == 0){ ?>
												<h5 class="text-danger stock font-weight-bold">Out of Stock.</h5>
												<?php
															} else { ?>
													<h5 class="text-success stock font-weight-bold">In Stock.</h5>
													<?php
															}
														?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="stock-box">
											<p>Ships from and sold by
												<?php echo htmlentities($row['product_company']);?>.</p>
										</div>
									</div>
								</div>
								<form role="form" class="cnt-form" name="add" method="post">
								<div class="quantity-container info-container">
									<div class="row">
										<input type="hidden" name="productId" value="<?php echo $row['id']; ?>" />
										<div class="col-4 col-sm-4">
											<h7 class="label">Qty:</h7>
										</div>

										<div class="col-7 col-sm-7">
											<div class="cart-quantity">
												<?php
												
																$instock = $row['product_in_stock'];
																	if($instock == 0){ ?>
													<span class="value">0</span>
													<?php
																	} else { ?>
														<select name="quantity" class="form-control form-control-sm border-secondary rounded qty-select">
															<option class="value" value="1" selected>1</option>
															<?php for($x=2; $x <= $instock; $x++){ ?>
															<option class="value" value="<?php echo $x; ?>">
																<?php echo $x; ?>
															</option>
															<?php } ?>
														</select>
														<?php } ?>
											</div>
										</div>
									</div>
									<!-- /.row -->
									<div class="row">
										<div class="col-12 col-md-12" style="margin-top:1em;">
											<h7 class="label">Ph Tax:</h7>
										</div>
										<div class="col-12 col-md-12" style="margin-top:1em;">
											<h7 class="label">Service Charge:</h7>
										</div>
									</div>
								</div>
								<!-- /.quantity-container -->
								<div class="quantity-container info-container">
									<div class="row">
										<div class="col-4 col-sm-4">
											<h7 class="label">Total:</h7>
										</div>

										<div class="col-7 col-sm-7">
											<div class="cart-quantity">
													$<span class="value cart-total"><?php echo htmlentities($prod_price);?></span>.00
											</div>
										</div>


									</div>
									<!-- /.row -->
								</div>
								<div class="row">
									<div class="col-12 col-sm-12">
										<?php
											if($instock != 0){?>
												<input type="submit" name="submitaddcart" value="ADD TO CART" class="btn btn-primary btn-sm">
										<?php } else {?>
												
										<?php } ?>
										<!-- <a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
											<i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a> -->
									</div>
								</div>
								<hr>
								</form>
								<div class="favorite-button m-t-10">
									<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="product-details.php?pid=<?php echo htmlentities($row['id'])?>&&action=wishlist">
										<i class="fa fa-heart"></i> &nbsp;&nbsp;Add to List
									</a>

									</a>
								</div>
							</div>
						</div>
					</div>

					<!-- /.col -->
					<div class="clearfix"></div>

					<div class="product-tabs inner-bottom-xs  wow fadeInUp ">
						<div class="row">
							<div class="col-sm-3 col-md-3">
								<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
									<li class="active">
										<a data-toggle="tab" href="#generalreview">LATEST REVIEW</a>
									</li>
									<li>
										<a data-toggle="tab" href="#review">ALL REVIEWS</a>
									</li>
								</ul>
								<!-- /.nav-tabs #product-tabs -->
							</div>
							<div class="col-sm-9 col-md-9">

								<div class="tab-content">

									<div id="generalreview" class="tab-pane in active">
										<h6>Ratings &amp; Reviews</h6>
													<?php 
														$qry=mysqli_query($con,"select * from productreviews where productId='$pid' order by reviewDate desc");
														$num_reviews = mysqli_num_rows($qry);
														$sum_rate = 0;
														while($rvw=mysqli_fetch_array($qry))
														{
															$sum_rate = $rvw['rate'] + $sum_rate;
														}
														$average_rate = $sum_rate / $num_reviews;
														$one_decimal_place_average = number_format($average_rate, 1);
													?>
										<div class="row">
											<div class="col-sm-1 col-md-3 text-center">
												<h1>
													<?php echo htmlentities($one_decimal_place_average); ?>
												</h1>
												<h6 class="text-secondary">out of 5</h6>
											</div>
											<div class="col-sm-1 col-md-4 text-center" style="margin-top:13px;">
												<?php
												$whole = floor($one_decimal_place_average);
													for($x=0;$x<=4;$x++){
														if($x<$whole){
															echo '<img  class="img-fluid" width="25px" height="25px" src="img/stars.png">';
														} else {
															if($whole !=$one_decimal_place_average  && $x == $whole){
																echo '<img  class="img-fluid" width="25px" height="25px" src="img/half-stars.png">';
															} else {
																echo '<img  class="img-fluid" width="25px" height="25px" src="img/no-stars.png">';
															}
														}
													}
												?>
													<br>
													<br>
													<h6 class="text-secondary">
														<?php echo htmlentities($num_reviews);?>&nbsp;
														<i class="fa fa-1x fa-user"></i>
													</h6>
													<br>
													<br>
											</div>
											<div class="col-sm-1 col-md-5 text-center" style="margin-top:-25px;">
												<canvas id="myChart" width="80%" height="35%"></canvas>
											</div>
										</div>
										<hr>
										<div class="product-reviews">
											<h4 class="title">Latest Review</h4>

											<?php $qry=mysqli_query($con,"select * from productreviews where productId='$pid' order by reviewDate desc limit 1");
														while($rvw=mysqli_fetch_array($qry))
														{
														?>

											<div class="reviews" style="">
												<div class="review">
													<?php
																			for($x=1;$x<=5;$x++){
																				if($x<=$rvw['rate']){
																					echo '<img height="15px" width="15px" src="img/star.png">';
																				} else {
																					echo '<img height="15px" width="15px" src="img/no-star.png">';
																				}
																			}
																		?>
														&nbsp;
														<span class="font-weight-bold">
															<?php echo htmlentities($rvw['summary']);?>
														</span>
														<div class="text pull-right">
															<?php echo htmlentities($rvw['reviewDate']);?>
														</div>
														<br>
														<h8>
															<span>
																by
																<?php echo htmlentities($rvw['name']);?>
															</span>
														</h8>
														<br>
														<br>
														<div class="text">
															<?php echo htmlentities($rvw['review']);?>
														</div>
												</div>

											</div>
											<hr>
											<br>
											<a class="btn btn-sm btn-warning text-white" data-toggle="tab" href="#review">Write your own review</a>
											<?php } ?>
											<!-- /.reviews -->
										</div>
									</div>
									<!-- /.tab-pane -->

									<div id="review" class="tab-pane">
										<div class="product-tab">
											<!-- /.product-reviews -->
											<form role="form" class="cnt-form" name="review" method="post">
												<div class="product-add-review">
													<h4 class="title">Write your own review</h4>
													<div class="review-table">
														<div class="table-responsive">
															<table class="table table-bordered">
																<thead>
																	<tr>
																		<th class="cell-label">&nbsp;</th>
																		<th>1 star</th>
																		<th>2 stars</th>
																		<th>3 stars</th>
																		<th>4 stars</th>
																		<th>5 stars</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="cell-label">Rate</td>
																		<td>
																			<input type="radio" name="rate" class="radio" value="1">
																		</td>
																		<td>
																			<input type="radio" name="rate" class="radio" value="2">
																		</td>
																		<td>
																			<input type="radio" name="rate" class="radio" value="3">
																		</td>
																		<td>
																			<input type="radio" name="rate" class="radio" value="4">
																		</td>
																		<td>
																			<input type="radio" name="rate" class="radio" value="5" required>
																		</td>
																	</tr>
																</tbody>
															</table>
															<!-- /.table .table-bordered -->
														</div>
														<!-- /.table-responsive -->
													</div>
													<!-- /.review-table -->

													<div class="review-form">
														<div class="form-container">


															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="exampleInputName">Your Name
																		</label>
																		<input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" value="<?php echo htmlentities($_SESSION['name']);?>"
																		    required="required" readonly>
																	</div>
																	<!-- /.form-group -->
																	<div class="form-group">
																		<label for="exampleInputSummary">Summary
																			<span class="astk">*</span>
																		</label>
																		<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="" name="summary" required="required">
																	</div>
																	<!-- /.form-group -->
																</div>

																<div class="col-md-6">
																	<div class="form-group">
																		<label for="exampleInputReview">Review
																			<span class="astk">*</span>
																		</label>

																		<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder="" name="review" required="required"></textarea>
																	</div>
																	<!-- /.form-group -->
																</div>
															</div>
															<!-- /.row -->

															<div class="action text-right">
																<button name="submit" class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
															</div>
															<!-- /.action -->

											</form>
											<!-- /.cnt-form -->
											</div>
											<!-- /.form-container -->
											</div>
											<!-- /.review-form -->

											</div>
											<!-- /.product-add-review -->
											<div class="product-reviews">
												<h4 class="title">Customer Reviews</h4>
												<hr>
												<?php $qry=mysqli_query($con,"select * from productreviews where productId='$pid' order by reviewDate desc");
														while($rvw=mysqli_fetch_array($qry))
														{
														?>

												<div class="reviews" style="">
													<div class="review">
														<?php
																			for($x=1;$x<=5;$x++){
																				if($x<=$rvw['rate']){
																					echo '<img height="20px" width="20px" src="img/star.png">';
																				} else {
																					echo '<img height="20px" width="20px" src="img/no-star.png">';
																				}
																			}
																		?>
															&nbsp;
															<span class="font-weight-bold">
																<?php echo htmlentities($rvw['summary']);?>
															</span>
															<div class="text pull-right">
																<?php echo htmlentities($rvw['reviewDate']);?>
															</div>
															<br>
															<h8>
																<span>
																	by
																	<?php echo htmlentities($rvw['name']);?>
																</span>
															</h8>
															<br>
															<br>
															<div class="text">
																<?php echo htmlentities($rvw['review']);?>
															</div>
													</div>

												</div>
												<hr>
												<br>
												<?php } ?>
												<!-- /.reviews -->
											</div>

										</div>
										<!-- /.product-tab -->
									</div>
									<!-- /.tab-pane -->



								</div>
								<!-- /.tab-content -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.product-tabs -->
				</div>



				<?php $cid=$row['product_category_id'];
			$subcid=$row['product_sub_category_id']; } ?>
				<!-- ============================================== UPSELL PRODUCTS ============================================== -->
				<section class="section featured-product wow fadeInUp" style="margin-top :-4em;">
					<h3 class="section-title">Related Products </h3>
					<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
				

						<?php 
$qry=mysqli_query($con,"select * from products where product_sub_category_id='$subcid' and product_category_id='$cid' and id != '$pid'");
while($rw=mysqli_fetch_array($qry))
{

			?>

				<div class="item item-carousel">
						<div class="col-md-12 col-12 wow fadeInUp">
							<!-- <div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image"> -->
							<div class="card">
								<div class="containerview">
								<img src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($rw['product_image_1']);?>" alt="" class="img-fluid" width="100%" height="100%">
								<div class="overlay"></div>
  								<div class="card-img-top button"><a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>"> VIEW PRODUCT </a></div>
								</div>
								<!-- </div>
														 /.image 


													</div>
												 /.product-image -->
								<div class="card-body">

									<div class="product-info text-left">
										<h3 class="name">
											<a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>">
												<?php echo htmlentities($rw['product_name']);?>
											</a>
										</h3>
										<div class="rating rateit-small"></div>
										<div class="description"></div>

										<div class="product-price">
											<span class="price">$
												<?php echo htmlentities($rw['product_price']);?>
											</span>
											<span class="price-before-discount">
												<strike>
													<small>$
														<?php echo htmlentities($rw['product_price_before_discount']);?>
													</small>
												</strike>
											</span>
											<span class="token_price pull-right">
												<img src="../images/gems.png" width="18" height="18">
												<?php echo htmlentities($rw['product_price_token']);?>
											</span>
										</div>
										<!-- /.product-price -->

									</div>
									<!-- /.product-info -->
								</div>
								<!-- /.cart -->
							</div>
							<!-- /.product -->

						</div>
					</div>

						<!-- /.item -->
						<?php } ?>


					</div>
					<!-- /.home-owl-carousel -->
				</section>
				<!-- /.section -->
				<section class="section featured-product wow fadeInUp" style="margin-top :-2em;">
					<h3 class="section-title">Sponsored Items </h3>
					<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
				

						<?php 
$qry=mysqli_query($con,"select * from products where product_sub_category_id='$subcid' and product_category_id='$cid' and id != '$pid'");
while($rw=mysqli_fetch_array($qry))
{

			?>

				<div class="item item-carousel">
						<div class="col-md-12 col-12 wow fadeInUp">
							<!-- <div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image"> -->
							<div class="card">
							<div class="containerview">
							<img src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($rw['product_image_1']);?>" alt="" class="img-fluid" width="100%" height="100%">
							<div class="overlay"></div>
  							<div class="card-img-top button"><a href="product-details.php?pid=<?php echo htmlentities($row['id']);?>"> VIEW PRODUCT </a></div>
							</div>
								<!-- </div>
														 /.image 


													</div>
												 /.product-image -->
								<div class="card-body">

									<div class="product-info text-left">
										<h3 class="name">
											<a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>">
												<?php echo htmlentities($rw['product_name']);?>
											</a>
										</h3>
										<div class="rating rateit-small"></div>
										<div class="description"></div>

										<div class="product-price">
											<span class="price">$
												<?php echo htmlentities($rw['product_price']);?>
											</span>
											<span class="price-before-discount">
												<strike>
													<small>$
														<?php echo htmlentities($rw['product_price_before_discount']);?>
													</small>
												</strike>
											</span>
											<span class="token_price pull-right">
												<img src="assets/images/payments/tokens.png" width="18" height="18">
												<?php echo htmlentities($rw['product_price_token']);?>
											</span>
										</div>
										<!-- /.product-price -->

									</div>
									<!-- /.product-info -->
								</div>
								<!-- /.cart -->
							</div>
							<!-- /.product -->

						</div>
					</div>

						<!-- /.item -->
						<?php } ?>


					</div>
					<!-- /.home-owl-carousel -->
				</section>
			</div>
		</div>
		</div>
		</section>
		<?php include('includes/footer.php');?>
		<script src="assets/js/jquery-1.11.1.min.js"></script>

		<script src="assets/js/bootstrap.min.js"></script>

		<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>

		<script src="assets/js/echo.min.js"></script>
		<script src="assets/js/jquery.easing-1.3.min.js"></script>
		<script src="assets/js/bootstrap-slider.min.js"></script>
		<script src="assets/js/jquery.rateit.min.js"></script>
		<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/scripts.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

		<!-- For demo purposes – can be removed on production -->

		<!-- <script src="switchstylesheet/switchstylesheet.js"></script> -->

		<script>
			// $(document).ready(function () {
			// 	$(".changecolor").switchstylesheet({
			// 		seperator: "color"
			// 	});
			// 	$('.show-theme-options').click(function () {
			// 		$(this).parent().toggleClass('open');
			// 		return false;
			// 	});
			// });

			// $(window).bind("load", function () {
			// 	$('.show-theme-options').delay(2000).trigger('click');
			// });
			var getUrlParameter = function getUrlParameter(sParam) {
				var sPageURL = decodeURIComponent(window.location.search.substring(1)),
					sURLVariables = sPageURL.split('&'),
					sParameterName,
					i;

				for (i = 0; i < sURLVariables.length; i++) {
					sParameterName = sURLVariables[i].split('=');

					if (sParameterName[0] === sParam) {
						return sParameterName[1] === undefined ? true : sParameterName[1];
					}
				}
			};
			var product_id = getUrlParameter('pid');
			$.ajax({
				type: "POST",
				url: "get-ratings.php",
				data: {
					productId: product_id
				},
				dataType: "JSON",
				success: function (data) {
					console.log(data);
					var one = new Array;
					var two = new Array;
					var three = new Array;
					var four = new Array;
					var five = new Array;
					for (let i = 0; i < data.length; i++) {
						var element = data[i];
						if (element == '1') {
							one.push("1");
							var one1 = one.length;
						} else if (element == '2') {
							two.push("2");
							var two2 = two.length;
						} else if (element == '3') {
							three.push("3");
							var three3 = three.length;
						} else if (element == '4') {
							four.push("4");
							var four4 = four.length;
						} else {
							five.push("5");
							var five5 = five.length;
						}
					}
					if (one == '') {
						var one1 = 0;
					} else if (two == '') {
						var two2 = 0;
					} else if (three == '') {
						var three3 = 0;
					} else if (four == '') {
						var four4 = 0;
					} else if (five == '') {
						var five5 = 0;
					} else {
						console.log('else');
					}
					var ratings = [five5, four4, three3, two2, one1];
					console.log(ratings);


					var ctx = document.getElementById("myChart").getContext('2d');
					var myChart = new Chart(ctx, {
						type: 'horizontalBar',
						data: {
							labels: ["5", "4", "3", "2", "1"],
							datasets: [{
								label: '# of Ratings',
								data: ratings,
								backgroundColor: [
									'rgba(0, 0, 255, 1)',
									'rgba(0, 0, 255, 0.6)',
									'#ff0000',
									'rgba(255, 0, 0, 0.6)',
									'rgba(255,255,0, 1)'
								],
								borderColor: [
									'rgba(0, 0, 255, 1)',
									'rgba(0, 0, 255, 0.6)',
									'#ff0000',
									'rgba(255, 0, 0, 0.6)',
									'rgba(255,255,0, 1)'
								],
								borderWidth: 1
							}]
						},
						options: {
							legend: {
								display: false
							},
							title: {
								display: false,
								text: 'Product Ratings',
								fontFamily: 'Century Gothic'
							},
							responsive: true,
							scales: {
							xAxes: [{
										gridLines: {
											color: "rgba(0, 0, 0, 0)",
										},
										ticks: {
											display: false
										}
									}],
							yAxes: [{
										gridLines: {
											color: "rgba(0, 0, 0, 0)",
										},
									}]
							}
						}
					});

				},
				error: function (err) {
					console.log('error' + err);

				}
			});
		$( ".qty-select" ).change(function() {
			var qty = $(this).val();
			var price = $('.product-unit-price').html();
			var pricee = price.replace(/,/g , "");
			var finalprice = pricee*qty;
			var pricewithcomma = finalprice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
			$('.cart-total').html(pricewithcomma);
			
		});
		</script>
		<!-- For demo purposes – can be removed on production : End -->
		<!-- NAVBAR SCRIPTS -->
		<script src="distribution/vendor/jquery/jquery.min.js"></script>
		<script src="distribution/vendor/popper.js/umd/popper.min.js">
		</script>
		<script src="distribution/vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="distribution/vendor/jquery.cookie/jquery.cookie.js">
		</script>
		<script src="distribution/vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="distribution/js/front.js"></script>


	</body>

	</html>
	<?php } ?>