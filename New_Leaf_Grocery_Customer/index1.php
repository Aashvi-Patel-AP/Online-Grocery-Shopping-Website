<?php
session_start();
if(isset($_SESSION['email'])){

	error_reporting(0);
	session_start();
    $count1=$_SESSION['cart_count'];
?>
<?php
$serverName= "localhost";
$hostName = "root";
$password= "";
$dbname="new_leaf_mart";

$con = mysqli_connect($serverName,$hostName,$password,$dbname);
if(!$con){
  // die("Could not connect: ".mysqli_connect_error());
}
$userId=$_SESSION['id'];
$sql="SELECT `ID`,`Name`, `Email_Id`, `Phone_No`, `Address` FROM users where `ID`='$userId'"; 
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
?>
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
    <link rel="stylesheet" href="style10.css">
    <!-- bootstrap link -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <!-- flaticon link -->
    <link rel="stylesheet" href="css/flaticon.css">

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
    .badge1{
        /* display: inline-block; */
        /* min-width: 10px; */
        padding: 3px 7px;
        font-size: 12px;
        font-weight: 700;
        /* line-height: 1; */
        color: #fff;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        background-color: #777;
        border-radius: 10px;
        top: -2.2rem;
        position: relative;
        right: .7rem;
    }
</style>
<body>


<header class="header">
    <a class="logo" style="color:green; text-decoration: none; font-size:3rem;"><i class="fa-brands fa-pagelines"></i>&nbsp;New Leaf</a>
    <nav class="navbar">
        <a href="#offers" class="a">offers</a>
        <a href="#features" class="a">features</a>
        <a href="#categories" class="a">categories</a>
        <a href="#review" class="a">review</a>
        <a href="trackOrder.php" class="a">track order</a>
    </nav>

    <div class="icons">
        <div class="fa fa-bars" id="menu-btn"></div>
        <div class="fa fa-search" id="search-btn"></div>
        <a style="display: inline-block; width: 3.3rem;" href="addToCart.php"><div class="fa fa-shopping-cart" id="cart-btn"></div></a>
        <span class="fa badge1"><?php echo $count1; ?></span>
        <div class="fa fa-user" id="login-btn"></div>
        <a href="logOut.php"><div class="fas fa-sign-out-alt"></div></a>

    </div>
  

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="Search here....">
        <label for="search-box" class="fa fa-search"></label>
    </form>

   <form action="updateUser.php" class="login-form" method="post">
    <h3>Update Details</h3>
    <input type="text" name="name" id="name" class="box" value="<?php echo $row['Name'];?>" required="true">
    <input type="email" name="email" id="email" class="box" value="<?php echo $row['Email_Id'];?>" required="true">
    <input type="text" name="phoneNo" id="phoneNo" class="box" value="<?php echo $row['Phone_No'];?>" required="true">
    <input type="text" name="address" id="address" cols="10" rows="3" class="box" value="<?php echo $row['Address'];?>" required="true">
        
    <p>Change Password <a href="#">Click Here</a></p>

    <input type="submit" name="update" class="btnn" value="Update Details"><br>

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
<section class="review">
<div id=features>
<h1 class="heading"><span>Features</span></h1>
<section class="flaticon-container">
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
</div>
</section>
<!-- feature section end -->

<!-- categories section start -->
<section class="review">
<div id="categories">
<h1 class="heading"><span>Categories</span></h1>
<div class="categories-cart">
    <?php 
        include("categories.php");
    ?>
</div>
</div>
</section>
<!-- categories section end -->

<!-- review section start -->
<section class="review">
<div id="review">
<h1 class="heading"><span>Reviews</span></h1>
<div class="swipper review-slider">
    <?php 
        include("reviews.php");
    ?>
</div>
</div>
</section>
<!-- review section end -->

<!-- custome js file link -->
<script src="script4.js"></script>
</body>
</html>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>