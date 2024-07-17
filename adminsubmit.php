<?php
session_start();
$em=$_POST['email'];
$pass=md5($_POST['password']);
include("config.php");
$query="SELECT * from `adminlogin` where `email`='$em' and `password`='$pass'";
$result=mysqli_query($connect,$query);
// print_r($result);
//  echo $_SESSION['email']=$em;
if(mysqli_num_rows($result)>0){
    $_SESSION['email']=$em;
    $_SESSION['user_type']='Admin';
    echo "<script>window.location.assign('adminindex.php?msg=Login Succesfully!!')</script>";
}
else{
    echo "<script>window.location.assign('adminlogin.php?msg=Invalid Credentials')</script>";
}
?>