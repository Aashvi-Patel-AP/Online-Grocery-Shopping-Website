<?php
session_start();
    // if(isset($_SESSION['email']))
    // {
	if(!in_array($_GET['id'], $_SESSION['p_cart'])){
		array_push($_SESSION['p_cart'], $_GET['id']);
		$_SESSION['message'] = 'Product added to cart';
		echo"<script>alert('Product Added Successfully In Cart!!!')</script>";
	}
	else{
		$_SESSION['message'] = 'Product already in cart';
	}
    // }
    // else{
    // echo "<script>alert('Please Login to Continue!!')</script>";
	// print'<script>window.location.assign("index.php");</script>';
    // }
 
    print'<script>window.location.assign("addToCart.php");</script>';
?>