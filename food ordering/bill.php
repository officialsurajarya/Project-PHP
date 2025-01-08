<?php
session_start();
$eml=$_SESSION['email'];
include('conn.php');

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

</div>	<h3>My Bill</h3>
<table class='table table-responsive table-bordered' style='text-align:center;width:700px;'><caption><b>Email Id : </b><?php echo($eml) ?></caption>
<tr style='background-color:lightgray;'>
					<th width="40%" style='text-align:center;'>Item Name</th>
					<th width="10%" style='text-align:center;'>Quantity</th>
					<th width="20%" style='text-align:center;'>Price</th>
				</tr>
			<?php

$sql="select * from mycart where email='$eml'";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	while($x=mysqli_fetch_assoc($data))
{  

echo"<tr><td>".$x['name']."</td><td>".$x['qty']."</td><td>&#x20B9; ".$x['price']."</td></tr>";



}} ?>
			<tr><td colspan='2'><b>Total</b></td><td>&#x20B9; <?php if(isset($_GET['total'])) { echo($_GET['total']);}?></td></tr>
			<tr><td>Payment Mode</td><td><a href='customer.php?msg=Order Placed Successfully'><button class='btn' style='background-color:lightcyan;'>Cash On Delivery</button></a></td><td><a href='online_pay.php?total=<?php if(isset($_GET['total'])) { echo($_GET['total']);}?>'><button class='btn'style='background-color:lightcyan;'>Pay through credit/debit card</button></td></tr>
			</table>
   <button class='btn btn-default' name='eml' onclick="prt()">Print </button> </div>     
        <script>
function prt() {
  window.print();
}
</script>
        
        
    </div>


</body></html>

    </head>
   
</html>
   