<?php 
session_start();
?>
<?php
include("connect.php");
error_reporting(0); 
$n=$_SESSION['name'];
if($n!=null)
{
?>
<html>
<head>
<script type="text/javascript">
function phn()
{
document.write("<audio autoplay><source src=pn.ogg type=audio/ogg hidden=true autostart=true></audio>");
}
</script>
<?php
$id=0;
$id=$_GET['id'];
if($id!=0)
{
$_SESSION['phn']=1;
}
else
{
$_SESSION['phn']=0;
}


$qw=$_SESSION['res'];
$qer=$qw+1;
?>

<body>
<script>
phn();
</script>
<?php
$result4=mysqli_query($con,"select * from quiz1 where qid=$qer");
$row1=mysqli_fetch_array($result4);

$phn=$row1['phn'];

sleep(10);
echo"<font color=red>";
echo "Your Friend Said ans is ".$phn;
echo"</font>";
}
else
{
echo"<a href=kbc/index.php>kindly follow proper process></a>";
}
?>
</body>
</html>




