<?php
	error_reporting(0);
	session_start();
    $count1=$_SESSION['cart_count'];
    // if(isset($_SESSION['email'])){
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
// else{
//     // echo "Database Connected successfully";
// }
?>
<?php
	session_start();
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
	unset($_SESSION['qty_array']);
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
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="refresh" content="3">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta>
    <title>Document</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style10.css">

<style>
.my-custom-scrollbar {
    position: relative;
    height: 450px;
    overflow: auto;
  }
.table-wrapper-scroll-y {
    display: block;
  }
  .tableContainer{
    z-index: -1;
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
        <a style="display: inline-block; width: 3.3rem;" href="addToCart.php"><div class="fa fa-shopping-cart" id="cart-btn"></div></a>
        <span class="fa badge1"><?php echo $count1; ?></span>
        <div class="fa fa-user" id="login-btn"></div>
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









<div class="tableContainer center" style="top:10rem; left:1rem; width: 130rem; height:30rem;">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary" style="width:20rem;">Add To Cart Details</h6>
    </div>
    <div class="card-header py-3">
      <div style="text-align:center; margin-left: 85rem;">
      <?php if(isset($_SESSION['email'])){
        echo '<a href="index1.php" class="btnn">Shop More</a>';
      } 
      else{
        echo '<a href="index.php" class="btnn">Shop More</a>';
    } ?>
		<a href="checkout.php" class="btnn">Checkout</a>
      </div> 
    </div>
    <div class="card-body">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <!-- <form method="post"> -->
        <table class="table tableDetails" id="customerTable" width="100%" cellspacing="10" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead style="position:sticky;">
          <tr style="font-size:2rem">
              <th rowspan="1" colspan="1">Product Name</th>
              <th rowspan="1" colspan="1">Product Desc</th>
              <th rowspan="1" colspan="1">Product img</th>
              <th rowspan="1" colspan="1">Price</th>
              <th rowspan="1" colspan="1">Product Qty</th>
              <th rowspan="1" colspan="1">Delete</th>
              <th rowspan="1" colspan="1">Subtotal</th>

          </tr>
        </thead>
        </form>
        </div>
    </div>
</div>
        <?php
			//create array of initail qty which is 1
			$index = 0;
			//initialize total
		    $total = 0;
            $count1= 0;
			if(!empty($_SESSION['p_cart'])){
			//connection
				
 			if(!isset($_SESSION['qty_array'])){
 			$_SESSION['qty_array'] = array_fill(0, count($_SESSION['p_cart']), 1);
 			}
		    $sql = "SELECT * FROM adproduct WHERE product_code IN (".implode(',',$_SESSION['p_cart']).")";
		    $query = $con->query($sql);
			while($row = $query->fetch_assoc()){
            ?>
            <tbody>
              <tr>
                 <td><?php echo $row["product_name"]; ?></td>
                 <td><?php echo $row["product_desc"]; ?></td>
                 <td><img src="<?php echo $row['product_img_name']; ?>" width="100px" height="100px"></td>
                 <td><?php echo number_format($row['price'], 2)?></td>
                 <input type='hidden' name='indexes[]' value="<?php echo $index; ?>">
                 <td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
                <td><a href='delete_item.php?id=<?php echo $row['product_code'];?>&index=<?php echo $index ?>' class='btn btn-success'><i class='far fa-trash-alt fa-2x'></i></button></a></td>
                <td><?php echo number_format($_SESSION['qty_array'][$index]*$row['price'], 2); ?></td>
                <?php 
                    $total += $_SESSION['qty_array'][$index]*$row['price']; 
                    $count1 = $count1+1;
                ?>
              </tr> 
<?php
			$index ++ ;
            }
  }
  else{
    ?>
    <?php
}
$_SESSION['total']=$total;
$_SESSION['cart_count']=$count1;
?>
<tr>
<td colspan="6" align="right"><b>Total</b></td>
<td><b><?php echo number_format($total, 2); ?></b></td>
</tr>
</tbody>
</table>
</div>
</div>
    
<script src="script4.js"></script>

</body>
</html>
<?php
?>