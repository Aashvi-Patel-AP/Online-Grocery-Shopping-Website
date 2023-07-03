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
$sql="SELECT `c_id`,`c_name`,`category_img_name` FROM category where `c_id`='$id'"; 
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
        Category Id:<input type="text" id="category-id" name="category-id" class="box" value="<?php echo $row['c_id'];?>" required="True">
        Category Name:<input type="text" id="category-name" name="category-name" class="box" value="<?php echo $row['c_name'];?>" required="True">
        <img src="<?php echo $row['category_img_name']?>" length="200" width="200" alt="">
        <input type="file" id="category-photo" name="category-photo" accept="image/png, image/jpeg, image/jpg" placeholder="select category Photo" class="box1" required="true" />
        <input type="submit" id="update" name="update" class="btnn1" value="Update"><br>
   </form>
   </div>
</body>
</html>
<?php
            if(isset($_POST['update']))
            {
            $cat_id= $_POST["category-id"];
            $cat_name= $_POST["category-name"];
            $c_photo = "./image/categories/".$_FILES['category-photo']['name'];
            $c_photo_temp = "./image/categories/".$_FILES['category-photo']['tmp_name'];
            $tempname=$_FILES["category-photo"]["tmp_name"];
            $extension= pathinfo($c_photo,PATHINFO_EXTENSION);
            $folder = "./image/categories/" .$cat_name.".".$extension;
                      
            $sql="UPDATE category SET c_id='$cat_id', c_name= '$cat_name',category_img_name='$c_photo' where `c_id`='$id'";
                // print_r($_SESSION);exit; 
                if(mysqli_query($con,$sql) && move_uploaded_file($tempname,$folder))
                {
                // echo "<br>data updated successfully";             
                header("location:Category.php");
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