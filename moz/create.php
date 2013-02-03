<?php include ("protected.php"); ?>
<?php
if(isset($_POST["groupname"])){
	 $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else {
mysql_select_db("mozilla", $con);
$q="INSERT INTO group1 VALUES ('$_POST[groupname]','$_POST[password]','$_SESSION[user]','$_POST[description]')";
	if ( ! ($r = mysql_query($q) ))
			{
			echo("Error :". mysql_error());exit;
			return;
		}
	else {Header("Location: home.php");};
}


}
?>