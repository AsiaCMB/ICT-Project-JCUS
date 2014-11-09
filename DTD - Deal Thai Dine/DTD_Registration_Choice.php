<?php
error_reporting(1);
require('connectDTD2.php');
$resname=$_POST['resname'];
$resdetail=$_POST['resdetail'];
$reslocation=$_POST['reslocation'];
$contactno=$_POST['contactno'];
$resimage= addslashes(file_get_contents($_FILES['resimage']['tmp_name']));
$resimagetype= getimagesize($_FILES['resimage']['tmp_name']);
$resimgtype= $resimagetype['mime'];
$usertypeS="Seller";
$userfnameS=$_POST['userfnameS'];
$userlnameS=$_POST['userlnameS'];
$useremailS=$_POST['useremailS'];
$userpassS=$_POST['userpassS'];
$usercpS=$_POST['usercpS'];
$dealAcceptS=$_POST['dealAcceptS'];
$submitS=$_POST['submitS'];
$cfpolicyS=$_POST['cfpolicyS'];



$usertypeB="Buyer";
$userfnameB=$_POST['userfnameB'];
$userlnameB=$_POST['userlnameB'];
$useremailB=$_POST['useremailB'];
$userpassB=$_POST['userpassB'];
$usercpB=$_POST['usercpB'];
$dealAcceptB=$_POST['dealAcceptB'];
$submitB=$_POST['submitB'];
$cfpolicyB=$_POST['cfpolicyB'];

function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}


