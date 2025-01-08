<?php
include "conn.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{

	$n=$_POST['cname'];
	$e=$_POST['email'];
	$s=$_POST['sub'];
	$msg=$_POST['message'];
	
	$sql="insert into contact(name,email,sub,msg) values('$n','$e','$s','$msg')";
if(mysqli_query($con,$sql))
{
	header("location:index.html?umsg=Your Message Sent Successfully");
}
else {
	header("location:index.html?umsg=Error  !!!");
}
	}



?>