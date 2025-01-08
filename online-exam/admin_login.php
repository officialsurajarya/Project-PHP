<?php
$conn=mysqli_connect("localhost","root","","my_exam");
$em=$_POST['email'];
$pass=$_POST['pswd'];
$s="select * from admin where username='$em' and password='$pass' ";
$q=mysqli_query($conn,$s);
if($r=mysqli_fetch_assoc($q)){
    $db_u=$r['username'];
    $db_p=$r['password'];
    session_start();
     $_SESSION['admin']=$r['username'];
    if($em==$db_u and $pass==$db_p){
        header('location:AdminHome.php');
    }
}

?>