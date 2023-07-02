<?php
session_start();

$serverName= "localhost";
$hostName = "root";
$password= "";
$dbname="new_leaf_mart";

$con = mysqli_connect($serverName,$hostName,$password,$dbname);
if(!$con){
  // die("Could not connect: ".mysqli_connect_error());
}
else{
    // echo "Database Connected successfully";
}

$email = $_POST['email'];
$password=$_POST['password'];
$password=md5($password);

// session_start();
//On page 1
$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

// echo $email."<br>".$password;



$sql="SELECT `ID`,`Email_Id`,`Password` FROM users "; 
$result=mysqli_query($con,$sql);
$temp=0;
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result))
    {
        if($row["Email_Id"]==$email && $row["Password"]==$password)
        {
            //On page 1
            $_SESSION['email'] = $email;
            $_SESSION['id']= $row["ID"];
            echo "login successfully";
            header("location:index1.php");
            $temp=1;
        }
    }
    if($temp==0)
    {
        echo "<script>alert('Enter valid username and password')</script>";
        print'<script>window.location.assign("index.php");</script>';
    }
    // edit.php/2 url
  }
else
{
    echo "Error: ".$sql.":-".mysqli_error($con);
}
mysqli_close($con);
?>
