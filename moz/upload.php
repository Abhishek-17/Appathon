<?php include ("protected.php"); ?>
<?php

if(isset($_GET["group"])){

   $con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else {
mysql_select_db("mozilla", $con);

$allowedExts = array("jpg", "jpeg", "gif", "png");
//$extension = end(explode(".",$_FILES["file"]["name"]));
  echo $_FILES["file"]["size"];
if($_FILES["file"]["size"] < 2000000)
//&& in_array($extension, $allowedExts)

  {

  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {

	$n=$_FILES["file"]["name"];
	$q="INSERT INTO group2 VALUES ('$_GET[group]','$n')";
	if ( ! ($r = mysql_query($q) ))
			{
			echo("Error :". mysql_error());exit;
			return;
		}
    if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
	   Header("Location: files.php?group=$_GET[group]");
      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
    }
    }
	}
	}
  

?>