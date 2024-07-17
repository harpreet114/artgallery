<?php
include("header.php");
?>
 <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>

<!--adminlogin-->
<div class="container my-5">
   
   <div class="card px-5 c1">
   <?php
	  if(isset($_GET['msg'])){
	  echo "<div class='alert alert-success'>".$_GET['msg']."</div>";
	  }
	  ?>
	  <h1 class="text-center my-3">User Login</h1>
	  <form method="post" action="usubmit.php" enctype="multipart/form-data">
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Email</label>
			  </div>
			  <div class="col-md-10">
				  <input required class="form-control" type="email" name="email">
			  </div>
		  </div>
		  <div class="row my-3">
			  <div class="col-md-2">
				  <label>Password</label>
			  </div>
			  <div class="col-md-10">
			  <input required class="form-control" type="password" name="password">
			  </div>
		  </div>
		  <button class="btn btn-primary d-block mx-auto my-3 w-50" name="submit_btn" style="width:25%;">Login</button>
	  </form>
  </div>
</div>




<!--/adminlogin-->  

<?php
include("footer.php")
?>
 