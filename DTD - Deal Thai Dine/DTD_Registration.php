
<?php
error_reporting(0);
require('connectDTD.php');
$usertype=$_POST['usertype'];
$userfname=$_POST['userfname'];
$userlname=$_POST['userlname'];
$useremail=$_POST['useremail'];
$userpass=$_POST['userpass'];
$usercp=$_POST['usercp'];
$dealAccept=$_POST['dealAccept'];
$submit=$_POST['submit'];
$cfpolicy=$_POST['cfpolicy'];


function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}


if($submit)
{
  if($usertype&&$userfname&&$userlname&&$useremail&&$userpass&&$usercp)
  {
    $query = mysql_query("SELECT * FROM user WHERE useremail='$useremail'");
    $numrow = mysql_num_rows($query);
    
    if($numrow != 0)
      {
        while($row = mysql_fetch_assoc($query))
        {
          $useremail = $row['useremail'];
          phpAlert("This email has already been used!");    
        }  
      }
      else
      {
        if($userpass!=$usercp)
        {
          phpAlert("The confirmation password is not match!");
        }
        elseif ($cfpolicy != 'on') 
        {
          phpAlert("Please accept the term of use and policy!");
        }
        else
        {
          $insert=mysql_query("INSERT INTO user (userfname, userlname, useremail, userpass, usertype, dealAccept) VALUES ('$userfname','$userlname','$useremail','$userpass', '$usertype', '$dealAccept')");
          phpAlert("Successfully register!");
          header("Location: DTD_LOGIN.php");
        }
    }
  }
  else
  {
    phpAlert("Please fill out all the necessary details!");
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Deal Thai Dine</title>
<link rel="shortcut icon" href="icon.ico" />
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css"/>
<link rel="stylesheet" type="text/css" href="css/registerForm.css"/>
<link rel="stylesheet" type="text/css" href="css/footerNavBar.css"/>
<link rel="stylesheet" type="text/css" href="css/otherSocMed.css"/>
<link rel="stylesheet" type="text/css" href="css/otherFooter.css"/>

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
   <li><a href='promotionAllPage.php'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='#'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li><a href='aboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>

<!-- login -->
<div>
  <h1>Register</h1>
<form aciton="registerTest.php" method="POST">
<table cellspacing="2">
  <tr>
    <td><b>First Name:</b></td>
    <td><input name="userfname" type="text" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Last Name :</b></td>
    <td><input name="userlname" type="text" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Email :</b></td>
    <td><input name="useremail" type="email" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Password :</b></td>
    <td>
      <input name="userpass" type="password" class="text" />
      *</td>
  </tr>
  <tr>
    <td><b>Comfirm Password :</b></td>
    <td><input name="usercp" type="password" class="text"/>
      *</td>
  </tr>
  <tr>
    <td width="154"><b>Register As:</b></td>
    <td width="282"><select size="1" name="usertype" class="dropUser">
    <option value="Buyer">Buyer</option>
    <option value="Seller">Seller</option>
    </select></td>
  </tr>
  <tr>
    <td>
       <b>Receive Deal Alerts:</b>
    </td>
    <td>
      <select size="1" name="dealAccept" class="dropDeal">
    <option value="Yes">Yes</option>
    <option value="No">No</option>  
    </td>
  </tr>
  <tr>
    <td colspan="2">
      I agree to the Terms of Use and Privacy Policy
    <input type="checkbox" name="cfpolicy" id="checkbox2" />
    </p>
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
    <input type="submit" name="submit" value="Register" class="btn" />
    <input type="reset" value="Reset" class="btn" />
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
		<p id="copyright">Copyright© 2014 promochan.com</p>
	</div>
</div>
</body>
</html>
