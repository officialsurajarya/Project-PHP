<?php 
include "conn.php";
session_start();
if ($_SERVER['REQUEST_METHOD']=='POST')
{
	$n=$_POST['name'];
	$p=$_POST['price'];
	$q=$_POST['qty'];
		$e=$_POST['eml'];
		setcookie('name',$n);
setcookie('price', $p, time()+3600);
setcookie('qty', $q);
$cookiename = "products";

$cart = array();

setcookie('ca', serialize($cart), time() + 3600, "/");
$_COOKIE['ca'] = serialize($cart);
			header("location:cus_menu.php?msg=Cart Added Sussessfully");
		}

	
?>