
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
          <li  class="active"><a href="add_food.php">ADD ITEM</a></li>
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
		
		
		?>
		
<div id="section1" class="container-fluid"> 
    <div class="container">
	
	<div class='row'><div class='col-md-3'></div><div class='col-md-6' style='margin-top:50px;'><h2>Add Menu Item</h2>
<form method="post" enctype="multipart/form-data" action="items_add.php">
   <div class="form-group">
       <span class="text-primary" style="float:left;">Type :</span><select class="form-control form-control-lg " name="t1" placeholder="Type of Items"><option>Drinks</option><option>Main Course</option><option>Desserts</option></select>
</div>
<div class="form-group">
<span class="text-primary" style="float:left;">Name :</span><input type="text" class="form-control form-control-lg " name="t2" placeholder="Item Name"/>
</div>

<div class="form-group">
<span class="text-primary" style="float:left;">Price:</span><input type="number" class="form-control form-control-lg " name="t3" placeholder="Price"/>
</div>
<div class="form-group">
<span class="text-primary" style="float:left;">Ingredients :</span><input type="text" class="form-control form-control-lg " name="t4" placeholder="Ingredients"/>
</div>
                      <div class="form-group">
<span class="text-primary" style="float:left;"> Description :</span><textarea class="form-control form-control-sm text-area"rows="5"placeholder="Discription" name="t5"/></textarea></div>

<div class="form-group">
    <span class="text-primary" style="float:left;">Image :</span><input type="file" class="form-control form-control-lg" name="file" placeholder="Image"/>
</div>

 
 <div class="text-center"><button type="submit" class="btn btn-success btn-lg">Add Item</button></div>

</form></div></div>
</div>
              </div>

</body></html>

    </head>
   
</html>
   