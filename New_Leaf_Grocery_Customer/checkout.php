<?php
	session_start();
	if(isset($_SESSION['email']))
    {}
	else{
		echo "<script>alert('You need to login to checkout!!')</script>";
		print'<script>window.location.assign("index.php");</script>';
	}
?>
<?php 
$total=$_SESSION['total'];
$email=$_SESSION['email'];
if($total >0){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style3.css">

<style>
.btnn1{
    border: .2rem solid var(--black);
    margin-top: 1rem;
    display: inline-block;
    padding: .8rem 3rem;
    font-size: 1.7rem;
    border-radius: .5rem;
    color: var(--black);
    cursor: pointer;
    background: none;
    width: 21rem;
    height: 4rem;
    margin-left: 30%;
}
.btnn1:hover{
    background: var(--green);
    color: white;
}
.addProducts-form .box1{
	display:block;
    width: 30%;
    border: 0px solid;
    margin: .3rem;
    background: #eee;
    border-radius: .5rem;
    padding: .5rem;
    color: var(--black);
}
</style>

</head>
<body>
<header class="header">
    <a class="logo" style="color:green; text-decoration: none; font-size:3rem;"><i class="fa-brands fa-pagelines"></i>&nbsp;New Leaf</a>
    <nav class="navbar">
        <a href="index1.php" class="a">offers</a>
        <a href="index1.php" class="a">features</a>
        <a href="index1.php" class="a">categories</a>
        <a href="index1.php" class="a">review</a>
        <a href="trackOrder.php" class="a">track order</a>
    </nav>

    <div class="icons">
        <div class="fa fa-bars" id="menu-btn"></div>
        <div class="fa fa-search" id="search-btn"></div>
        <a href="addToCart.php"><div class="fa fa-shopping-cart" id="cart-btn"></div></a>
        <div class="fa fa-user" id="login-btn"></div>
        <a href="logOut.php"><div class="fas fa-sign-out-alt"></div></a>
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="Search here....">
        <label for="search-box" class="fa fa-search"></label>
    </form>


   <form action="#" class="login-form">
    <h3>Login Now</h3>
    <input type="email" name="" class="box" placeholder="enter your email...">
    <input type="password" name="" class="box" placeholder="your password">
    <p>Forget Your Password <a href="#">Click Here</a></p>
    <p>Don't Have An Account <a href="registration-form.php">Create Now</a></p>
    <input type="submit" name="" class="btnn" value="login now"><br>

   </form>
</header>


<div class="addProduct">
    <form action="orderPlaced.php" class="addProducts-form" enctype="multipart/form-data" method="post">
        <h3>Payment</h3>
		<h3><?php echo "Total: ".number_format($total, 2); ?></h3>
        Email Address:<input type="email" id="email" name="email" class="box" required="True" value="<?php echo $email;?>">
        Name on Card:<input type="text" id="name-on-card" name="name-on-card" class="box" >
        Credit Card Number:<input type="number" id="card-number" name="card-number" class="box" >
        Expiration:<input type="date" name="exp-date" id="exp-date" class="box1">
        CVC:<input type="number" name="cvc-number" id="cvc-number" class="box1">
    	<input type="submit" id="submit" name="submit" class="btnn1" value="Pay <?php echo number_format($total, 2);?>"><br>
   </form>
</div>
</body>
</html>
<?php
}
else{
    echo "<script>alert('Cart is empty')</script>";
    print'<script>window.location.assign("addToCart.php");</script>';
}
?>