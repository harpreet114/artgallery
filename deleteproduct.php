<?php
    $id=$_REQUEST['id'];
    include("config.php");
    $query="DELETE from `product` where `id`='$id'";
    $result=mysqli_query($connect,$query);
    if($result>0){
        echo "<script>window.location.assign('viewproduct.php?msg=Deleted Successfully')</script>";
    }
    else{
        echo "<script>window.location.assign('viewproduct.php?msg=Error while deleting')</script>";
    }

?>