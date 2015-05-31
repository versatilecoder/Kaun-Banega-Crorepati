<?php
session_start();
?>

<html>
<?php
error_reporting(0);
$con=mysqli_connect("localhost","vcoder","versatile@726339","vcoder_exam");
if(mysqli_connect_errno($con))
{
echo "failed to connect".mysqli_connect_error();
}


      
?>
    <head>
    <title>KBC</title>

<script type="text/javascript">
 
    var mins = 1;
     
    var secs = mins * 60;
    function countdown() {
    setTimeout('Decrement()',1000);
    }
    function Decrement() {
    if (document.getElementById) {
    minutes = document.getElementById("minutes");
    seconds = document.getElementById("seconds");
  
if(mins==0 && secs==0)
{
alert('time finished');
window.location.replace("submit.php?name=<?php echo $name;?>");
}
    if (seconds < 59) {
    seconds.value = secs;
    } else {
    minutes.value = getminutes();
    seconds.value = getseconds();
    }
    secs--;
    setTimeout('Decrement()',1000);
    }
    }
    function getminutes() {
    
    mins = Math.floor(secs / 60);
    return mins;
    }
    function getseconds() {
   
    return secs-Math.round(mins *60);
    }

function soundwr()
{
window.location.replace("submit.php");
}

function sound()
{
document.write("<audio autoplay><source src=phn.ogg type=audio/ogg hidden=true autostart=true></audio>");
}

function check()
{

var x=document.forms["kbc"]["useropt"];

for(var i=0; i<x.length; i++) {
        if( x[i].checked ) {
            return true;  
}
}
alert("you cant go to next without answer either quit the game or use life line");
return false;
}

    </script>
    </head>

 
     <?php

      

     $pd=$_POST['rs'];
      $qid=$_POST["qid"];
if($qid==null)
{ $n=0;}
else{
     $n=$qid;}
 
     $mon=array(5000,10000,20000,40000,80000,160000,320000,640000,125000,2500000,5000000,10000000,50000000);
     $c=$mon[$n];


?>
   <body bgcolor="black">
<?php 
if($c<=$pd)
{
   
?>


<div id="timer">
    You have <input id="minutes" type="text" style="width: 14px; border: none; background-color:cyan; font-size: 16px; font-weight: bold;"> minutes and <input id="seconds" type="text" style="width: 26px; border: none; background-color:cyan; font-size: 16px; font-weight: bold;"> seconds left.
    </div>
    <script>
    countdown();
</script>


<?php 
}?>

<?php 





$start=$_POST['start'];
if($start==NULL)
{
$start=$_GET["start"];
$name=$_REQUEST['name'];
$_SESSION['name']=$name;
}


$nm=$_SESSION['name'];


if($nm!=null)
{
mysqli_query($con,"insert into user values('$name',0)");
if($start==NULL)
{
$result=mysqli_query($con,"select * from quiz1 where qid=1");
mysqli_query($con,"insert into user values('$name',0)");
}
else
{
$result=mysqli_query($con,"select * from quiz1 where qid=$start");
}

$result3=mysqli_query($con,"select * from kbc");


$v=$_SESSION['gtt'];
$f=$_SESSION['ex'];
$k=$_SESSION['phn'];
$g=$_SESSION['2x'];


echo"<div  id=money style=background-color:black;float:right>";
if($v!=1)
{
echo "<a href=ap.php?id=1 target=ap><img src=images/ap.jpg onclick=javascript:this.src='images/apc.jpg'; ></a>&nbsp&nbsp";
}
else
{
echo "<img src=images/apc.jpg>&nbsp&nbsp";
}
if($k!=1)
{

echo "<a href=phn.php?id=1 target=ap><img src=images/phn.jpg onclick=javascript:this.src='images/phnc.jpg';></a>&nbsp&nbsp ";
}
else
{
echo "<img src=images/phnc.jpg>&nbsp&nbsp";
}

if($f!=1)
{
echo "<a href=ex.php?id=1 target=ap><img src=images/ex.jpg onclick=javascript:this.src='images/exc.jpg';></a>&nbsp&nbsp";
}
else
{

echo "<img src=images/exc.jpg>&nbsp&nbsp";
}

echo "<img src=images/2xc.jpg>&nbsp&nbsp";

echo "<br>";
while($row3 = mysqli_fetch_array($result3))
  {
   $i=0;
   

echo "<font color=yellow>";
if(strcmp($pd,$row3[rs])==0)
{
echo $row3[id];
echo "<span style=background-color:purple;><input type=radio name=rs value=$row3[rs]  disabled></span>";
}
else if($row3[id]<$qid+1)
{
echo $row3[id];

echo "<label><span style=background-color:green;><input type=radio  name=rs value=$row3[rs]  disabled></span></label>";

}
else
{
echo $row3[id];
echo "<input type=radio name=rs value=$row3[rs] disabled>";
}
echo "Rs.".$row3[rs];
echo"</font>";
echo "<br>";

}
echo"</div>";



echo"<br><div  style=background-color:black;float:left; >";
echo"<iframe  style= background-color:black;height:75%; frameBorder=0 name=ap>";
echo "</iframe>";
echo"</div>";

$useropt=$_POST["useropt"];
$qid=$_POST["qid"];
$er=$qid;
$_SESSION['res']=$er;

$result1=mysqli_query($con,"select wopt from quiz1 where qid=$qid");


$row5 = mysqli_fetch_array($result1) ;

if(strcmp($row5['wopt'],$useropt)==0)
{
$qwe=$qid-1;
$_SESSION['money']=$mon[$qwe];


}
else if($useropt!==null)
{
?>
<script>
soundwr();
</script>
<?php
}
echo "<table align=center   border=1 width=51% height=58%>";
echo "<form action='kbc.php' method=post name='kbc' onsubmit='return check()'>";
while($row = mysqli_fetch_array($result))
  {

echo "<tr><td colspan=2><font color=yellow size=5>";
echo "<br>";
  echo $row['qid'].")&nbsp";
  echo $row['question'];
 echo "<br><tr><td><font color=yellow size=5>";
  echo"<input type=radio name=useropt  value=$row[op1]>";
    echo "A)"." ".$row['op1'];
echo "</td><td><font color=yellow size=5>";
  echo"<input type=radio name=useropt value=$row[op2]>";
  echo "B)"." ".$row['op2'];
echo "</td></tr><tr><td><font color=yellow size=5>";
  echo"<input type=radio name=useropt  value=$row[op3]>";
  echo "C)"." ".$row['op3'];
echo "</td><td><font color=yellow size=5>";
  echo"<input type=radio name=useropt value=$row[op4]>";
  echo "D)"." ".$row['op4'];
  echo"</td></tr>";
  echo "<input type='hidden' name='start' value='",$row['qid']+1,"'>";
 echo "<input type='hidden' name='qid' value='",$row['qid'],"'>";
 echo "<input type='hidden' name='name1' value=$name>";
  echo "<input type='hidden' name='rs' value=$pd>";

  }

echo "</font>";
echo "<br><tr><td colspan=2 align=right>";  
echo "<input type=submit value=nextquestion>";
echo "</form>";

 echo "<center><a href=submit.php><img src=images/quit.png></a>";
echo"</form>";
echo "</td></tr>";
echo "</table>";

}
else
{
echo"<a href=index.php>Kindly follow proper process</a>";
}



?>
</body>
</html>
