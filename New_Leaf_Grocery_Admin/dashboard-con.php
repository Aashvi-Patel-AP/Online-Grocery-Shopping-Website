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

$pro= "SELECT COUNT(*) AS Products FROM adproduct";
$result1 = mysqli_query($con,$pro);
$row1=mysqli_fetch_array($result1);
// echo $row['Products'];

$cust= "SELECT COUNT(*) AS Customers FROM users";
$result2 = mysqli_query($con,$cust);
$row2=mysqli_fetch_array($result2);

$cat= "SELECT COUNT(*) AS Categories FROM category";
$result3 = mysqli_query($con,$cat);
$row3=mysqli_fetch_array($result3);

$order= "SELECT COUNT(*) AS Orders FROM orders";
$result4 = mysqli_query($con,$order);
$row4=mysqli_fetch_array($result4);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/flaticon.css">

    <style>
        
        .dashboard-container{
            align-items: center;
            position: fixed;
            height: 50rem;
            width: 130rem;
            top: 13rem;
            left: 22rem;
            /* right: 5rem; */
        } 
        .flaticon-container{
            display: flex; 
            padding: 2rem;
            /* background: white; */

        }
        .flaticon-div{
            display: contents;
        }
        .flaticon-div .card1{
            background: #343434;
            height: 13rem;
            width: 25rem;
            padding: 4rem;
            text-align: center;
            margin: 0 4rem;
            align-items: center;
        }
        .card1 h2,h3{
            font-size:2.5rem;
            color: white;
        }
    </style>
</head>
<body>
<div class="path-information">
        <div class="path">
           Dashboard
        </div>
</div>

<div class=dashboard-container>
<section class="flaticon-container" id=features>
    <div class="flaticon-div">
        <div class="card1">
           <h2>Products</h2>  
           <h3><?php echo $row1['Products']?></h3>   
        </div>

        <div class="card1">
           <h2>Customers</h2>  
           <h3><?php echo $row2['Customers']?></h3>   
        </div>

        <div class="card1">
           <h2>Categories</h2>
           <h3><?php echo $row3['Categories']?></h3>     
        </div>

        <div class="card1">
           <h2>Orders</h2> 
           <h3><?php echo $row4['Orders']?></h3>     
        </div>
    </div>
</section>
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