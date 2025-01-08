<?php
include "conn.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{

	$n=$_POST['t1'];
	$e=$_POST['t2'];
	$a=$_POST['t3'];
	$p=$_POST['t4'];
	$m=$_POST['t5'];
	$ps=$_POST['t6'];
	$cps=$_POST['t7'];
	
	$sql="insert into customer values('$n','$e','$a','$p','$m','$ps','$cps')";
if(mysqli_query($con,$sql))
{
	header("location:signup.php?umsg=Customer Registered Successfully");
}
else {
	header("location:signup.php?umsg=Error  !!!");
}
	}



?>