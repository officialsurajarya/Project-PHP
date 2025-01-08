<?php 

include('conn.php');

$message = '';

if(isset($_POST["eml"]))
{
	if(isset($_COOKIE["shopping_cart"]))
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);

		$cart_data = json_decode($cookie_data, true);
	}
	else
	{
		$cart_data = array();
	}
	if(in_array($_POST["name"], $item_id_list))
	{
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]["item_id"] == $_POST["name"])
			{
				$cart_data[$keys]["item_quantity"] = $cart_data[$keys]["item_quantity"] + $_POST["quantity"];
			}
		}
	}
	else
	{
		$item_array = array(
			'item_name'			=>	$_POST["name"],
			'item_price'		=>	$_POST["price"],
			'item_quantity'		=>	$_POST["qty"]
		);
		$cart_data[] = $item_array;
	}

	
	$item_data = json_encode($cart_data);
	setcookie('shopping_cart', $item_data, time() + (86400 * 30));
	header("location:cus_menu.php?success=1");
}	
	


?>
<!DOCTYPE html>
 <html lang="en">
    <head>
        
  <title>customer</title>
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
  .item{height:350px;width:200px;border:2px solid silver;border-radius:5px;margin:10px;padding:10px;}
  input{border:none;text-align:center;margin:5px;}
  </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">

      <a class="navbar-brand" href="#"><i>Customer</i></a>
    </div>
    <div> 
        <div class="container">
        <ul class="nav nav-tabs">
            <li><a href="customer.php">CUSTOMER HOME</a></li>
          
          <li class="active"><a href="cus_menu.php">VIEW MENU</a></li>
          <li><a href="view_cart.php">VIEW CART</a></li>
	
                  <a href="logout.php"><button class="btn btn-warning btn-lg" style="float:right;margin-right: 500px;">LOGOUT</button></a> 
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
    <div class="container"><div class='row'style='margin-top:100px;'><h2>Menu</h2>
	<?php
include 'conn.php';
$sql="select * from menu_items";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	while($x=mysqli_fetch_assoc($data))
	{   ?>
<div class='col-md-3'>
<div class='item'>
<img src='upload/<?php echo($x['image']) ?>' class='img img-responsive' style='width:180px;height:200px;border:1px solid lightgreen'/>
<form method='post'><input type='text' name='name' readonly value='<?php echo($x['name']) ?>'><br/>
<input type='text' name='price' readonly value='<?php echo($x['price']) ?>' style='width:85px;text-align:right;'>&#x20B9;<br/>
<input type='number' placeholder='  Quantity Of Order' required style='width:165px;border:1px solid silver;border-radius:5px' name='qty'/>
<br/><button class='btn btn-info btn-sm' type='submit' style='width:175px;' name='eml' value='<?php echo($eml) ?>'>Add Cart</button></form>
</div>


</div>




<?php                  	
}}
?>
</div>	</div>
        
        
    </div>


</body></html>

    </head>
   
</html>
   