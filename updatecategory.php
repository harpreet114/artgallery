

<?php
include("Adminheader.php");
if(!isset($_SESSION['email'])){
    echo "<script>window.location.assign('adminlogin.php?msg=Please Login!!')</script>";
}
?>

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

<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
    include("config.php");
    $query="Select * from `category` where `id`='$id'";
    $result=mysqli_query($connect,$query);
    $data=mysqli_fetch_array($result);
}
else{
    echo "<script>window.location.assign('viewcategory.php?msg=Please choose an item to update')</script>";
}
?>
<div class="container my-5">
    <?php
    if(isset($_GET['msg'])){
    echo $_GET['msg'];
    }
    ?>
 <div class="card px-5 c1">
    <h1 class="text-center my-3">Update Category</h1>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <form method="post" enctype="multipart/form-data">
        <div class="row my-3">
            <div class="col-md-3">
                <label>Category Name</label>
            </div>
            <div class="col-md-9">
                <input class="form-control" type="text" name="cat_name" value="<?php echo $data['category_name']?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-3">
                <label>Category Image</label>
            </div>
            <div class="col-md-9">
                <input class="form-control" type="file" name="cat_image" >
                <input value="<?php echo $data['thumbnail']?>" name="hidden_old_image" type="hidden">
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-5"></div>
            <div class="col-md-3">
                <button class="btn btn-primary d-block mx-auto my-3 w-50" style="width:100%;" name="submit_btn">Update</button>
            </div>
        </div>
    </form>
        </div>
    </div>
   
</div>
</div>
<?php
if(isset($_POST['submit_btn'])){
    $category_name=$_POST['cat_name'];
    if($_FILES['cat_image']['name']){
        $img_name=$_FILES['cat_image']['name'];
        $img_path=$_FILES['cat_image']['tmp_name'];

        $new_name=rand().$img_name;
        echo $new_name;
        move_uploaded_file($img_path,"images/".$new_name);
    }
    else{
        $new_name=$_POST['hidden_old_image'];
        echo $new_name;
    }
    include("config.php");
    $query1="UPDATE `category` set `category_name`='$category_name',`thumbnail`='$new_name' where `id`='$id'";
    $result=mysqli_query($connect,$query1);
    if($result>0){
        echo "<script>window.location.assign('viewcategory.php?msg=Updated Successfully!!')</script>";
    }
    else{
        echo "<script>window.location.assign('viewcategory.php?msg=Error While Updating!!')</script>";
    }
}
?>
<?php
include("footer.php");
?>