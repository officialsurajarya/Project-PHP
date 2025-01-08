<?php
$conn=mysqli_connect("localhost","root","","my_exam");
$uname=$_POST['user'];
$sn=$_POST['sname'];
$cr=$_POST['Course'];
$dob=$_POST['dob'];
$add=$_POST['addr'];
$city=$_POST['city'];
$gen=$_POST['gender'];
$st=$_POST['state'];
$pass=$_POST['pswd'];
$cpass=$_POST['cpswd'];
$pin=$_POST['pin'];
$ph=$_POST['contact'];
$img_name=$_FILES['file']['name'];
$img_tmp=$_FILES['file']['tmp_name'];
$folder='uploadImage/'.$img_name;
move_uploaded_file($img_tmp,$folder);
$sql="insert into reg values ('$uname','$sn','$cr','$dob','$gen','$add','$city','$st','$pass','$cpass','$pin','$ph','$folder')";
mysqli_query($conn,$sql);

?>