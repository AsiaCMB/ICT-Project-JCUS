<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/promotionNavBar.css">
<link rel="stylesheet" type="text/css" href="css/promotionDetails.css">
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
	/<a id="registImage" href="proForm.php">Submit Promotion</a></p>
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
   <li><a href='sellerPage.php'><img id="homeImage" border="0" src="image/home2.png" alt="home"><span>Home</span></a></li>
   <li><a href='sellerRestaurantPage.php'><img id="restoImage" border="0" src="image/resto.png" alt="Thai Resto"><span>Thai Resto</span></a></li>
   <li class='active'><a href='sellerPromotionAllPage.php'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='#'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li class='last'><a href='sellerAboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>

<!-- Promotion Details -->
<?php
require('connectDTD2.php');
$sellerID=$_GET['id'];
$getquery=mysql_query("SELECT * FROM promotion WHERE id='$sellerID'");

while($rows=mysql_fetch_assoc($getquery))
{
	$id=$rows['id'];
	$proimage=$rows['proimage'];
	$proprice=$rows['proprice'];
	$nomprice=$rows['nomprice'];
	$prostart=$rows['prostart'];
	$proend=$rows['proend'];
	$highlights=$rows['highlights'];
	$conditions=$rows['conditions'];
	$location=$rows['location'];
	$contactno=$rows['contactno'];
	$save = $nomprice - $proprice;
	$discount = ($save/$nomprice)*100;
	//$reslink="<a href=\"resLink.php?id=" . $id . "\"> resname </a>";	
	//echo '<h1>'.  $resname . '</h1> <br />' . $description . '<br />' . $location . '<br />' . $contactno . '<br />' . '<hr align="left" width="500px" />';
	echo '<br />';
	echo '<div class="promotionPrice">';
	echo '<img src="data:image/jpeg;base64,'.base64_encode($proimage).'"/>';
	echo '<div class="promotionPriceSide">';
	echo '<img src="image/home2.png">';
	echo '<p><span style="font-weight:900;">Available till '.$proend.'</span></p>';
	echo '<p><span style="font-weight:900;">Promotion Price $'. $proprice.'</span></p>';
	echo '<p>Normal Price $'. $nomprice.'</p>';
	echo '<p>Save $'.$save.'</p>';
	echo '<p><span style="font-weight:900;">'. round($discount,2).'% Off</span></p>';
	echo '</div>';

	echo '<div class="promotionPriceDetails">';
	echo '<p id="highlights">';
	echo '<span style="font-weight:900;">Highlights</span></br>';
	echo  $highlights .'</p>';

	echo '<p id="conditions">';
	echo '<span style="font-weight:900;">Conditions</span></br>';
	echo $conditions .'</p>';

	echo '</div>';
	echo '<div class="promotionDetails">';
	echo '<p><span style="font-weight:900;">Details</span></br>' . $location . $contactno. '</p>';
	echo '</div>';
	echo '</div>';

}
?>

<div class="commentSection" >
	<p><span style="font-weight:900; text-decoration:underline;">Customers: Review</span></p>
		<p>
			<?php
			$ID=$_GET['id'];
			$getquery=mysql_query("SELECT * FROM comment WHERE proID='$ID' ORDER BY id DESC");			
			while($rows=mysql_fetch_assoc($getquery))
			{
				$id=$rows['id'];
				$name=$rows['name'];
				$comment=$rows['comment'];

				//$dellink="<a href=\"delete.php?id=" . $id . "\"> Delete </a>";	
				echo '<b>Name: '.$name . '</b><br />' . '<br />' . $comment .  '<br />' . '<hr align="left" width="500px" />';
			}
			?>
		</p>
		
</div>

<!-- footer -->
<div class="footer">
	<hr></hr>
	<div id="footerLink">
		<ul>
	   		<li><a href='sellerAboutUsPage.php'><span>About</span></a></li>
	   		<li><a href='sellerHelpPage.php'><span>Help</span></a></li>
	   		<li><a href='sellerContactUsPage.php'><span>Contact</span></a></li>
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
