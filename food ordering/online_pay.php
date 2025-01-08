<?php
session_start();
$eml=$_SESSION['email'];
include('conn.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
	$t=$_POST['t0'];
$n=$_POST['t1'];$no=$_POST['t2'];$cvv=$_POST['t3'];$am=$_POST['t4'];
$sql="insert into payment values('$eml','$t0','$n','$no','$cvv','$am')";
if(mysqli_query($con,$sql)){
header("location:customer.php?msg=Order Placed Successfully");

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
<div class='col-md-3'></div><div class='col-md-8'>  <div style="height:440px;width:370px;border:2px solid lightgray;padding:10px;border-radius: 5px;margin:20px;">
            <div class="well well-sm" style="color:graytext;font-size:18px;">Pay through Debit Card/Credit Card</div><br/>
            <form method='post' action=""><div class="form-control">
                    <label class="radio-inline"style="float:left;"><input type="radio" name="t0" value='credit'/><span class="badge">CREDIT CARD</span></label><label class="radio-inline"style="float:right;"><input type="radio" name="t0" value='debit'><span class="badge">DEBIT CARD</span></label>
                </div><br/>  <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">Name</span>
                    <input id="pass" type="text" class="form-control" name="t1" placeholder="Name On Card">
                </div><br/>
                 <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">Card Number</span>
                    <input id="pass" type="number" class="form-control"  required name="t2" placeholder="Your Card Number">
                </div><br/>
 <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">CVV No.</span>
                    <input id="pass" type="number" class="form-control" required name="t3" placeholder="Card CVV No.">
                </div><br/>
 <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">Amount &#x20B9;</span>
                    <input id="pass" type="text" class="form-control" name="t4" value='<?php if(isset($_GET['total'])) { echo($_GET['total']);}?>'>
                </div><br/>
                <button class="btn btn-primary"style="width:343px">PAY</button>
                
            </form>
        </div></div>
</div>	
        
    </div>


</body></html>

    </head>
   
</html>
   