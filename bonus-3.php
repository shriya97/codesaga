<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(($team['l3q1']==$ans['l3q1'])&&($team['l3q2']==$ans['l3q2'])&&($team['l3q3']==$ans['l3q3'])&&($team['l3q4']==$ans['l3q4'])&&($team['l3q5']==$ans['l3q5']))
	;
else 
	header('Location:error.html');
if(isset($_POST['submit']))
	{
    $A=$_POST['bonus3'];
	//session_start();
	//$_SESSION['bonus3']=$_POST['bonus3'];
	//if($team['l3q5']!=NULL)
		mysql_query("Update event set bonus3='$A' where Username='$u1'");
$p=mysqli_query("Select bonus3 from event where Username='$u1'");
$t=mysqli_fetch_array($p);

		if($ans['bonus3']==$t['bonus3'])
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
<title> Bonus 3 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="b1">
<h1 font size="6" align=left> Bonus Question 3</h1>
<font size="5" face="comic sans ms">
These are used for developing almost anything. <br> It is a single utility program, a set of software <br> 
routines that are used to develop and maintain applications and database. </font>
<font size="6">
    <br><br>
	Output: <br>
</font>
<form method="POST" action="bonus-3.php">
<!--<?php if($team['bonus3']!=NULL)
	$ANS_DB=$team['bonus3']; ?>-->
	<input id="button_in" type="text" value="<?php  echo $_POST['bonus3'];?>" name="bonus3"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>