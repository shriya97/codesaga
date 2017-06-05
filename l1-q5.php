<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
	//session_start();
	$_SESSION['l1q5']=$_POST['l1q5'];
	$A1=$_SESSION['l1q1'];
	$A2=$_SESSION['l1q2'];
	$A3=$_SESSION['l1q3'];
	$A4=$_SESSION['l1q4'];
	$A5=$_SESSION['l1q5'];
	mysqli_query($con,"UPDATE event set l1q1='$A1',l1q2='$A2',l1q3='$A3',l1q4='$A4',l1q5='$A5' where Username='$u1'");
	if($A5==$ans['l1q5'])
		{
		mysqli_query($con,"update event set time_logout=NOW(),duration=TIMEDIFF(NOW(),time_login) where Username='$u1'");
		header('Location:l2-q1.php');
		}
        //echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
	else
		header('Location:l1-q5.php');
    }
?>
<html>
<title> Level 1-Final Question </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l1q5">
<h1 font size="6" align=left> Level 1</h1>
<h2> Final Question</h2>
<font size="4" face="Comic Sans">
<pre>
int main()
{
    	static char *s[] = {/*This array consists of 4 strings<br> that are answers to previous 4 questions (taken in order)*/};
  	char **ptr[] = {s+2, s+3, s, s+1}, ***p;
	p = ptr;++p;
	char *str=**p+1;
	printf("%c",str[0]);
	p--;
	str=**ptr+3;
    	printf("%s",str);
	p+=2;
	str=**p+3;
    	printf("%c\n",str[0]);
    	return 0;
}
</pre>
<font size="5">
	Output: <br>
</font>
<form method="POST" action="l1-q5.php">
<?php if($team['l1q5']!=NULL)
	$ANS_DB=$team['l1q5']; ?>
	<input id="button_in" type="text" value="<?php if($team['l1q5']==NULL) echo $_SESSION['l1q5']; else
        echo $ANS_DB;?>" name="l1q5"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
<!--<b>To analyse your answer click on the question link again.</b>-->
</div>
</div>
</body>
</html>