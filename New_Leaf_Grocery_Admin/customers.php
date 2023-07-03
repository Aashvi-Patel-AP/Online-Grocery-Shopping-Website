<?php
session_start();
if(isset($_SESSION['email'])){
include_once('dashboard.php');
include('connectDatabase.php');
?>
<!-- // include('adminView.php'); -->
<!-- // echo "<pre>"; print_r($_POST);exit; -->
<div class="tableContainer center">
  <div class="container-fluid ">
  <!-- Page Heading -->
  <h1 class="h1 mb-2 text-gray-800 ">Customers</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Customers Details</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar">
        <form name="assignto" method="post">
        <table class="table tableDetails" id="customerTable" width="100%" cellspacing="10" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
          <tr style="font-size:2rem">
              <th rowspan="1" colspan="1">ID</th>
              <th rowspan="1" colspan="1">Name</th>
              <th rowspan="1" colspan="1">Email Id</th>
              <th rowspan="1" colspan="1">Mobile Number</th>
              <th rowspan="1" colspan="1">Address</th>
              <th rowspan="1" colspan="1">Edit</th>
              <!-- <th rowspan="1" colspan="1">Delete</th> -->
          </tr>
        </thead>
        </form>
        </div>
    </div>
  </div>
</div>
<?php
  $sql="SELECT `ID`,`Name`,`Email_Id`,`Phone_No`, `Address`, `Password` FROM users WHERE UserType='User' "; 
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
      echo "<tbody>
      <tr>
      <td>".$row["ID"]."</td>
      <td>".$row["Name"]."</td>
      <td>".$row["Email_Id"]."</td>
      <td>".$row["Phone_No"]."</td>
      <td>".$row["Address"]."</td>
      <td>"."<a href='updateCustomers.php?id=".$row["ID"]."'><button type='button' class='btn btn-success '><i class='fa-solid fa-pen-to-square fa-2x'></i></button></a>"."</td>
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
<?php
}
else{
    echo "<script>alert('Login To Continue')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>
<!-- <td>"."<a href='deleteCustomers.php?id=".$row["ID"]."'><button type='button' class='btn btn-success '><i class='far fa-trash-alt fa-2x'></i></button></a>"."</td> -->
   