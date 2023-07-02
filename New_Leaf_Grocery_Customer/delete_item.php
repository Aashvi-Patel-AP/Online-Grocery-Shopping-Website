<?php
	session_start();
 
	//remove the id from our cart array
	$key = array_search($_GET['id'], $_SESSION['p_cart']);	
	unset($_SESSION['p_cart'][$key]);
 
	unset($_SESSION['qty_array'][$_GET['index']]);
	//rearrange array after unset
	$_SESSION['qty_array'] = array_values($_SESSION['qty_array']);
 
	echo"<script>alert('Product Removed Successfully In Cart!!!')</script>";
	print'<script>window.location.assign("addToCart.php");</script>';
?>