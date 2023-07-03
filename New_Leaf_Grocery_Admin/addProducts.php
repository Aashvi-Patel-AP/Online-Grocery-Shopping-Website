<?php
session_start();
if(isset($_SESSION['email'])){
include_once('dashboard.php');
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
    <form action="addProductInDatabase.php" class="addProducts-form" enctype="multipart/form-data" method="post">
        <h3>Add New Product</h3>
        Enter Product Code:<input type="text" id="product-code" name="product-code" class="box" required="True">
        Enter Product Name:<input type="text" id="product-name" name="product-name" class="box" required="True">
        Enter Product Description:<input type="text" id="product-des" name="product-des" class="box" required="True">
        Enter Product Price:<input type="text" id="product-price" name="product-price" class="box" required="True">
        Enter Product Quantity:<input type="text" id="product-qty" name="product-qty" class="box" required="True">
        Enter Glycemic Index:<input type="text" id="gi-index" name="gi-index" class="box" required="True">
        Enter Category Id:<input type="text" id="category-id" name="category-id" class="box" required="True">
        <input type="file" id="product-photo" name="product-photo" accept="image/png, image/jpeg, image/jpg" placeholder="select Product Photo" class="box1" required="true" />
        <input type="submit" id="submit" name="submit" class="btnn1" value="Submit"><br>

   </form>
   </div>
</body>
</html>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>