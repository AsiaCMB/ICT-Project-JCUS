<?php session_start(); ?>

<?php
error_reporting(0);
require('connectDTD2.php');
$jobtitle=$_POST['jobtitle'];
$jobdescription=$_POST['jobdescription'];
$requirements=$_POST['requirements'];
$resume=$_POST['resume'];
$expyears=$_POST['expyears'];
$submit=$_POST['submit'];
$jobposition=$_POST['jobposition'];
$useremail=$_SESSION['email'];

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}


if($submit)
{
  if($jobtitle&&$jobdescription&&$requirements&&$resume&&$expyears&&$jobposition)
  {
  	$insert=mysql_query("INSERT INTO career (jobtitle, jobposition, jobdescription, requirements, expyears, resume, useremail, resuser, resname, reslocation) SELECT '$jobtitle','$jobposition','$jobdescription','$requirements','$expyears','$resume','$useremail',resuser,resname,reslocation FROM restaurant WHERE useremail='$useremail'");
    phpAlert("Job Vacancy Posted");
    header("Location: careerPage.php");
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="script/stickNavBar.js"></script>

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/footerNavBar.css">
<link rel="stylesheet" type="text/css" href="css/settingsForm.css">
<link rel="stylesheet" type="text/css" href="css/otherSocMed.css">
<link rel="stylesheet" type="text/css" href="css/otherFooter.css">
</head>

<body background="image/bgImage.jpg">

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
   <li><a href='sellerRestaurantPage.php'><img id="restoImage" border="0" src="image/resto.png" alt="Thai Resto"><span>Thai Resto</span></a></li>
   <li><a href='sellerPromotionAllPage.php'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='sellerCareerPage.php'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li><a href='sellerAboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>

<h1>Job Vacancy Form</h1>
<div class="jobform">
	<form method="POST">
		<table cellspacing="2">
		  <tr>
		    <td><b>Job Vacancy Title:</b></td>
		    <td><input name="jobtitle" type="text" size="30" class="text"/>*</td>
		  </tr>
		  <tr>
		    <td><b>Job Position:</b></td>
		    <td><input name="jobposition" type="text" size="30" class="text"/>*</td>
		  </tr>
		  <tr>
		    <td><b>Job Desciption:</b></td>
		    <td><textarea name="jobdescription" cols="55" rows="4" class="textArea"></textarea>*</td>
		  </tr>
		  <tr>
		    <td><b>Requirements:</b></td>
		    <td><textarea name="requirements" cols="55" rows="4" class="textArea"></textarea>*</td>
		  </tr>
		  <tr>
		    <td><b>Minimum Experience Years:</b></td>
		    <td><select name="expyears" class="dropUser">
		    	<option value="1">1</option>
		    	<option value="2">2</option>
		    	<option value="3">3</option>
		    	<option value="4">4</option>
		    	<option value="5">5</option>
		    </select>*</td>
		  </tr>
		  <tr>
		    <td><b>Resume Send To:</b></td>
		    <td>
		      <input name="resume" type="text" class="text" />*</td>
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
