<?php
require('connectDTD.php');
$sellerID=$_GET['id'];
$getquery=mysql_query("SELECT * FROM sellerTest WHERE id='$sellerID'");

while($rows=mysql_fetch_assoc($getquery))
{
	$id=$rows['id'];
	$resname=$rows['resname'];
	$description=$rows['description'];
	$location=$rows['location'];
	$contactno=$rows['contactno'];
	//$reslink="<a href=\"resLink.php?id=" . $id . "\"> resname </a>";	
	echo $resname . '<br />' . $description . '<br />' . $location . '<br />' . $contactno . '<br />' . '<hr align="left" width="500px" />';
}
?>