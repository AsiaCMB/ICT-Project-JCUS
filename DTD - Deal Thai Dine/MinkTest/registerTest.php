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
        }
    }
  }
	else
	{
		phpAlert("Please fill out all the necessary details!");
  }
}
?>

<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" type="text/css" href="commentCSS.css">
<meta charset="utf-8">
<title>Register Test</title>
</head>

<body>
<h1>Register</h1>
<form aciton="registerTest.php" method="POST">
<table cellspacing="2">
  <tr>
    <td><b>First Name:</b></td>
    <td><input name="userfname" type="text" size="30"/>
      *</td>
  </tr>
  <tr>
    <td><b>Last Name :</b></td>
    <td><input name="userlname" type="text" size="30"/>
      *</td>
  </tr>
  <tr>
    <td><b>Email :</b></td>
    <td><input name="useremail" type="email" size="30"/>
      *</td>
  </tr>
  <tr>
    <td><b>Password :</b></td>
    <td>
      <input name="userpass" type="password" />
      *</td>
  </tr>
  <tr>
    <td><b>Comfirm Password :</b></td>
    <td><input name="usercp" type="password" />
      *</td>
  </tr>
  <tr>
    <td width="154"><b>Register As:</b></td>
    <td width="282"><select size="1" name="usertype">
    <option value="Buyer">Buyer</option>
    <option value="Seller">Seller</option>
    </select></td>
  </tr>
  <tr>
    <td>
       <b>Receive Deal Alerts:</b>
    </td>
    <td>
      <select size="1" name="dealAccept">
    <option value="Yes">Yes</option>
    <option value="No">No</option>  
    </td>
  </tr>
</table>
  <p>
    I agree to the Terms of Use and Privacy Policy
    <input type="checkbox" name="cfpolicy" id="checkbox2" />
  </p>
  <p>
    <input type="submit" name="submit" value="Register" />
    <input type="reset" value="Reset" />
  </p>
</form>



</body>
</html>