<?php
session_start();
?>

<html>
<head>
<script language="javascript">
function submit(name)
{
var n=name;
alert(n);
window.location.replace("submit.php?name=n");
}

</script>
</head>
<body style="background-color:#EDEDED">




<?php 

error_reporting(0);


$con=mysqli_connect("localhost","vcoder","versatile@726339","vcoder_exam");
if(mysqli_connect_errno($con))
{
echo "failed to connect".mysqli_connect_error();
}

$start=$_POST['start'];

//$name=$_REQUEST["name"];
//$_SESSION['name']=$name;
//echo $_SESSION['name'];

if($start==NULL)
{
$start=$_GET["start"];
$name=$_GET["name"];

}
if($start==NULL)
{
$result=mysqli_query($con,"select * from quiz where qid=1");
//mysqli_query($con,"insert into user values('$name',0)");
$_SESSION["done"]=array(1,1,1,1,1,1,1,1,1);
}
else
{
$result=mysqli_query($con,"select * from quiz where qid=$start");

}

//$nm=$_GET["name"]; 
$useropt=$_POST["useropt"];
$qid=$_POST["qid"];

if($useropt!=null)
{
$_SESSION["done"][$qid]=0;
}

for($i=0;$i<9;$i++)
{
echo $_SESSION["done"][$i];
}
echo $_SESSION["done"][$qid];
echo "<div style=float:right>";
echo"<form action=exam.php method=post>";
for($j=1;$j<13;$j++)
{
if($j%3==0)
{
echo"<br>";
}
if($_SESSION["done"][$j]==0)
{
echo "<input  type=submit name='start' value=$j disabled> ";
continue;
}
echo "<input  type=submit name='start' value=$j> ";

}
echo"</form>";
echo"</div>";


$result1=mysqli_query($con,"select woptcode from quiz where qid=$qid");


$row = mysqli_fetch_array($result1) ;

if(strcmp($row['woptcode'],$useropt)==0)
{
 $rans=$rans+4;
$_SESSION['marks']=$rans;

}
else if($useropt!=null)
{
$rans=$rans-1;
$_SESSION['marks']=$rans;
}

echo "<table align=center bgcolor=gray border=1 width=75%>";
echo "<form action=exam.php?name=$nm method=post>";
while($row = mysqli_fetch_array($result))
  {

echo "<tr><td>";
  echo $row['qid'];
  echo $row['question'];
 echo "<br>";
  echo"<input type=radio name=useropt  value=$row[op1]>";
    echo $row['op1'];
echo "<br>";
  echo"<input type=radio name=useropt value=$row[op2]>";
  echo $row['op2'];
echo "<br>";
  echo"<input type=radio name=useropt  value=$row[op3]>";
  echo $row['op3'];
echo "<br>";
  echo"<input type=radio name=useropt value=$row[op4]>";
  echo $row['op4'];
  echo "<br>";
  echo "<input type='hidden' name='start' value='",$row['qid']+1,"'>";
 echo "<input type='hidden' name='qid' value='",$row['qid'],"'>";
 echo "<input type='hidden' name='name1' value=$name>";
 
  }

echo "</tr></td>";
echo "<tr><td colspan=5 align=right>";
echo "<input type=submit value=nextquestion>";

echo "</form>";
echo "<form action=submit.php method=post>";
 echo "<input type='submit' name=$nm value='submit'>";
echo"</form>";
echo "</td></tr>";


echo "<tr><td colspan='4'>";


echo "</td></tr>";
echo "</table>";




?>
</body>
</html>