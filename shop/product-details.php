<?php
session_start();
error_reporting(0);
include('includes/config.php'); 
if(strlen($_SESSION['login'])==0){   ?>
							<script language="javascript">
                document.location="../index.php";
              </script>
<?php } else{ ?>	
<?php include 'includes/connect.php';
include('includes/config.php');
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['product_price']);
			header('location:my-cart.php');
		}else{
			$message="Product ID is invalid";
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
	<!-- Google fonts - Muli-->
	<link rel="stylesheet" href="assets/css/myfont.css">
	<!-- theme stylesheet-->
	<link rel="stylesheet" href="distribution/css/style.default.css" id="theme-stylesheet">
	<!-- Custom stylesheet - for your changes-->
	<link rel="stylesheet" href="distribution/css/custom.css">

	<!-- Fonts -->
	<link rel="stylesheet" href="assets/css/myfont.css">
	<link rel="shortcut icon" href="assets/images/favicon.ico">
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
							<div class='col-md-3 sidebar'>
								<div class="sidebar-module-container">


									<!-- ==============================================CATEGORY============================================== -->
									<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
										<?php include('includes/side-menu.php');?>
									</div>
									<!-- /.sidebar-widget -->

									<!-- ============================================== CATEGORY : END ============================================== -->
									<!-- ============================================== HOT DEALS ============================================== -->
									<div class="sidebar-widget hot-deals wow fadeInUp">

										<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-xs">




										</div>
										<!-- /.sidebar-widget -->
									</div>

									<!-- ============================================== COLOR: END ============================================== -->
								</div>
							</div>
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

											<div id="owl-single-product">

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

												<div class="single-product-gallery-item" id="slide2">
													<a data-lightbox="image-1" data-title="Gallery" href="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_2']);?>">
														<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_2']);?>"
														/>
													</a>
												</div>
												<!-- /.single-product-gallery-item -->

												<div class="single-product-gallery-item" id="slide3">
													<a data-lightbox="image-1" data-title="Gallery" href="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_3']);?>">
														<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_3']);?>"
														/>
													</a>
												</div>

											</div>
											<!-- /.single-product-slider -->


											<div class="single-product-gallery-thumbs gallery-thumbs">

												<div id="owl-single-product-thumbnails">
													<div class="item">
														<a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
															<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_1']);?>"
															/>
														</a>
													</div>

													<div class="item">
														<a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
															<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_2']);?>"
															/>
														</a>
													</div>
													<div class="item">

														<a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
															<img class="img-fluid" alt="" src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($row['product_image_3']);?>"
															    height="200" />
														</a>
													</div>




												</div>
												<!-- /#owl-single-product-thumbnails -->



											</div>

										</div>
									</div>




									<div class='col-sm-6 col-md-7 product-info-block'>
										<div class="product-info">
											<h1 class="name">
												<?php echo htmlentities($row['product_name']);?>
											</h1>
											<?php $rt=mysqli_query($con,"select * from productreviews where productId='$pid'");
$num=mysqli_num_rows($rt);
{
?>
											<div class="rating-reviews m-t-20">
												<div class="row">
													<div class="col-sm-3">
														<div class="rating rateit-small"></div>
													</div>
													<div class="col-sm-8">
														<div class="reviews">
															<a href="#" class="lnk">(
																<?php echo htmlentities($num);?> Reviews)</a>
														</div>
													</div>
												</div>
												<!-- /.row -->
											</div>
											<!-- /.rating-reviews -->
											<?php } ?>
											<div class="stock-container info-container m-t-10">
												<div class="row">
													<div class="col-sm-3">
														<div class="stock-box">
															<span class="label">Availability:</span>
														</div>
													</div>
													<div class="col-sm-9">
														<div class="stock-box">
																<?php
																$availability = $row['product_availability'];
																	if($availability == 'In Stock'){ ?>
																		<span class="value text-success"><?php echo htmlentities($row['product_availability']);?></span>
																<?php
																	} else { ?>
																		<span class="value text-danger"><?php echo htmlentities($row['product_availability']);?></span>
																<?php
																	}
																?>
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
															<span class="label">Product Brand: </span>
														</div>
													</div>
													<div class="col-sm-9">
														<div class="stock-box">
															<span class="value">
																<?php echo htmlentities($row['product_company']);?>
															</span>
														</div>
													</div>
												</div>
												<!-- /.row -->
											</div>


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
												<!-- /.row -->
											</div>
											<!-- /.price-container -->






											<div class="quantity-container info-container">
												<div class="row">

													<div class="col-2 col-sm-2">
														<span class="label">Qty:</span>
													</div>

													<div class="col-2 col-sm-2">
														<div class="cart-quantity">
																<input type="number" class="form-control form-control-sm col-12" min="1" value="1">
														</div>
													</div>

													<div class="col-7 col-sm-7">
														<a href="product-details.php?page=product&action=add&id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
															<i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
													</div>


												</div>
												<!-- /.row -->
											</div>
											<!-- /.quantity-container -->
										</div>
										<!-- /.product-info -->
									</div>
									<!-- /.col-sm-7 -->
								</div>
								<!-- /.row -->


								<div class="product-tabs inner-bottom-xs  wow fadeInUp">
									<div class="row">
										<div class="col-sm-3">
											<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
												<li class="active">
													<a data-toggle="tab" href="#description">DESCRIPTION</a>
												</li>
												<li>
													<a data-toggle="tab" href="#review">REVIEW</a>
												</li>
											</ul>
											<!-- /.nav-tabs #product-tabs -->
										</div>
										<div class="col-sm-9">

											<div class="tab-content">

												<div id="description" class="tab-pane in active">
													<div class="product-tab">
														<p class="text">
															<?php echo $row['product_description'];?>
														</p>
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
																						<input type="radio" name="rate" class="radio" value="5">
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
																					<input type="text" class="form-control txt" id="exampleInputName" placeholder="" name="name" value="<?php echo htmlentities($_SESSION['name']);?>" required="required" readonly>
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
																					echo '<img height="4%" width="4%" src="img/star.png">';
																				} else {
																					echo '<img height="4%" width="4%" src="img/no-star.png">';
																				}
																			}
																		?>
																		&nbsp;<?php echo htmlentities($rvw['summary']);?>
																		<div class="text pull-right">
																		<?php echo htmlentities($rvw['reviewDate']);?>
																		</div>
																		<br>
																	<small>
																			<span>
																				by <?php echo htmlentities($rvw['name']);?>
																			</span>
																	</small><br><br>
																	<div class="text">
																		<?php echo htmlentities($rvw['review']);?></div>
																</div>

															</div><hr><br>
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

								<?php $cid=$row['product_category_id'];
			$subcid=$row['product_sub_category_id']; } ?>
								<!-- ============================================== UPSELL PRODUCTS ============================================== -->
								<section class="section featured-product wow fadeInUp">
									<h3 class="section-title">Related Products </h3>
									<div class="row outer-top-xs">

										<?php 
