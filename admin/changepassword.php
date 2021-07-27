<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Change Password</h1>
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
            <div class="m-2 p-2">
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="product_name">Old Password</label>
                  <input type="text" class="form-control" id="product_name" name="product_name">
                </div>
                <div class="form-group mb-3">
                  <label for="product_desc">Re-Enter Old Password</label>
                  <input type="text" class="form-control" id="product_desc" name="product_desc" row="2">
                </div>
                <div class="form-group mb-3">
                  <label for="product_quantity">New Password</label>
                  <input type="text" class="form-control" id="product_quantity" name="product_quantity">
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

<footer class="fixed-bottom">
  <div class="footer-2 text-center py-2">
    <div class="container">
        <p class="my-2">
            Made with  &hearts;  in School of Management Sciences, Varanasi
        </p>
    </div>
  </div>
</footer>
</body>
</html>