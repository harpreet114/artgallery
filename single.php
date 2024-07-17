<?php
include("header.php");
?>
 <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Art Work</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Art Work</li>
                </ol>
            </nav>
        </div>
    </div>

  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
<?php
		if(isset($_GET['id'])){
			$id=$_GET['id'];
			$query="SELECT * from `product` where `id`=$id";
			// echo $query;
			include("config.php");
            $result=mysqli_query($connect,$query);
			$data=mysqli_fetch_array($result);
		}
		?>	
<div class="container my-5">
	<div class="row">
	     <div class="col-md-7 single-right-left text-capitalize" >
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul class="slides">
						<li data-thumb="images/2.jpg">
							<div class="thumb-image"> <img src="images/<?php echo $data['image']?>" style="height:400px;width:100%;" class="img-fluid ">
 						 	</div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-5 single-right-left simpleCart_shelfItem" style="text-transform:capitalize !important;">
			<form method='post'>
				 <h1 style='color:rgb(47,218,184);border:none;font-weight:bold;font-size:xx-large;'><?php echo $data['productname']?></h1>
				 <input name='productname' value="<?php echo $data['productname']?>" type="hidden">
				<br><br><input name="price"value="<?php echo $data['price']?>" type="hidden" >
				<span style='border:none;width:6%' class="fs-1">&#8377;<?php echo $data['price']?></span>
				<br><br>
				
					<br><br><div class="snipcart-details item_add single-item hvr-outline-out button2">
						<input type="submit" name="submit" value="Add to cart" class="btn btn-primary">
					</div>	
			</form>
		</div>
	</div>
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	
	
		<!--php-->
		<?php
		if(isset($_POST['submit'])){
			if(!isset($_SESSION['email'])){
				echo "<script>window.location.assign('userlogin.php?msg=Please login')</script>"; 
			}
			$productname=$_POST['productname'];
			$quantity=1;
			$price=$_POST['price'];
			$total=$price*$quantity;
			$email=$_SESSION['email'];
			include("config.php");
			$q1="SELECT * from `cart` where `email`='$email' and `productname`='$productname'";
			$r1=mysqli_query($connect,$q1);
			if(mysqli_num_rows($r1)<=0){
				$query4="INSERT into `cart`(`productname`,`quantity`,`price`,`total_price`,`email`)VALUES('$productname','$quantity','$price','$total','$email')";
				$result4=mysqli_query($connect,$query4);
				if($result4>0){
					echo "<script>window.location.assign('cart.php?msg=Product Added To cart!!!')</script>";
				}
				else{
					echo "<script>window.location.assign('cart.php?msg=Error while uploading')</script>";
				}
			}else{
				$d1=mysqli_fetch_array($r1);
				$quan=$d1['quantity']+$quantity;
				$total=$price*$quan;
				$q2="UPDATE `cart`  set `quantity`='$quan', `total_price`='$total' where `id`='$d1[id]'";
				$r4=mysqli_query($connect,$q2);
				if($r4>0){
					echo "<script>window.location.assign('cart.php?msg=Updated Successfully!!!')</script>";
				}
				else{
					echo "<script>window.location.assign('cart.php?msg=Error while uploading')</script>";
				}
			}
		}
		?>
		<!--php-->
			
 </div>
<!--//single_page-->

<?php
include("footer.php");
?>
