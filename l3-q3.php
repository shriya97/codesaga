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
    $A=$_POST['l3q3'];
	session_start();
	$_SESSION['l3q3']=$_POST['l3q3'];
	if($team['l3q5']!=NULL)
		{
		mysqlI_query($con,"UPDATE event set l3q3='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		//header('Location:l1-q3.php');
        if($team['l3q3']!=$ans['l3q3'])
			header('Location:l3-q3.php');
		else 
			header('Location:l3-q4.php');
        }
	else 
		header('Location:l3-q4.php');
	}
?>
<html>
<title> Level 3-Ques 3</title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l3q3">
<h1 font size="6" align=left> Level 3</h1>
<h2> Question 3</h2>
<font size="5">Code snippet:</font><br><br>
<font size="5" face="comic sans ms">
int main()
<br>{
<br>int a = 320;
<br>char *ptr;
<br>ptr =( char *)&a;
<br>printf("%d ",*ptr);
<br>return 0;
}
<br><br>
	Output: <br>
</font>
<form method="POST" action="l3-q3.php">
<?php if($team['l3q3']!=NULL)
	$ANS_DB=$team['l3q3']; ?>
	<input id="button_in" type="text" value="<?php if($team['l3q3']==NULL) echo $_SESSION['l3q3']; else
        echo $ANS_DB;?>" name="l3q3"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>