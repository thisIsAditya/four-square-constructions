<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
?>

<!-- Body Starts -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit buyer</h1>
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
      $sql = "SELECT * FROM contactus WHERE contact_id = {$_REQUEST['id']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
    ?>

      <!-- Body content starts -->
      <div class="container-fluid">
        <div class="row">
   
          
          <div class="col-md-9 d-flex align-items-center">
            <div class="m-3 p-2">
              <p class="h2"><strong>ID : <?php if(isset($row['contact_id'])){echo $row['contact_id'];} ?></strong></p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="m-2 p-2">
  
              <form action="" method="POST">


                <div class="form-group mb-3">
                  <label for="contact_name">Sender Name</label>
                  <input type="text" class="form-control" id="contact_name" name="sender_name" value="<?php if (isset($row['contact_name'])) {
                    echo $row['contact_name'];
                  } ?>" readonly>
                </div>
                <div class="form-group mb-3">
                  <label for="contact_email">Sender E-mail</label>
                  <input type="text" class="form-control" id="contact_email" name="contact_email" value="<?php if(isset($row['contact_email'])){echo $row['contact_email'];} ?>" readonly>
                </div>
                <div class="form-group mb-3">
                  <label for="contact_comment">Sender Message</label>
                  <textarea type="text" class="form-control" id="contact_comment" name="contact_comment" value="" readonly> <?php if(isset($row['contact_comment'])){echo $row['contact_comment'];} ?></textarea>
                </div>

              
                <div class="text_center my-3">
                  <a href="contactus.php" class="btn btn-secondary">Close</a>
                </div>
                <?php
                if (isset($msg)) {
                  echo $msg;
                  echo "<script>window.location.href='buyer.php';</script>";

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