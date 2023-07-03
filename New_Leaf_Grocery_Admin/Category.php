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
    <div class="path-information">
        <div class="path">
           Dashboard / Category / Add Category
        </div>
    </div>
    <div class="add-product">
        <div class="title">
           <a href="addCategory.php" class="btnn">+Add New Category</a>
        </div>
    </div>

    <div class="tableContainer center" style="top:20rem; left:-9rem; width: 130rem;">
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Categories Details</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <form name="assignto" method="post">
        <table class="table tableDetails" id="customerTable" width="100%" cellspacing="10" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
          <tr style="font-size:2rem">
              <th rowspan="1" colspan="1">Category Code</th>
              <th rowspan="1" colspan="1">Category Name</th>
              <th rowspan="1" colspan="1">Category img</th>
              <th rowspan="1" colspan="1">Edit</th>
              <th rowspan="1" colspan="1">Delete</th>
          </tr>
        </thead>
        </form>
        </div>
    </div>
</div>

    <?php
    $sql="SELECT `c_id`,`c_name`,`category_img_name` FROM category"; 
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
      echo "<tbody>
      <tr>
      <td>".$row["c_id"]."</td>
      <td>".$row["c_name"]."</td>
      <td>"."<img src=".$row['category_img_name'].' width="100px" height="100px">'."</td>
      <td>"."<a href='updateCategories.php?id=".$row["c_id"]."'><button type='button' class='btn btn-success '><i class='fa-solid fa-pen-to-square fa-2x'></i></button></a>"."</td>
      <td>"."<a href='deleteCategories.php?id=".$row["c_id"]."'><button type='button' class='btn btn-success '><i class='far fa-trash-alt fa-2x'></i></button></a>"."</td>
      </tr>
      </tbody>";
    }
    echo "</table>";
  }
  else
  {
    echo "Error: ".$sql.":-".mysqli_error($con);
  }?>
</div>
<?php
  mysqli_close($con);
?>
</body>
</html>
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>