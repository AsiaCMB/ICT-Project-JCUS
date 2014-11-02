<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/homepageNavBar.css">
<link rel="stylesheet" type="text/css" href="css/homepageSocMed.css">
<link rel="stylesheet" type="text/css" href="css/otherFooter.css">
<link rel="stylesheet" type="text/css" href="css/homepageBannerImage.css">

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
	<p id="welcome">Welcome to Deal Thai Dine. 
	<a id="signinImage" href="DTD_LOGIN.php">Sign In<img id="loginImage" border="0" src="image/login.png" alt="Login Here"></a>
	/<a id="registImage" href="DTD_Registration_Choice.php">Register <img id="registerImage" border="0" src="image/register.png" alt="Register Here"> </a></p>
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
   <li class='active'><a href='#'><img id="homeImage" border="0" src="image/home2.png" alt="home"><span>Home</span></a></li>
   <li><a href='restaurantPage.php'><img id="restoImage" border="0" src="image/resto.png" alt="Thai Resto"><span>Thai Resto</span></a></li>
   <li><a href='promotionAllPage.php'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='#'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li class='last'><a href='aboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>

	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images">
<span><img src="data1/images/aboutus_pic1.jpg" alt="Yhingthai Palace" title="Yhingthai Palace" id="wows0"/></span>
<span><img src="data1/images/contactus_pic1.jpg" alt="" title="" id="wows1"/></span>
<span><img src="data1/images/gaeng_keow_wan.jpg" alt="Gaeng Keow Wan" title="Gaeng Keow Wan" id="wows2"/></span>
<span><img src="data1/images/khao_neow_ma_muang_mango_served_with_glutinous_rice.jpg" alt="Khao Neow Ma Muang" title="Khao Neow Ma Muang" id="wows3"/></span>
<span><img src="data1/images/khao_neow_turian_durian_served_with_glutinous_rice_and_fresh_coconut_milk.jpg" alt="Khao Neow Durian" title="Khao Neow Durian" id="wows4"/></span>
<span><img src="data1/images/online_pic1.jpg" alt="Thai Restaurant" title="Thai Restaurant" id="wows5"/></span>
<span><img src="data1/images/openingpage_pic1.jpg" alt="" title="" id="wows6"/></span>
<span><img src="data1/images/tom_yam_talay_kati_tom_yam_seafood_soup_with_coconut_milk.jpg" alt="Tom Yam Talay Kati" title="Tom Yam Talay Kati" id="wows7"/></span>
</div>
<div class="ws_bullets"><div>
<a href="#wows0" title="Yhingthai Palace"><img src="data1/tooltips/aboutus_pic1.jpg" alt="Yhingthai Palace"/>1</a>
<a href="#wows1" title=""><img src="data1/tooltips/contactus_pic1.jpg" alt=""/>2</a>
<a href="#wows2" title="Gaeng Keow Wan"><img src="data1/tooltips/gaeng_keow_wan.jpg" alt="Gaeng Keow Wan"/>3</a>
<a href="#wows3" title="Khao Neow Ma Muang"><img src="data1/tooltips/khao_neow_ma_muang_mango_served_with_glutinous_rice.jpg" alt="Khao Neow Ma Muang"/>4</a>
<a href="#wows4" title="Khao Neow Durian"><img src="data1/tooltips/khao_neow_turian_durian_served_with_glutinous_rice_and_fresh_coconut_milk.jpg" alt="Khao Neow Durian"/>5</a>
<a href="#wows5" title="Thai Restaurant"><img src="data1/tooltips/online_pic1.jpg" alt="Thai Restaurant"/>6</a>
<a href="#wows6" title=""><img src="data1/tooltips/openingpage_pic1.jpg" alt=""/>7</a>
<a href="#wows7" title="Tom Yam Talay Kati"><img src="data1/tooltips/tom_yam_talay_kati_tom_yam_seafood_soup_with_coconut_milk.jpg" alt="Tom Yam Talay Kati"/>8</a>
</div></div>
<a style="display:none" href="http://wowslider.com">HTML Image Slideshow Code by WOWSlider.com v2.0</a>
	</div>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->

<!-- banner -->
<div class="banner">
	<p id="banner1">Restaurant</p>
	<?php
	require('connectDTD2.php');
	$getquery=mysql_query("SELECT * FROM restaurant LIMIT 3");

	while($rows=mysql_fetch_assoc($getquery))
	{
		$id=$rows['id'];
		$resname=$rows['resname'];
		$resdetail=$rows['resdetail'];
		$resimage=$rows['resimage'];
		//$location=$rows['location'];
		//$contactno=$rows['contactno'];

		
		echo '<div class="homeBanner homeBanner-image">';  
	    echo '<img src="data:image/jpeg;base64,'.base64_encode($resimage).'"/>';
	    
	    echo '<div class="mask">'; 
		echo "<h2>". $resname ."</h2>";  
		echo "<p>Description Goes Here</p>"; 
		echo '<a href="restaurantPage.php" class="info">Read More</a>';  
	    echo	"</div>";  
		echo "</div>";
	}
	?>
	<div class="seeMore">
		<a href="restaurantPage.php">See more...</a>
	</div>

	<p id="banner1">Promotion</p>
	
	<?php
	require('connectDTD2.php');
	$getquery=mysql_query("SELECT * FROM promotion LIMIT 3");

	while($rows=mysql_fetch_assoc($getquery))
	{
		$id=$rows['id'];
		//$resname=$rows['resname'];
		//$resdetail=$rows['resdetail'];
		$proname=$rows['proname'];
		$proimage=$rows['proimage'];
		//$location=$rows['location'];
		//$contactno=$rows['contactno'];

		
		echo '<div class="homeBanner homeBanner-image">';  
	    echo '<img src="data:image/jpeg;base64,'.base64_encode($proimage).'"/>';
	    
	    echo '<div class="mask">'; 
		echo "<h2>". $proname ."</h2>";  
		echo "<p>Description Goes Here</p>"; 
		echo '<a href="promotionAllPage.php" class="info">Read More</a>';  
	    echo	"</div>";  
		echo "</div>";
	}
	?>

	<div class="seeMore">
		<a href="promotionAllPage.php">See more...</a>
	</div>

</div>
	
	
<!-- footer -->
<div class="footer">
	<hr></hr>
	<p id="socmedHome">Connect Socially With Us:</p>
	<div id="socmedImages" style="width:100%; text-align:center">
		<a id="fbLink" href='#'><img id="fb" border="0" src="image/fb1.png" alt="Facebook Fan Page" height="100px"></a>
		<a id="twitterLink" href='#'><img id="twitter" border="0" src="image/twitter1.png" alt="Twitter" height="100px"></a>
		<a id="youtubeLink" href='#'><img id="youtube" border="0" src="image/youtube1.png" alt="Youtube Channel" height="100px"></a>
	</div>
	<hr></hr>
	<div id="footerLink">
		<ul>
	   		<li><a href='aboutUsPage.php'><span>About</span></a></li>
	   		<li><a href='helpPage.php'><span>Help</span></a></li>
	   		<li><a href='contactUsPage.php'><span>Contact</span></a></li>
	   		<li><a href='#'><span>Career</span></a></li>
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