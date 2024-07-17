<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ArtVista</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
   
    <!-- Spinner End -->


   


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 class="m-0 text-primary">ArtVista</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
           <a href="index.php" class="nav-item nav-link">Home</a>
            <a href="about.php" class="nav-item nav-link">About</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">Category</a>
                <div class="dropdown-menu fade-up m-0">
                    <a href="usercategory.php" class="dropdown-item">All</a>
                    <?php
                    include("config.php");
                    $query="Select * from `category` limit 5";
                    $result=mysqli_query($connect,$query);
                    while($data=mysqli_fetch_array($result)){
                        ?>
                       <a class="dropdown-item" href="userproduct.php?name=<?php echo $data['category_name']?>"><?php echo $data['category_name']?></a>
                        <?php
                    }
                    ?>
                </div>
                </div>
                <a class="nav-item nav-link" href="userproduct.php">Art Work</a>
                <a  class="nav-item nav-link" href="contact.php">Contact</a>
            <?php
            if(isset($_SESSION["email"])){
                ?>
                   <a class="nav-item nav-link" href="userorder.php">Order</a>
                   <a class=" btn btn-light rounded-circle h-50 my-3 nav-item me-4   " href="cart.php"><i class="fs-5 bi bi-bag"></i></a>

                    <a class="btn btn-primary py-4 px-lg-5 d-none d-lg-block border-light border-4" href="logout.php">Logout</a>
                <?php
            }else{
                ?>
                <a href="userlogin.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block border-light border-4">Login</a>
                <a href="userregister.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block border-light border-4">Register<i class="fa fa-arrow-right ms-3"></i></a>
                <?php
            }
            ?>
            </div>
            
        </div>
           
        </div>
    </nav>
    <!-- Navbar End -->
