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
$id = $_GET['id'];
$sql="SELECT * FROM orders WHERE Order_Id='$id'"; 
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
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
    <div class="addProduct">
    <form  class="addProducts-form" enctype="multipart/form-data" method="post">
        <h3>Order Details</h3>
        Order Id:<input type="text" name= "orderid" class="box" value=" <?php echo $row['Order_Id'];?>" readonly>
        Customer Id:<input type="text" name="userid" class="box" value=" <?php echo $row['User_Id'];?>" readonly>
        Delivery Date:<input type="text" name="deliverydate" class="box" value=" <?php echo $row['Delivery_Date'];?>" required="True">
        Status:
        <select class="box" name="status">
            <option value="Pending">Pending</option>
            <option value="Processing">Processing</option>
            <option value="Out For Delivery">Out For Delivery</option>
            <option value="Delivered">Delivered</option>
        </select>
        <input type="submit" id="submit" name="update" class="btnn1" value="Submit"><br>

   </form>
   </div>
</body>
</html>
<?php
    }
}

?>
<?php
            if(isset($_POST['update']))
            {
            $deliverydate= $_POST["deliverydate"];
            $status= $_POST["status"];
            
            $sql="UPDATE orders SET Delivery_Date ='$deliverydate', Status = '$status' where `Order_Id`='$id'";
                // print_r($_SESSION);exit; 
                if(mysqli_query($con,$sql))
                {
                // echo "<br>data updated successfully";             
                echo "<script>window.location.href='Orders.php'</script>";
                }
                else
                {
                echo "Error: ".$sql.":-".mysqli_error($con);
                }
                mysqli_close($con);
                }
?>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>