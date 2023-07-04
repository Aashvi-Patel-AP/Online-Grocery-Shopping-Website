<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

$_SESSION['email']=$email;
$_SESSION['password']=$password;

if($email=="admin@gmail.com" && $password=="admin")
{
    header("location: dashboard-con.php");
    exit();
}
else{
    echo "<script>alert('Enter valid username and password')</script>";
    print'<script>window.location.assign("index.php");</script>';
}
?>
