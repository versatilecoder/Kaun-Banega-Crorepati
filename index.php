<html>
<head>
<script type="text/javascript">

function sound()
{
document.write("<audio autoplay><source src=kbt.ogg type=audio/ogg hidden=true autostart=true></audio>");
}

function check()
{

var x=document.forms["n"]["name"].value;
var x2=document.forms["n"]["rs"];
if (x==null || x=="")
  {
  alert("Name must be filled out");
  return false;
  }

for(var i=0; i<x2.length; i++) {
        if( x2[i].checked ) {
            return true;  
}
}
alert("Choose the Padao");
return false;
}

</script>
</head>

<body background="images/kbcbg.png">
<script>
sound();
</script>

<div style="float:left;background-color:#FFF8E1; height:400px; width:200px";>
<p><font color="red">
RULES:
<ol>
<li>You have 1 Minute of Answering Questions till you reach your padao.
<li>After This you have Sufficient time to answer.
<li>You can use Life Line for Help.
<li>If you are not sure you can QUIT the game in between.
<li>If you have not reached your padao and give the wrong answer You will get Rs.0.
</ol>
</font>
</div>


<table align="center" bgcolor="#FFF8E1">
<th>Choose Your Padao from the money after entering your name.</th>
<form action="kbc.php" name="n" method="POST" onsubmit="return check()">
<tr><td>Enter name:<input type="text" name="name"></td></tr>
<tr><td>
<br><br>

<img src=images/ap.jpg title="audience poll">&nbsp&nbsp
<img src=images/phn.jpg title="phone friend">&nbsp&nbsp 
<img src=images/ex.jpg title="expert">&nbsp&nbsp
<img src=images/2x.jpg title="swap">&nbsp&nbsp 
<br></td></tr><tr><td>
<input type=radio name=rs value=50000000>Rs.5 crore
<br><input type="radio" name="rs" value="10000000">Rs.1 crore
<br><input type="radio" name="rs" value="5000000">Rs.50 lakh
<br><input type="radio" name="rs" value="2500000">Rs.25 lakh
<br><input type="radio" name="rs" value="1250000">Rs.12,50,000
<br><input type="radio" name="rs" value="640000">Rs.6,40,000
<br><input type="radio" name="rs" value="320000">Rs.3,20,000
<br><input type="radio" name="rs" value="160000">Rs.1,60,000
<br><input type="radio" name="rs" value="80000">Rs.80,000
<br><input type="radio" name="rs" value="40000">Rs.40,000
<br><input type="radio" name="rs" value="20000">Rs.20,000
<br><input type="radio" name="rs" value="10000">Rs.10,000
<br><input type="radio" name="rs" value="5000">Rs.5,000
<br><br>
<input type="submit" value="PlayGame">

</form>
</td></tr></table>
</body>
</html>