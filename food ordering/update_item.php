
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
            <li><a href="admin.php">ADMIN HOME</a></li>
          
          <li><a href="view_menu.php">VIEW MENU</a></li>
          <li><a href="add_food.php">ADD ITEM</a></li>
	  <li><a href="view_customer.php">CUSTOMER</a></li>
          <li><a href="order.php">ORDER</a></li>
                  <a href="logout.php"><button class="btn btn-warning btn-lg" style="float:right;margin-right: 450px;">LOGOUT</button></a> 
        </ul>
                
        </div>               
    </div>
  
</nav> 
 <?php
		session_start();
		$eml=$_SESSION['email'];
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$id=$_POST['t1'];
		include 'conn.php';
$sql="select * from menu_items where name='$id'";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	
	while($x=mysqli_fetch_assoc($data))
		{
			
			?>
			
		
<div id="section1" class="container-fluid"> 
    <div class="container">
	
	<div class='row' ><div class='col-md-3'></div><div class='col-md-6' style='margin-top:50px;'><h2>Update Menu Item</h2>
<form method="post" action="item_update.php">
   <div class="form-group">
       <span class="text-primary" style="float:left;">Type :</span><select class="form-control form-control-lg " name="t1" placeholder="Type of Items"><option><?php echo($x['item_type']) ?></option><option>Drinks</option><option>Main Course</option><option>Desserts</option></select>
</div>
<div class="form-group">
<span class="text-primary" style="float:left;">Name :</span><input type="text" class="form-control form-control-lg " name="t2" value='<?php echo($x['name']) ?>'/>
</div>

<div class="form-group">
<span class="text-primary" style="float:left;">Price:</span><input type="number" class="form-control form-control-lg " name="t3" value='<?php echo($x['price']) ?>'/>
</div>
<div class="form-group">
<span class="text-primary" style="float:left;">Ingredients :</span><input type="text" class="form-control form-control-lg " name="t4" value='<?php echo($x['Ingredients']) ?>'/>
</div>
                      <div class="form-group">
<span class="text-primary" style="float:left;"> Description :</span><textarea class="form-control form-control-sm text-area"rows="5" name="t5"/><?php echo($x['description']) ?></textarea></div>

 
 <div class="text-center"><button type="submit" class="btn btn-success btn-lg">Update Item</button></div>

</form>
			<?php
		}}}	
		?></div></div>
</div>
              </div>

</body></html>

    </head>
   
</html>
   