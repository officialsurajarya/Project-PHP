
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
            <li class="active"><a href="customer.php">CUSTOMER HOME</a></li>
          
          <li><a href="cus_menu.php">VIEW MENU</a></li>
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
    <div class="container">
	<?php
include 'conn.php';
$sql="select * from customer where email='$eml'";
$data=mysqli_query($con,$sql);
if(mysqli_num_rows($data)>0)
{
	if($x=mysqli_fetch_assoc($data))
	{
	?>	
                        <center><br/><br/><br/><br/><span style="color:black"><h3>Welcome <?php echo($x['name'])?></h3> 
       <h2></h2></span>
    </center> 
    <div style="float:left;border:2px solid lightgray;padding:10px;border-radius: 5px;"><div class="label label-info">CUSTOMER DETAILS</div><br><br>
        <div class="panel panel-default"><div class="panel-heading">Address :- </div><div class="panel-body text-primary"><?php echo($x['address'])?>&nbsp<sup>Pin-</sup><span class="badge"><?php echo($x['pin'])?></span></div></div><hr/>
        <div class="panel panel-default"><div class="panel-heading">Mobile :-</div><div class="panel-body text-primary"> <?php echo($x['mobile'])?></div></div>
       <?php		
}}
?>

    </div>
        <div style="float:right;height:645px;width:370px;border:2px solid lightgray;padding:10px;border-radius: 5px;margin:20px;">
            <div class="well well-sm" style="color:graytext;font-size:18px;">Wanna Edit my Details..</div><br/>
            <form action="updatedetails.php" method='post'>
                <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">Address</span>
                    <textarea id="pass" type="text" class="form-control" name="t1" placeholder="Enter New Address" style="width:195px;"></textarea>
                </div><br/>
                 <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">Pin</span>
                    <input id="pass" type="number" class="form-control" name="t2" placeholder="Enter New Pin Code">
                </div><br/>
 <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">Mobile</span>
                    <input id="pass" type="text" class="form-control" name="t3" placeholder="Enter New Mobile No.">
                </div><br/>
                <button class="btn btn-info"style="width:343px" name='t4' value='<?phpecho($eml)?>'>EDIT DETAILS</button>
                
            </form>
       <hr/>
           <div class="well well-sm" style="color:graytext;font-size:18px;">Wanna change my password..</div><br/>
            <form action="changepassword.php" method='post'>
                <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">Old Password</span>
                    <input id="pass" type="text" class="form-control" name="op" placeholder="Enter Old Password">
                </div><br/>
                 <div class="input-group">
                    <span class="input-group-addon" style="width:147px;">New Password</span>
                    <input id="pass" type="text" class="form-control" name="np" placeholder="Enter New Password">
                </div><br/>
 <div class="input-group">
                    <span class="input-group-addon" style="width:120px;">Re-Enter Password</span>
                    <input id="pass" type="text" class="form-control" name="cp" placeholder="Re-Enter New Password">
                </div><br/>
                <button class="btn btn-primary"style="width:343px" name="t1" value="<?phpecho($eml)?>" >CHANGE PASSWORD</button>
                
            </form></div>
               
        
        
        
    </div>
 </div>

</body></html>

    </head>
   
</html>
   