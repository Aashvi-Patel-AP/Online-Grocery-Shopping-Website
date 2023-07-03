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
    <div class="addCategory">
    <form action="addCategoryInDatabase.php" class="addCategory-form" enctype="multipart/form-data" method="post">
        <h3>Add New Category</h3>
        Enter Category Id:<input type="text" id="category-id" name="category-id" class="box" required="True">
        Enter Category Name:<input type="text" id="category-name" name="category-name" class="box" required="True">
        <input type="file" id="category-photo" name="category-photo" accept="image/png, image/jpeg, image/jpg" placeholder="select Category Photo" class="box1" required="true" />
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