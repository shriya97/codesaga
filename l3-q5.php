<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(isset($_POST['submit']))
	{
	//session_start();
	$_SESSION['l3q5']=$_POST['l3q5'];
	$A1=$_SESSION['l3q1'];
	$A2=$_SESSION['l3q2'];
	$A3=$_SESSION['l3q3'];
	$A4=$_SESSION['l3q4'];
	$A5=$_SESSION['l3q5'];
	mysqli_query("Update event set l3q1='$A1',l3q2='$A2',l3q3='$A3',l3q4='$A4',l3q5='$A5' where Username='$u1'");
	if($A5==$ans['l3q5'])
		{
		mysqli_query("update event set time_logout=NOW(),duration=TIMEDIFF(NOW(),time_login) where Username='$u1'");
		header('Location:l3-q5.php');
		}
        //echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
	else
		header('Location:l3-q5.php');
    }
?>
<html>
<title> Level 3-Final Question </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l3q5">
<h1 font size="6" align=left> Level 3</h1>
<h2> Final Question</h2>
<font size="4" face="comic sans ms">
<br>int fibo(int n)
<br>{ int a=0,b=1,i=1,c=0;
  <br>while(c < n)
  	<br>{ <br>c=a+b;
  	  a=b;
  	  b=c;
  	  <br>i++;
  	  
	  <br>}
  
  <br>return i;
<br>}
int main(){
   <br>char a[]={'i','n','n','e','r','v','e'};

   <br>int i,x=0,sum=0;

   <br>for(i=0; i < 5 ;i++)
   <br>{
      <br> x+=(int)a[i];
   <br>}
   <br>x=x>>2;   
   <br>while(x>0)
      <br>{	sum+=x%10;
        <br>x/=10;
   		<br>}
 <br>  printf("\n%d\n",fibo(sum)); 
}
</font><br><br>
<font size="6">
	Output: <br>
</font><form method="POST" action="l3-q5.php">
<?php if($team['l3q5']!=NULL)
	$ANS_DB=$team['l3q5']; ?>
	<input id="button_in" type="text" value="<?php if($team['l3q5']==NULL) echo $_SESSION['l3q5']; else
        echo $ANS_DB;?>" name="l3q5"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
<!--<b>To analyse your answer click on the question link again.</b>-->
</div>
</div>
</body>
</html>