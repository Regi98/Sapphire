<div class="w3-sidebar w3-bar-block w3-black w3-xxlarge" style="width:70px">
	  <a href="dashboard.php" class="w3-bar-item w3-button"><i class="fas fa-th-large"></i><p  style="font-size: 0.6rem;">Dashboard</p></a>
      <a href="todays-orders.php" class="w3-bar-item w3-button"><i class="fas fa-sun"></i><p style="font-size: 0.6rem;">Today's Orders<h5><span style="font-size: 0.8rem;" class="badge badge-primary"><?php
			$f1="00:00:00";
			$from=date('Y-m-d')." ".$f1;
			$t1="23:59:59";
			$to=date('Y-m-d')." ".$t1;
			$result = mysqli_query($con,"SELECT * FROM Orders where orderDate Between '$from' and '$to'");
			$num_rows1 = mysqli_num_rows($result);
			{
			?>
			<?php echo htmlentities($num_rows1); ?>
		<?php } ?> New</span></h5></p></a>
      <a href="pending-orders.php" class="w3-bar-item w3-button"><i class="fas fa-tasks"></i><p  style="font-size: 0.6rem;">Pending Orders<h5><span style="font-size: 0.8rem;" class="badge badge-warning"><?php	
			// $status='Delivered';									 
		$ret = mysqli_query($con,"SELECT * FROM Orders where orderStatus is null ");
		$num = mysqli_num_rows($ret);
		{?><?php echo htmlentities($num); ?>
		<?php } ?> New</span></h5></p></a>
      <a href="delivered-orders.php" class="w3-bar-item w3-button"><i class="fas fa-inbox"></i><p  style="font-size: 0.6rem;">Delivered Orders<h5><span style="font-size: 0.8rem;" class="badge badge-success"><?php	
		$status='Delivered';									 
		$rt = mysqli_query($con,"SELECT * FROM Orders where orderStatus='$status'");
		$num1 = mysqli_num_rows($rt);
		{?><?php echo htmlentities($num1); ?>
		<?php } ?> New</span></h5></p></a>
      <a href="products-in-stock.php" class="w3-bar-item w3-button"><i class="fas fa-boxes"></i><p  style="font-size: 0.6rem;">Products in Stock</p></a>
    </div>
