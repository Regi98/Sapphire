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

  <div class="container  h-100 justify-content-center align-items-center text-center">
            <h4>How would you like to pay?</h4> <br><br>
            <div class="row justify-content-center align-items-center text-center">
              
              <div class="col-12 col-md-3 col-centered payment">
                <input type="radio" class="wallet" id="paymethod" name="paymethod" value="E Wallet" checked="checked">E Wallet
                <div class="payment-col" id="wallet">
                  <img src="../images/wallet.png">
                </div>
                <p>You can top up your wallets with scratch cards!</p>
              </div>
              <div class="col-12 col-md-3 payment">
                <input type="radio" id="paymethod" name="paymethod" value="Credit Card">Credit Card
                <div class="payment-col" id="credit">
                  <img src="../images/card.png">
                </div>
                <p>We accept VISA and Mastercard.</p>
              </div>
              <div class="col-12 col-md-3">
                <input type="radio" class="token" id="paymethod" name="paymethod" value="Sapphire Crystals">Sapphire Crystals
                <div class="payment-col" id="token">
                  <img src="../images/token.png">

                </div>
                <p>Buy with our new Sapphire Crystals!</p>
              </div>
          </div>
   	</div>
	   <hr color="white" width="90%">
            <div class="row justify-content-center align-items-center text-center">
                  <div class="block-white col-md-9 credit">
                     <div class="title"><strong class="d-block">Paying VIA credit/debit card:</strong><span class="d-block">Insert details carefully.</span></div>
                     <div class="block-body">
                      <div class="block-gray">
                      <img src="../img/pay1.png" width=80px> &nbsp;
                     <img src="../img/pay2.png" width=50px> &nbsp;
                     <img src="../img/pay3.png" width=40px> &nbsp;
                        <!--<div class="form-group"> <br>  
                           <input type="submit" value="Signin" class="btn btn-primary">
                           </div>-->

                     <!-- DIV START 
                     <form class="text-left form-validate" method="post">-->
                     <div class="row padding-0">
                      <div class="col-sm-12"><br>
                        <div class="form-group row">
                            <small class="help-block-none">Card Holder Name</small>
                            <input type="text" class="form-control">
                        </div>
                      </div>
                     </div>
                        <div class="row padding-0">
                           <div class="col-sm-6">
                              <small class="help-block-none">Card Number</small>
                              <input type="text" class="form-control" maxlength="16">
                           </div>
                           <div class="col-sm-6">
                              <small class="help-block-none">Expiration date and security code</small>
                              <div class="row">
                              <div class="col-sm-4 padding-0">
                                <select id='month' class="form-control">
                                     <option value='' disabled="true">--</option>
                                     <option value='1'>01</option>
                                     <option value='2'>02</option>
                                     <option value='3'>03</option>
                                     <option value='4'>04</option>
                                     <option value='5'>05</option>
                                     <option value='6'>06</option>
                                     <option value='7'>07</option>
                                     <option value='8'>08</option>
                                     <option value='9'>09</option>
                                     <option value='10'>10</option>
                                     <option value='11'>11</option>
                                     <option value='12'>12</option>
                                     </select> 
                              </div>
                              <div class="col-sm-4 padding-0">
                                <select id='year' class="form-control">
                                     <option value='' disabled="true">--</option>
                                     <option value='18'>2018</option>
                                     <option value='19'>2019</option>
                                     <option value='20'>2020</option>
                                     <option value='21'>2021</option>
                                     <option value='22'>2022</option>
                                     <option value='23'>2023</option>
                                     <option value='24'>2024</option>
                                     <option value='25'>2025</option>
                                     <option value='26'>2026</option>
                                     <option value='27'>2027</option>
                                     <option value='28'>2028</option>
                                     <option value='29'>2029</option>
                                     <option value='30'>2030</option>
                                     <option value='31'>2031</option>
                                     <option value='32'>2032</option>
                                     <option value='33'>2033</option>
                                     <option value='34'>2034</option>
                                     <option value='35'>2035</option>
                                     <option value='36'>2036</option>
                                     <option value='37'>2037</option>
                                     <option value='38'>2038</option>
                                     <option value='39'>2039</option>
                                     <option value='40'>2040</option>
                                     <option value='41'>2041</option>
                                     <option value='42'>2042</option>
                                     <option value='43'>2043</option>
                                     </select> 
                              </div>
                              <div class="col-sm-4 padding-0">
                                <input type="text" class="form-control" maxlength="3">
                              </div>

                            </div><br>
                           </div>

                        </div>
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
<!-- 
<div class="body-content outer-top-bd">
	<div class="container">
		<div class="checkout-box faq-page inner-bottom-sm">
			<div class="row">
				<div class="col-md-12">
					<h2>Choose Payment Method</h2>
					<div class="panel-group checkout-steps" id="accordion">

<div class="panel panel-default checkout-step-01">

	
		<div class="panel-heading">
    	<h4 class="unicase-checkout-title">
	        <a data-toggle="collapse" class="" >
	         Select your Payment Method
	        </a>
	     </h4>
    </div>


	<div>


	    <div class="panel-body">
	    <form name="payment" method="post">
		<div class="jumbotron">
		<div class="row">
		<div class="col-md-4">
		<center>
		<input type="radio" id="paymethod" name="paymethod" value="Cash" checked="checked" style="width:20px; height:20px;" ><img src="assets/images/payments/cash.png" width="100" height="100"><p>Cash</p> <br></div>
		</center>	
		<div class="col-md-4">
		<center>
		 <input type="radio" id="paymethod" name="paymethod" value="Credit card" style="width:20px; height:20px;"> <img src="assets/images/payments/credit-cards.png" width="100" height="100"><p >Credit card</p> </div>
		</center>	
		<div class="col-md-4">
		<center>
		 <input type="radio" id="paymethod" name="paymethod" value="Load Wallet" style="width:20px; height:20px;"><img src="assets/images/payments/money-card.png" width="100" height="100"><p>Load Wallet</p><br><br /><br /></div></center></div> 
		 <center>
		<div class="col-md-4">
		<input id="submit-payment" value="Next" name="submit" class="btn btn-block btn-primary">
		</div>
		</center>
		</div>
	    </form>		
		</div>


	</div>
</div>

					  
					  	
					</div>
				</div>
			</div>
		</div>>	</div>
</div> -->
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