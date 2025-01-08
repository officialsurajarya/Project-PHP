
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
          
          <li class="active"><a href="view_menu.php">VIEW MENU</a></li>
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
		session_start();
		$eml=$_SESSION['email'];
		
		
		?>
		
<div id="section1" class="container-fluid"> 
    <div class="container"><div class='row'><div class='col-md-10'>
<table class='table-bordered' style='text-align:center;margin-top:100px;font-size:15px;width:1000px;'>
<caption>List Of All Menu Items</caption>
	<tr style='height:50px;text-align:center;background-color:lightgray;'><td>Item Type</td><td>Item Name</td><td>Ingredients</td><td>Description</td><td>Price</td><td>Image</td><td colspan='2'>Action</td></tr>
	
	<?php
include 'conn.php';
$sql="select * from menu_items";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	
	while($x=mysqli_fetch_assoc($data))
	{
	echo ("<tr style='height:50px;'><td>".$x['item_type']."</td><td>".$x['name']."</td><td>".$x['Ingredients']."</td><td>".$x['description']."</td><td>".$x['price']."</td><td><img src='upload/".$x['image']."' style='height:100px;width:100px;'/></td><td><form action='update_item.php' method='post'><button type='submit' class='btn btn-primary btn-sm' style='display:inline;' name='t1' value='".$x['name']."'>UPDATE</button></form></td><td><form action='delete_item.php' method='post'><button type='submit' class='btn btn-danger btn-sm' style='display:inline;' name='t1' value=".$x['name'].">DELETE</button></form></td></tr>")	;
	}
	echo "</table><span style='color:blue;font-size:25px;padding-left:500px;'>";}
?>






</div></div>
              </div>

</body></html>

    </head>
   
</html>
   