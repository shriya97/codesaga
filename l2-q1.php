<?php
include 'navigate.php';
include 'core.php';
if($team['l1q5']==$ans['l1q5'])
	;
else 
	header('Location:error.html');
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
    $A=$_POST['l2q1'];
	session_start();
	$_SESSION['l2q1']=$_POST['l2q1'];
	if($team['l2q5']!=NULL)
		{
		mysqli_query($con,"UPDATE event set l2q1='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		if($team['l2q1']!=$ans['l2q1'])
			header('Location:l2-q1.php');
		else 
			header('Location:l2-q2.php');
        }
	else 
		header('Location:l2-q2.php');
    }
?>
<html>
<title> Level 2-Ques 1 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l2q1">
<h1 font size="6" align=left> Level 2</h1>
<h2> Question 1</h2>
<font size="5" face="Comic Sans MS">The name 'Google' is actually derived from the 

mathematical term y which is basically 1 with a 100 zeros 

following it
<br><br><br>
	Output: <br>
</font>
<form method="POST" action="l2-q1.php">
<?php if($team['l2q1']!=NULL)
	$ANS_DB=$team['l2q1']; ?>
	<input id="button_in" type="text" value="<?php if($team['l2q1']==NULL) echo $_SESSION['l2q1']; else
        echo $ANS_DB;?>" name="l2q1"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>