$qry=mysqli_query($con,"select * from products where product_sub_category_id='$subcid' and product_category_id='$cid'");
while($rw=mysqli_fetch_array($qry))
{

			?>


										<div class="col-6 col-sm-6 col-md-4 wow fadeInUp">
											<!-- <div class="products">
												<div class="product">
													<div class="product-image">
														<div class="image"> -->
															<div class="card">
															<a href="product-details.php?pid=<?php echo htmlentities($rw['id']);?>" class="card-img-top">
																<img src="assets/images/blank.gif" data-echo="../../inflightapp/storage/app/public/product_images/<?php echo htmlentities($rw['product_image_1']);?>"
																alt="" class="img-fluid">
															</a>

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
															<span class="price">$<?php echo htmlentities($rw['product_price']);?></span>
															<span class="price-before-discount"><strike><small>$<?php echo htmlentities($rw['product_price_before_discount']);?></small></strike></span><span class="token_price pull-right"><img src="assets/images/payments/tokens.png" width="18" height="18"> <?php echo htmlentities($rw['product_price_token']);?></span>
														</div>
														<!-- /.product-price -->

													</div>
													<!-- /.product-info -->
													</div>
													<!-- /.cart -->
												</div>
												<!-- /.product -->

										</div>
										<!-- /.item -->
										<?php } ?>


									</div>
									<!-- /.home-owl-carousel -->
								</section>
								<!-- /.section -->


								<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

							</div>
							<!-- /.col -->
							<div class="clearfix"></div>
						</div>
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

		<!-- For demo purposes – can be removed on production -->

		<script src="switchstylesheet/switchstylesheet.js"></script>

		<script>
			$(document).ready(function () {
				$(".changecolor").switchstylesheet({
					seperator: "color"
				});
				$('.show-theme-options').click(function () {
					$(this).parent().toggleClass('open');
					return false;
				});
			});

			$(window).bind("load", function () {
				$('.show-theme-options').delay(2000).trigger('click');
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