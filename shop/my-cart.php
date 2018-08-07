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
if(isset($_POST['submit'])){
	if(!empty($_SESSION['cart'])){
		foreach($_POST['quantity'] as $key => $val){
			if($val==0){
				unset($_SESSION['cart'][$key]);
			}else{
				$_SESSION['cart'][$key]['quantity']=$val;

			}
		}
			// echo "<script>alert('Your Cart has been Updated');</script>";
		}
	}
// Code for Remove a Product from Cart
if(isset($_POST['remove_code']))
	{

if(!empty($_SESSION['cart'])){
		foreach($_POST['remove_code'] as $key){
			
				unset($_SESSION['cart'][$key]);
		}
			echo "<script>alert('Your Cart has been Updated');</script>";
	}
}
// code for insert product in order table
$id= $_SESSION['id'];
      $query = "SELECT * FROM shopusers WHERE id=$id";
      $results = mysqli_query($con, $query);
      $num=mysqli_fetch_assoc($results);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Cart</title>
	    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/blue.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<!-- jQuery Confirm -->
		<link rel="stylesheet" href="../css/jquery-confirm.css">

        <!-- Fonts --> 
		<link rel="stylesheet" href="assets/css/myfont.css">
		
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

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
    <body class="cnt-home">

	<?php include('includes/header.php');?>
		
	<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm "  >
			 <!-- <div class="shopping-cart"> -->
			<div class="col-md-12 col-sm-12 shopping-cart-table" style="overflow-x:auto;"> 
	<div style="border:">
<form name="cart" method="post">	
<?php
if(!empty($_SESSION['cart'])){
	?>
<table class="table  table-hover table-condensed">
			<thead class="thead-dark">
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-id item">ID</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Price Per unit</th>
					<th class="cart-total last-item">Total Price</th>
					<th class="cart-csub-total item">Crystal Price</th>
					<th class="cart-ctotal last-item">Total Price</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="12">
						<div class="shopping-cart-btn">
	<hr><br>
								<div class="row justify-content-center">
									<div class="col-4">
										<a href="index.php" class="btn btn-block text-uppercase btn-primary outer-left-xs">Continue Shopping</a>
									</div>
									<div class="col-4">
										<input type="submit" name="submit" value="Update shopping cart" class="btn btn-block text-uppercase btn-primary outer-right-xs">
									</div>
								</div>

						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
 <?php
 $pdtid=array();
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
				$productPrice = preg_replace('/[^A-Za-z0-9\-]/', '', $row['product_price']);
				$quantity = $_SESSION['cart'][$row['id']]['quantity'];
				$subtotal= $quantity*$productPrice;
				$totalprice += $subtotal;
				$_SESSION['qnty']=$totalqunty+=$quantity;
				$_SESSION['tp']=$totalprice;
				array_push($pdtid,$row['id']);
//print_r($_SESSION['pid'])=$pdtid;exit;
	?>

				<tr>
					<td class="romove-item"><input type="checkbox" name="remove_code[]" value="<?php echo htmlentities($row['id']);?>" /></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="product-details.php?pid=<?php echo htmlentities($row['id']);?>">
						    <img src="../../inflightapp/storage/app/public/product_images/<?php echo $row['product_image_1'];?>" alt="" width="60px" height="60px">
						</a>
					</td>
						<td class="cart-product-id">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['id'];
						$_SESSION['sid']=$pd;
						 ?></a></h4>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo htmlentities($pd=$row['id']);?>" ><?php echo $row['product_name'];
						$_SESSION['sid']=$pd;
						 ?></a></h4>
					</td>
				
					<td class="cart-product-quantity">
				             <!-- <input type="number" class="form-control form-control-sm col-5" min="1" id="quantity" value="" name="quantity[<?php echo $row['id']; ?>]"> -->
							<?php			
								$instock = $row['product_in_stock'];
									if($instock == 0){ ?>
										<span class="value">Out of Stock</span>
									<?php } else { ?>
											<select name="quantity[<?php echo $row['id']; ?>]" class="form-control-sm border-secondary rounded">
												<option class="value" value="<?php echo $_SESSION['cart'][$row['id']]['quantity']; ?>" selected><?php echo $_SESSION['cart'][$row['id']]['quantity']; ?></option>
												<?php for($x=1; $x <= $instock; $x++){ ?>
													<option class="value" value="<?php echo $x; ?>">
												<?php echo $x; ?>
													</option>
												<?php } ?>
											</select>
							<?php } ?>
		            </td>
					<td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo "$".$row['product_price']; ?>.00</span></td>


					<td class="cart-product-grand-total"><span class="cart-grand-total-price"><?php 

					$productPrice = preg_replace('/[^A-Za-z0-9\-]/', '', $row['product_price']);
					$quantity = $_SESSION['cart'][$row['id']]['quantity'];
					$grand_total = number_format($quantity*$productPrice);

					echo "$".$grand_total; ?>.00</span></td>

					<td class="cart-product-csub-total"><span class="cart-sub-total-price"><img src="../images/gems.png" width="20px"><?php echo "".$row['product_price_token']; ?></span></td>

					<td class="cart-product-cgrand-total"><span class="cart-grand-total-price"><img src="../images/gems.png" width="20px"><?php 

					$productPrice = preg_replace('/[^A-Za-z0-9\-]/', '', $row['product_price_token']);
					$quantity = $_SESSION['cart'][$row['id']]['quantity'];
					$grand_total = number_format($quantity*$productPrice);

					echo "".$grand_total; ?></span></td>
				</tr>

				<?php } }
