
<!DOCTYPE html>
 <html lang="en">
    <head>
        
  <title>admin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
       
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap-theme.min.css">
<link rel="stylesheet" href="font-awesome.min.css">
<link rel="stylesheet" href="hover-min.css">
  <script src="jquery.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
	  font-family:Century Gothic;
  }
  #section1 {padding-top:50px;height:768px; background-color:white ;}
  </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">

      <a class="navbar-brand" href="#"><i>Admin</i></a>
    </div>
    <div> 
        <div class="container">
        <ul class="nav nav-tabs">
            <li class="active"><a href="admin.php">ADMIN HOME</a></li>
          
          <li><a href="view_menu.php">VIEW MENU</a></li>
          <li><a href="add_food.php">ADD ITEM</a></li>
	  <li><a href="view_customer.php">CUSTOMER</a></li>
          <li><a href="order.php">ORDER</a></li>
                  <a href="logout.php"><button class="btn btn-warning btn-lg" style="float:right;margin-right: 450px;">LOGOUT</button></a> 
        </ul>
                
        </div>               
    </div>
  </div>
</nav> 
 <?php
include 'conn.php';
		session_start();
		$eml=$_SESSION['email'];
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$r=$_POST['reply'];
			$e=$_POST['em'];
			$s="replied";
			$sql1="update contact set reply='$r',status='$s' where email='$e'";
			if(mysqli_query($con,$sql1))
			{
				header("location:admin.php?msg=Reply Sent Successfully");
			}
			
			}
		
		?>
		
<div id="section1" class="container-fluid"> 
    <div class="container">
	<div class='row' style='margin-top:80px;'><div class='col-md-8'><table class='table table-responsive table-bordered' style='width:1100px;text-align:center'>
	<caption>All Messages</caption><tr><td>Name</td><td>Email</td><td>Subject</td><td>Message</td><td>Reply</td><td>Action</td></tr>
	<?php
$sql="select * from contact where status='seeing'";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	while($x=mysqli_fetch_assoc($data))
	{

            echo"<tr><td>".$x['name']."</td><td>".$x['email']."</td><td>".$x['sub']."</td><td>".$x['msg']."</td><form action='' method='post'><td style='width:300px;'><input type='text' name='reply' placeholder='Type Reply Here' class='form-control'></td><td><button class='btn btn-sm btn-primary' name='em' value='".$x['email']."'>Send reply</button></td></form></tr> ";         
       		
}}
?>
</table>
</div></div>




</div>
              </div>

</body></html>

    </head>
   
</html>
   