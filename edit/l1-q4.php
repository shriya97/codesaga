<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);

if(isset($_POST['submit']))
	{
          $A=$_POST['l1q4'];

	mysql_query("Update event set l1q4='$A' where Username='$u1' ; ");

	//	echo $ANS;
	}

?>

<html>
<title> Level 1-Ques 4 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body>
<div id="div1">
<div id="assignplace">
<h1 font size="6" align=left> Level 1</h1>
<h2> Question 4</h2>
<font size="6">Code snippet:</font><br>
<font size="4">
	void fun1(char *ch)<br>
	{<br>
			&nbsp &nbsp &nbsp &nbsp int j=0, i;<br>
			&nbsp &nbsp &nbsp &nbsp char str[]="espectro";<br>
			&nbsp &nbsp &nbsp &nbsp while(j<3)<br>
			&nbsp &nbsp &nbsp &nbsp {<br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp for(i=0; i<8; ++i)<br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp if(str[i]==ch[j])<br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp {<br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp cout<<i+1; <br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp break;<br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp }<br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp if(i==8)<br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp cout<<"0";<br>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp j++;<br>
			&nbsp &nbsp &nbsp &nbsp }<br>
	}<br>
</font>
<font size="5">
    Input: <br><br>
	Output: <br>
</font>

<form method="POST" action="l1-q4.php">
<?php


         $n=$team['l1q4'];?>
	<input id="button_in" type="text" value="<?php echo $n;?>" name="l1q4"></input>
<br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>