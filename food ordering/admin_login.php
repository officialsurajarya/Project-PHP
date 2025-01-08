<?php 
include "conn.php";
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$email=$_POST['t1'];
	$pswd=$_POST['t2'];
	{
		$sql="select * from admin where email='$email'";
		$result=mysqli_query($con,$sql);
		if($row=mysqli_fetch_assoc($result))
		{
			$dbpswd=$row['pswd'];
			if ($pswd==$dbpswd)
			{
				$_SESSION['email']=$email;
				header("location:admin.php");
			}
		else {
			header("location:login.php?msg=Invalid Username or Password");
		}
}}}
	
?>