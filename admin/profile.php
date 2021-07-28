<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
if (isset($_REQUEST['productUpdateBtn'])) {
  //checking for empty feild
  // echo "clicked";
  if (($_REQUEST['pr_name'] == "") || ($_REQUEST['pr_desc'] == "") || ($_REQUEST['pr_quantity'] == "") || ($_REQUEST['pr_unit'] == "") || ($_REQUEST['pr_origionalprice'] == "") || ($_REQUEST['pr_sellingprice'] == "") || ($_REQUEST['pr_brand'] == "")) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } 
  else {
    $pr_name = $_REQUEST['pr_name'];
    $pr_desc = $_REQUEST['pr_desc'];
    $pr_quantity = $_REQUEST['pr_quantity'];
    $pr_unit = $_REQUEST['pr_unit'];
    $pr_origionalprice = $_REQUEST['pr_origionalprice'];
    $pr_sellingprice = $_REQUEST['pr_sellingprice'];
    $pr_brand = $_REQUEST['pr_brand'];
    $pr_img = '../image/productimg/' . $_FILES['pr_img']['name'];

    $sql = "UPDATE product SET pr_id='$pr_id',pr_name='$pr_name',pr_desc='$pr_desc',pr_quantity='$pr_quantity',pr_img='$pr_img',pr_unit='$pr_unit',pr_sellingprice='$pr_sellingprice',pr_origionalprice='$pr_origionalprice'
    pr_brand='$pr_brand'
    WHERE pr_id = '$pr_id'";
    if ($conn->query($sql) == TRUE) {
      $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">pr Updated Successfully....!</div> ';
    } 
    else {
      $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update....!</div> ';
    }
  }
}
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Profile</h1>
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

          <div class="col-md-3">
            <div class="m-3 p 2">
              <img src="../img/demoprofilepic.png" class="img-thumbnail rounded-circle" alt="Profile Picture">
            </div>
          </div>
          
          <div class="col-md-9 d-flex align-items-center">
            <div class="m-3 p-2">
              <p class="h2"><strong>Aditya Pandey</strong></p>
              <p class="h4 text-muted">pandey.api2k@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="m-2 p-2">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="product_name">Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="">
                </div>
                <div class="form-group mb-3">
                  <label for="product_quantity">E-mail</label>
                  <input type="text" class="form-control" id="product_quantity" name="product_quantity">
                </div>
                <div class="form-group mb-3">
                  <label for="product_unit">Address</label>
                  <input type="text" class="form-control" id="product_unit" name="product_unit">
                </div>

                <div class="form-group mb-3">
                  <label for="product_origional_price">Phone Number</label>
                  <input type="text" class="form-control" id="product_origional_price" name="product_origional_price">
                </div>
                <div class="form-group mb-3">
                  <label for="product_price">Products Selling Price</label>
                  <input type="text" class="form-control" id="product_price" name="product_price">
                </div>
                <div class="form-group mb-3">
                  <label for="product_brand">Products Brand</label>
                  <input type="text" class="form-control" id="product_brand" name="product_brand">
                </div>
                <div class="form-group my-5">
                  <label for="product_img">Products Image</label>
                  <input type="file" class="form-control-file" id="product_img" name="product_img">
                </div>

                <div class="text_center my-3">
                  <button type="submit" class="btn btn-danger" id="productSubmitBtn" name="productSubmitBtn">Submit</button>
                  <a href="products.php" class="btn btn-secondary">Close</a>
                </div>
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