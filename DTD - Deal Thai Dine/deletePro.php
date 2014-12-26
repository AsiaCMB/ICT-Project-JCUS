<?php
require('connectDTD2.php');
$deleteid=$_GET['id'];
mysql_query("DELETE FROM promotion WHERE id='$deleteid'");
header("location: adminReport.php");
?>