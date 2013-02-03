
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
<script>
function myFunc(aa){ window.location = "modify.php?relation="+aa;return false;}
</script>
<?php include ("protected.php"); ?>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<h1 style="text-color:white"><u>Easy Sharing..</u></h1>
<?php echo "<form action=\"upload.php?group=$_GET[group]\" method=\"post\" enctype=\"multipart/form-data\">"; ?>
<label for="file">Filename:</label>
<input type="file" name="file" id="file"> 
<input type="submit" name="submit" value="Submit">
</form>
<h3>Group: <?php echo $_GET['group']; ?></h3><br/>
<?php
if(isset($_GET["group"])){
		if(isset($_GET["password"])){
	$con = mysql_connect("localhost","root","");
	if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
	else{
	mysql_select_db("mozilla", $con);
	$q="SELECT password from group1 where name='$_GET[group]' ";
	if ( ! ($r = mysql_query($q) ))
			{
			echo("Error :". mysql_error());exit;
			return;
		}
	$row = mysql_fetch_array($r);
	
	if($row[0]!=$_GET["password"]){echo "<h2>WRONG PASSWORD</h2>" ;return;}
	//return;
	}
	}
   $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else {
mysql_select_db("mozilla", $con);

$q="select * from group2 where name='$_GET[group]'";
if ( ! ($r = mysql_query($q) ))
			{
			echo("Error :". mysql_error());exit;
			return;
		}
while($row = mysql_fetch_array($r))
  {
	$n=$row[1];
	//mysql_fetch_array(
	echo "<a href=\"upload/".$row[1]."\"onClick=\"return myFunc(".$row[1].")\" class=\"link-style\">".$row[1]."</a><br/>";
	//echo "</br><a href=\"logout.php\" class=\"link-style\">Click here to logout!</a></p>";
  
	}

}
}
?>	