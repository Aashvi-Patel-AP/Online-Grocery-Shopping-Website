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

$id= $_GET["id"];

// $sql="DELETE `ID`,`UserType`,`First_Name`, `Last_Name`, `Email_Id`, `DOB`, `Phone_No`, `Gender`, `Password` FROM users where `ID`='$id' "; 
$sql="DELETE FROM category where `c_id`='$id' "; 

  if(mysqli_query($con,$sql))
  {
    // echo "Record deleted successfully";
    header("location:Category.php");
  }
  else{
    echo "error while deleting record: ".mysqli_error($con);
  }
  mysqli_close($con);
?>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>
