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
$sql="SELECT `product_code`,`product_name`,`product_img_name`, `product_desc`, `price`, `product_qty`,`gi_index`,`c_id` FROM adproduct where product_code='$id'"; 
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
        <h3>Edit Product Details</h3>
        Product Code:<input type="text" id="product-code" name="product-code" class="box" value="<?php echo $row['product_code'];?>" required="True">
        Product Name:<input type="text" id="product-name" name="product-name" class="box" value="<?php echo $row['product_name'];?>" required="True">
        Product Description:<input type="text" id="product-desc" name="product-desc" class="box" value="<?php echo $row['product_desc'];?>"  required="True">
        Product Price:<input type="text" id="product-price" name="product-price" class="box" value="<?php echo $row['price'];?>" required="True">
        Product Quantity:<input type="text" id="product-qty" name="product-qty" class="box" value="<?php echo $row['product_qty'];?>" required="True">
        Glycemic Index:<input type="text" id="gi-index" name="gi-index" class="box" value="<?php echo $row['gi_index'];?>" required="True">
        Category Id:<input type="text" id="category-id" name="category-id" class="box" value="<?php echo $row['c_id'];?>" required="True">
        <img src="<?php echo $row['product_img_name']?>" length="150" width="150" alt="">
        <input type="file" id="product-photo" name="product-photo" accept="image/png, image/jpeg, image/jpg" placeholder="select Product Photo" class="box1" required="true" />
        <input type="submit" id="update" name="update" class="btnn1" value="Update"><br>
   </form>
   </div>
</body>
</html>
<?php
            if(isset($_POST['update']))
            {
            $p_code= $_POST["product-code"];
            $p_name= $_POST["product-name"];
            $p_desc= $_POST["product-desc"];
            $p_price= $_POST["product-price"];
            $p_qty= $_POST["product-qty"];
            $gi_index=$_POST["gi-index"];
            $c_id= $_POST["category-id"];
            $p_photo = "./image/".$_FILES['product-photo']['name'];
            $tempname=$_FILES["product-photo"]["tmp_name"];
            $extension= pathinfo($p_photo,PATHINFO_EXTENSION);
            $folder = "./image/" .$p_name.".".$extension;
            $filename="./image/".$p_name.".".$extension;

                      
            $sql="UPDATE adproduct SET product_code='$p_code', product_name= '$p_name', product_desc='$p_desc', product_img_name='$filename', price ='$p_price', product_qty='$p_qty',gi_index='$gi_index', c_id='$c_id' where `adproduct`.product_code='$id'";
                // print_r($_SESSION);exit; 
                if(mysqli_query($con,$sql) && move_uploaded_file($tempname,$folder))
                {
                // echo "<br>data updated successfully";             
                echo "<script>window.location.href='Products.php'</script>";
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