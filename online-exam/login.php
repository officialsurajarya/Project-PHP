<?php
$em=$_POST['email'];
$pass=$_POST['password'];
$conn=mysqli_connect("localhost","root","","my_exam");
$sql="select * from reg where uname='$em' and pass='$pass'";
$q=mysqli_query($conn,$sql);
if($r=mysqli_fetch_assoc($q)){
    echo $db_user=$r['uname'];
    echo $db_pass=$r['pass'];
    session_start();
    $_SESSION['user']=$r['uname'];
    if($em==$db_user and $pass==$db_pass){
        header("location:Student.php");
        echo "hi";
    }
}














?>
