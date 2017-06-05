<?php include 'core.php'       ;
@error_reporting(E_ALL^E_NOTICE);
$teams=mysqli_query($con,"SELECT Username,l1q5,l2q5,l3q5,bonus1,bonus2,bonus3,final from event where Username NOT IN('adminn')");
//$teams=mysql_query("Select Username,l1q5,l2q5,l3q5,bonus1,bonus2,bonus3,final from event ");
//$team_rec=mysql_fetch_array($teams);
$res=mysqli_query($con,"SELECT l1q5,l2q5,l3q5,Username,bonus1,bonus2,bonus3,final from event where Username='adminn' ");
$ans=mysqli_fetch_array($res);
//echo $ans['Username'];
?>
<html>
<link rel="stylesheet" type="text/css" href="css_n.css">
<head>
<title>Score Board</title>
</head>
<body id="body_b_s" background="image4.jpg">
<br><br><br><br><br>
<center>
<table>
<tbody>
<?php
while($row=mysqli_fetch_array($teams))
    {
    echo '<tr>';
    echo '<td><font size=6 color= "white"  >'. $row['Username'] .'</td></font>';
    if($ans['l1q5']==$row['l1q5']) echo '<td><button id="button_r_s">Level 1</button></td>'; else echo '<td><button id="button_n_s">Level 1</button></td>';
	if($ans['bonus1']==$row['bonus1']) echo '<td><button id="button_r_b">Bonus</button></td>'; else echo '<td><button id="button_n_b">Bonus</button></td>';
    if($ans['l2q5']==$row['l2q5']) echo '<td><button id="button_r_s">Level 2</button></td>'; else echo '<td><button id="button_n_s">Level 2</button></td>' ;
	if($ans['bonus2']==$row['bonus2']) echo '<td><button id="button_r_b">Bonus</button></td>'; else echo '<td><button id="button_n_b">Bonus</button></td>';
    if($ans['l3q5']==$row['l3q5']) echo '<td><button id="button_r_s">Level 3</button></td>'; else echo '<td><button id="button_n_s">Level 3</button></td>';
	if($ans['bonus3']==$row['bonus3']) echo '<td><button id="button_r_b">Bonus</button></td>'; else echo '<td><button id="button_n_b">Bonus</button></td>';
	if($ans['final']==$row['final']) echo '<td></td><td><img src="tick.jpg" alt="done" width="38" height="38"/><td>';
    echo '</tr>';
    }
?>
</tbody>
</table>
</center>
</body>
</html>