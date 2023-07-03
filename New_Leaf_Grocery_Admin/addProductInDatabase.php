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
    $p_code= $_POST["product-code"];
    $p_name= $_POST["product-name"];
    $p_desc= $_POST["product-des"];
    $p_price= $_POST["product-price"];
    $p_qty= $_POST["product-qty"];
    $gi_index=$_POST["gi-index"];
    $c_id=$_POST["category-id"];
    $filename= $_FILES["product-photo"]["name"];
	  $tempname=$_FILES["product-photo"]["tmp_name"];
    $extension= pathinfo($filename,PATHINFO_EXTENSION);
    $folder = "./image/" .$p_name.".".$extension;
    $filename="./image/".$p_name.".".$extension;
    $folder1 = "./New_Leaf_Grocery_By_My_Self/image/categories" .$p_name.".".$extension;
    

}
$sql ="INSERT INTO adproduct(`product_code`, `product_name`, `product_desc`, `product_img_name`,`price`, `product_qty`,`gi_index`,`c_id`) VALUES ('$p_code', '$p_name', '$p_desc', '$filename', '$p_price', '$p_qty','$gi_index','$c_id' );";
if(mysqli_query($con,$sql) && move_uploaded_file($tempname,$folder) && move_uploaded_file($tempname,$folder1))
  {
    // echo "<br>data added successfully";
    echo "<script>window.location.href='Products.php'</script>";


  }
  // else
  // {
  //   echo "Error: ".$sql.":-".mysqli_error($con);
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