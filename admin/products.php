<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
?>



  <!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Products</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
         <input type="button" class="btn btn-sm btn-outline-secondary" value="Export" onclick="window.print()"></input>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
<?php
    $sql = " SELECT * FROM products ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
  ?>
      <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">QUANTITY</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  <?php
          while ($row = $result->fetch_assoc()) {
            $img=$row['pr_img']
          ?>
    <tr>
      <th scope="row"><?php echo $row['pr_id'] ?></th>
      <td><?php echo $row['pr_name'] ?></td>
      <td><?php echo $row['pr_quantity'] ?></td>
      <td>
        
      <form method="POST" class="d-inline" action="editproduct.php">
                  <input type="hidden" name="id" value="<?php echo $row['pr_id'] ?>">
                  <button type="submit" class="btn btn-secondary" name="view" value="view"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                </form>
                <form method="POST" class="d-inline" action="">
                  <input type="hidden" name="id" value=' <?php echo $row["pr_id"] ?> '>
                  <button type="submit" class="btn btn-secondary" name="delete" value="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
      
      </td>
    </tr>
    <?php
          } ?>
  </tbody>
</table>

<?php }
 else {
      echo ("Data not found");
    }

    if (isset($_REQUEST['delete'])) {
      unlink($img );
      $sql = " DELETE FROM products WHERE pr_id = {$_REQUEST['id']} ";
      // echo $sql;
      if ($conn->query($sql) == TRUE) {
        echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
      } else {
        echo "Unable to delete data";
      }
    }

    ?>
<a class="btn btn-primary box mb-5" href="addproducts.php">Add Product&nbsp;<i class="fa fa-plus" aria-hidden="true"></i></a>




</main>

  </div>
</div>
<!-- Body Ends -->

<?php include("dashboard/footer.inc.php") ?>
</body>
</html>