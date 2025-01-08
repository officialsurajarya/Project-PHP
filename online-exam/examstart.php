<?php
session_start();
$user=$_SESSION['user'];
$conn=mysqli_connect("localhost","root","","my_exam");


?>
<!DOCTYPE html>
<html>
<head>
<!-- Bootstrap css -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
	.positiona{
		position: fixed;
		right: 10px;
		top: 5px;
		background: white;
		color: #EA2027;
		font-size: 20px;
		padding: 10px 20px;
		border-radius: 5px;
		border: 1px solid #EA2027;
		transition: all 0.3s linear;
	}
	.positiona:hover{
		background: #EA2027;
		color:white;
		border-radius: 10px;
	}

	.mainbtn{
		border: 1.5px solid white;
		background-color: #7efff5;
		font-size: 15pt;
		padding: 10px 20px;
		border-radius: 5px;
		transition: all 0.4s linear ;
	}
	.mainbtn:hover{
		background-color: #0652DD;
		color: white;
		box-shadow: 0px 0px 2rem 0.5rem #d1ccc0;
		border-radius: 10px;
	}
</style>
<title>Exam Page</title>
</head>
<body class="container-fluid">
<a href="Student.php" title="Go Home Page" class="positiona"> Go Back </a>
<br>
<div class="m-5">
<h1 class="bg-dark text-white text-center  p-3 d-inline-block w-100" style="border-radius:20px;"><?php echo $user; ?></h1>
</div>


<form action="examstart_submit.php" method="post" class="shadow-lg container-fluid">

<table width="100%" class="table table-borderless table-primary">
<?php
$s="select * from result where sid='$user'";
$q=mysqli_query($conn,$s);
if(mysqli_fetch_assoc($q)){

	echo"Your exam has been completed";
}else{

	$s2="select * from quest_paper";
	 $q1=mysqli_query($conn,$s2);
	 $count=1;
	 while($r=mysqli_fetch_assoc($q1)){
		$qid=$r['qid'];
        $q=$r['question'];
		$o1=$r['opt1'];
		$o2=$r['opt2'];
		$o3=$r['opt3'];
		$o4=$r['opt4'];

	echo"<tr style='color:blue;'>
		<th colspan='2'><input type='hidden' name='qid$count' value='$qid'></th>
	</tr>

	<tr style='color:blue;'>
		<th colspan='2'><span style='color:red;'>Question $count:$q </span> </th>
	</tr>";

	echo"<tr>
		<th>a) <input type='radio' name='ans$count'value='$o1'>$o1</th>

<th>b) <input type='radio' name='ans$count'value='$o2'>$o2</th>
	</tr>";

	echo"<tr>
		<th>c) <input type='radio' name='ans$count'value='$o3'>$o3</th>
		

<th>d) <input type='radio' name='ans$count'value='$o4'> $o4</th>
	</tr>";
$count++;
	 }
echo "<tr>
<th colspan='2'>
	<input type='submit' name='submit' value='Submit Exam' class='mainbtn'>
	<input type='reset'  value='Clear Form' class='mainbtn'>
</th>

</tr>
}

</table>
	 
</form>";
	}
?>
</body>
</html>