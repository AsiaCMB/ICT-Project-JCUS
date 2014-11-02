<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<link rel="shortcut icon" href="icon.ico" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/settingsForm.css">
<link rel="stylesheet" type="text/css" href="css/footerNavBar.css">
<link rel="stylesheet" type="text/css" href="css/otherSocMed.css">
<link rel="stylesheet" type="text/css" href="css/otherFooter.css">
</head>

<body background="image/bgImage.jpg">

<!-- subscribe email, sign up and register section -->
<div class="signupParent"> 
	<form id="subscribeEmail">
		<input type="text" name="subsemail" placeholder="Enter Your Email Here...">
		<input type="button" value="Subscribe">
	</form>
	<p id="welcome">
		<?php 
		if(!isset($_SESSION['use']))
		{
			header("Location: DTD_LOGIN.php");
		}
		echo 'Welcome <a id="configImage" href="#">' . $_SESSION['use']. '<img id="settingsImage" border="0" src="image/settings.png" alt="settings"></a>';
		echo '| ';
	?> 
	<a id="signinImage" href="signOUT.php">Sign Out<img id="loginImage" border="0" src="image/login.png" alt="Sign Out"></a></p>
</div>

<!-- logo and search button section -->
<div class="logoParent">
	<img id="logoImage" border="0" src="image/logo2.png" alt="Promochan Logo">
	<form id="findPromo">
		<input type="text" name="find" placeholder="I'm Looking For...">
		<input type="button" value="Search">
	</form>
</div>

<!-- navigation bar -->
<div id='cssmenu' class='align-center'>
<ul>
   <li><a href='buyerPage.php'><img id="homeImage" border="0" src="image/home2.png" alt="home"><span>Home</span></a></li>
   <li><a href='buyerRestaurantPage.php'><img id="restoImage" border="0" src="image/resto.png" alt="Thai Resto"><span>Thai Resto</span></a></li>
   <li><a href='buyerPromotionAllPage.php'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='#'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li><a href='buyerAboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>

<h1>Account Settings</h1>
<div class="userSettings">
	<form method="POST">
		<table cellspacing="2">
		  <tr>
		    <td><b>First Name:</b></td>
		    <td><input name="userfname" type="text" size="30" class="text"/></td>
		  </tr>
		  <tr>
		    <td><b>Last Name :</b></td>
		    <td><input name="userlname" type="text" size="30" class="text"/></td>
		  </tr>
		  <tr>
		    <td><b>Email :</b></td>
		    <td><input name="useremail" type="email" size="30" class="text"/></td>
		  </tr>
		  <tr>
		    <td><b>Old Password :</b></td>
		    <td>
		      <input name="useroldpass" type="password" class="text" /></td>
		  </tr>
		  <tr>
		    <td><b>New Password :</b></td>
		    <td>
		      <input name="usernewpass" type="password" class="text" /></td>
		  </tr>
		  <tr>
		    <td><b>Confirm New Password :</b></td>
		    <td><input name="usercnp" type="password" class="text"/></td>
		  </tr>
		  <tr>
		    <td width="154"><b>Register As:</b></td>
		    <td><input name="usertype" type="text" size="30" disabled class="text" value="Buyer"></td>
		  </tr>
		  <tr>
		    <td></td>
		    <td>
		    <input type="submit" name="submit" value="Submit" class="btn" />
		    <input type="reset" value="Cancel" class="btn" />
		    </td>
		  </tr>
		</table>
	</form>
</div>

<!-- footer -->
<div class="footer">
	<hr></hr>
	<div id="footerLink">
		<ul>
	   		<li><a href='buyerAboutUsPage.php'><span>About</span></a></li>
	   		<li><a href='buyerHelpPage.php'><span>Help</span></a></li>
	   		<li><a href='buyerContactUsPage.php'><span>Contact</span></a></li>
	   		<li><a href='#'><span>Career</span></a></li>
	   		<li><a id="fbLink" href='#'><img id="fb" border="0" src="image/fb1.png" alt="Facebook Fan Page" height="40px"></a>
				<a id="twitterLink" href='#'><img id="twitter" border="0" src="image/twitter1.png" alt="Twitter" height="40px"></a>
				<a id="youtubeLink" href='#'><img id="youtube" border="0" src="image/youtube1.png" alt="Youtube Channel" height="40px"></a></li>
		</ul>
	</div>
	<hr></hr>
	<div id="paymentLogo" >
		<a href="#" onclick="javascript:window.open('https://www.paypal.com/sg/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=400, height=350');"><img  src="image/paypalLogo.png" border="0" alt="PayPal" height="50px"></a></td></tr></table>
		<p id="copyright">Copyright© 2014 dealsthaidine.com</p>
	</div>
</div>
</body>
</html>
