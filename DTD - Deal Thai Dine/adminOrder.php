<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<link rel="shortcut icon" href="icon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/adminOrder.css">
<link rel="stylesheet" type="text/css" href="css/adminOrderNavBar.css">
<link rel="stylesheet" type="text/css" href="css/otherSocMed.css">
<link rel="stylesheet" type="text/css" href="css/otherFooter.css">
</head>

<body background="image/bgImage.jpg">

<!-- subscribe email, sign up and register section -->
<div class="signupParent"> 
  <form id="subscribeEmail">
    <input type="text" name="subsemail">
  </form>
	<p id="welcome">Welcome Admin. 
	<a id="signinImage" href="signOUT.php">Logout<img id="loginImage" border="0" src="image/login.png" alt="Logout Here"></a></p>
</div>

<!-- logo and search button section -->
<div class="logoParent">
	<img id="logoImage" border="0" src="image/logo2.png" alt="Promochan Logo">
</div>

<!-- navigation bar -->
<div id='cssmenu' class='align-center'>
<ul>
   <li><a href='adminReport.php'><img id="detailsImage" border="0" src="image/details.png" alt="details"><span>Promotion Reports</span></a></li>
   <li class='active'><a href='#'><img id="orderImage" border="0" src="image/order.png" alt="expired"><span>Order Reports</span></a></li>
   <li><a href='adminUserManagement.php'><img id="userManagementImage" border="0" src="image/career.png" alt="user management"><span>User Management</span></a></li>
</ul>
</div>

<div class="expired">
	<form>
		<table cellspacing="2" border="1">
			<tr><br>
				<td>Track ID</td>
				<td>Payer Email</td>
				<td>Item Name</td>
				<td>Promotion Price</td>
			</tr>
			<?php
			error_reporting(0);
			require('connectDTD2.php');

			$getquery=mysql_query("SELECT * FROM orders ORDER BY order_id ASC");
			while($rows=mysql_fetch_array($getquery))
			{
				$id=$rows['order_id'];
				$txnid=$rows['txn_id'];
				$payer_email=$rows['payer_email'];
				$item_name=$rows['item_name'];
				$mc_gross=$rows['mc_gross'];

				echo '<tr>';
				echo '<td>'. $txnid .'</td>';
				echo '<td>'. $payer_email .'</td>';
				echo '<td>'. $item_name .'</td>';
				echo '<td>'. $mc_gross.'</td>';
				echo '</tr>';
			}
			?>
		</table>
	</form>
</div>

</body>
</html>
