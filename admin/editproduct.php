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
  } else {
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
  } else {
  $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to update....!</div> ';
  }
  }
  }


  ?>

<!-- Body Starts -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Product</h1>
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
      <?php
            if (isset($_REQUEST['view'])) {
      $sql = "SELECT * FROM products WHERE  pr_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }

    ?>

      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="m-3 p 2">
              <img src="<?php if(isset($row['pr_img'])){echo $row['pr_img'];} ?>" class="img-thumbnail" alt="Product Image">
            </div>
          </div>
          
          <div class="col-md-9 d-flex align-items-center">
            <div class="m-3 p-2">
              <p class="h2"><strong>ID : <?php if(isset($row['pr_id'])){echo $row['pr_id'];} ?></strong></p>
              <p class="h4 text-muted">Product Brand : <?php if(isset($row['pr_brand'])){echo $row['pr_brand'];} ?></p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="m-2 p-2">
  
              <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group mb-3">
                  <label for="product_name">Products Name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name" value="<?php if (isset($row['pr_name'])) {
                                                                                              echo $row['pr_name'];
                                                                                            } ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="product_desc">Products Description</label>
                  <textarea type="text" class="form-control" id="product_desc" name="product_desc" row="2" value=""><?php if(isset($row['pr_desc'])){echo $row['pr_desc'];} ?></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="product_quantity">Products Quantity</label>
                  <input type="text" class="form-control" id="product_quantity" name="product_quantity" value="<?php if(isset($row['pr_quantity'])){echo $row['pr_quantity'];} ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="product_unit">Products Unit</label>
                  <input type="text" class="form-control" id="product_unit" name="product_unit" value="<?php if(isset($row['pr_unit'])){echo $row['pr_unit'];} ?>"> 
                </div>

                <div class="form-group mb-3">
                  <label for="product_origional_price">Products Origional Price</label>
                  <input type="text" class="form-control" id="product_origional_price" name="product_origional_price" value="<?php if(isset($row['pr_origionalprice'])){echo $row['pr_origionalprice'];} ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="product_price">Products Selling Price</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" value="<?php if(isset($row['pr_sellingprice'])){echo $row['pr_sellingprice'];} ?>">
                </div>
              
                <div class="text_center my-3">
                  <button type="update" class="btn btn-danger" id="productUpdateBtn" name="productUpdateBtn">Update</button>
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