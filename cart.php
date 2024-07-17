<?php
include('header.php');
if(!isset($_SESSION["email"])){
    echo "<script>window.location.assign('userlogin.php?msg=Please login to access this page')</script>";
}
?>
<div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
                </ol>
            </nav>
        </div>
    </div>

<div class="container table-responsive " style="margin-top:30px; border:1px solid grey;box-shadow: 10px 10px 5px grey;">
<?php
        // if(isset($_GET['id'])){
        //     $id=$_GET['id'];
        //     include("config.php");
        //     $query2="Select * from `cart` where `id`='$id'";
        //     $result2=mysqli_query($connect,$query2);
        //     $data2=mysqli_fetch_array($result2);
        // }
        
        if(isset($_GET['msg'])){
          ?>
          <div class="alert alert-success"><?php echo $_GET['msg']?></div>
          <?php  
        }
        ?>    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">SNo</th>
                <th>Product</th>
                <th>price</th>
                <th>Delete</th>
        </thead>
        <tbody>
            <?php
                include("config.php");
                $query="SELECT * from `cart` where `email`='$_SESSION[email]'";
                $result=mysqli_query($connect,$query);
                $sno=1;
                if(mysqli_num_rows($result)>0){
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $data['productname']?></td>
                   
                    <td>&#8377;<?php echo $data['price']?></td>
                    <td>
                        <a class="btn btn-danger" href="deletecart.php?id=<?php echo $data['id']?>">
                            <i class="bi bi-trash">  </i>
                        </a>
                    </td>
                </tr>
            <?php
            $sno++;
            }}
            else{
                echo "<td colspan='4'>No item Available</td>";
            }
            ?>
    </table>
    </div>
    <br>
    <br>    
    <?php
        include("config.php");
        $query1="SELECT sum(total_price) as total from `cart` where `email`='$_SESSION[email]'";
        $result1=mysqli_query($connect,$query1);
        $data1=mysqli_fetch_array($result1);
        // print_r($data1['total']);
        $total=$data1['total'];
        if($total>0){
        ?> 
        <div class="container" style=" border:1px solid grey;box-shadow: 10px 10px 5px grey;">
            <div class="row">
                    <div class="col-md-4 col-md-offset-1 ">
                    <strong><br>Price Details:</strong>
                    <div class="row">
            <div class="col-md col-md-offset-1">
                
                MRP: &#8377; <?php echo $data1['total'];?> 
                <input name="MRP" type="hidden" value="<?php echo $data1['total'];?>" style="border:none;">
                <?php
                ?>
                <br/>
                    Delivery Fee:&#8377;100<br>
                    Total Amount: &#8377;<?php echo $total+100?>
                </div>
            </div>
                    </div>
                    <div class="col-md-5 my-3 address_form">
                                <h4 class="my-3">Shipping Address</h4>
                                <?php
                                $query_user="SELECT * from `user` where `email`='$_SESSION[email]'";
                                include("config.php");
                                $result_user=mysqli_query($connect,$query_user);
                                $data_user=mysqli_fetch_array($result_user);
                                ?>
                                <form method="post" class="creditly-card-form shopf-sear-headinfo_form">
                                    <div class="creditly-wrapper wrapper">
                                        <div class="information-wrapper">
                                            <div class="first-row form-group">
                                                <div class="controls">
                                                    <label class="control-label">Name: </label>
                                                    <input class="billing-address-name form-control" type="text" name="name"  value="<?php echo $data_user['name'];?>">
                                                    <!-- <label class="control-label">Email: </label>
                                                    <input class="billing-address-name form-control" type="text" name="email" placeholder="Product Id" value="<?php echo $email;?>"> -->
                                                    
                                                </div>
                                                    <div class="card_number_grid_right my-3">
                                                        <div class="controls">
                                                            <label class="control-label">Address: </label>
                                                            <input class="form-control" type="text" name="address" value="<?php echo $data_user['address']?>">
                                                        </div>
                                                    </div>
                                                    <div class="card_number_grid_right my-3">
                                                        <div class="controls">
                                                            <label class="control-label">Contact: </label>
                                                            <input class="form-control" type="text" name="contact" value="<?php echo $data_user['contact']?>">
                                                            <input class="form-control" name="total" type="hidden" value="<?php echo $total?>">
                                                        </div>
                                                    </div>
                                                    <div class="clear"> </div>
                                                </div>
                                                <div class="controls">
                                                    <label class="control-label">Address type: </label>
                                                    <select class="form-control option-fieldf" required>
                                                    <option value="" selected disabled>Select One</option>
                                                        <option>Office</option>
                                                        <option>Home</option>
                                                        <option>Commercial</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php
                                            if($total>0 || $total!=""){
                                            ?>
                                            <button class="btn formbtn1 btn-primary my-3" name="order_btn">Place Order</button>
                                            <?php }?>
                                        </div>
                                    </div>
                                </form>
                            </div>
            </div>
            <?php
            if(isset($_REQUEST['order_btn'])){
                $name=$_REQUEST['name'];
                $address=$_REQUEST['address'];
                $contact=$_REQUEST['contact'];
                $order_no="OD".rand();
                $user_email=$_SESSION['email'];
                $order_date=date("d-m-y");
                $totalprice=$_REQUEST['total']+100;
                $order_query="INSERT into `order`(`name`, `email`, `address`, `contact`, `orderno`, `totalprice`, `orderdate`)VALUES('$name','$user_email','$address','$contact','$order_no','$totalprice','$order_date')";
                include("config.php");
                $order_result=mysqli_query($connect,$order_query);
                if($order_result>0){
                    include("config.php");
                        $querycart="SELECT * from `cart` where `email`='$_SESSION[email]'";
                        $resultcart=mysqli_query($connect,$querycart);
                        $sno=1;
                        while($datacart=mysqli_fetch_array($resultcart)){
                            $query_details="INSERT into `orderdetails`(`productname`, `quantity`, `price`, `orderno`) VALUES ('$datacart[productname]','$datacart[quantity]','$datacart[price]','$order_no')";
                            $result_details=mysqli_query($connect,$query_details);
                            if($result_details>0){
                                $qeury_delete="DELETE from `cart` where `id`='$datacart[id]'";
                                $result_delete=mysqli_query($connect,$qeury_delete);
                                if($result_delete>0){
                                    echo "<script>window.location.assign('userorder.php?msg=Order Successfull with order number $order_no and total amount is $total')</script>";
                                }
                                else{
                                    echo "<script>window.location.assign('cart.php?msg=There was some error while ordering please try again later!!')</script>";
                                }
                            }
                        }
                }

            }
            ?>

                
            <!-- <div class="row">
                <div class="col-md col-md-offset-9">
                <a class="btn btn-danger" type="button" href="checkout.php" >Checkout</a>
                </div>
            </div><br> -->
        </div>
            <?php
            }
            ?>
<div class="text-center">
<br><a class="btn btn-danger text-right" href="userproduct.php" role="button">Continue Shopping</a></div>


<?php
include('footer.php');
?>