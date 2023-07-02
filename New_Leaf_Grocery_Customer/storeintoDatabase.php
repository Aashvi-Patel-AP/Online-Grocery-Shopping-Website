<?php
include_once('connectDatabase.php');
// echo "<pre>"; print_r($_POST); print_r($_FILES); exit;
if(isset($_POST['submit']))
{
  $name= $_POST["name"];
  $email= $_POST["email"];
  $phoneNo= $_POST["phoneNo"];
  $address=$_POST["address"];
  // $filename1= $_FILES["profile_photo"]["name"];
	// $tempname=$_FILES["profile_photo"]["tmp_name"];
  $password= $_POST["password"];
  $confirmpassword=$_POST["confirm_password"];
  $usertype="User";
  $password=md5($password);
  $confirmpassword=md5($confirmpassword);
  // $extension= pathinfo($filename1,PATHINFO_EXTENSION);
  // $folder = "./image/" .$firstname."profile.".$extension;

  // $filename1=$firstname."profile.".$extension;
  
  if($name=="" || $email=="" || $phoneNo=="" ||$password=="" || $confirmpassword=="" || $address=="" )
  {
    $errFirstName='<div class="error"> All fields are required </div>';
    echo $errFirstName;
    exit;
  }
  if(!preg_match("/^[A-Za-z]+$/",$name))
  {
    $errName='<div class="error"> Enter correct First Name </div>';
    echo $errName;
    exit;
  }

  if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$email))
  {
    $errEmail='<div class="error">Enter correct Email Id</div>';
    echo $errEmail;
    exit;
  }
  if(!preg_match("/^\d{10}$/",$phoneNo))
  {
    $errPhoneNo='<div class="error">Enter correct Phone Number</div>';
    echo $errPhoneNo;
    exit;
  }
  if($password!=$confirmpassword)
  {
    $errPassword='<div class="error">Password and Confirmpassword must be same</div>';
    echo $errPassword;
    exit;
  }

  $sql="INSERT INTO users (`UserType`,`Name`,`Email_Id`,`Phone_No`,`Address`,`Password`) VALUES ('$usertype','$name','$email','$phoneNo','$address','$password');";
  
  if(mysqli_query($con,$sql))
  {
    echo "<br>data added successfully";
    header("location:index.php");

  }
  // else
  // {
  //   echo "Error: ".$sql.":-".mysqli_error($con);
  // }
  mysqli_close($con);
}
?>