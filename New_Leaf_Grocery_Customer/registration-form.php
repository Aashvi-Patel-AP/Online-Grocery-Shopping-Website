<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Leaf Grocery Website?</title>
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- custome CSS file link -->
    <link rel="stylesheet" href="style3.css">
    <!-- custome validation javascript file -->
    <script src="validation.js"></script>
</head>
<style>
    .btnn{
    border: .2rem solid var(--black);
    margin-top: 1rem;
    display: inline-block;
    padding: .8rem 3rem;
    font-size: 1.7rem;
    border-radius: .5rem;
    color: var(--black);
    cursor: pointer;
    background: none;
    width: 20rem;
    height: 4rem;
    }
    .btnn:hover{
    background: var(--green);
    color: white;
    }
</style>
<body>

<!-- header start  -->
<header class="header">
    <a class="logo" style="color:green; text-decoration: none; font-size:3rem;"><i class="fa-brands fa-pagelines"></i>&nbsp;New Leaf</a>
    <nav class="navbar">
        <a href="#offers" class="a">offers</a>
        <a href="#features" class="a">features</a>
        <a href="#categories" class="a">categories</a>
        <a href="#review" class="a">review</a>

    </nav>

    <div class="icons">
        <div class="fa fa-bars" id="menu-btn"></div>
        <div class="fa fa-search" id="search-btn"></div>
        <div class="fa fa-shopping-cart" id="cart-btn"></div>
        <div class="fa fa-user" id="login-btn"></div>

    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="Search here....">
        <label for="search-box" class="fa fa-search"></label>
    </form>

   

   <form  class="registration-form scroll-box" action="storeintoDatabase.php" method="post" enctype="multipart/form-data" onsubmit="return validateUser()">
        <span class="btn-close"><a href="index.php" style="text-decoration: none;">&times;</a></span>
        <h3>Sign Up Now</h3>
        <input type="text" name="name" id="name" class="box" placeholder="Enter Name" required="true">
        <input type="email" name="email" id="email" class="box" placeholder="Enter Email" required="true">
        <input type="text" name="phoneNo" id="phoneNo" class="box" placeholder="Enter Mobile Number" required="true">
        <textarea name="address" id="address" cols="10" rows="3" class="box" placeholder="Enter Your Address" required="true"></textarea>
        <input type="password" id="password" name="password" class="box" placeholder="Enter Password" required="true">
        <input type="password" id="confirm_password" name="confirm_password" class="box" placeholder="Confirm password" required="true">
        <input type="submit" id="submit" name="submit" class="btnn" value="Register Now">

   </form>

</header>
<!-- header ends -->

<!-- offer/ banner starts -->
<div class="offers" id="offers">
    <div class="offer-content">
        <?php 
        include("offer.php");
        ?>
    </div>
</div>
<!-- offer/ banner ends -->

<!-- feature section start-->

<section class="flaticon-container" id=features>
    <div class="flaticon-div">
        <div class="features-icons">
            <span class="flaticon">
                <img src="images/free-shipping.png" alt="">
            </span>
            <div class="media-body">
                <h3 class="details">Free Shipping</h3>
                <span>On order over 100</span>
            </div>
        </div>

        <div class="features-icons">
            <span class="flaticon">
                <img src="images/groceries.png" alt="">
            </span>
            <div class="media-body">
                <h3 class="details">Always Fresh</h3>
                <span>Product well package</span>
            </div>
        </div>

        <div class="features-icons">
            <span class="flaticon">
                <img src="images/high-quality.png" alt="">
            </span>
            <div class="media-body">
                <h3 class="details">Superior Quality</h3>
                <span>Quality Products</span>
            </div>
        </div>

        <div class="features-icons">
            <span class="flaticon">
                <img src="images/24-7_support.png" alt="">
            </span>
            <div class="media-body">
                <h3 class="details">Support</h3>
                <span>24/7 Support</span>
            </div>
        </div>
    </div>
</section>

<!-- feature section end -->



<!-- custome js file link -->
<script src="script2.js"></script>
</body>
</html>