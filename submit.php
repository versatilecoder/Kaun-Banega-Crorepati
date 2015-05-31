<?php 
session_start();
?>

<html>
<head>
<script type="text/javascript">
function soundwr()
{
document.write("<audio autoplay><source src=wrn.ogg type=audio/ogg hidden=true autostart=true></audio>");
}
</script>
</head>

<?php
error_reporting(0);
include("connect.php");
$name=$_SESSION['name'];
if($name!=null)
{
$money=$_SESSION['money'];
if($money==null)
{
$money=0;
}
echo $name;
?>
<body bgcolor="black">
<script>
soundwr();
</script>

<?php

echo "<table background=images/kbvc.jpg align=center width=50% height=75%>";
echo "<tr><td colspan=2>";

echo"<font color=yellow>";
echo $name;
echo "&nbsp&nbspyou won&nbsp&nbsp";
echo $money;
echo "&nbsp&nbspmoney&nbsp&nbsp";
echo"</font>";
echo "</td></tr></table>";

session_destroy();
}
else 
{echo"<a href=index.php>enter name here</a>";
}
?>
</body>
</html>