<?php
if (!isset($_SESSION)) {
  session_start();
}
if (!(isset($_SESSION['is_login']) && isset($_SESSION['adminEmail']))) {
  header('location:../index.php');
}


include_once('../dbconnection.php');
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php"); 
if (isset($_REQUEST['productSubmitBtn'])) {
  //checking for empty feild
  if (($_REQUEST['pr_name'] == "") || ($_REQUEST['pr_desc'] == "") || ($_REQUEST['pr_quantity'] == "") || ($_REQUEST['pr_unit'] == "") || ($_REQUEST['pr_origionalprice'] == "") || ($_REQUEST['pr_sellingprice'] == "") || ($_REQUEST['pr_brand'] == "")) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } else {
    $pr_name = $_REQUEST['pr_name'];
    $pr_desc = $_REQUEST['pr_desc'];
    $pr_quantity = $_REQUEST['pr_quantity'];
    $pr_unit = $_REQUEST['pr_unit'];
    $pr_origionalprice = $_REQUEST['pr_origionalprice'];
    $pr_sellingprice = $_REQUEST['pr_sellingprice'];
    $pr_brand = $_REQUEST['pr_brand'];

    //uploading image
    $pr_img = $_FILES['pr_img']['name'];
    $pr_img_temp = $_FILES['pr_img']['tmp_name'];
    $img_folder = "../image/productimg/" . $pr_img;
    move_uploaded_file($pr_img_temp, $img_folder);

    $sql = " INSERT INTO products(pr_name, pr_desc, pr_quantity, pr_img, pr_unit, pr_sellingprice, pr_origionalprice, pr_brand) 
  VALUES ('$pr_name','$pr_desc','$pr_quantity','$img_folder','$pr_unit','$pr_sellingprice','$pr_origionalprice','$pr_brand') ";

    if ($conn->query($sql) == TRUE) {
      $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2">product Added Successfully....!</div> ';
      echo "<script>location.href='products.php';</script>";
    } else {
      $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to Add product....!</div> ';
    }
  }
}
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin Dashboard</h1>
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
                <h3 class="text-center">Add New Product</h3>
                <div class="form-group mb-3">
                  <label for="pr_name">Products Name</label>
                  <input type="text" class="form-control" id="pr_name" name="pr_name">
                </div>
                <div class="form-group mb-3">
                  <label for="pr_desc">Products Description</label>
                  <textarea type="text" class="form-control" id="pr_desc" name="pr_desc" row="2"></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="pr_quantity">Products Quantity</label>
                  <input type="text" class="form-control" id="pr_quantity" name="pr_quantity">
                </div>
                <div class="form-group mb-3">
                  <label for="pr_unit">Products Unit</label>
                  <input type="text" class="form-control" id="pr_unit" name="pr_unit">
                </div>

                <div class="form-group mb-3">
                  <label for="pr_origionalprice">Products Origional Price</label>
                  <input type="text" class="form-control" id="pr_origionalprice" name="pr_origionalprice">
                </div>
                <div class="form-group mb-3">
                  <label for="pr_sellingprice">Products Selling Price</label>
                  <input type="text" class="form-control" id="pr_sellingprice" name="pr_sellingprice">
                </div>
                <div class="form-group mb-3">
                  <label for="pr_brand">Products Brand</label>
                  <input type="text" class="form-control" id="pr_brand" name="pr_brand">
                </div>
                <div class="form-group my-5">
                  <label for="pr_img">Products Image</label>
                  <input type="file" class="form-control-file" id="pr_img" name="pr_img">
                </div>

                <div class="text_center my-3">
                  <button type="submit" class="btn btn-danger" id="productSubmitBtn" name="productSubmitBtn">Submit</button>
                  <a href="products.php" class="btn btn-secondary">Close</a>
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
</html>