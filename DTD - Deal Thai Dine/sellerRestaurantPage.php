	<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/restaurantNavBar.css">
<link rel="stylesheet" type="text/css" href="css/restaurantPage.css">
<link rel="stylesheet" type="text/css" href="css/otherSocMed.css">
<link rel="stylesheet" type="text/css" href="css/otherFooter.css">

</head>

<body background="image/bgImage.jpg" onload="LoadGmaps()" onunload="GUnload()">

<!-- subscribe email, sign up and register section -->
<div class="signupParent"> 
  <form id="subscribeEmail">
    <input type="text" name="subsemail">
  </form>
	<p id="welcome">
		<?php 
		if(!isset($_SESSION['use']))
		{
			header("Location: DTD_LOGIN.php");
		}
		echo 'Welcome <a id="configImage" href="sellerSettings.php">' . $_SESSION['use']. '<img id="settingsImage" border="0" src="image/settings.png" alt="settings"></a>';
		echo '| ';
	?> 
	<a id="signinImage" href="signOUT.php">Sign Out<img id="loginImage" border="0" src="image/login.png" alt="Sing Out"></a>
</div>

<!-- logo and search button section -->
<div class="logoParent">
	<a href="sellerPage.php"><img id="logoImage" border="0" src="image/logo2.png" alt="Promochan Logo"></a>
	<a id="submitProForm" href="proForm.php"><img id="submitProButton" border="0" src="image/button.png" alt="submit">Submit Promotion</a><br>
	<a id="submitJobForm" href="sellerCareerForm.php"><img id="submitJobButton" border="0" src="image/button.png" alt="submit">Submit Job Vacancy</a>
</div>

<!-- navigation bar -->
<div id='cssmenu' class='align-center'>
<ul>
   <li><a href='sellerPage.php'><img id="homeImage" border="0" src="image/home2.png" alt="home"><span>Home</span></a></li>
   <li class='active'><a href='sellerRestaurantPage.php'><img id="restoImage" border="0" src="image/resto.png" alt="Thai Resto"><span>Thai Resto</span></a></li>
   <li><a href='sellerPromotionAllPage.php'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='sellerCareerPage.php'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li class='last'><a href='sellerAboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>


<h1>Thai Restaurants in Singapore</h1>
<?php
error_reporting(0);
require('connectDTD2.php');

$getquery=mysql_query("SELECT * FROM restaurant ORDER BY id DESC");
while($rows=mysql_fetch_array($getquery))
{
	$id=$rows['id'];
	$resname=$rows['resname'];
	$resdetail=$rows['resdetail'];
	$reslocation=$rows['reslocation'];
	$contactno=$rows['contactno'];
	$resimage=$rows['resimage'];
	
	$reslink="<a href=\"sellerRestaurantPro.php?resname=" . $resname . "\">";	
	
	echo '<div class="restaurantPage">';
	echo '<p class="restaurantTitle">'.$resname.'</p>';
	//echo $link.'<img src="data:image/jpeg;base64,'.base64_encode($image).'"/></a>';
	echo $reslink. '<img src="data:image/jpeg;base64,'.base64_encode($resimage).'"/> </a>';
	//echo '</br></br>';
	echo '<p><span style="font-weight:900;">Restaurant Detail: </span>' . $resdetail . '</p>';
	echo '<p><span style="font-weight:900;">Restaurant Location: </span>' . $reslocation . '</p>';
	echo '<p><span style="font-weight:900;">Contact Number: </span>' . $contactno . '</p>';
	echo '</div>';

}
?>

<!-- footer -->
<div class="footer">
	<hr></hr>
	<div id="footerLink">
		<ul>
	   		<li><a href='sellerAboutUsPage.php'><span>About</span></a></li>
	   		<li><a href='sellerHelpPage.php'><span>Help</span></a></li>
	   		<li><a href='sellerContactUsPage.php'><span>Contact</span></a></li>
	   		<li><a href='sellerCareerPage.php'><span>Career</span></a></li>
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
