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
//echo "<link rel=\"stylesheet\" href=\"style.css\" type=\"text/css\">";
session_start();
if(isset($_SESSION["valid_user"])){
 Header("Location: home.php");
		exit;
		}
  

//Input vaildation and the dbase code
if(isset($_POST["op"])){

        if ($_POST["op"] == "login")
  {
  if (!$_POST["username"] || !$_POST["password"])
        {
        die("You need to provide a username and password.");
        }
   $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else {
mysql_select_db("mozilla", $con);
$q = "SELECT * FROM users where username='$_POST[username]' and password='$_POST[password]'";
	if ( ! ($r = mysql_query($q) ))
			{
			echo("Error :". mysql_error());exit;
	
		}
else {
	if(mysql_num_rows($r)!=0 ){
		$_SESSION["user"] = $_POST["username"];
		$_SESSION["password"] = $_POST["password"];
		$_SESSION["valid_time"] = time();
		Header("Location: home.php");
	}
	else {echo $_POST[password];}
}

// Redirect to member page

}

        
   
  
}
}   
   else
  {
//If all went right the Web form appears and users can log in
 // echo "<p style=\"text-align:right\"><a href=\"register.php\" class=\"link-style\" style=\"background-color:green\">Register</a></p>";
	//echo "<div id=\"login-box\">";
  echo "<div id=\"login-box\" class=\"margin\"><h1><u>Easy Sharing..</u></h1><h3>Login</h3>";
  
  echo "<form action=\"\" method=\"POST\">";
  echo "<input name=\"op\"  type=\"hidden\" value=\"login\">";
  echo "Username: <input name=\"username\" MAXLENGTH=\"16\"><br />";
  echo "Password: &nbsp;<input type=\"password\" name=\"password\" MAXLENGTH=\"16\"><br />";
  echo " <input type=\"submit\" value=\"Login\" class=\"link-style\">";
  echo "</form>";
 // echo "</br><a href=\"register.php\" class=\"link-style\">Register</a>";
 // echo "</center>";
 echo"<p >Not a member yet? : <a href=\"register.php\"  class=\"link-style\">Register.</a></p>";
  echo "</div>";
  }
  
        
		?>
		
<link href="login-box.css" rel="stylesheet" type="text/css" />