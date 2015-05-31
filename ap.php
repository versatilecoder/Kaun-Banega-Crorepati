<?php include("connect.php");
session_start();
?>

<html>
<head>
<?

error_reporting(0); 
$n=$_SESSION['name'];
if($n!=null)
{
$id=0;
$id=$_GET['id'];
if($id!=0)
{
$_SESSION['gtt']=1;
}
else
{
$_SESSION['gtt']=0;
}

$qw=$_SESSION['res'];
$qe=$qw+1;


?>

<body>
<?php
$result4=mysqli_query($con,"select * from quiz1 where qid=$qe");
$row1=mysqli_fetch_array($result4);

$ap=$row1['ap'];

echo "<img src=images/$ap>";
}
else
{
echo"<a href=/index.php>Kindly follow proper process</a>";
}
?>
</body>
</html>


