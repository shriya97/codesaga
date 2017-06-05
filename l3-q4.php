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
        $A=$_POST['l3q4'];
	session_start();
	$_SESSION['l3q4']=$_POST['l3q4'];
	if($team['l3q5']!=NULL)
		{
		mysqli_query($con,"UPDATE event set l3q4='$A' where Username='$u1'");
		//echo '<script language="javascript">';
        //echo 'alert("To analyse your answer click on the question link again.")';
        //echo '</script>';
		if($team['l3q4']!=$ans['l3q4'])
			header('Location:l3-q4.php');
		else 
			header('Location:l3-q5.php');
        }
	else 
		header('Location:l3-q5.php');
	}
?>
<html>
<title> Level 3-Ques 4 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l3q4">
<h1 font size="6" align=left> Level 3</h1>
<h2> Question 4</h2>
<font size="5">Code snippet:</font><br>
<font size="4" face="comic sans ms">
 
int cmpfunc (const void * a, const void * b)
 
<br>{ 
	
<br>return ( *(int*)a - *(int*)b );
 <br>
} 


<br>
int main() 
<br>{
 
 <br>int n=5;
 
<br>int arr[5]={1685,2456,478,1897,9765};
 

 <br>qsort(arr,n,sizeof(int),cmpfunc); 

 <br>if(n%3==0) 

 <br>{ 

 <br>printf("%d",arr[n/3]+arr[n/3+1]);
 
 <br>}
 
 <br>else 
 <br>printf("%d",arr[n/3]); 

 <br>return 0;
 
}

<br><br>
<font size="6">
	Output: <br>
</font>
<form method="POST" action="l3-q4.php">
<?php if($team['l3q4']!=NULL)
	$ANS_DB=$team['l3q4']; ?>
	<input id="button_in" type="text" value="<?php if($team['l3q4']==NULL) echo $_SESSION['l3q4']; else
        echo $ANS_DB;?>" name="l3q4"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>