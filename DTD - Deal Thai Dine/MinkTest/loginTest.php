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

<?php
error_reporting(0);
require('connectDTD.php');
$useremail=$_POST['useremail'];
$userpass=$_POST['userpass'];
$submit=$_POST['submit'];

function phpAlert($msg) 
{
  echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

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
          $useremail = $row['useremail'];
          $userpass = $row['userpass'];
          phpAlert("Login!");    
        }  
      }
      else
      {
        phpAlert("Incorrect username or password!");
      }
    }
    else
    {
      phpAlert("Please provide your email or password!");
    }
  }
?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="commentCSS.css">
<meta charset="utf-8">
<title>Register Test</title>
</head>

<body>
  <h1>Sign in</h1>
    <form action="loginTest.php" method="POST">
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
      </table>
      <p>
        <input type="checkbox" value="remember_me" id="remember_me">
        Keep me signed in on this computer
      </p>
      <p>
        <input type="submit" name="submit">
      </p>
    </form>
  </body>
</html>