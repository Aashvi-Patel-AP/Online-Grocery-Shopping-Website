<?php
session_start();
if(isset($_SESSION['email'])){

include_once('dashboard.php');
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  
    thead th{
      z-index: 1;
      position: sticky;
    }
    </style>
</head>
<body>
    <div class="path-information">
        <div class="path">
           Dashboard / Products / Add Product
        </div>
    </div>
    <div class="add-product">
        <div class="title">
           <a href="addProducts.php" class="btnn">+Add New Product</a>
        </div>
    </div>
<div class="tableContainer center" style="top:20rem; left:-9rem; width: 130rem;">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Products Details</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <form name="assignto" method="post">
        <table class="table tableDetails" id="customerTable" width="100%" cellspacing="10" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead style="position:sticky;">
          <tr style="font-size:2rem">
              <th rowspan="1" colspan="1">Product Code</th>
              <th rowspan="1" colspan="1">Product Name</th>
              <th rowspan="1" colspan="1">Product Desc</th>
              <th rowspan="1" colspan="1">Product img</th>
              <th rowspan="1" colspan="1">Price</th>
              <th rowspan="1" colspan="1">Product Qty</th>
              <th rowspan="1" colspan="1">Gi index</th>
              <th rowspan="1" colspan="1">Category id</th>
              <th rowspan="1" colspan="1">Action</th>
              <!-- <th rowspan="1" colspan="1">Delete</th> -->
          </tr>
        </thead>
        </form>
        </div>
    </div>
</div>
    <?php
    $sql="SELECT `product_code`,`product_name`,`product_desc`,`product_img_name`,`price`, `product_qty`,`gi_index`,`isActive`,`c_id` FROM adproduct"; 
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
      echo "<tbody>
      <tr>
      <td>".$row["product_code"]."</td>
      <td>".$row["product_name"]."</td>
      <td>".$row["product_desc"]."</td>
      <td>"."<img src=".$row['product_img_name'].' width="100px" height="100px">'."</td>
      <td>".$row["price"]."</td>
      <td>".$row["product_qty"]."</td>
      <td>".$row["gi_index"]."</td>
      <td>".$row["c_id"]."</td>
      <td>"."<a href='updateProducts.php?id=".$row["product_code"]."'><button type='button' class='btn btn-success '><i class='fa-solid fa-pen-to-square fa-2x'></i></button></a>"." "."<a href='deleteProducts.php?id=".$row["product_code"]."'><button type='button' class='btn btn-success '><i class='far fa-trash-alt fa-2x'></i></button></a>"; ?>
      <?php
        if($row['isActive']==1){
      ?>
       <a href="deactive-product.php?pid=<?php echo $row['product_code'];?>"><button type='button' class='btn btn-success '><i class="fas fa-eye fa-2x" style="color:white;" title="Block product"></i></button></a>
      <?php
          }
            elseif($row['isActive']==0){
      ?>
       <a href="active-product.php?pid=<?php echo $row['product_code'];?>"><button type='button' class='btn btn-danger '><i class="fas fa-eye-slash fa-2x" style="color:white;"  title="Active Product"></i></button></a>
      <?php
          }
      echo "</td></tr>
      </tbody>";
    }
    echo "</table>";
  }
  else
  {
    echo "Error: ".$sql.":-".mysqli_error($con);
  }?>
</div>
</div>
<?php
  mysqli_close($con);
?>
</body>
</html>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>
