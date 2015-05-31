<?php 
session_start();
?>

<html>
<head>

<?php
include("connect.php");
error_reporting(0); 
$n=$_SESSION['name'];
if($n!=null)
{
$id=0;
$id=$_GET['id'];
if($id!=0)
{
$_SESSION['ex']=1;
}
else
{
$_SESSION['ex']=0;
}



$qwt=$_SESSION['res'];
$qy=$qwt+1;
echo $qid;
?>

<body>
<?php
$result4=mysqli_query($con,"select * from quiz1 where qid=$qy");
$row1=mysqli_fetch_array($result4);

$ex=$row1['ex'];
echo"<font size=4 color=red>";
echo" <img src=images/p.jpg>";
echo "Our Expert Pranav";
sleep(10);
echo "said He thinks ans is";
echo"<br>". $ex."</font>";
}
else
{
echo"<a href=index.php>kindly enter the name and begin</a>";

}
?>
</body>
</html>