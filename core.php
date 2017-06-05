<?php

$con=mysqli_connect("localhost","root",""); // for connection with sql

if(mysqli_connect_errno())

	{
	echo "Failed to Connect".mysqli_connect_error;
	}
$d_b="code_saga";
$db=mysqli_select_db($con,$d_b); // for connection with DB

//$rec=mysql_query("Select * from Event where username='team1' ");

//$team=mysql_fetch_array($rec);

//echo $team['Username']; 
?>