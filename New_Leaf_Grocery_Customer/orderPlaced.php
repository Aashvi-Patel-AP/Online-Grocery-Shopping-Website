<?php
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

if(isset($_POST['submit']))
{
$orderId= 'OD'.rand(99999999,10000000);
$paymentMethod="credit card";
date_default_timezone_set('Asia/Kolkata');
$orderDate = date('d-m-Y h:i:s a');
$deliveryDate = strtotime("+1 days");
$deliveryDate = date('d-m-Y',$deliveryDate);

$status="Pending";
$total=$_SESSION['total'];
$userId=$_SESSION['id'];

$sql="INSERT INTO orders (`Order_Id`,`User_Id`,`Payment_Method`,`Delivery_Date`,`Status`,`Total`) VALUES ('$orderId','$userId','$paymentMethod','$deliveryDate','$status','$total')";

if(mysqli_query($con,$sql))
  {
   
    echo '<script>alert("Order placed successfully!");</script>';
    unset($_SESSION['p_cart']);
    print'<script>window.location.assign("index1.php");</script>';

  }
  else
  {
   echo "Error: ".$sql.":-".mysqli_error($con);
  }
  mysqli_close($con);

  }
?>