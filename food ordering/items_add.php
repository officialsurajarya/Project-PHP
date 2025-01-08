<?php
include("conn.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
 $i_type=$_POST['t1'];
  $i_name=$_POST['t2'];
   $i_price=$_POST['t3'];
    $i_ing=$_POST['t4'];
	 $i_des=$_POST['t5'];
  $name = $_FILES['file']['name'];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $query = "insert into menu_items values('$i_type','$i_name','$i_price','$i_ing','$i_des','".$name."')";
     if(mysqli_query($con,$query))
	 {
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
	 header("location:add_food.php?msg=Item Added Successfully");
	 }
  }
 
}


?>