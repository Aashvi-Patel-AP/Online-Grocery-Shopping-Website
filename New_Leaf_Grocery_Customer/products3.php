<?php
error_reporting(0);
session_start();

$serverName= "localhost";
$hostName = "root";
$password= "";
$dbname="new_leaf_mart";

$con = mysqli_connect($serverName,$hostName,$password,$dbname);
if(!$con){
  // die("Could not connect: ".mysqli_connect_error());
}
// else{
//     // echo "Database Connected successfully";
// }

$userId=$_SESSION['id'];
$sql="SELECT `ID`,`Name`, `Email_Id`, `Phone_No`, `Address` FROM users where `ID`='$userId'"; 
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

?>
<?php

	//initialize cart if not set or is unset
	if(!isset($_SESSION['p_cart'])){
		$_SESSION['p_cart'] = array();
        $id=$_GET['id'];
        $sql="SELECT `c_name`,`category_img_name`,`c_id` FROM category WHERE c_id='$id' "; 
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);
        $_SESSION['c_id']=$row['c_id'];
	}
 
	//unset quantity
	// unset($_SESSION['qty_array']);
	unset($_SESSION['qty_array']);

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
    <link rel="stylesheet" href="style10.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<style>
    :root{
    --box-shadow:0 .1rem 1rem rgba(0,0,0.1);
    --border:.2rem solid rgba(0,0,0.1);
    --outline:.1rem solid rgba(0,0,0.1);
    --outline-hover:.2rem solid var(--black);
    }
    /* .products{
        border: 1px solid;
    } */
    .product-cart{
        position: relative;
        top: 12rem;
    }
    .container{
        position: relative;
        /* top:12rem; */
        width: 28rem;
        display: inline-block;
    }
    .box-container{
        width: 25rem;
        margin:1rem;
        display: inline-block;
    }
    .box-container .box{
        height:31rem;
        border: 1px solid;
        border-radius:1rem;
        text-align: center;
        font-size: 1.5rem;
        background-color:white;
        box-shadow: var(--box-shadow);
    }
    .box-container .box img{
        display: block;
        height: 12rem;
        width: 15rem;
        margin-left:auto;
        margin-right:auto; 
        /* border-radius:2rem; */
    }
    .btnn{
        position: relative;
        /* left:20%; */
        margin-top: 1rem;
        padding: .8rem 3rem;
        font-size: 1.3rem;
        color: white;
        cursor: pointer;
        background-color: var(--green);
        height: 4rem;
        width:15rem;
        bottom:1rem;
    }
    .btnn:focus{
        outline:none;
    }
    .box-container .box .product-quantity input{
        /* border: 1px solid;
        border-radius:.5rem; */
        width:3rem;
    } 
   
    .stars i{
        color: orange;
    }
    .my-custom-scrollbar {
    position: relative;
    height: 500px;
    overflow: auto;
  }
  .table-wrapper-scroll-y {
    display: block;
  }
</style>
<body>
<header class="header">
    <a class="logo" style="color:green; text-decoration: none; font-size:3rem;"><i class="fa-brands fa-pagelines"></i>&nbsp;New Leaf</a>
    <nav class="navbar">
        <a href="#offer" class="a">offers</a>
        <a href="#features" class="a">features</a>
        <a href="#categories" class="a">categories</a>
        <a href="#review" class="a">review</a>
    </nav>

    <div class="icons">
        <div class="fa fa-bars" id="menu-btn"></div>
        <div class="fa fa-search" id="search-btn"></div>
        <a href="addToCart.php"><div class="fa fa-shopping-cart" id="cart-btn"></div></a>
    </div>

    <form action="" class="search-form">
        <input type="search" id="search-box" placeholder="Search here....">
        <label for="search-box" class="fa fa-search"></label>
    </form>

</header>


<div class="product-cart table-wrapper-scroll-y my-custom-scrollbar">
<?php
    $id=$_GET['id'];
    // $id1=$_SESSION['c_id'];
    $sql="SELECT `product_code`,`product_name`,`product_desc`,`product_img_name`,`gi_index`,`price`,`isActive` FROM adproduct WHERE c_id='$id'"; 
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result))
    {?>
        <form method="post" action="" class="container">
            <div class="box-container">
                <div class="box">
                    <img src=<?php echo $row['product_img_name'];?>>
                    <div class="product-descrip"><h3><?php echo $row['product_desc'];?></h3></div>
                    <div class="product-information">
                        <div class="product-price">Price:<?php echo $row['price'];?></div>
                        <div class="gi-index">
                            Nutritional Value:<?php echo $row['gi_index'];?>
                        </div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                            <i class="far fa-star"></i>

                        </div>
                        <?php if($row['isActive']==0) 
                        { ?>
                            <h4 class="btnn" style="background: red;">Unavailable</h4>
                            <?php
                        }
                        else{
                        ?>
                        <button type='submit'><a class="btnn" href='addProductInCart1.php?id=<?php echo $row["product_code"];?>'>Add to cart</a></button>
                       <?php } ?>
                    </div>
                </div>
            </div>
        </form>

<?php
}
}
?>  
</div>  
<script src="script4.js"></script>

</body>
</html>
