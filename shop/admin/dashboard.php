
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin | Pending Orders</title>
	<!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../../vendor/font-awesome/css/font-awesome.min.css">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <!-- Custom Font Icons CSS-->
      <link rel="stylesheet" href="../../css/font.css">
      <link rel="stylesheet" type="text/css" href="css/spinners.css"/>
      <!-- Google fonts - Muli-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
      <!-- Custom stylesheet - for your changes-->
      <link rel="stylesheet" href="../../css/custom.css">
	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="#">CABIN UI</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
          <a class="nav-link" href="change-password.php">Change Password</a>
        <a class="nav-link" href="logout.php">Logout</a>
        </form>
      </div>
    </nav>

	<div class="wrapper">
		<div class="container text-secondary">
        <div class="container col-centeredh-100 justify-content-center align-items-center text-center">
          <br><br>
            <h2>Choose your champion!!!!!!!</h2><br><br>
              <div class="row ">
                    <div class="col-sm">
                        <a style="font-family: inherit; font-weight: 300 !important;" href="todays-orders.php" class="btn btn-outline-success btn-hover--transform-shadow btn--transition btn-lg mybutton float-lg-right btn-top-up">
                            <i class="fa fa-2x fa-tasks" aria-hidden="true"></i><br> &nbsp;&nbsp;
                        Today's Orders
                        </a>
                    </div>
                    <div class="col-sm">
                        <a style="font-family: inherit; font-weight: 300 !important;" href="pending-orders.php" class="btn btn-outline-warning btn-hover--transform-shadow btn--transition btn-lg float-lg-left mybutton btn-top-up">
                        <i class="fa fa-2x fa-tasks" aria-hidden="true"></i><br> &nbsp;&nbsp;
                        Pending Orders</a>
                    </div>
                    <div class="col-sm">
                        <a style="font-family: inherit; font-weight: 300 !important;" href="pending-orders.php" class="btn btn-outline-warning btn-hover--transform-shadow btn--transition btn-lg float-lg-left mybutton btn-top-up">
                        <i class="fa fa-2x fa-inbox" aria-hidden="true"></i><br> &nbsp;&nbsp;
                        Delivered Orders</a>
                    </div>
                  </div>
              </div>
        </div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>