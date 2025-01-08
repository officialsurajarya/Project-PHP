<?php
		include "conn.php";
if($_SERVER['REQUEST_METHOD']=="POST")
{

	$n=$_POST['t2'];
	$p=$_POST['t3'];
	$in=$_POST['t4'];
	$de=$_POST['t5'];

	$sql="update menu_items set price='$p',Ingredients='$in',description='$de' where name='$n'";
if(mysqli_query($con,$sql))
{
	header("location:view_menu.php?umsg=Menu Item Updated Successfully");
}
else {
	header("location:view_menu_emp.php?umsg=Error  !!!");
}
	}


		
		
		?>
		
