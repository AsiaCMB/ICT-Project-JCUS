<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/promotionNavBar.css">
<link rel="stylesheet" type="text/css" href="css/promotionPage.css">
<link rel="stylesheet" type="text/css" href="css/otherSocMed.css">
<link rel="stylesheet" type="text/css" href="css/otherFooter.css">

</head>

<body background="image/bgImage.jpg" onload="LoadGmaps()" onunload="GUnload()">

<!-- subscribe email, sign up and register section -->
<div class="signupParent"> 
	<form id="subscribeEmail">
		<input type="text" name="subsemail" placeholder="Enter Your Email Here...">
		<input type="button" value="Subscribe">
	</form>
	<p id="welcome">Welcome to Deal Thai Dine. 
	<a id="signinImage" href="DTD_LOGIN.php">Sign In<img id="loginImage" border="0" src="image/login.png" alt="Login Here"></a>
	/<a id="registImage" href="DTD_Registration.php">Register <img id="registerImage" border="0" src="image/register.png" alt="Register Here"> </a></p>
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
   <li><a href='index.php'><img id="homeImage" border="0" src="image/home2.png" alt="home"><span>Home</span></a></li>
   <li><a href='restaurantPage.php'><img id="restoImage" border="0" src="image/resto.png" alt="Thai Resto"><span>Thai Resto</span></a></li>
   <li class='active'><a href='promotionAllPage.php'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='#'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li class='last'><a href='aboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>


<h1>Hot Deals</h1>
<?php
//Retrive promotion information from database to display 
error_reporting(0);
require('connectDTD.php');

$getquery=mysql_query("SELECT * FROM seller ORDER BY id DESC");
while($rows=mysql_fetch_array($getquery))
{
	$id=$rows['id'];
	$proname=$rows['proname'];
	$proimage=$rows['proimage'];
	$proprice=$rows['proprice'];
	$nomprice=$rows['nomprice'];
	$save = $nomprice - $proprice;
	//Calculate percentage of discounted price
	$disprice= ($save/$nomprice)*100;
	
	//$reslink="<a href=\"promotionDetailsPage.php?id=" . $id . "\"> Click </a>";	
	$link="<a href=\"promotionDetailsPage.php?id=" . $id . "\">";
	echo '<div class="promotionPage">';
	echo $link.'<img src="data:image/jpeg;base64,'.base64_encode($proimage).'"/></a>';
	echo $link.'<h2>'. $proname . '</h2></a>';
	echo '<p class="discount">Discount <span style="font-weight:900;">'. $disprice .'%</span> Off</p>';
	echo '<p class="price">Price <span style="font-weight:900;">$'. $proprice.'</span></p>';
	echo '</div>';

}
?>

<!-- footer -->
<div class="footer">
	<hr></hr>
	<div id="footerLink">
		<ul>
	   		<li><a href='aboutUsPage.php'><span>About</span></a></li>
	   		<li><a href='helpPage.php'><span>Help</span></a></li>
	   		<li><a href='contactUsPage.php'><span>Contact</span></a></li>
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
