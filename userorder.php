

<?php
include("header.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('userlogin.php?msg=Please Login!!')</script>";
}
?>
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
        <h1 class="text-center my-3">View Orders</h1>
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
                <th>Order Number</th>
                <th>Order Date </th>
				<th>Total Price </th>
				<th>Shipping Details </th>
				<th>Status </th>
            </tr>
            <?php
                include("config.php");
                $query="SELECT * from `order` where `email`='$_SESSION[email]'";
                $result=mysqli_query($connect,$query);
                $sno=1;
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><a href="order_details.php?orderno=<?php echo $data['orderno']?>"><?php echo $data['orderno']?></a></td>
					<td><?php echo $data['orderdate']?></td>
                    <td>&#8377;<?php echo $data['totalprice']?></td>
                    <td><?php echo $data['name'].",".$data['address'].",<br> Contact-". $data['contact']?></td>
					<td><?php echo $data['status']?></td>
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