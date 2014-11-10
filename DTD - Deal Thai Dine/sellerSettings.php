<?php session_start(); ?>

<?php
error_reporting(1);
require('connectDTD2.php');
$uemail=$_SESSION['email'];
$resname=$_POST['resname'];
$resdetail=$_POST['resdetail'];
$reslocation=$_POST['reslocation'];
$contactno=$_POST['contactno'];

$userid=$_SESSION['id'];
$userfname=$_POST['userfname'];
$userlname=$_POST['userlname'];
$useroldpass=$_SESSION['oldpass'];
$usernewpass=$_POST['usernewpass'];
$usercnp=$_POST['usercnp'];
$submit=$_POST['submit'];
//echo $useroldpass;
//echo $_SESSION['oldpass'];

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if($submit)
{
	if($usernewpass&&$usercnp)
	{
	    if($usernewpass!=$usercnp)
	    {
	       	phpAlert("The confirmation password is not match!");
   		}
	    else
	    {
        	$update1=mysql_query("UPDATE restaurant SET resname='$resname', resdetail='$resdetail', reslocation='$reslocation', contactno='$contactno' WHERE useremail='$uemail' ");
		    $update2=mysql_query("UPDATE user SET userfname='$userfname', userlname='$userlname', userpass='$usernewpass' WHERE id='$userid' ");
		    phpAlert("Successfully update!");
		    header("Location: DTD_LOGIN.php");
	   	}
	}        

	else 
	{
    	$update1=mysql_query("UPDATE restaurant SET resname='$resname', resdetail='$resdetail', reslocation='$reslocation', contactno='$contactno' WHERE useremail='$uemail' ");
    	$update2=mysql_query("UPDATE user SET userfname='$userfname', userlname='$userlname', userpass='$useroldpass' WHERE id='$userid' ");
		phpAlert("Successfully update!");
		header("Location: DTD_LOGIN.php");
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

<h1>Account Settings</h1>
<?php
require("connectDTD2.php");
$useremail=$_SESSION['email'];
$userid=$_SESSION['id'];
//echo $userid;

		
	$getquery1=mysql_query("SELECT * FROM restaurant WHERE useremail='$useremail' ORDER BY id DESC");			
	while($rows=mysql_fetch_assoc($getquery1))
	{		
	 $resname=$rows['resname'];	
	 $resdetail=$rows['resdetail'];
	 $reslocation=$rows['reslocation'];
	 $contactno=$rows['contactno'];

	 echo "<div class='userSettings'>
	<form method='POST' action='sellerSettings.php'>
		<table cellspacing='2'>
		  <tr>
		    <td><b>Restaurant Name:</b></td>
		    <td><input name='resname' type='text' size='30' class='text'value='$resname'/></td>
		  </tr>
		  <tr>
		    <td><b>Restaurant Description:</b></td>
		    <td><textarea name='resdetail' cols='55' rows='4' class='textArea'>$resdetail</textarea></td>
		  </tr>
		  <tr>
    <td><b>Restaurant Location: </b></td>
    <td><input name='reslocation' type='text' size='30' class='text' value='$reslocation'/>
      *</td>
  </tr>
   <tr>
    <td><b>Contact number:</b></td>
    <td>
      <h5 class='numberPos'>+65 <input type='tel' name='contactno' pattern='[0-9]{8}' placeholder='8 digits' size='8' class='number' value='$contactno' />
      *</td></h5>
  </tr>";
	}
			
	$getquery2=mysql_query("SELECT * FROM user WHERE id='$userid' ORDER BY id DESC");			
	while($rows=mysql_fetch_assoc($getquery2))
	{		
	 $ufname=$rows['userfname'];	
	 $ulname=$rows['userlname'];
	 $uemail=$rows['useremail'];
	 $upass=$rows['userpass'];

	 $_SESSION['oldpass']=$upass;
	
		  echo "<tr>
		    <td><b>First Name:</b></td>
		    <td><input name='userfname' type='text' size='30' class='text' value='$ufname'/></td>
		  </tr>
		  <tr>
		    <td><b>Last Name :</b></td>
		    <td><input name='userlname' type='text' size='30' class='text' value='$ulname'/></td>
		  </tr>
		    <td><b>Old Password :</b></td>
		    <td>
		      <input name='useroldpass' type='text' disabled class='text' value='$upass'/></td>
		  </tr>
		  <tr>
		    <td><b>New Password :</b></td>
		    <td>
		      <input name='usernewpass' type='password' class='text' /></td>
		  </tr>
		  <tr>
		    <td><b>Confirm New Password :</b></td>
		    <td><input name='usercnp' type='password' class='text'/></td>
		  </tr>
		  <tr>
		    <td width='154'><b>Register As:</b></td>
		    <td><input name='usertype' type='text' size='30' disabled class='text' value='Seller'></td>
		  </tr>
		  <tr>
		    <td></td>
		    <td>
		    <input type='submit' name='submit' value='Submit' class='btn' />
		    <input type='reset' value='Cancel' class='btn' />
		    </td>
		  </tr>
				</table>
			</form>
		</div>";
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
