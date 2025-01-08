<?php
session_start();
$user=$_SESSION['user'];
$conn=mysqli_connect("localhost","root","","my_exam");
$ans[1]="not submited";
$qid[1]=$_REQUEST['qid1'];
$ans[2]="not submited";
$qid[2]=$_REQUEST['qid2'];
$ans[3]="not submited";
$qid[3]=$_REQUEST['qid3'];
$ans[4]="not submited";
$qid[4]=$_REQUEST['qid4'];

if(isset($_REQUEST['ans1'])){
    $ans[1]=$_REQUEST['ans1'];
}

if(isset($_REQUEST['ans2'])){
    $ans[2]=$_REQUEST['ans2'];
}
if(isset($_REQUEST['ans3'])){
    $ans[3]=$_REQUEST['ans3'];
}
if(isset($_REQUEST['ans4'])){
    $ans[4]=$_REQUEST['ans4'];
}

for($i=1;$i<=4; $i++){
    $s="insert into result_master values('$user','$qid[$i]','$ans[$i]')";
    mysqli_query($conn,$s);
}
$s2="select result_master.qid from result_master,quest_paper where quest_paper.qid and  result_master.qid
 and quest_paper.ans=result_master.ans and result_master.sid='$user' "; 
 $q=mysqli_query($conn,$s2);
 $marks=null;
 while($r=mysqli_fetch_assoc($q)){
$marks=$marks+4;
 }
 $s3="insert into result values ('$user','20','$marks')";
 mysqli_query($conn,$s3);
?>