

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<link rel="shortcut icon" href="icon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/adminUserManagementNavBar.css">
<link rel="stylesheet" type="text/css" href="css/adminUserManagement.css">
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
   <li><a href='adminExpired.php'><img id="expiredImage" border="0" src="image/expired.png" alt="expired"><span>Expired Promotion</span></a></li>
   <li class='active'><a href='#'><img id="userManagementImage" border="0" src="image/career.png" alt="user management"><span>User Management</span></a></li>
</ul>
</div>

<div class="userManagement">
	<form>
		<table cellspacing="2" border="1">
			<tr><br>
				<td>Username</td>
				<td>E-mail</td>
				<td>User Type</td>
				<td>Send Message</td>
				<td></td>
			</tr>

			<?php
			error_reporting(0);
			require('connectDTD2.php');

			$getquery=mysql_query("SELECT * FROM user ORDER BY usertype ASC");
			while($rows=mysql_fetch_array($getquery))
			{
				$id=$rows['id'];
				$userfname=$rows['userfname'];
				$userlname=$rows['userlname'];
				$useremail=$rows['useremail'];
				$usertype=$rows['usertype'];

				echo '<tr>';
				echo '<td>'. $userfname .' '. $userlname .'</td>';
				echo '<td>'. $useremail .'</td>';
				echo '<td>'. $usertype .'</td>';
				echo '<td><a href="#">Send Message</a></td>';
				echo '<td><input type="submit" name="delete" value="Deactivate"/></td>';
				echo '</tr>';
			}
			?>
		</table>
	</form>
</div>

</body>
</html>
