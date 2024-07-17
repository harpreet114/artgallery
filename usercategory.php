<?php
include("header.php");
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
<div class="container my-5">
    <div class="row">
        <?php
        include("config.php");
        $query="Select * from `category`";
        $result=mysqli_query($connect,$query);
        while($data=mysqli_fetch_array($result)){

       ?>
        <div class="col-md-4 p-5">
            <div class="card " style="text-transform: capitalize;" >
            <img src="images/<?php echo $data['thumbnail']?>" class="card-img-top img-fluid w-100" alt="..." style="height:200px;width:100%;">
            <div class="card-body">
                <h1 class="card-title text-center my-3"><?php echo $data['category_name']?></h1>
              
                <a href="userproduct.php?name=<?php echo $data['category_name'] ?>" class="btn btn-primary d-block mx-auto my-3" name="submit_btn">View</a>
            </div>
            </div>
        </div>
        <?php
         }
         ?>
    </div>
</div>

<?php
(isset($_POST['submit_btn']))
?>
<?php
include("footer.php");
?>
