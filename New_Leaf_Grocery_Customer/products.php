<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


</head>
<style>
    :root{
    --box-shadow:0 .1rem 1rem rgba(0,0,0.1);
    --border:.2rem solid rgba(0,0,0.1);
    --outline:.1rem solid rgba(0,0,0.1);
    --outline-hover:.2rem solid var(--black);
    }
    /* .products{
        border: 1px solid;
    } */
    .container{
        width: 30rem;
        display: inline-block;

    }
    .box-container{
        width: 25rem;
        margin:1rem;
        display: inline-block;
    }
    .box-container .box{
        border: 1px solid;
        border-radius:1rem;
        text-align: center;
        font-size: 1.5rem;
        background-color:white;
        box-shadow: var(--box-shadow);
    }
    .box-container .box img{
        display: block;
        height: 12rem;
        width: 15rem;
        margin-left:auto;
        margin-right:auto; 
        /* border-radius:2rem; */
    }
    .btnn{
        position: relative;
        /* left:20%; */
        margin-top: 1rem;
        padding: .8rem 3rem;
        font-size: 1.3rem;
        color: white;
        cursor: pointer;
        background-color: var(--green);
        height: 4rem;
        width:15rem;
        bottom:1rem;
    }
    .btnn:focus{
        outline:none;
    }
    .box-container .box .product-quantity input{
        /* border: 1px solid;
        border-radius:.5rem; */
        width:3rem;
    } 
    .stars i{
        color: orange;
    }
</style>
<body>
<?php
session_start();

    $sql="SELECT `product_name`,`product_desc`,`product_img_name`,`price`,`c_id` FROM adproduct Where c_id=2"; 
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
        echo '
        <form method="post" action="" class="container">
            <div class="box-container">
                <div class="box">
                    <img src='.$row['product_img_name'].'>
                    <div class="product-descrip"><h3> '.$row["product_desc"].'</h3></div>
                    <div class="product-information">
                        <div class="product-price">Price:'.$row["price"].'</div>
                        <div class="product-quantity">
                            Quantity: <input type="number" size="2" min="1" max="20" value="1">
                        </div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half"></i>
                            <i class="far fa-star"></i>

                        </div>
                        <button type="submit" class=btnn>Add to cart</button> 
                    </div>
                </div>
            </div>
        </form>';

    }
    }
?>
        
    
</body>
</html>

