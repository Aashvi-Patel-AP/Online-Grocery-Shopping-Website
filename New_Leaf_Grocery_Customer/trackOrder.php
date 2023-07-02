<?php
session_start();
if(isset($_SESSION['email'])){

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

    $userId=$_SESSION['id'];

	

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
</style>

</head>
<body>
<header class="header">
    <a class="logo" style="color:green; text-decoration: none; font-size:3rem;"><i class="fa-brands fa-pagelines"></i>&nbsp;New Leaf</a>
    <nav class="navbar">
        <a href="index1.php" class="a">offers</a>
        <a href="index1.php" class="a">features</a>
        <a href="index1.php" class="a">categories</a>
        <a href="#index1.php" class="a">review</a>
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










<div class="tableContainer center" style="top:10rem; left:1rem; width: 130rem; height:30rem;">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary" style="width:20rem;">My Orders</h6>
    </div>
    <div class="card-header py-3">
      <div style="text-align:center; margin-left: 85rem;">
		<a href="index1.php" class="btnn">Back</a>
      </div> 
    </div>
    <div class="card-body">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <!-- <form method="post"> -->
        <table class="table tableDetails" id="customerTable" width="100%" cellspacing="10" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead style="position:sticky;">
          <tr style="font-size:2rem">
              <th rowspan="1" colspan="1">Order Id</th>
              <th rowspan="1" colspan="1">Payment Method</th>
              <th rowspan="1" colspan="1">Order date</th>
              <th rowspan="1" colspan="1">Delivery Date</th>
              <th rowspan="1" colspan="1">Status</th>
              <th rowspan="1" colspan="1">Total Price</th>
          </tr>
        </thead>
        </form>
        </div>
    </div>
</div>
        <?php
		    $sql = "SELECT * FROM orders WHERE User_Id='$userId'";
		    $query = $con->query($sql);
			while($row = $query->fetch_assoc()){
            ?>
            <tbody>
              <tr>
                 <td><?php echo $row["Order_Id"]; ?></td>
                 <td><?php echo $row["Payment_Method"]; ?></td>
                 <td><?php echo $row["Order_Date"]; ?></td>
                 <td><?php echo $row["Delivery_Date"]; ?></td>
                 <td><?php echo $row["Status"]; ?></td>
                 <td><?php echo $row["Total"]; ?></td>

                 
              </tr> 
<?php
	

  }


?>

</tbody>
</table>
</div>
</div>

<script src="script2.js"></script>

</body>
</html>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>