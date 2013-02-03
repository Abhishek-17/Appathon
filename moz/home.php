<?php include ("protected.php"); ?>
<link href="login-box.css" rel="stylesheet" type="text/css" />
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
function myFunc(aa){ 
	
	window.location = "files.php?group="+aa; 
	return false;
	}
function myFunc2(){ window.location = "view.php?relation=persons&operation=view";return false;}
</script>
<script type="text/javascript">
    function showme(id) {
        var divid = document.getElementById(id);
        if (divid.style.display == 'block') divid.style.display = 'none';
        else divid.style.display = 'block';
    }
</script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<center class="margin">
<h1><u>Easy Sharing..</u></h1>
<br/>
<a onclick="showme('gr1');" href="#"><input class="button" type="button" name="Insert Data" value="My Groups" /></a>
<div id="gr1" style="display:none;">

<?php

  $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else {
mysql_select_db("mozilla", $con);
$q="select * from group1 where username='$_SESSION[user]'";
if ( ! ($r = mysql_query($q) ))
			{
			echo("Error :". mysql_error());exit;
			return;
		}
while($row = mysql_fetch_array($r))
  {
	//mysql_fetch_array(
	
	echo "<a href=\"\"  onClick=\"return myFunc('".$row[0]."')\" class=\"link-style\">".$row[0]."</a><br/></td><br/>";
	}
}
?>	
</div>
<br/>
<a onclick="showme('gr2');" href="#"><input class="button" type="button" name="Insert Data" value="All Groups" /></a>
<div id="gr2" style="display:none;">
<?php
	$i=0;
  $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else {
mysql_select_db("mozilla", $con);
$q="select * from group1";
if ( ! ($r = mysql_query($q) ))
			{
			echo("Error :". mysql_error());exit;
			return;
		}
while($row = mysql_fetch_array($r))
  {
	//mysql_fetch_array(
	if($i%2==0){echo "<input  type=\"button\" onclick=\"showme('$i');\" class=\"link-style\" value=\"".$row[0]."\"><br/></td><br/>
			<div id=".$i." style=\"display:none;\"><form action=\"files.php\" method=\"GET\">Password: <input type=\"password\" name=\"password\"> 
					<input type=\"hidden\" name=\"group\" value=\"".$row[0]."\">
				  <input type=\"submit\" value=\"Go to Group\" class=\"link-style\">
				</form></div>";}
	$i++;
	}
}
?>	
</div>