$_SESSION['pid']=$pdtid;
				?>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
			</div>			
<br>

<div class="col-4 cart-shopping-total mt-3 text-right pull-right">
	<table class="table">
		<thead>
			<tr>
				<th>
					<div class="cart-grand-total ml-3" style="margin-bottom: -1em">
						Sub Total:<span class="inner-left-md"><?php
						echo "$". number_format($_SESSION['tp']). ".00"; ?></span>
					</div><br>
					<div class="row">
			<div class="col-7">
				<h7 class="label">Ph Tax:</h7>
			</div>
			<div class="col-5">
				<h7 class="label ph-tax">$0.00</h7>
			</div>
		</div>
		<div class="row">
			<div class="col-7">
					<h7 class="label">Service Charge:</h7>
			</div>
			<div class="col-5">
				<h7 class="label service-charge">&nbsp;&nbsp;$0.00</h7>
			</div>
		</div><hr><hr>
			<div class="cart-grand-total ml-3" style="margin-bottom: -1em">
						Grand Total:<span class="inner-left-md"><?php
						echo "$". number_format($_SESSION['tp']). ".00"; ?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						
						<a type="submit" id="proceed-checkout" style="color:white;" class="btn btn-primary">PROCEED TO CHECKOUT</a>	
					</td>
				</tr>
				
		</tbody><!-- /tbody -->
	</table></div>
	<?php } else {
		echo "<br><p class='text-center'>Your Shopping Cart is empty</p>";
		}?>
</div>			</div>
		</div> 
		</form>
</div>
</div>
</div>
</div>
</div>
</div>
</section><br><br><br>
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
	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>

    <!-- NAVBAR SCRIPTS -->
	<script src="distribution/vendor/popper.js/umd/popper.min.js">
	</script>
	<script src="distribution/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="distribution/vendor/jquery.cookie/jquery.cookie.js">
	</script>
	<script src="distribution/vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="distribution/js/front.js"></script>
	<script src="../js/jquery-confirm.js"></script>
	<script src="assets/js/scripts.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});

        $('input').keypress(function(e){ 
			var regex = new RegExp("^[a-zA-Z0-9]+$");
    		var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		if (this.value.length == 0 && e.which == 48 ){
			return false;
		} else if(!regex.test(key)){
			event.preventDefault();
       		return false;
		} else{

		}
		});
		function blockSpecialChar(e) {
            var k = e.keyCode;
            return ((k > 64 && k < 91) || (k > 96 && k < 123) || k == 8   || (k >= 48 && k <= 57));
        }
        $('#proceed-checkout').on( "click", function() {


			<?php
			$js_array = json_encode($_SESSION['pid']);
			echo "var pddArray = ". $js_array . ";\n";
			$value=array_combine($pdd,$quantity);
			?>
			// var php_var = <?php echo $js_array ; ?>;
			// console.log(pddArray);
			

			var quantityArray = new Array();
			$('select[name^="quantity"]').each(function() {
					quantityArray.push($(this).val());
			});

			if (quantityArray.includes("")) {
				$.alert({
					type: 'red',
					theme: 'material',
					title: 'Error!',
					content: 'Please input product quantity.',
				});
			} else{
				$.confirm({
				type: 'orange',
				theme: 'material',
				title: 'Confirmation',
				content: 'Are all information correct?',
				buttons: {
					Yes: {
					btnClass: 'btn-green',
					action: function(){

						$.confirm({
							theme: 'material',
							type: 'green',
							title: 'Thank you!',
							content: 'Redirecting you to payments page..',
							buttons: {
								OK: function () {
									$.ajax({
									type: "POST",
									url: "insertone.php",
									data: {pdd:pddArray,quantity:quantityArray},
									dataType: "text",
									success: function(data) {
									window.location.replace("payment-method.php");
									},
									error: function(err) {
									console.log(err);
									
									}
								});
								}
							}
						})
					
					}

					},
					No: {
						text: 'No', // With spaces and symbols
						action: function () {
							$.alert({
								title: 'Warning',
								content: 'Order has been cancelled.',
								type: 'red',
								theme: 'material'
							});
						}
					}
				}
			});
			}
		});
    </script>

</body>
</html>
<?php } ?>