<?php
session_start();
$type=$_SESSION['user_type'];
session_unset();
if($type=='Admin'){
    echo "<script>window.location.assign('adminlogin.php?msg=Logout Successfully!!')</script>";
}else{
    echo "<script>window.location.assign('userlogin.php?msg=Logout Successfully!!')</script>";
}
?>
