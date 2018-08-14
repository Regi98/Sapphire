<?php 
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
	// unset($_SESSION['cart']);
$id= $_SESSION['id'];
      $query = "SELECT * FROM shopusers WHERE id=$id";
      $results = mysqli_query($con, $query);
      $num=mysqli_fetch_assoc($results);
?>
<?php
if(isset($_GET['oid'])){
	// $pdtid=array();
	$orderId = $_GET['oid'];
    $sql = "SELECT * FROM products WHERE id=$orderId";
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
				$total_price = number_format($totalprice);
				$_SESSION['tp']=$total_price;
				// array_push($pdtid,$row['id']);
			}
		}
}
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

	    <title>Sapphire DTX | Payment Method</title>
	    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/blue.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
		<link rel="stylesheet" href="assets/css/myfont.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
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

		<link rel="shortcut icon" href="assets/images/favicon.ico">
	</head>
    <body class="cnt-home">
	
		<?php include('includes/header.php');?>

<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<br><br>
<div class="container-fluid">
    <!-- <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
      <li class="breadcrumb-item active">Payment Method</li>
    </ul> -->
</div>

  <div class="container h-100 justify-content-center align-items-center text-center" style="margin-top:-60px">
            <h4>How would you like to pay?</h4><br><br>
            <div class="row justify-content-center align-items-center text-center">
              
              <div class="col-12 col-md-3 col-centered payment">
                <input type="radio" class="wallet" id="paymethod" name="paymethod" value="E Wallet" checked="checked">E Wallet
                <div class="payment-col" id="wallet">
                  <img src="../images/wallet.png">
                </div>
				<p>You can top up your wallets with scratch cards!</p>
				 <div class="list-inline-item logout">
             	 <span class="pull-right"><img src="../img/dollar.png" width="20px"> &nbsp; $<?php echo $num['ewallet']; ?></span>
           		 </div>
              </div>
              <div class="col-12 col-md-3 payment">
                <input type="radio" id="paymethod" name="paymethod" value="Credit Card">Credit/Debit Card
                <div class="payment-col" id="credit">
                  <img src="../images/card.png" >
                </div>
                <p>We Accept These Cards</p><br>
					<img src="../img/pay1.png" width=80px> &nbsp;
                    <img src="../img/pay2.png" width=50px> &nbsp;
                    <img src="../img/pay3.png" width=40px> &nbsp;
              </div>
              <div class="col-12 col-md-3">
                <input type="radio" class="token" id="paymethod" name="paymethod" value="Sapphire Crystals">Sapphire Crystals
                <div class="payment-col" id="token">
                  <img src="../images/crystal.png">
                </div>
				<p>Buy with our new Sapphire Crystals!</p>
				<div class="list-inline-item logout">
            	<span class="pull-right"><img src="../images/gems.png" width="30px"> &nbsp; <?php echo $num['tokens']; ?>&nbsp;&nbsp;</span>
           		</div>
              </div>
          </div>
   	</div>
	  
           
   	<br>
   	 <center>
		<div class="col-md-4">
		<input id="submit-payment" value="Next" name="submit" class="btn btn-block btn-primary">
		</div>
	</center><br><br>

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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
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


		$('#submit-payment').on( "click", function() {

			var paymethod = $("input[name='paymethod']:checked").val();


			$.confirm({
				type: 'blue',
				title: 'Confirmation',
				content: 'Are you sure you want to use '+ paymethod+'?',
				buttons: {
					Yes: {
					btnClass: 'btn-green',
					action: function(){

						$.confirm({
							type: 'green',
							title: 'Thank you for shopping with us!',
							content: 'Your order has been placed',
							buttons: {
								OK: function () {
									$.ajax({
									type: "POST",
									url: "insert.php",
									data: {method:paymethod},
									dataType: "JSON",
									success: function(data) {
									window.location.replace("order-history.php");
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
							$.alert('Order has been cancelled');
						}
					}
				}
			});
		});
	</script>

<!-- NAVBAR SCRIPTS -->
	
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