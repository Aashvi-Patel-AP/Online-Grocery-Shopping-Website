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

if(isset($_POST['submit']))
{
    $c_id= $_POST["category-id"];
    $c_name= $_POST["category-name"];
    $filename= $_FILES["category-photo"]["name"];
	  $tempname=$_FILES["category-photo"]["tmp_name"];
    $extension= pathinfo($filename,PATHINFO_EXTENSION);
    $folder = "./image/categories/" .$c_name.".".$extension;
    $filename="./image/categories/".$c_name.".".$extension;
}
//insert categories details into category table
$sql ="INSERT INTO category(`c_id`, `c_name`,`category_img_name`) VALUES ('$c_id', '$c_name','$filename');";
if(mysqli_query($con,$sql) && move_uploaded_file($tempname,$folder))
  {
    // echo "<br>data added successfully";
    header("location:category.php");

  }
  // else
  // {
    // echo "Error: ".$sql.":-".mysqli_error($con);
  // }
  mysqli_close($con);
?>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>