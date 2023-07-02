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
        width: 28rem;
        display: inline-block;
    /* margin: 2rem 4rem; */
        
    }
    .box-container{
        width: 25rem;
        margin:1rem;
        display: inline-block;
    }
    .box-container .box{
        height:22rem;
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
    $sql="SELECT `c_name`,`category_img_name`,`c_id` FROM category"; 
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
        echo '
        <form method="post" action="" class="container">
            <div class="box-container">
                <div class="box">
                    <img src='.$row['category_img_name'].'>
                    <div class="product-descrip"><a href="products3.php?id='.$row[c_id].'"><h3> '.$row["c_name"].'</h3></a></div>

                </div>
            </div>
        </form>';

    }
}
?>

</body>
</html>

