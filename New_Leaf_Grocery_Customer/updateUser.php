<?php
session_start();
if(isset($_SESSION['email'])){
$serverName= "localhost";
$hostName = "root";
$password= "";
$dbname="new_leaf_mart";

$con = mysqli_connect($serverName,$hostName,$password,$dbname);
if(!$con){
  // die("Could not connect: ".mysqli_connect_error());
}
$userId=$_SESSION['id'];

if(isset($_POST['update']))
            {
            $name= $_POST["name"];
            $email= $_POST["email"];
            $phoneNo= $_POST["phoneNo"];
            $Address= $_POST["address"];
                      
            $sql="UPDATE users SET Name ='$name', Email_Id= '$email', Phone_No='$phoneNo', Address ='$Address' where `ID`='$userId'";
                // print_r($_SESSION);exit; 
                if(mysqli_query($con,$sql))
                {
                    echo '<script>alert("Details Updated successfully!");</script>';
                    print'<script>window.location.assign("index1.php");</script>';
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