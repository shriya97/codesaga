<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
        $A=$_POST['l1q2'];
	session_start();
	$_SESSION['l1q2']=$_POST['l1q2'];
	if($team['l1q5']!=NULL)
		{
		mysqli_query("Update event set l1q2='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		if($team['l1q2']!=$ans['l1q2'])
			header('Location:l1-q2.php');
		else 
			header('Location:l1-q3.php');
        }
	else 
		header('Location:l1-q3.php');
	}
?>
<html>
<title> Level 1-Ques 2 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body background="image.jpg">
<div id="div1">
<div id="l1q2">
<h1 font size="6" align=left> Level 1</h1>
<h2> Question 2</h2>
<font size="5" face="Comic Sans MS">Do More with Less<br><font size="4">It is associated with 'X'.<br>
 Identify X <br>
	<font size="6">Output:
</font>
<form method="POST" action="l1-q2.php">
<?php if($team['l1q2']!=NULL)
	$ANS_DB=$team['l1q2']; ?>
	<input id="button_in" type="text" value="<?php if($team['l1q2']==NULL) echo $_SESSION['l1q2']; else
        echo $ANS_DB;?>" name="l1q2"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>