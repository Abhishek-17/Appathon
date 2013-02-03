<style>
{ margin: 0; padding:0;}
html {
		background: url(3.jpg) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
}
</style>
<?php
session_start();
session_unset();

session_destroy();
  $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("mozilla", $con);


//Input vaildation and the dbase code
if(isset($_GET["op"])){
        if ( $_GET["op"] == "reg" )
  {
  $bInputFlag = false;
  foreach ( $_POST as $field )
        {
        if ($field == "")
    {
    $bInputFlag = false;
	break;
    }
        else
    {
    $bInputFlag = true;
    }
        }
  // If we had problems with the input, exit with error
  if ($bInputFlag == false)
        {
        echo( "Problem with your registration info. "
    ."Please go back and try again.");
	
        }

  // Fields are clear, add user to database
  //  Setup query
 else{
  $q = "INSERT INTO users (username, password, email)
       VALUES ('$_POST[username]','".($_POST["password"])."','$_POST[email]')";
  //  Run query
 
  // Make sure query inserted user successfully
  if ( !mysql_query($q) )
        {
        echo("Error: User not added to database. Try different User Name");
        }
  else
        {
        // Redirect to thank you page.
        Header("Location: register.php?op=thanks");
        }
  } // end if
}

//The thank you page
   elseif ( $_GET["op"] == "thanks" )
  {
  echo "<center class=\"margin\"><h1><u>DB_mozilla</u></h1><h2>Thanks for registering!</h2>";
  //echo "<a href=\"login.php\" class=\"link-style\" style=\"background-color:green\">GO back to login page</a></center>";
  }
  }
//The web form for input ability
        else
  {
  echo "<center ><h1><u>Easy Sharing..</u></h1><br/>
	";
  echo "<form action=\"register.php?op=reg\" method=\"POST\">\n";
  echo "Username: <input name=\"username\" MAXLENGTH=\"16\"><br />\n";
  echo "Password: &nbsp;<input type=\"password\" name=\"password\" MAXLENGTH=\"16\"><br />\n";
  echo " Email: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name=\"email\" MAXLENGTH=\"100\"><br />\n";
  echo "<input type=\"submit\">\n";
  echo "</form>";
  
  echo"</center>";
  }
        // EOF
        ?>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />



<script>
function myFunc(aa){ window.location = "modify.php?relation="+aa;return false;}
function myFunc2(){ window.location = "view.php?relation=persons&operation=view";return false;}
</script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<center class="margin">

<p ><a href="login.php"  class="link-style">Back to login..</a></p>