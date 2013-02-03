<?php include ("protected.php"); ?>
<script>
function myFunc(aa){ window.location = "modify.php?relation="+aa;return false;}
function myFunc2(){ window.location = "view.php?relation=persons&operation=view";return false;}
</script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<center class="margin">
<h1><u>DB_Coaching</u></h1>
<p ><a href=""  onClick="return myFunc('Student')" class="link-style">Students</a></p>
<p ><a href=""  class="link-style" onClick="return myFunc('Faculty')">Faculty</a></p>
<p ><a href=""  class="link-style" onClick="return myFunc('Staff')">Staff</a></p>
<p ><a href=""  class="link-style" onClick="return myFunc('Printers')">Material Printers</a></p>
<p ><a href=""  class="link-style" onClick="return myFunc('Batch2')">Batches</a></p>
<!--<p ><a href=""  class="link-style" onClick="return myFunc('Is_run_in')">Running courses</a></p>-->
<p ><a href=""  class="link-style" onClick="return myFunc('subject')">Subjects</a></p>
<p ><a href=""  class="link-style" onClick="return myFunc('Teach_in')">Teaching slots</a></p>
<p ><a href=""  class="link-style" onClick="return myFunc2()">View Person Table</a></p>

</center>