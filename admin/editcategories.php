<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
if (isset($_REQUEST['categoriesUpdateBtn'])) {
  //checking for empty feild
  // echo "clicked";
  if (($_REQUEST['cat_name'] == "") ) {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
  } 
  else {
    $cat_id=$_REQUEST['cat_id'];
    $cat_name = $_REQUEST['cat_name'];
    // $cat_img = '../img/catimage/' . $_FILES['cat_img']['name'];

    $sql = "UPDATE categories SET cat_id= '$cat_id',cat_name='$cat_name'
    WHERE cat_id = '$cat_id'";
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
        <h1 class="h2">Edit Categories</h1>
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
      $sql = "SELECT * FROM categories WHERE cat_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
    ?>

      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-md-3">
            <div class="m-3 p 2">
              <img src="<?php// if(isset($row['cat_img'])){echo $row['cat_img'];} ?>" class="img-thumbnail" alt="categories Image">
            </div>
          </div> -->
          
          <div class="col-md-9 d-flex align-items-center">
            <div class="m-3 p-2">
              <p class="h2"><strong>ID : <?php if(isset($row['cat_id'])){echo $row['cat_id'];} ?></strong></p>
              
            </div>
          </div>

          <div class="col-lg-6">
            <div class="m-2 p-2">
  
              <form action="" method="POST" enctype="multipart/form-data">

              <div class="form-group mb-3">
                  <label for="cat_id">Categories ID</label>
                  <input type="text" class="form-control" id="cat_id" name="cat_id" value="<?php if (isset($row['cat_id'])) {
                    echo $row['cat_id'];
                  } ?>" readonly>
                </div>

                <div class="form-group mb-3">
                  <label for="cat_name">Categories Name</label>
                  <input type="text" class="form-control" id="cat_fname" name="cat_name" value="<?php if (isset($row['cat_name'])) {
                    echo $row['cat_name'];
                  } ?>">
                </div>
            

              
                <div class="text_center my-3">
                  <button type="update" class="btn btn-danger" id="categoriesUpdateBtn" name="categoriesUpdateBtn">Update</button>
                  <a href="categories.php" class="btn btn-secondary">Close</a>
                </div>
                <?php
                if (isset($msg)) {
                  echo $msg;
                  echo "<script>window.location.href='categories.php';</script>";

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