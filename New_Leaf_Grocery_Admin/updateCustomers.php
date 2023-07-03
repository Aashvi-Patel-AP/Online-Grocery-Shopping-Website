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
$id= $_GET["id"];
$sql="SELECT `ID`,`Name`, `Email_Id`, `Phone_No`, `Address` FROM users where `ID`='$id'"; 
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
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
    <form class="addProducts-form" enctype="multipart/form-data" method="post">
        <h3>Edit Customer Details</h3>
        Name:<input type="text" id="c_name" name="c_name" class="box" value="<?php echo $row['Name'];?>" required="True">
        Email:<input type="text" id="c_email" name="c_email" class="box" value="<?php echo $row['Email_Id'];?>" required="True">
        Phone no:<input type="text" id="c_phoneNo" name="c_phoneNo" class="box" value="<?php echo $row['Phone_No'];?>" required="True">
        Address:<input type="text" id="c_address" name="c_address" class="box" value="<?php echo $row['Address'];?>" required="True">
        <input type="submit" id="update" name="update" class="btnn1" value="Update"><br>
   </form>
   </div>
</body>
</html>
<?php
            if(isset($_POST['update']))
            {
            $name= $_POST["c_name"];
            $email= $_POST["c_email"];
            $phoneNo= $_POST["c_phoneNo"];
            $Address= $_POST["c_address"];
                      
            $sql="UPDATE users SET Name ='$name', Email_Id= '$email', Phone_No='$phoneNo', Address ='$Address' where `ID`='$id'";
                // print_r($_SESSION);exit; 
                if(mysqli_query($con,$sql))
                {
                // echo "<br>data updated successfully";             
                header("location:customers.php");
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