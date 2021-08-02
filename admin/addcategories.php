<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!(isset($_SESSION['is_login']) && isset($_SESSION['adminEmail']))) {
  header('location:../index.php');
}
// error_reporting(0);
include_once('../dbconnection.php');
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php"); 
if (isset($_REQUEST['categoriesSubmitBtn'])) {
  //checking for empty feild
  if (($_REQUEST['cat_name'] == ""))  {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } else {
    $cat_name = $_REQUEST['cat_name'];
   //uploading image
   $cat_img = $_FILES['cat_img']['name'];
   $cat_img_temp = $_FILES['cat_img']['tmp_name'];
   $img_folder = "../image/catimage/" . $cat_img;
   move_uploaded_file($cat_img_temp, $img_folder);
  


    $sql = " INSERT INTO categories(cat_name, cat_img) 
  VALUES ('$cat_name','$img_folder') ";

    if ($conn->query($sql) == TRUE) {
      $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2">product Added Successfully....!</div> ';
      echo "<script>location.href='categories.php';</script>";
    } else {
      $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add product....!</div> ';
    }
  }
}
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="my-4 mx-3">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="cat_name">Categories Name</label>
                  <input type="text" class="form-control" id="cat_name" name="cat_name">
                </div>
        
                <div class="form-group my-5">
                  <label for="cat_img">Products Image : </label>
                  <input type="file" class="form-control-file" id="cat_img" name="cat_img">
                </div>

                <div class="text_center my-3">
                  <button type="submit" class="btn btn-danger" id="categoriesSubmitBtn" name="categoriesSubmitBtn">Submit</button>
                  <a href="categories.php" class="btn btn-secondary">Close</a>
                </div>
                <?php
                if (isset($msg)) {
                echo $msg;
                  }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Body content Ends -->
    </main>

  </div>
</div>
<!-- Body Ends -->

<?php include("dashboard/footer.inc.php") ?>
</body>