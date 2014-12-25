<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Confirmation Tutorial</title>
</head>

<body>
<form action="register.php" method="POST">
	<input type="text" name="username" placeholder="Enter A Username..."><br />
    <input type="email" name="email" placeholder="Enter An Email Address..."><br />
    <input type="password" name="password" placeholder="Enter A Password..."><br />
	<input type="submit" name="submit" value="Register">
</form>
<?php

if(isset($_POST['submit']))
{
	require "dbc.php";
	
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	
	$enc_password = md5($password);
	
	if($username && $email && $password)
	{
		$confirmcode = rand();
		$query = mysql_query("INSERT INTO confirm (username, password, email, confirmed, confirm_code) VALUES('$username','$enc_password','$email','0','$confirmcode')");
		
		$message =
		"
		Confirm Your Email
		Click the link below to verify your account
		http://www.dealsthaidine.com/emailconfirm.php?username=$username&code=$confirmcode
		";
		
		mail($email,"Deals Thai Dine Confirm Email",$message,"From: support@dealsthaidine.com");
		
		echo "Registration Complete! Please confirm your email address";
	}
}
?>
</body>
</html>