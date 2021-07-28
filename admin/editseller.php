<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
if (isset($_REQUEST['sellerUpdateBtn'])) {
  //checking for empty feild
  // echo "clicked";
  if (($_REQUEST['se_fname'] == "") || ($_REQUEST['se_fname'] == "") || ($_REQUEST['se_email'] == "") || ($_REQUEST['se_number'] == "")) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } 
  else {
    $se_id=$_REQUEST['se_id'];
    $se_fname = $_REQUEST['se_fname'];
    $se_lname = $_REQUEST['se_lname'];
    $se_email = $_REQUEST['se_email'];
    $se_number = $_REQUEST['se_number'];

    // $se_brand = $_REQUEST['se_brand'];
    // $se_img = '../img/sellerimg/' . $_FILES['se_img']['name'];

    $sql = "UPDATE seller SET se_id= '$se_id',se_fname='$se_fname',se_lname='$se_lname',se_email='$se_email',se_number='$se_number'
    WHERE se_id = '$se_id'";
    // echo $sql;
    if ($conn->query($sql) == TRUE) {
      $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully....!</div> ';
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
        <h1 class="h2">Edit seller</h1>
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
      $sql = "SELECT * FROM seller WHERE se_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
    ?>

      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-md-3">
            <div class="m-3 p 2">
              <img src="<?php// if(isset($row['se_img'])){echo $row['se_img'];} ?>" class="img-thumbnail" alt="seller Image">
            </div>
          </div> -->
          
          <div class="col-md-9 d-flex align-items-center">
            <div class="m-3 p-2">
              <p class="h2"><strong>ID : <?php if(isset($row['se_id'])){echo $row['se_id'];} ?></strong></p>
              
            </div>
          </div>

          <div class="col-lg-6">
            <div class="m-2 p-2">
  
              <form action="" method="POST" enctype="multipart/form-data">

              <div class="form-group mb-3">
                  <label for="se_id">Seller ID</label>
                  <input type="text" class="form-control" id="se_id" name="se_id" value="<?php if (isset($row['se_id'])) {
                    echo $row['se_id'];
                  } ?>" readonly>
                </div>

                <div class="form-group mb-3">
                  <label for="se_fname">Seller First Name</label>
                  <input type="text" class="form-control" id="se_fname" name="se_fname" value="<?php if (isset($row['se_fname'])) {
                    echo $row['se_fname'];
                  } ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="se_lname">Seller Last Name</label>
                  <input type="text" class="form-control" id="se_lname" name="se_lname" row="2" value="<?php if(isset($row['se_lname'])){echo $row['se_lname'];} ?>"></input>
                </div>
                <div class="form-group mb-3">
                  <label for="seller_email">Seller E-mail</label>
                  <input type="text" class="form-control" id="se_email" name="se_email" value="<?php if(isset($row['se_email'])){echo $row['se_email'];} ?>">
                </div>
                <div class="form-group mb-3">
                  <label for="se_number">Seller Phone Number</label>
                  <input type="text" class="form-control" id="se_number" name="se_number" value="<?php if(isset($row['se_number'])){echo $row['se_number'];} ?>"> 
                </div>

              
                <div class="text_center my-3">
                  <button type="update" class="btn btn-danger" id="sellerUpdateBtn" name="sellerUpdateBtn">Update</button>
                  <a href="seller.php" class="btn btn-secondary">Close</a>
                </div>
                <?php
                if (isset($msg)) {
                  echo $msg;
                  echo "<script>window.location.href='seller.php';</script>";

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