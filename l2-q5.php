<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
	//session_start();
	$_SESSION['l2q5']=$_POST['l2q5'];
	$A1=$_SESSION['l2q1'];
	$A2=$_SESSION['l2q2'];
	$A3=$_SESSION['l2q3'];
	$A4=$_SESSION['l2q4'];
	$A5=$_SESSION['l2q5'];
	mysqli_query($con,"UPDATE event set l2q1='$A1',l2q2='$A2',l2q3='$A3',l2q4='$A4',l2q5='$A5' where Username='$u1'");
	if($A5==$ans['l2q5'])
		{
		mysqli_query($con,"UPDATE event set time_logout=NOW(),duration=TIMEDIFF(NOW(),time_login) where Username='$u1'");
		header('Location:l3-q1.php');
		}
        //echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
	else
		header('Location:l2-q5.php');
    }
?>
<html>
<title> Level 2-Final Question </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l2q5">
<h1 font size="6" align=left> Level 2</h1>
<h2> Final Question</h2>
<font size="4" face="comic sans ms">
<pre>
//Kindly note: All the strings used in 
the code are in lower case
<br>
int fun1(char *ch)
{
  int j=0, i, d=0;
      char str[]=/*Answer  to Q1 of this level*/;
while(j<3)
  {
        for(i=0; i<7; ++i)
    {
     if(str[i]<=ch[j])
     { 
            d=(d*10)+i+1;
            break;
     }
     else
     {           d=d*10+i-1;
                break;
    }

}
if(i==7)
  d=(d*10)+28;
  j++;  
}
return d;
}
int main()
{
  int a[3],i,t=0;
  a[0]=fun1(/*Answer to Q2 of this level*/);
  a[1]=fun1(/*Answer to Q3 of this level*/);
  a[2]=fun1(/*Answer to Q4 of this level*/);
  for( i=0;i<3;i++)
  {   a[i]=(a[i]*10)+28; 
    t+=a[i];
}
  printf("\n%d",t);
}
</pre>
</font><br>
<font size="6">
	Output: <br>
</font><form method="POST" action="l2-q5.php">
<?php if($team['l2q5']!=NULL)
	$ANS_DB=$team['l2q5']; ?>
	<input id="button_in" type="text" value="<?php if($team['l2q5']==NULL) echo $_SESSION['l2q5']; else
        echo $ANS_DB;?>" name="l2q5"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
<!--<b>To analyse your answer click on the question link again.</b>-->
</div>
</div>
</body>
</html>