if($submitS)
{
  if($userfnameS&&$userlnameS&&$useremailS&&$userpassS&&$usercpS&&$resname&&$resdetail&&$reslocation)
  {
    $query = mysql_query("SELECT * FROM user WHERE useremail='$useremailS'");
    $numrow = mysql_num_rows($query);
    
    if($numrow != 0)
      {
        while($row = mysql_fetch_assoc($query))
        {
          $useremailS = $row['useremail'];
          phpAlert("This email has already been used!");    
        }  
      }
      else
      {
        if($userpassS!=$usercpS)
        {
          phpAlert("The confirmation password is not match!");
        }
        elseif ($cfpolicyS != 'on') 
        {
          phpAlert("Please accept the term of use and policy!");
        }
        else
        {
          $insert=mysql_query("INSERT INTO user (userfname, userlname, useremail, userpass, usertype, dealAccept) VALUES ('$userfnameS','$userlnameS','$useremailS','$userpassS', '$usertypeS', '$dealAcceptS')");
          $insert2=mysql_query("INSERT INTO restaurant (resname, resdetail, reslocation, contactno, resimage, resimgtype) VALUES ('$resname','$resdetail','$reslocation','$contactno','$resimage','$resimgtype')");
          $uploadres=move_uploaded_file($resimgtype,'userimage/'.$resimage);
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


if($submitB)
{
  if($userfnameB&&$userlnameB&&$useremailB&&$userpassB&&$usercpB)
  {
    $query = mysql_query("SELECT * FROM user WHERE useremail='$useremailB'");
    $numrow = mysql_num_rows($query);
    
    if($numrow != 0)
      {
        while($row = mysql_fetch_assoc($query))
        {
          $useremailB = $row['useremail'];
          phpAlert("This email has already been used!");    
        }  
      }
      else
      {
        if($userpassB!=$usercpB)
        {
          phpAlert("The confirmation password is not match!");
        }
        elseif ($cfpolicyB != 'on') 
        {
          phpAlert("Please accept the term of use and policy!");
        }
        else
        {
          $insert=mysql_query("INSERT INTO user (userfname, userlname, useremail, userpass, usertype, dealAccept) VALUES ('$userfnameB','$userlnameB','$useremailB','$userpassB', '$usertypeB', '$dealAcceptB')");
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script><script>
$(document).ready(function(){
  $("#formBuyer").hide();
  $("#formSeller").hide();
  $("#formS").click(function(){
    $("#formBuyer").hide();
    $("#formSeller").show(1000);
  });
  $("#formB").click(function(){
    $("#formSeller").hide();
    $("#formBuyer").show(1000);
  });
});
</script>

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
    <input type="text" name="subsemail">
  </form>
	<p id="welcome">Welcome to Deal Thai Dine. 
	<a id="signinImage" href="DTD_LOGIN.php">Sign In<img id="loginImage" border="0" src="image/login.png" alt="Login Here"></a>
	/<a id="registImage" href="DTD_Registration.php">Register <img id="registerImage" border="0" src="image/register.png" alt="Register Here"> </a></p>
</div>

<!-- logo and search button section -->
<div class="logoParent">
  <a href="index.php"><img id="logoImage" border="0" src="image/logo2.png" alt="Promochan Logo"></a>
</div>

<!-- navigation bar -->
<div id='cssmenu' class='align-center'>
<ul>
   <li><a href='index.php'><img id="homeImage" border="0" src="image/home2.png" alt="home"><span>Home</span></a></li>
   <li><a href='restaurantPage.php'><img id="restoImage" border="0" src="image/resto.png" alt="Thai Resto"><span>Thai Resto</span></a></li>
   <li><a href='promotionAllPage.php'><img id="promotionImage" border="0" src="image/promotion.png" alt="Promotion"><span>Promotion</span></a></li>
   <li><a href='careerPage.php'><img id="careerImage" border="0" src="image/career.png" alt="Career"><span>Career</span></a></li>
   <li><a href='aboutUsPage.php'><img id="aboutImage" border="0" src="image/about.png" alt="About"><span>About Us</span></a></li>
</ul>
</div>

<div>
<h1>Register As:</h1>
<table>
  <tr>
    <td><button id="formS">Seller</button></td>
    <td><button id="formB">Buyer</button></td>
  </tr>
</table>


<!-- Register as seller -->
<form enctype="multipart/form-data" action="DTD_Registration_Choice.php" method="POST" id="formSeller">
<table cellspacing="2">
  <tr>
    <td><b>Restaurant Name:</b></td>
    <td><input name="resname" type="text" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Restaurant Description:</b></td>
    <td><textarea name="resdetail" cols="55" rows="4" class="textArea"></textarea>
      *</td>
  </tr>
  <tr>
    <td><b>Restaurant Location: </b></td>
    <td><input name="reslocation" type="text" size="30" class="text"/>
      *</td>
  </tr>
   <tr>
    <td><b>Contact number:</b></td>
    <td>
      <h5 class="numberPos">+65 <input type="tel" name="contactno" pattern="[0-9]{8}" placeholder="8 digits" size="8" class="number" />
      *</td></h5>
  </tr>
  <tr>
    <td><b>Restaurant Image:</b></td>
    <td><input name="resimage" type="file" class="numberPos" />
      </td>
  </tr>
  <tr>
    <td><b>First Name:</b></td>
    <td><input name="userfnameS" type="text" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Last Name :</b></td>
    <td><input name="userlnameS" type="text" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Email :</b></td>
    <td><input name="useremailS" type="email" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Password :</b></td>
    <td>
      <input name="userpassS" type="password" class="text" />
      *</td>
  </tr>
  <tr>
    <td><b>Comfirm Password :</b></td>
    <td><input name="usercpS" type="password" class="text"/>
      *</td>
  </tr>
  <tr>
    <td width="154"><b>Register As:</b></td>
    <td><input name="usertypeS" type="text" size="30" disabled class="text" value="Seller"></td>
  </tr>
  <tr>
    <td>
       <b>Receive Deal Alerts:</b>
    </td>
    <td>
      <select size="1" name="dealAcceptS" class="dropDeal">
    <option value="Yes">Yes</option>
    <option value="No">No</option>  
    </td>
  </tr>
  <tr>
    <td colspan="2">
      I agree to the Terms of Use and Privacy Policy
    <input type="checkbox" name="cfpolicyS" id="checkbox2" />
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
    <input type="submit" name="submitS" value="Register" class="btn" />
    <input type="reset" value="Reset" class="btn" />
    </td>
  </tr>
</table>
</form>



<!-- Register as buyer -->
<form aciton="DTD_Registration_Choice.php" method="POST" id="formBuyer">
<table cellspacing="2">
  <tr>
    <td><b>First Name:</b></td>
    <td><input name="userfnameB" type="text" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Last Name :</b></td>
    <td><input name="userlnameB" type="text" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Email :</b></td>
    <td><input name="useremailB" type="email" size="30" class="text"/>
      *</td>
  </tr>
  <tr>
    <td><b>Password :</b></td>
    <td>
      <input name="userpassB" type="password" class="text" />
      *</td>
  </tr>
  <tr>
    <td><b>Comfirm Password :</b></td>
    <td><input name="usercpB" type="password" class="text"/>
      *</td>
  </tr>
  <tr>
    <td width="154"><b>Register As:</b></td>
    <td><input name="usertypeB" type="text" size="30" disabled class="text" value="Buyer"></td>
  </tr>
  <tr>
    <td>
       <b>Receive Deal Alerts:</b>
    </td>
    <td>
      <select size="1" name="dealAcceptB" class="dropDeal">
    <option value="Yes">Yes</option>
    <option value="No">No</option>  
    </td>
  </tr>
  <tr>
    <td colspan="2">
      I agree to the Terms of Use and Privacy Policy
    <input type="checkbox" name="cfpolicyB" id="checkbox2" />
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
    <input type="submit" name="submitB" value="Register" class="btn" />
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
        <li><a href='careerPage.php'><span>Career</span></a></li>
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
