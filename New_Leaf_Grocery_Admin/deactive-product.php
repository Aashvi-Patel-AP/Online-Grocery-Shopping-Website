<?php session_start();
//DB conncetion
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
    $sql="SELECT `product_code`,`product_name`,`product_desc`,`product_img_name`,`price`, `product_qty`,`isActive`,`c_id` FROM adproduct"; 
//Code for updation
$pid=intval($_GET['pid']);    
//getting post values
$isactive = 0;
$query="update adproduct set isActive='$isactive' where product_code='$pid'";
$result =mysqli_query($con, $query);
if ($result) {
    echo '<script>alert("Product de-active successfully.")</script>';
    echo "<script>window.location.href='Products.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
    echo "<script>window.location.href='Products.php'</script>";
}

?>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>