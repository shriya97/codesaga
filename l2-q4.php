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
        $A=$_POST['l2q4'];
	session_start();
	$_SESSION['l2q4']=$_POST['l2q4'];
	if($team['l2q5']!=NULL)
		{
		mysqli_query($con,"UPDATE event set l2q4='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		if($team['l2q4']!=$ans['l2q4'])
			header('Location:l2-q4.php');
		else 
			header('Location:l2-q5.php');
        }
	else 
		header('Location:l2-q5.php');
	}
?>
<html>
<title> Level 2-Ques 4 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l2q4">
<h1 font size="6" align=left> Level 2</h1>
<h2> Question 4</h2>
<font size="5" face="comic sans ms">“When we created this feature X, we thought it would 

be cool to have a feature without any specific purpose. 

People interpret X in many different ways, and we encourage 

you to come up with your own meanings.”   -?Mark 

Zuckerberg during a live Facebook webinar. 
What is Mark 

talking about?

<br><br>
	Output: <br>
</font>
<form method="POST" action="l2-q4.php">
<?php if($team['l2q4']!=NULL)
	$ANS_DB=$team['l2q4']; ?>
	<input id="button_in" type="text" value="<?php if($team['l2q4']==NULL) echo $_SESSION['l2q4']; else
        echo $ANS_DB;?>" name="l2q4"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>