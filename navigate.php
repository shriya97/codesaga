<?php include 'core.php';
@error_reporting(E_ALL ^ E_NOTICE);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
session_start();	$u1=$_SESSION['Username'];
$rec=mysqli_query($con,"Select * from event where Username='$u1' "); //uname stored at the session level
$res=mysqli_query($con,"Select * from event where Username='adminn' ");
$ans=mysqli_fetch_array($res);
$team=mysqli_fetch_array($rec);
//echo $s["l1q1"];
?>
<html>
<br>
<b><font color="dark blue" face="Gabriola" size=50>Hello team <?php echo $u1;?></font></b>
<marquee><b><font  face="Gabriola" size=35><a href="score.php" target="_blank">SCORE BOARD</a></font></b></marquee>
<link rel="stylesheet" type="text/css" href="css_n.css">
<body >
<div id="div2">
<input id="button_l" type="button" value="Level 1" name="level1"></input>
<br><br>
		<?php
		if($team['l1q1']==NULL) //NULL hain- not attempted
			echo '<a href="l1-q1.php" target="_parent"><button id="button_n">Question 1</button></a>	<br>';
		else if ($team['l1q1']==$ans['l1q1']) // right hain
			echo '<a href="l1-q1.php" target="_parent"><button id="button_r">Question 1</button></a>	<br>';
		else  // wrong ans
			echo '<a href="l1-q1.php" target="_parent"><button id="button_w">Question 1</button></a>	<br>';
                 //echo $team['l1q1'];
		if($team['l1q2']==NULL) //NULL hain- not attempted
			echo '<a href="l1-q2.php" target="_parent"><button id="button_n">Question 2</button></a>	<br>';
		else if ($team['l1q2']==$ans['l1q2']) // right hain
			echo '<a href="l1-q2.php" target="_parent"><button id="button_r">Question 2</button></a>	<br>';
		else  // wrong ans
			echo '<a href="l1-q2.php" target="_parent"><button id="button_w">Question 2</button></a>	<br>';

		if($team['l1q3']==NULL) //NULL hain- not attempted
			echo '<a href="l1-q3.php" target="_parent"><button id="button_n">Question 3</button></a>	<br>';
		else if ($team['l1q3']==$ans['l1q3']) // right hain
			echo '<a href="l1-q3.php" target="_parent"><button id="button_r">Question 3</button></a>	<br>';
		else  // wrong ans
			echo '<a href="l1-q3.php" target="_parent"><button id="button_w">Question 3</button></a>	<br>';

		if($team['l1q4']==NULL) //NULL hain- not attempted
			echo '<a href="l1-q4.php" target="_parent"><button id="button_n">Question 4</button></a>	<br>';
		else if ($team['l1q4']==$ans['l1q4']) // right hain
			echo '<a href="l1-q4.php" target="_parent"><button id="button_r">Question 4</button></a>	<br>';
		else  // wrong ans
			echo '<a href="l1-q4.php" target="_parent"><button id="button_w">Question 4</button></a>	<br>';

		if($team['l1q5']==NULL) //NULL hain- not attempted
			echo '<a href="l1-q5.php" target="_parent"><button id="button_n">Final Question </button></a>	<br>';
		else if ($team['l1q5']==$ans['l1q5']) // right hain
			echo '<a href="l1-q5.php" target="_parent"><button id="button_r">Final Question </button></a>	<br>';
		else  // wrong ans
			echo '<a href="l1-q5.php" target="_parent"><button id="button_w">Final Question </button></a>	<br>';
		if(($team['l1q1']==$ans['l1q1'])&&($team['l1q2']==$ans['l1q2'])&&($team['l1q3']==$ans['l1q3'])&&($team['l1q4']==$ans['l1q4'])&&($team['l1q5']==$ans['l1q5']))
			{echo '<a href="bonus-1.php" target="_new"><button id="button_b">Bonus 1</button></a>	<br>';
			//header('Location: bonus-1.php');
			}
		?>
		<br><br>
		<!-- if l1-q5 ans = database ans then clickable -->
		<input id="button_l" type="button" value="Level 2"></input>
		<br><br>
		<?php
		if($team['l1q5']==$ans['l1q5'])
			{
			if($team['l2q1']==NULL) //NULL hain- not attempted
				echo '<a href="l2-q1.php" target="_parent"><button id="button_n">Question 1</button></a>	<br>';
			else if ($team['l2q1']==$ans['l2q1']) // right hain
				echo '<a href="l2-q1.php" target="_parent"><button id="button_r">Question 1</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l2-q1.php" target="_parent"><button id="button_w">Question 1</button></a>	<br>';

			if($team['l2q2']==NULL) //NULL hain- not attempted
				echo '<a href="l2-q2.php" target="_parent"><button id="button_n">Question 2</button></a>	<br>';
			else if ($team['l2q2']==$ans['l2q2']) // right hain
				echo '<a href="l2-q2.php" target="_parent"><button id="button_r">Question 2</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l2-q2.php" target="_parent"><button id="button_w">Question 2</button></a>	<br>';

			if($team['l2q3']==NULL) //NULL hain- not attempted
				echo '<a href="l2-q3.php" target="_parent"><button id="button_n">Question 3</button></a>	<br>';
			else if ($team['l2q3']==$ans['l2q3']) // right hain
				echo '<a href="l2-q3.php" target="_parent"><button id="button_r">Question 3</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l2-q3.php" target="_parent"><button id="button_w">Question 3</button></a>	<br>';

			if($team['l2q4']==NULL) //NULL hain- not attempted
				echo '<a href="l2-q4.php" target="_parent"><button id="button_n">Question 4</button></a>	<br>';
			else if ($team['l2q4']==$ans['l2q4']) // right hain
				echo '<a href="l2-q4.php" target="_parent"><button id="button_r">Question 4</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l2-q4.php" target="_parent"><button id="button_w">Question 4</button></a>	<br>';

			if($team['l2q5']==NULL) //NULL hain- not attempted
				echo '<a href="l2-q5.php" target="_parent"><button id="button_n">Final Question</button></a>	<br>';
			else if ($team['l2q5']==$ans['l2q5']) // right hain
				echo '<a href="l2-q5.php" target="_parent"><button id="button_r">Final Question</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l2-q5.php" target="_parent"><button id="button_w">Final Question</button></a>	<br>';
		
			if(($team['l2q1']==$ans['l2q1'])&&($team['l2q2']==$ans['l2q2'])&&($team['l2q3']==$ans['l2q3'])&&($team['l2q4']==$ans['l2q4'])&&($team['l2q5']==$ans['l2q5']))
			{echo '<a href="bonus-2.php" target="_new"><button id="button_b">Bonus 2</button></a>	<br>';
			//header('Location:bonus-2.php');
			}			
			}
		else
			{
			echo '<a href="error.html" target="_parent"><button id="button_n">Question 1</button></a>	<br>';
			echo '<a href="error.html" target="_parent"><button id="button_n">Question 2</button></a>	<br>';
			echo '<a href="error.html" target="_parent"><button id="button_n">Question 3</button></a>	<br>';
			echo '<a href="error.html" target="_parent"><button id="button_n">Question 4</button></a>	<br>';
			echo '<a href="error.html" target="_parent"><button id="button_n">Final Question</button></a>	<br>';
			}
		?>
	<br><br>
