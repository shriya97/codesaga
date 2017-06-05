<?php include 'core.php';
@error_reporting(E_ALL ^ E_NOTICE);
if(isset($_POST['submit']))
{
    $tname=$_POST['name'];
	$mem1=$_POST['mem1'];
	$mem2=$_POST['mem2'];
	$coll=$_POST['colg'];
    $pass=$_POST['password'];
	$id=$_POST['mail'];
    $q1=mysqli_query($con,"SELECT * FROM details where tname='$tname'");
    $n=mysqli_num_rows($q1);
	if($n>0)
	{
		echo '<script language="javascript">';
		echo 'alert("Team name already exists. Try again")';
		echo '</script>	';
		//header('Location:register.php');		
	}
	else
	{
		$sql1="INSERT INTO details(tname,mem1,mem2,college,password,email)VALUES('$tname','$mem1','$mem2','$coll','$pass','$id')";
		if(empty($_POST['name']))
			echo'<br><br><font size="5">Enter  Name</font>';
		else if(empty($_POST['password']))
			echo'<br><br><font size="5">Enter password</font>';
		else if(empty($_POST['mem1']))
			echo'<br><br><font size="5">Enter member 1</font>';
		else if(empty($_POST['colg']))
			echo'<br><br><font size="5">Enter college</font>';
		else if(empty($_POST['mail']))
			echo'<br><br><font size="5">Enter Email</font>';
		else
		{
		  $result=mysqli_query($con,$sql1);
		  //$name1="";
		  //$pass="";
		  mysqli_query($con,"INSERT into event(username,password) values ('$tname','$pass')");
		}
		if($result)
			{
			//echo '<script language="javascript">';
			//echo 'alert("Registered Successfully")';
			//echo '</script>	'; // timer required else not executing this
			//sleep(10);
            header('Location:index.php');
			}
		else
			{
			echo '<script language="javascript">';
			echo'alert("Registeration Failed. Try again")';
			echo '</script>	';
			//header('Location:register.php');
			}
	}
}
?>
<html>
<head>
<title>Registeration</title> 
</head>
<link rel="stylesheet" type="text/css" href="login.css">
<body  id="body_b" background ="image.jpg">
<div id="Sign-up">
<fieldset style="width:100%"><legend><b><font size="6" color="yellow">REGISTER</font><b></legend>
<form action ="register.php" method ="post">
    <table>
	<tr> 
		<td><font size="5" color="white">Team Name:<font color =red>*</font></td>
		<td><input id="button_in" type="text" name="name" ></td>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr> 
		<td><font size="5" color="white">Member 1:<font color =red>*</font></td>
		<td><input id="button_in" type="text" name="mem1" ></td>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr> 
		<td><font size="5" color="white">Member 2:</font></td>						  
		<td><input id="button_in" type="text" name="mem2"></td> 
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr> 
		<td><font size="5" color="white">College:<font color =red>*</font></td> 
		<td><input id="button_in" type="text" name="colg" ></td>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr> <td><font size="5" color="white">Email:<font color =red>*</font></td> <td><input id="button_in" type="text" name="mail" ></td> </tr>
    <tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr>
	</tr>
	<tr> <td><font size="5" color="white">Password:<font color =red>*</font></td><td><input id="button_in" type="password" name="password"></td> </tr>
	</table>
<center><input id="button" type ="submit" name="submit" value="Register"></center>
</form>
</div>
</body>
</html>