<?php
include 'navigate.php';
include 'core.php';
if($team['l1q5']==$ans['l1q5']) // so tht does not change from url
	;
else 
	header('Location:error.html');
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
        $A=$_POST['l2q2'];
	session_start();
	$_SESSION['l2q2']=$_POST['l2q2'];
	if($team['l2q5']!=NULL)
		{
		mysqli_query($con,"UPDATE event set l2q2='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		if($team['l2q2']!=$ans['l2q2'])
			header('Location:l2-q2.php');
		else 
			header('Location:l2-q3.php');
        }
	else 
		header('Location:l2-q3.php');
	}
?>
<html>
<title> Level 2-Ques 2 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l2q2">
<h1 font size="6" align=left> Level 2</h1>
<h2> Question 2</h2>
<font size="5" face="Comic Sans MS">Whatever we are talking about has beautifully integrated 

the ideas of analog and digital technology into one, 
The first half representing an analog wave, and the 
other half displays binary from the digital world.<br><br>
	Output: <br>
</font>
<form method="POST" action="l2-q2.php">
<?php if($team['l2q2']!=NULL)
	$ANS_DB=$team['l2q2']; ?>
	<input id="button_in" type="text" value="<?php if($team['l2q2']==NULL) echo $_SESSION['l2q2']; else
        echo $ANS_DB;?>" name="l2q2"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>