<?php
include 'navigate.php';
include 'core.php';
@error_reporting(E_ALL^E_NOTICE);
if(($team['l1q5']==$ans['l1q5'])&&($team['l2q5']==$ans['l2q5'])&&($team['l3q5']==$ans['l3q5']))
	;
else 
	header('Location:error.html');
if(isset($_POST['submit']))
	{
    $A=$_POST['final'];
	mysqli_query("Update event set final='$A' where Username='$u1'");
	if($ans['final']==$A)
		{ 
		header('Location:congo.html');
		}
	else 
		header('Location:final.php');
	}
?>
<html>
<title> Final </title>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body id="body_b" background="image.jpg">
<div id="div1">
<div id="b1">
<h1 font size="6" align=left> Final Destination</h1>
<font size="5" face="comic sans ms">
	You have come so far, <br>
	Not winning now, would be bizarre,<br>
	All previous answers now need to be trusted,<br> 
	For only after the final answer would this be done and dusted,<br>
	In this last line, the final clue we recite,<br>
	You might reach a new height,<br>
	With every pass 'I' delight,<br>
	Identify 'I'?
	<br><br>
" \u0073\u0077\u0069\u006e\u0067"</font>
<font size="6">
    <br><br>
	Output: <br>
</font>
<form method="POST" action="final.php">
<?php if($team['final']!=NULL)
	$ANS_DB=$team['final']; ?>
	<input id="button_in" type="text" value="<?php if($team['final']==NULL) echo ''; else echo $ANS_DB;?>" name="final"></input>
<br><br>
<input id="button_s" type="submit" value="SUBMIT" name="submit"></input>
</form>
</div>
</div>
</body>
</html>