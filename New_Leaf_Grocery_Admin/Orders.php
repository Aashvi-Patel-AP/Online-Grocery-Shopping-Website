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
</head>
<body>
    <div class="path-information">
        <div class="path">
           Dashboard / Orders
        </div>
    </div>

    <div class="tableContainer center" style="top:15rem; left:-9rem; width: 130rem;">
    <div class="container-fluid ">
  <!-- Page Heading -->
        <h1 class="h1 mb-2 text-gray-800 ">Orders</h1>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Orders Details</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <form name="assignto" method="post">
        <table class="table tableDetails" id="customerTable" width="100%" cellspacing="10" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
          <tr style="font-size:2rem">
              <th rowspan="1" colspan="1">Order Id</th>
              <th rowspan="1" colspan="1">Customer Id</th>
              <th rowspan="1" colspan="1">Payment Method</th>
              <th rowspan="1" colspan="1">Order Date</th>
              <th rowspan="1" colspan="1">Delivery Date</th>
              <th rowspan="1" colspan="1">Total</th>
              <th rowspan="1" colspan="1">Status</th>
              <th rowspan="1" colspan="1">Action</th>
    
          </tr>
        </thead>
        </form>
        </div>
    </div>
</div>
</div>

    <?php
    $sql="SELECT * FROM orders"; 
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
      echo "<tbody>
      <tr class='t-7'>
      <td>".$row["Order_Id"]."</td>
      <td>".$row["User_Id"]."</td>
      <td>".$row["Payment_Method"]."</td>
      <td>".$row["Order_Date"]."</td>
      <td>".$row["Delivery_Date"]."</td>
      <td>".$row["Total"]."</td>
      <td>".$row["Status"]."</td>

      <td>"."<a href='editOrderDetails.php?id=".$row["Order_Id"]."'><button type='button' class='btn btn-success'><i class='fas fa-edit fa-2x'></i></button></a>"."
      
      </td>
      </tr>
      </tbody>";
    }
    echo "</table>";
  }
  else
  {
    echo "Error: ".$sql.":-".mysqli_error($con);
  }?>
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