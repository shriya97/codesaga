<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
        $A=$_POST['l1q4'];
	session_start();
	$_SESSION['l1q4']=$_POST['l1q4'];
	if($team['l1q5']!=NULL)
		{
		mysqli_query($con,"UPDATE event set l1q4='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		if($team['l1q4']!=$ans['l1q4'])
			header('Location:l1-q4.php');
		else 
			header('Location:l1-q5.php');
        }
	else 
		header('Location:l1-q5.php');
	}
?>
<html>
<title> Level 1-Ques 4 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l1q4">
<h1 font size="6" align=left> Level 1</h1>
<h2> Question 4</h2>
<br>
<font size="5" face="Comic Sans MS">
The first ever post Google made on Twitter in 2009 was:
<br>
 I 'm 01100110 01100101 01100101 01101100 01101001
 01101110 01100111 00100000 01101100 01110101 01100011
 01101011 01111001 00001010.

 Crack it if you can !
</font>
<font size="6">
<br><br>	Output: <br>
</font>
<form method="POST" action="l1-q4.php">
<?php if($team['l1q4']!=NULL)
	$ANS_DB=$team['l1q4']; ?>
	<input id="button_in" type="text" value="<?php if($team['l1q4']==NULL) echo $_SESSION['l1q4']; else
        echo $ANS_DB;?>" name="l1q4"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>