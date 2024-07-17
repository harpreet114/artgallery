
<?php
include("Adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Please Login!!')</script>";
}
?>

<div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Art</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Art</li>
                </ol>
            </nav>
        </div>
    </div>



<div class="container my-5">
   
 <div class="card px-5 c1">
 <?php
    if(isset($_GET['msg'])){
    echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
    }
    ?>
    <h1 class="text-center my-3">Add Art</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-md-2">
                <label>Art Title</label>
            </div>
            <div class="col-md-10">
                <input required class="form-control" type="text" name="product_name">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-2">
                <label>Category</label>
            </div>
            <div class="col-md-10">
			<select class="form-control" name="cat_name">
                    <option selected disabled>Choose one</option>
                    <?php
                    include("config.php");
                    $query="Select * from `category`";
                    $result=mysqli_query($connect,$query);
                    while($data=mysqli_fetch_array($result)){
                        ?>
                    <option><?php echo $data['category_name']?></option>
                     <?php   
                    }
                    ?>
            </select>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-2">
                <label>Image</label>
            </div>
            <div class="col-md-10">
			<input required class="form-control" type="file" name="image">
            </div>
        </div>
		<div class="row my-3">
            <div class="col-md-2">
                <label>Price</label>
            </div>
            <div class="col-md-10">
			<input required class="form-control" type="number" name="price">
            </div>
        </div>
		<div class="row my-3">
            <div class="col-md-2">
                <label>Description</label>
            </div>
            <div class="col-md-10">
			<input required class="form-control" type="textarea" name="description">
            </div>
        </div>
        <button class="btn btn-primary d-block mx-auto my-3 w-50" name="submit_btn" style="width:25%;">Add</button>
    </form>
</div>
</div>

<?php
    if(isset($_POST['submit_btn'])){
        $productname=$_POST['product_name'];
		$categoryname=$_POST['cat_name'];
        $img_name=$_FILES['image']['name'];
        $img_path=$_FILES['image']['tmp_name'];
        $new_name=rand().$img_name;
        move_uploaded_file($img_path,"images/".$new_name);
		$price=$_POST['price'];
		$description=$_POST['description'];
        include("config.php");
        $query="INSERT into `product`(`productname`,`category_name`,`image`,`price`,`description`)VALUES('$productname','$categoryname','$new_name','$price','$description')";
        $result=mysqli_query($connect,$query);
        if($result>0){
             echo "<script>window.location.assign('addproduct.php?msg=Added Successfully!!')</script>";
         }
         else{
             echo "<script>window.location.assign('addproduct.php?msg=Error while adding!!')</script>";
         }
    }
    ?>

<?php
include("footer.php");
?>