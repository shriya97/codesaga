<?php
include 'navigate.php';
include 'core.php';
if($team['l2q5']==$ans['l2q5']) // so tht does not change from url
	;
else 
	header('Location:error.html');
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
        $A=$_POST['l3q2'];
	session_start();
	$_SESSION['l3q2']=$_POST['l3q2'];
	if($team['l3q5']!=NULL)
		{
		mysqli_query("Update event set l3q2='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		if($team['l3q2']!=$ans['l3q2'])
			header('Location:l3-q2.php');
		else 
			header('Location:l3-q3.php');
        }
	else 
		header('Location:l3-q3.php');
	}
?>
<html>
<title> Level 3-Ques 2 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l3q2">
<h1 font size="6" align=left> Level 3</h1>
<h2> Question 2</h2>
<font size="5" face="comic sams ms">
<pre>
void main (int argc, char *argv[])
{
char *input=(char *)malloc((sizeof(char)*10));
input=argv[1];
int date= atoi(input);
int d,m,y;
y = date%10000;
date=date/10000;
m=date%100;
date=date/100;
d=date;y+=m;m+=d;d*=8;
printf("%d%d",d,y%100);
}
INPUT = D72E00
input will be taken in date format<br> i.e. eg. 12012014
</pre>
</font><br>
<font size="6">
	Output: <br>
</font>
<form method="POST" action="l3-q2.php">
<?php if($team['l3q2']!=NULL)
	$ANS_DB=$team['l3q2']; ?>
	<input id="button_in" type="text" value="<?php if($team['l3q2']==NULL) echo $_SESSION['l3q2']; else
        echo $ANS_DB;?>" name="l3q2"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>