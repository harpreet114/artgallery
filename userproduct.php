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
<?php
if(isset($_GET['name'])){
    $category_name=$_GET['name'];
    $query="Select * from `product` where `category_name`='$category_name'";
   
}
else{
    include("config.php");
    $query="Select * from `product`";
}
include("config.php");
$result1=mysqli_query($connect,$query);

?>
<div class="container my-5">
    <div class="row">
        <?php
        
        while($data=mysqli_fetch_array($result1)){
       ?>
        <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
            <div class="rounded overflow-hidden">
                <div class="position-relative overflow-hidden">
                    <img class="img-fluid w-100" src="images/<?php echo $data['image']?>" alt="" style="height:300px">
                    <div class="portfolio-overlay">
                        <a class="btn btn-square btn-outline-light mx-1" href="images/<?php echo $data['image']?>"  data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-square btn-outline-light mx-1" href="single.php?id=<?php echo $data['id'] ?>" "><i class="fa fa-link"></i></a>
                    </div>
                </div>
                <div class="text-capitalize border border-5 border-light border-top-0 p-4">
                    <p class="text-primary fw-medium mb-2"><?php echo $data['productname']?></p>
                    <p class="text-primary fw-medium mb-2">&#8377;<?php echo $data['price']?></p>
                    <h5 class="lh-base mb-0"><?php echo $data['description']?></a>
                    <a class="btn btn-primary d-block mx-1" href="single.php?id=<?php echo $data['id'] ?>" >View</i></a>
                </div>
                
            </div>
        </div>
        <?php
         }
         ?>
    </div>
</div>

<?php
include("footer.php");
?>