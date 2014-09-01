
<?php
error_reporting(0);
require('connectDTD.php');

$getquery=mysql_query("SELECT * FROM sellerTest ORDER BY id DESC");
while($rows=mysql_fetch_array($getquery))
{
	$id=$rows['id'];
	$resname=$rows['resname'];
	$description=$rows['description'];
	$image=$rows['image'];
	
	$reslink="<a href=\"resLink.php?id=" . $id . "\"> Click </a>";	
	echo $resname;
	echo '</br>';
	echo $description;
	echo '</br>';
	//echo "<img src=getImage.php?id=".$id. " width=200 height=200 />";	
	echo '<img src="data:image/jpeg;base64,'.base64_encode($image).'" width=200 height=200/>';
	echo '</br>';
	echo $reslink;
	echo '</br></br>';

}
?>
