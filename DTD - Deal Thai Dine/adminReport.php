<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/adminReport.css">
<link rel="stylesheet" type="text/css" href="css/adminReportNavBar.css">
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
   <li class='active'><a href='#'><img id="detailsImage" border="0" src="image/details.png" alt="Details"><span>Promotion Reports</span></a></li>
   <li><a href='adminOrder.php'><img id="orderImage" border="0" src="image/order.png" alt="Expired"><span>Order Reports</span></a></li>
   <li><a href='adminUserManagement.php'><img id="userManagementImage" border="0" src="image/career.png" alt="Career"><span>User Management</span></a></li>
</ul>
</div>

<h1>Deals' Report</h1>

<div class="report">
	<form>
		<table cellspacing="2">
			<tr>
				<td>Promotion</td>
				<td>Start Date</td>
				<td>End Date</td>
				<td>Expired Status</td>
				<td>Price</td>
				<td>Total Sold</td>
				<td>Profit</td>
				<td>Debt to Seller</td>
			</tr>
			<?php
			error_reporting(0);
			require('connectDTD2.php');

			$getquery=mysql_query("SELECT * FROM promotion ORDER BY id ASC");
			while($rows=mysql_fetch_array($getquery))
			{
				$id=$rows['id'];
				$proname=$rows['proname'];
				$proprice=$rows['proprice'];

				echo '<tr>';
				echo '<td>'. $proname .'</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td>$'. $proprice .'</td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '<td></td>';
				echo '</tr>';
			}
			?>
		</table>
	</form>
</div>

</body>
</html>
