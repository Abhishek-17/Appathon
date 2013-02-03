<?php
session_start();

if (!$_SESSION["user"])
        {
        // User not logged in, redirect to login page
        Header("Location: login.php");
		exit;
        }



// Display Member information

echo "<p style=\"text-align:right\">
</br>Username: " . $_SESSION["user"];
echo "</br>Logged in: " . date("m/d/Y", $_SESSION["valid_time"]);

// Display logout link
echo "</br><a href=\"logout.php\" class=\"link-style\">Click here to logout!</a></p>";
 echo"<p style=\"text-align:left\"><a href=\"home.php\" class=\"link-style\">Go back to home page</a></p>";
if($_SESSION["user"]=="root")echo"<p style=\"text-align:left\"><a href=\"useradmin.php\" class=\"link-style\" style=\"background-color:red\">User Administration</a></p>";
?>