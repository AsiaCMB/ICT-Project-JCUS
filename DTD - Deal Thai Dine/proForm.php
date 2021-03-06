<?php session_start(); ?>

<?php
error_reporting(0);
require('connectDTD2.php');

$uemail=$_SESSION['email'];

$proname=$_POST['proname'];
$prodetail=$_POST['prodetail'];

$proprice=$_POST['proprice'];
$nomprice=$_POST['nomprice'];

$prostart=$_POST['prostart'];
$proend=$_POST['proend'];

$highlights=$_POST['highlights'];
$conditions=$_POST['conditions'];

$proimage= addslashes(file_get_contents($_FILES['proimage']['tmp_name']));
$proimagetype= getimagesize($_FILES['proimage']['tmp_name']);
$proimgtype= $proimagetype['mime'];
$submit=$_POST['submit'];


function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if($submit)
{
  if($proname&&$highlights&&$conditions&&$proprice&&$nomprice&&$prostart&&$proend)
  {   

      $getquery=mysql_query("SELECT * FROM restaurant WHERE useremail ='$uemail' ");

      while($rows=mysql_fetch_array($getquery))
      {
        $id=$rows['id'];
        $resname=$rows['resname'];

        $insert=mysql_query("INSERT INTO promotion (resname, proname, highlights, conditions, proprice, nomprice, prostart, proend, proimage, proimgtype) VALUES ('$resname', '$proname', '$highlights', '$conditions', '$proprice', '$nomprice', '$prostart', '$proend', '$proimage', '$proimgtype')");        
        $uploadpro=move_uploaded_file($proimgtype,'userimage/'.$proimage);
        phpAlert("Successfully create page!");
        header("Location: sellerPromotionAllPage.php");  
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

<link rel="stylesheet" type="text/css" href="css/homepage.css">
<link rel="stylesheet" type="text/css" href="css/sellerForm.css">
<link rel="stylesheet" type="text/css" href="css/footerNavBar.css">
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
  <a id="submitProForm" href="#"><img id="submitProButton" border="0" src="image/button.png" alt="submit">Submit Promotion</a><br>
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

<!-- Seller Form -->
<h1>Promotion Form</h1>
<form enctype="multipart/form-data" action="proForm.php" method="POST">
<table cellspacing="2" class="promotion">
  <tr>
    <td><b>Promotion Name:</b></td>
    <td><input name="proname" type="text" size="40" class="textPro"/>
      *</td>
  </tr>
  <tr>
    <td><b>Highlights:</b></td>
    <td><textarea name="highlights" cols="55" rows="4" class="textAreaPro"></textarea>
      *</td>
  </tr>
  <tr>
    <td><b>Conditions:</b></td>
    <td><textarea name="conditions" cols="55" rows="4" class="textAreaPro"></textarea>
      *</td>
  </tr>

  <tr>
    <td><b>Price:</b></td>
    <td><p>
      <label for="number" class="numberPos">Discount Price:</label>
      <label for="number2">
        <input name="proprice" type="text" pattern="\d*" size="8" class="number" />
        * 
        Full Price: </label>
      <input name="nomprice" type="text" pattern="\d*"  size="8" class="number"/>
      *</p></td>
   </tr>
  <tr>
    <td><b>Promotion Period:</b></td>
    <td><p>
      <label for="number" class="numberPos">Start:</label>
      <label for="number2">
        <input name="prostart" type="date" class="number"/>
        * 
        End: </label>
      <input name="proend" type="date" class="number"/>
      *</p></td>
   </tr>
  <tr>
    <td><b>Promotion Image:</b></td>
    <td><input name="proimage" type="file" class="numberPos" />
      </td>
  </tr>
  <tr>
    <td></td>
    <td>
    <br>
    <input type="submit" name="submit" value="Submit" class="btn"/>
    <input type="reset" value="Reset" class="btn"/>
    </td>
  </tr>
</table>
</form>

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
    <p id="copyright">Copyright© 2014 promochan.com</p>
  </div>
</div>
</body>
</html>


