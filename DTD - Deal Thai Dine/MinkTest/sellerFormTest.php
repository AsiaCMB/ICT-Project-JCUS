<?php
error_reporting(0);
require('connectDTD.php');
$resname=$_POST['resname'];
$description=$_POST['description'];
$location=$_POST['location'];
$contactno=$_POST['contactno'];
$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
$imagetype= getimagesize($_FILES['image']['tmp_name']);
$imgtype= $imagetype['mime'];
$submit=$_POST['submit'];


function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if($submit)
{
	if($resname&&$description&&$location&&$contactno)
	{        
      $insert=mysql_query("INSERT INTO sellerTest (resname, description, location, contactno, image, imgtype) VALUES ('$resname','$description','$location','$contactno', '$image', '$imgtype')");        
      $upload=move_uploaded_file($imgtype,'userimage/'.$image);
      phpAlert("Successfully create page!");       
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
<title>Seller Form</title>
</head>

<body>
<h1>Seller Form</h1>
<form enctype="multipart/form-data" action="sellerForm.php" method="POST">
<table cellspacing="2">
  <tr>
    <td><b>Restaurant Name:</b></td>
    <td><input name="resname" type="text" size="30"/>
      *</td>
  </tr>
  <tr>
    <td><b>Description:</b></td>
    <td><textarea name="description" cols="40" rows="5"></textarea>
      *</td>
  </tr>
  <tr>
    <td><b>Location Address:</b></td>
    <td><textarea name="location" cols="30" rows="3"></textarea>
      *</td>
  </tr>
  <tr>
    <td><b>Contact number:</b></td>
    <td>
      <h5>+65 <input type="tel" name="contactno" pattern="[0-9]{8}" placeholder="8 digits" size="8" />
      *</td></h5>
  </tr>
  <tr>
    <td><b>Image/Logo:</b></td>
    <td><input name="image" type="file" />
      </td>
  </tr>
</table>
  <p>
    <input type="submit" name="submit" value="Submit"/>
    <input type="reset" value="Reset" />
  </p>
</form>



</body>
</html>