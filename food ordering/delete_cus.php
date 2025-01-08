<?php
		//session_start();
		//$eml=$_SESSION['email'];
		include 'conn.php';
		
		if($_SERVER['REQUEST_METHOD']=="POST")
{
$id=$_POST['t1'];	
echo"$id";

			$sql="DELETE FROM customer WHERE email='$id'";
			if(mysqli_query($con,$sql))
			{
				header("location:view_customer.php?msg=Customer Deleted Successfully");
				
			}
			else{
				
				header("location:view_customer.php?msg=Error");
			}
		}
?>		

