<?php
require('connectDTD2.php');
$deleteid=$_GET['id'];
mysql_query("DELETE FROM user WHERE id='$deleteid'");
header("location: adminUserManagement.php");
?>