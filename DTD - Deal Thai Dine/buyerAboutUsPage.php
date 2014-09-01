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
<link rel="stylesheet" type="text/css" href="css/commentForm.css">
<link rel="stylesheet" type="text/css" href="css/aboutUs.css">
<link rel="stylesheet" type="text/css" href="css/aboutusNavBar.css">
<link rel="stylesheet" type="text/css" href="css/otherSocMed.css">
<link rel="stylesheet" type="text/css" href="css/otherFooter.css">

<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<style type="text/css">a#vlb{display:none}</style>
<script type="text/javascript" src="engine1/jquery.js"></script>
<script type="text/javascript" src="engine1/wowslider.js"></script>
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
		echo "Welcome " . $_SESSION['use']. "| ";
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
   <li class='active'><a href='buyerAboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>

<div class="aboutUsContent">
	<p id="aboutUsTitle"><span style="font-weight:900;">About Us</span></p>
	<p>Established in 2010, DEAL.com.sg has since transformed to become Singapore’s Number One online shopping platform, offering  what you’d love to have at the best price.
 
	Reaching out to thousands of our customers daily, DEAL constantly seeks better ways and bargains to satisfy savvy shoppers like you!
 
	DEAL remains unrivalled in providing both customers and merchants with the experiences you never knew you could get in Singapore. We cherish the remarkable partnerships we have with our merchants and take pride in passing the great savings directly to our valued customers.
 
	At zero risk, our reputable merchants gain new customers through these partnerships, recognizing the benefits of being featured on DEAL.com.sg. The invincible DEALGuru welcomes you to check us out on Facebook  and follow @DEALGuruSG  to interact with us!
 
 
	Interested in being featured on DEAL.com.sg?
	Click here to get to know more about how you can be the next best selling deal!</p>
</div>
<br>
<?php
error_reporting(0);
require('connectDTD.php');

$name=$_SESSION['use'];
$comment=$_POST['comment'];
$submit=$_POST['submit'];

if($submit)
{
	if($name&&$comment)
	{
		$insert=mysql_query("INSERT INTO comment (name, comment) VALUES ('$name','$comment')");
	}
	else
	{
		echo "Please fill out all the fields";
	}
}
?>

<div class="commentSection" >
	<form id="commentForm" action="buyerPromotionDetailsPage.php" method="POST">
		<textarea rows="4" name="comment" form="commentForm" placeholder="Enter Review Here...." class="text"></textarea></br>
		<input type="submit" name="submit" value="Submit" class="commentSubmit">
	</form>
		<p>
			<?php
			$getquery=mysql_query("SELECT * FROM comment ORDER BY id DESC");
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
