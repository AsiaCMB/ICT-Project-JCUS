
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
$useremail=$_GET['useremail'];
$userpass=$_GET['userpass'];
$submit=$_GET['submit'];

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