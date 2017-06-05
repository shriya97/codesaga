<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(($team['l1q1']==$ans['l1q1'])&&($team['l1q2']==$ans['l1q2'])&&($team['l1q3']==$ans['l1q3'])&&($team['l1q4']==$ans['l1q4'])&&($team['l1q5']==$ans['l1q5']));
else 
	header('Location:error.html');
if(isset($_POST['submit']))
	{
    $A=$_POST['bonus1'];
	//session_start();
	//$_SESSION['bonus1']=$_POST['bonus1'];
	//if($team['l1q5']!=NULL)
	mysqli_query("Update event set bonus1='$A' where Username='$u1'");
$p=mysqli_query("Select bonus1 from event where Username='$u1'");
$t=mysqli_fetch_array($p);

	if($ans['bonus1']==$t['bonus1'])
		{
		echo '<script language="javascript">';
		echo 'alert("Correct Answer!")';
		echo '</script>';
		}
	else
{
echo '<script language="javascript">';
		echo 'alert("Incorrect Answer!")';
		echo '</script>';
} 
	
	}
?>
<html>
<title> Bonus 1 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="b1">
<h1 font size="6" align=left> Bonus Question 1</h1>
<font size="5">
The ________ keyword in oops can be used with classes. <br>
 While a/an _________ class declared with <br>
this keyword cannot be instantiated.<br>
</font>
<font size="6">
    <br><br>
	Output: <br>
</font>
<form method="POST" action="bonus-1.php">
<!--<?php if($team['bonus1']!=NULL)
	$ANS_DB=$team['bonus1']; ?>-->
	<input id="button_in" type="text" value="<?php echo $_POST['bonus1'];?>" name="bonus1"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>