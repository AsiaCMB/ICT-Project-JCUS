<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<link rel="shortcut icon" href="icon.ico" />
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/footerNavBar.css">
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
	<a id="signinImage" href="loginpage.html">Sign In<img id="loginImage" border="0" src="image/login.png" alt="Login Here"></a>
	/<a id="registImage" href="#">Register <img id="registerImage" border="0" src="image/register.png" alt="Register Here"> </a></p>
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
   <li><a href='#'><img id="homeImage" border="0" src="image/home2.png" alt="home"><span>Home</span></a></li>
   <li><a href='#'><img id="restoImage" border="0" src="image/resto.png" alt="Thai Resto"><span>Thai Resto</span></a></li>
   <li><a href='#'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='#'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li><a href='#'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>


<head>
<link rel="stylesheet" type="text/css" href="commentCSS.css">
<meta charset="utf-8">
<title>Seller Form</title>
</head>

<body>
<h1>Seller Form</h1>
<form enctype="multipart/form-data" action="sellerForm.php" method="POST">
<table cellspacing="2">
  <tr>
    <td width="145"><b>Restaurant Name:</b></td>
    <td width="599"><input name="resname" type="text" size="40"/>
      *</td>
  </tr>
  <tr>
    <td><b>Promotion Description:</b></td>
    <td><p>
      <textarea name="description" cols="55" rows="4"></textarea>
      *</p></td>
    </tr>
  <tr>
    <td><b>Price:</b></td>
    <td><p>
      <label for="number">Promotion Price:</label>
      <label for="number2">
        <input name="Price" type="text" size="8" id="Price"/>
        * 
        Full Price: </label>
      <input name="Price1" type="text" size="8" id="Price1"/>
      *</p></td>
    </tr>
  <tr>
    <td><b>Restaurant Description:</b></td>
    <td><p>
      <textarea name="location3" cols="55" rows="4"></textarea>
     *</p></td>
    </tr>
  <tr>
    <td><b>Contact number:</b></td>
    <td>+65
      <input type="tel" name="contactno1" pattern="[0-9]{8}" placeholder="8 digits" size="8" id="contactno1" />
      *</td>
    </tr>
  <tr>
    <td><b>Location Address:</b></td>
    <td><textarea name="location3" cols="30" rows="3"></textarea>
      *</td>
    </tr>
  <tr>
    <td height="70"><b>Image/Logo:</b></td>
    <td><p>
      <input name="image2" type="file" />
      <input name="image2" type="file" />
    </p>
      <p>
        <input name="image2" type="file" />
        <input name="image" type="file" />
      </p></td>
    </tr>
</table>
  <p>
    <input type="image" name="imageField" id="imageField" src="Button/Submit.jpg" />
    <input type="image" name="imageField2" id="imageField2" src="Button/reset-button.jpg" />
  </p>
</form>



</body>
<!-- footer -->
<div class="footer">
	<hr></hr>
	<div id="footerLink">
		<ul>
	   		<li><a href='#'><span>About</span></a></li>
	   		<li><a href='#'><span>Help</span></a></li>
	   		<li><a href='#'><span>Contact</span></a></li>
	   		<li><a href='#'><span >Career</span></a></li>
	   		<li><a id="fbLink" href='#'><img id="fb" border="0" src="image/fb1.png" alt="Facebook Fan Page" height="40px"></a>
				<a id="twitterLink" href='#'><img id="twitter" border="0" src="image/twitter1.png" alt="Twitter" height="40px"></a>
				<a id="youtubeLink" href='#'><img id="youtube" border="0" src="image/youtube1.png" alt="Youtube Channel" height="40px"></a></li>
		</ul>
	</div>
	<hr></hr>
	<div id="paymentLogo" >
		<a href="#" onclick="javascript:window.open('https://www.paypal.com/sg/cgi-bin/webscr?cmd=xpt/Marketing/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=400, height=350');"><img  src="image/paypalLogo.png" border="0" alt="PayPal" height="50px"></a></td></tr></table>
		<p id="copyright">Copyright© 2014 promochan.com</p>
	</div>
</div>
</body>
</html>
