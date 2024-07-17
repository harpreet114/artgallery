
<?php
include("adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Please Login!!')</script>";
}
?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Category</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

	<div class="container my-5">
   
   <div class="card px-5 c1">
   <?php
	  if(isset($_GET['msg'])){
	  echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
	  }
	  ?>
	  <h1 class="text-center my-3">Add Art Category</h1>
	  <form method="post" enctype="multipart/form-data">
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Category Name</label>
			  </div>
			  <div class="col-md-10">
				  <input required class="form-control" type="text" name="cat_name">
			  </div>
		  </div>
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Image</label>
			  </div>
			  <div class="col-md-10">
			  <input required class="form-control" type="file" name="cat_image">
			  </div>
		  </div>
		  <button class="btn btn-primary d-block mx-auto my-3 w-50" name="submit_btn" style="width:25%;">Add</button>
	  </form>
  </div>
  </div>
<?php
    if(isset($_POST['submit_btn'])){
        $category=$_POST['cat_name'];
        $img_name=$_FILES['cat_image']['name'];
        $img_path=$_FILES['cat_image']['tmp_name'];
        $new_name=rand().$img_name;
        move_uploaded_file($img_path,"images/".$new_name);
        include("config.php");
        $query="INSERT into `category`(`category_name`,`thumbnail`)VALUES('$category','$new_name')";
        $result=mysqli_query($connect,$query);
        if($result>0){
            echo "<script>window.location.assign('addcategory.php?msg=Added Successfully!!')</script>";
        }
        else{
            echo "<script>window.location.assign('addcategory.php?msg=Error while adding!!')</script>";
        }

    }
    ?>
<?php
include("footer.php");
?>