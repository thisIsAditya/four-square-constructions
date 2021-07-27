<?php 
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include("dashboard/session.inc.php");
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
          <div class="mt-5 mx-3">
            <div class="col-lg-8">
              <form action="" method="POST" enctype="multipart/form-data">
               <h3 class="text-center">Add New Product</h3>
                <div class="form-group mb-3">
                  <label for="product_name">Products Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="form-group mb-3">
                  <label for="product_desc">Products Description</label>
                  <textarea type="text" class="form-control" id="product_desc" name="product_desc" row="2"></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="product_quantity">Products Quantity</label>
                  <input type="text" class="form-control" id="product_quantity" name="product_quantity">
                </div>
                <div class="form-group mb-3">
                  <label for="product_unit">Products Unit</label>
                  <input type="text" class="form-control" id="product_unit" name="product_unit">
                </div>

                <div class="form-group mb-3">
                  <label for="product_origional_price">Products Origional Price</label>
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
      <!-- Body content ends -->
    </main>

  </div>
</div>
<!-- Body Ends -->

<?php include("dashboard/footer.inc.php") ?>
</body>
</html>