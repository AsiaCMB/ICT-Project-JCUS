
<?php
require('connectDTD.php');

$id = $_GET['id'];
$getquery=mysql_query("SELECT * FROM sellerTest WHERE id ='$id'");

while($rows=mysql_fetch_assoc($getquery))
{
	//$id=$rows['id'];
	//$image=$rows['image'];
	//header("Content-type: image/jpeg");
	//echo $image;

}
?>
