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
        $A=$_POST['l2q3'];
	session_start();
	$_SESSION['l2q3']=$_POST['l2q3'];
	if($team['l2q5']!=NULL)
		{
		mysqlI_query($con,"UPDATE event set l2q3='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		//header('Location:l1-q3.php');
        if($team['l2q3']!=$ans['l2q3'])
			header('Location:l2-q3.php');
		else 
			header('Location:l2-q4.php');
        }
	else 
		header('Location:l2-q4.php');
	}
?>
<html>
<title> Level 2-Ques 3</title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l1q3">
<h1 font size="6" align=left> Level 2</h1>
<h2> Question 3</h2>
<font size="5">Try and crack the connection between what you see and 
what you know!
<br><img src="8020.gif" height=200 width=400><br>
	Output: <br>
</font>
<form method="POST" action="l2-q3.php">
<?php if($team['l2q3']!=NULL)
	$ANS_DB=$team['l2q3']; ?>
	<input id="button_in" type="text" value="<?php if($team['l2q3']==NULL) echo $_SESSION['l2q3']; else
        echo $ANS_DB;?>" name="l2q3"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>