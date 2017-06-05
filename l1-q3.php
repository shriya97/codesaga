<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
        $A=$_POST['l1q3'];
	session_start();
	$_SESSION['l1q3']=$_POST['l1q3'];
	if($team['l1q5']!=NULL)
		{
		mysqli_query($con,"UPDATE event set l1q3='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		//header('Location:l1-q3.php');
        if($team['l1q3']!=$ans['l1q3'])
			header('Location:l1-q3.php');
		else 
			header('Location:l1-q4.php');
        }
	else 
		header('Location:l1-q4.php');
	}
?>
<html>
<title> Level 1-Ques 3 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l1q3">
<h1 font size="6" align=left> Level 1</h1>
<h2> Question 3</h2>
<font size="5" face="Comic sans ms">
This Multinational is well-known for designing and manufacturing. 
It's logo looks like an abstract of the famous Gold Gate bridge 
in San Francisco. By choosing this design, the company managed to both 
convey what they do and where they are located at.
<br><br>
	Output: <br>
</font>
<form method="POST" action="l1-q3.php">
<?php if($team['l1q3']!=NULL)
	$ANS_DB=$team['l1q3']; ?>
	<input id="button_in" type="text" value="<?php if($team['l1q3']==NULL) echo $_SESSION['l1q3']; else
        echo $ANS_DB;?>" name="l1q3"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>