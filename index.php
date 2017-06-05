<?php

include 'core.php' ;
@error_reporting(E_ALL ^ E_NOTICE);
if(isset($_POST['Username'])&&isset($_POST['password']))
{
$Username=$_POST['Username'];
$password=$_POST['password'];

$q=mysqli_query($con,"SELECT * from event where Username='$Username' and password='$password'");
$n=mysqli_num_rows($q);
if($n)
	{
	session_start();
	$_SESSION['Username']=$Username;
	mysqli_query($con,"UPDATE event set time_login=NOW() where Username='$Username'");
	header('Location:frontpage.php');
	}
else
	{
	echo '<script language="javascript">';
    echo 'alert("Login Failed!")';
    echo '</script>';
	}
}
?>
<html>
<head>
<title>Sign-In</title>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body id="body_b" background ="image.jpg" >
<?php $current_file=$_SERVER['SCRIPT_NAME']?>
<div id="Sign-In">
<fieldset style="width:100%; padding-left=200px" align="center"><legend><em><b><font size='6' color="yellow">LOGIN HERE</font><b></em></legend>
<form method="POST" action="<?php echo $current_file ?>">
<font size='5' color="white">Username <br><input id="button_in" type="text" name="Username" size="40" ><br>
			   Password <br><input id="button_in" type="password" name="password" size="40"><br> </font>
<input id="button" type="submit" name="submit" value="LOGIN"> 
</form>
</fieldset>
<font size=5 color="white">New Team </font><a href="register.php" target="_new"> <button id="button">Register</button></a>
</div>
</body>
</html>
