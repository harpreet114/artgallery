<?php
include("Adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Please Login!!')</script>";
}

if(isset($_REQUEST['orderno'])){
    $orderno=$_REQUEST['orderno'];
}
?>
<!-- /banner_bottom_agile_info -->
<div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Orders</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Orders</li>
                </ol>
            </nav>
        </div>
    </div>

<div class="container my-5">
        <h1 class="text-center my-3"> Order Details</h1>
        <?php
        if(isset($_GET['msg'])){
          ?>
          <div class="alert alert-success"><?php echo $_GET['msg']?></div>
          <?php  
        }
        ?>
        <table class="table table-bordered table-hover table-striped">
            <tr>
                <th>SNO</th>
                <th>Product</th>
                <th>Total price</th>
            </tr>
            <?php
                include("config.php");
                $query="SELECT * from `orderdetails` where `orderno`='$orderno'";
                $result=mysqli_query($connect,$query);
                $sno=1;
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $data['productname']?></td>
                    <td>&#8377;<?php echo $data['price']*$data['quantity']?></td>
                </tr>
            <?php
            $sno++;
            }
            ?>
        </table>
    </div>

<!--footer-->
<?php
include("footer.php");
?>