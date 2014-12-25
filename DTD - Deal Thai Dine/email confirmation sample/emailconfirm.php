<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Confirmation Tutorial</title>
</head>

<body>
<?php

require "dbc.php";

$username = $_GET['username'];
$code = $_GET['code'];

$query = mysql_query("SELECT * FROM confirm WHERE 'username'='$username'");
while($row = mysql_fetch_assoc($query))
{
	$db_code = $row['confirm_code'];
}
if($code == $db_code)
{
	mysql_query("UPDATE confirm SET 'confirmed'='1'");
	mysql_query("UPDATE confirm SET 'confirm_code'='0'");
	
	echo "Thank You. Your email has been confimed and you may now login";
}
else
{
	echo "Username and code dont match";	
}

?>
</body>
</html>