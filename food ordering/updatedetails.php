<?php
		session_start();
		$eml=$_SESSION['email'];
		include "conn.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{

	$ad=$_POST['t1'];
	$pi=$_POST['t2'];
	$mo=$_POST['t3'];
    $em=$_POST['t4'];
	$sql="update customer set address='$ad',pin='$pi',mobile='$mo' where email='$eml'";
if(mysqli_query($con,$sql))
{
	header("location:customer.php?umsg=Customer Data Updated Successfully");
}
else {
	header("location:customer.php?umsg=Error  !!!");
}
	}


		
		
		?>
		
