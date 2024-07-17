
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


    <div class="container my-5">
        <h1 class="text-center my-3">View Category</h1>
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
                <th>Category Name</th>
                <th>Category Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
                include("config.php");
                $query="SELECT * from `category`";
                $result=mysqli_query($connect,$query);
                $sno=1;
               while($data=mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $sno;?></td>
                    <td><?php echo $data['category_name']?></td>
                    <td>
                        <img src="images/<?php echo $data['thumbnail']?>" style="height:200px; width:200px;" class="img-fluid">
                    </td>
                    <!-- <td><?php echo $data['id']?></td> -->
                    <td>
                        <a href="updatecategory.php?id=<?php echo $data['id']?>" class="btn btn-success">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="deletecategory.php?id=<?php echo $data['id']?>">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
            $sno++;
            }
            ?>
        </table>
    </div>
<?php
include("footer.php");
?>