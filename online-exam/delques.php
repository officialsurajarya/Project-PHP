<?php
$conn=mysqli_connect("localhost","root","","my_exam");
$qid=$_GET['qid'];
$s="delet from quest_paper where qid='$qid'";
mysqli_query($conn,$s);
header("location:QuestionList.php");

?>