<?php session_start(); ?>
<?php
error_reporting(1);
require('connectDTD2.php');
$useremail=$_POST['useremail'];
$userpass=$_POST['userpass'];
$submit=$_POST['submit'];

function phpAlert($msg) 
{
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
//IF user already login go to homepage
//if(isset($_SESSION['use']))
  //{
    //header("Location:homepage.html");
  //}

  
  if($submit)
  {
    if($useremail&&$userpass)
    {
      $query = mysql_query("SELECT * FROM user WHERE useremail='$useremail' AND userpass='$userpass'");
      $numrow = mysql_num_rows($query);

      if($numrow != 0)
      {
      

        while($row = mysql_fetch_assoc($query))
        {
          $id=$row['id'];
          $useremail = $row['useremail'];
          $userpass = $row['userpass'];
          $usertype = $row['usertype'];
          $userfname = $row['userfname'];

          //phpAlert("Login!"); 
          if ($usertype == "Seller")
          {
            $_SESSION['id']=$id;
            $_SESSION['use']=$userfname;
            $_SESSION['email']=$useremail;
            header("Location: sellerPage.php");

          }
          else
          {
            $_SESSION['id']=$id;
            $_SESSION['use']=$userfname;
            $_SESSION['email']=$useremail;
            header("Location: buyerPage.php");

          }
        }  
      }
      else
      {
        phpAlert("Incorrect username or password!");
        //header("Location: DTD_LOGIN.php");
      }
    }
    else
    {
      phpAlert("Please provide your email or password!");
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
<link rel="stylesheet" type="text/css" href="css/loginForm.css">
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
	<p id="welcome">Welcome to Deal Thai Dine. 
	<a id="signinImage" href="DTD_LOGIN.php">Sign In<img id="loginImage" border="0" src="image/login.png" alt="Login Here"></a>
	/<a id="registImage" href="DTD_Registration_Choice.php">Register <img id="registerImage" border="0" src="image/register.png" alt="Register Here"> </a></p>
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

<!-- login -->
<div>
	<h1>Sign in</h1>
    <form action="DTD_LOGIN.php" method="POST">
      <table cellspacing="2">
        <tr>
          <td width="84">
            <label for="Email"> <b>Email:</b></label>
          </td>
          <td>
            <input type="email" name="useremail" id="username" placeholder="Enter your email" size='30'> 
          </td>
        </tr>
          <tr>
          <td>
            <label for="Password"><b>Password:</b></label>
          </td>
          <td>
            <input type="password" name="userpass" id="pass" placeholder="Enter your password" size='30'>
          </td>
        </tr>
      <tr>
        <td colspan="2"><input type="checkbox" value="remember_me" id="remember_me">
        Keep me signed in on this computer
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
        <input type="submit" name="submit" class="btn">
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


<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script>
    $(function() 
    {
      if (localStorage.chkbx && localStorage.chkbx != '') 
      {
        $('#remember_me').attr('checked', 'checked');
        $('#username').val(localStorage.usrname);
        $('#pass').val(localStorage.pass);
      } 
      else 
      {
        $('#remember_me').removeAttr('checked');
        $('#username').val('');
        $('#pass').val('');
      }
      $('#remember_me').click(function() 
      {
        if ($('#remember_me').is(':checked')) 
        {
           // save username and password
          localStorage.usrname = $('#username').val();
          localStorage.pass = $('#pass').val();
          localStorage.chkbx = $('#remember_me').val();
        } 
        else 
        {
          localStorage.usrname = '';
          localStorage.pass = '';
          localStorage.chkbx = '';
          }
      });
    }); 
</script>
