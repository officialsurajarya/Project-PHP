<?php
		//session_start();
		//$eml=$_SESSION['email'];
		include 'conn.php';
		
		if($_SERVER['REQUEST_METHOD']=="POST")
{
$id=$_POST['t1'];	
echo"$id";

			$sql="DELETE FROM menu_items WHERE name='$id'";
			if(mysqli_query($con,$sql))
			{
				header("location:view_menu.php?msg=Item Deleted Successfully");
				
			}
			else{
				
				header("location:view_menu.php?msg=Error");
			}
		}
?>		

