<?php
include 'conn.php';
		session_start();
		$eml=$_SESSION['email'];
	if($_SERVER['REQUEST_METHOD']=="POST")
{
$op=$_POST['op'];	$np=$_POST['np'];	$cp=$_POST['cp'];	
//echo($op);echo($cp);echo($np);echo($eml);
$sql="select * from customer where email='$eml'";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	if($x=mysqli_fetch_assoc($data))
	{
		$ps=$x['pswd'];
	
		if($ps==$op && $np==$cp){
			
			$sql1="update customer set pswd='$np',cpswd='$np' where email='$eml'";
			if(mysqli_query($con,$sql1))
			{ 
				header("location:customer.php?msg=Password Changed Successfully");
				
			}
		}
}}}?>