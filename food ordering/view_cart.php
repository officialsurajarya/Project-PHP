<?php
session_start();
$eml=$_SESSION['email'];
include('conn.php');


if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		$cookie_data = stripslashes($_COOKIE['shopping_cart']);
		$cart_data = json_decode($cookie_data, true);
		foreach($cart_data as $keys => $values)
		{
			if($cart_data[$keys]['item_name'] == $_GET["id"])
			{
				unset($cart_data[$keys]);
				$item_data = json_encode($cart_data);
				setcookie("shopping_cart", $item_data, time() + (86400 * 30));
				$sq1="delete from mycart where email='$eml'";
				if(mysqli_query($con,$sq1)){
				header("location:cus_menu.php?Cart Removed");}
			}
		}
	}
	if($_GET["action"] == "clear")
	{
		setcookie("shopping_cart", "", time() - 3600);
		$sq2="delete from mycart where email='$eml'";
				if(mysqli_query($con,$sq2)){
				
				header("location:cus_menu.php?Clear All Cart");}
	}
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
          
          <li><a href="cus_menu.php">VIEW MENU</a></li>
          <li  class="active"><a href="view_cart.php">VIEW CART</a></li>
	
                  <a href="logout.php"><button class="btn btn-warning btn-lg" style="float:right;margin-right: 500px;">LOGOUT</button></a> 
        </ul>
                
        </div>               
    </div>
  </div>
</nav> 
<div id="section1" class="container-fluid"> 
    <div class="container"><div class='row'style='margin-top:100px;'>

</div>	<h3>Order Details</h3><a href="view_cart.php?action=clear"><b>Clear Cart</b></a>
			<div class="table-responsive">
			
			<div align="right">
		
			</div>
			<table class="table table-bordered" style='text-align:center;width:800px;'>
				<tr style='background-color:lightgray;'>
					<th width="40%" style='text-align:center;'>Item Name</th>
					<th width="10%" style='text-align:center;'>Quantity</th>
					<th width="20%" style='text-align:center;'>Price</th>
					<th width="15%" style='text-align:center;'>Total</th>
				</tr>
			<?php
			$d=date("d/m/Y l h:i:s a");
			if(isset($_COOKIE["shopping_cart"]))
			{
				$total = 0;
				$cookie_data = stripslashes($_COOKIE['shopping_cart']);
				$cart_data = json_decode($cookie_data, true);
				foreach($cart_data as $keys => $values)
				{
					$a=$values["item_name"];$b=$values["item_price"];$c=$values["item_quantity"];
					$sql="insert into mycart values('$eml','$a','$b','$c','$d')";
					mysqli_query($con,$sql);
			?>
				<tr>
					<td><?php echo $values["item_name"]; ?></td>
					<td><?php echo $values["item_quantity"]; ?></td>
					<td>&#x20B9; <?php echo $values["item_price"]; ?></td>
					<td>&#x20B9; <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
					<td><a href="view_cart.php?action=delete&id=<?php echo $values["item_name"]; ?>"><span class="text-danger">Remove</span></a></td>
				</tr>
			<?php	
					$total = $total + ($values["item_quantity"] * $values["item_price"]);
				}
			?>
				<tr>
					<td colspan="3" align="right">Total</td>
					<td align="right">&#x20B9; <?php echo number_format($total, 2); ?></td>
					<td><a href='bill.php?total=<?php echo($total) ?>'><button class='btn btn-primary btn-sm'>Place Order & Generate Bill</button></a></td>
				</tr>
			<?php
			}
			else
			{
				echo '
				<tr>
					<td colspan="5" align="center">No Item in Cart</td>
				</tr>
				';
			}
			?>
			</table>
    </div>     
        
        
        
    </div>


</body></html>

    </head>
   
</html>
   