<!-- if l2-q5 ans = database ans then clickable and add bonus ques -->
<input id="button_l" type="button" value="Level 3"></input>
<br><br>
	<?php
		if($team['l2q5']==$ans['l2q5'])
			{
			if($team['l3q1']==NULL) //NULL hain- not attempted
				echo '<a href="l3-q1.php" target="_parent"><button id="button_n">Question 1</button></a>	<br>';
			else if ($team['l3q1']==$ans['l3q1']) // right hain
				echo '<a href="l3-q1.php" target="_parent"><button id="button_r">Question 1</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l3-q1.php" target="_parent"><button id="button_w">Question 1</button></a>	<br>';

			if($team['l3q2']==NULL) //NULL hain- not attempted
				echo '<a href="l3-q2.php" target="_parent"><button id="button_n">Question 2</button></a>	<br>';
			else if ($team['l3q2']==$ans['l3q2']) // right hain
				echo '<a href="l3-q2.php" target="_parent"><button id="button_r">Question 2</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l3-q2.php" target="_parent"><button id="button_w">Question 2</button></a>	<br>';

			if($team['l3q3']==NULL) //NULL hain- not attempted
				echo '<a href="l3-q3.php" target="_parent"><button id="button_n">Question 3</button></a>	<br>';
			else if ($team['l3q3']==$ans['l3q3']) // right hain
				echo '<a href="l3-q3.php" target="_parent"><button id="button_r">Question 3</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l3-q3.php" target="_parent"><button id="button_w">Question 3</button></a>	<br>';

			if($team['l3q4']==NULL) //NULL hain- not attempted
				echo '<a href="l3-q4.php" target="_parent"><button id="button_n">Question 4</button></a>	<br>';
			else if ($team['l3q4']==$ans['l3q4']) // right hain
				echo '<a href="l3-q4.php" target="_parent"><button id="button_r">Question 4</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l3-q4.php" target="_parent"><button id="button_w">Question 4</button></a>	<br>';

			if($team['l3q5']==NULL) //NULL hain- not attempted
				echo '<a href="l3-q5.php" target="_parent"><button id="button_n">Final Question</button></a>	<br>';
			else if ($team['l3q5']==$ans['l3q5']) // right hain
				echo '<a href="l3-q5.php" target="_parent"><button id="button_r">Final Question</button></a>	<br>';
			else  // wrong ans
				echo '<a href="l3-q5.php" target="_parent"><button id="button_w">Final Question</button></a>	<br>';
			
			if(($team['l3q1']==$ans['l3q1'])&&($team['l3q2']==$ans['l3q2'])&&($team['l3q3']==$ans['l3q3'])&&($team['l3q4']==$ans['l3q4'])&&($team['l3q5']==$ans['l3q5']))
			{echo '<a href="bonus-3.php" target="_new"><button id="button_b">Bonus 3</button></a>	<br>';
			//header('Location:bonus-3.php');
			}
			}
		else
			{
			echo '<a href="error.html" target="_parent"><button id="button_n">Question 1</button></a>	<br>';
			echo '<a href="error.html" target="_parent"><button id="button_n">Question 2</button></a>	<br>';
			echo '<a href="error.html" target="_parent"><button id="button_n">Question 3</button></a>	<br>';
			echo '<a href="error.html" target="_parent"><button id="button_n">Question 4</button></a>	<br>';
			echo '<a href="error.html" target="_parent"><button id="button_n">Final Question</button></a>	<br>';
			}
		
	echo'<br>';
	if(($team['l1q5']==$ans['l1q5'])&&($team['l2q5']==$ans['l2q5'])&&($team['l3q5']==$ans['l3q5']))
		{echo '<a href="final.php" target="_new"><button id="button_f">Final Destination</button></a>	<br>';
		//header('Location:final.php');
		}
		?>
</div>
</div>
<div id="log">
<a href="logout.php"><button id="button_logout"><b>QUIT</b></button></a>
</div>
</body>
</html>