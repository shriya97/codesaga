<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(($team['l2q1']==$ans['l2q1'])&&($team['l2q2']==$ans['l2q2'])&&($team['l2q3']==$ans['l2q3'])&&($team['l2q4']==$ans['l2q4'])&&($team['l2q5']==$ans['l2q5']))
	;
else 
	header('Location:error.html');
if(isset($_POST['submit']))
	{
    $A=$_POST['bonus2'];
		mysql_query("Update event set bonus2='$A' where Username='$u1'");
$p=mysqli_query("Select bonus2 from event where Username='$u1'");
$t=mysqli_fetch_array($p);

		if($ans['bonus2']==$t['bonus2'])
			{
		
			echo '<script language="javascript">';
			echo 'alert("Correct Answer!")';
			echo '</script>';
			}

		else{
echo '<script language="javascript">';
			echo 'alert("Incorrect Answer!")';
			echo '</script>';

}

	}

?>
<html>
<title> Bonus 2 </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="l2q1">
<h1 font size="6" align=left> Bonus Question 2</h1>
<font size="5" face="comic sans ms">
	<br><br>
A carpenter knows how to build it, while an IT professional fixes it.
<br><br>
</font>
<font size="6">
    <br><br>
	Output: <br>
</font>
<form method="POST" action="bonus-2.php">
<!--<?php if($team['bonus2']!=NULL)
	$ANS_DB=$team['bonus2']; ?>-->
	<input id="button_in" type="text" value="<?php echo $_POST['bonus2'];?>" name="bonus2"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>