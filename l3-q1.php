<?php
include 'navigate.php';
include 'core.php';
if($team['l2q5']==$ans['l2q5'])
	;
else 
	header('Location:error.html');
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
    $A=$_POST['l3q1'];
	session_start();
	$_SESSION['l3q1']=$_POST['l3q1'];
	if($team['l3q5']!=NULL)
		{
		mysqlI_query($con,"UPDATE event set l3q1='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		if($team['l3q1']!=$ans['l3q1'])
			header('Location:l3-q1.php');
		else 
			header('Location:l3-q2.php');
        }
	else 
		header('Location:l3-q2.php');
    }
?>
<html>
<title> Level 3-Ques 1 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l3q1">
<h1 font size="6" align=left> Level 3</h1>
<h2> Question 1</h2>
<font size="5">Code snippet:</font><br>
<font size="5" face="comic sans ms">
X is often known as the french version of the Y 
keyboard.To drop the biggest clue, if you were to 
immediately switch from Y to X, you'd
type the following: <br>
"Qll the keys qre in different plqces1. Zell, this is <br>going to 
tqke q lot longer thqn I thought". <br>
Identify X and Y respectively.<br><br>
	Output: <br>
</font>
<form method="POST" action="l3-q1.php">
<?php if($team['l3q1']!=NULL)
	$ANS_DB=$team['l3q1']; ?>
	<input id="button_in" type="text" value="<?php if($team['l3q1']==NULL) echo $_SESSION['l3q1']; else
        echo $ANS_DB;?>" name="l3q1"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>