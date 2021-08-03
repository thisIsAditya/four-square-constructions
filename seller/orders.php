<?php 
include("dashboard/session.inc.php");
include("dashboard/header.inc.php");
include("dashboard/sidepane.inc.php");
include_once('../dbconnection.php');
?>
<!-- Body Starts -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Orders</h1>
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
      $se_email = $_SESSION['sellerEmail']; 
      $sql = "SELECT se_id FROM seller WHERE se_email = '$se_email'";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      $se_id = $row['se_id'];
      $sql = " SELECT * FROM orders where se_id = '$se_id' AND payment_status='TXN_SUCCESS' ";
      // echo $sql;
      $result = $conn->query($sql);
      if ($result->num_rows > 0) 
      {
      ?>
        <div style="overflow-x:auto;">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
          
                <th scope="col">Qty</th>
                <th scope="col">Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Update Status</th>
                <th scope="col">Reciept</th>
              </tr>
            </thead>
            <tbody>
            <?php
              // Fetching Values from Enum, Stored in Array Vals
              $res = $conn->query("SHOW COLUMNS FROM `orders` LIKE 'ord_status';");
              if ($res) {
              $row = $res->fetch_row();
              $type = $row['1'];
              preg_match('/enum\((.*)\)$/', $type, $matches);
              $vals = explode(',', $matches[1]);
              }
               while ($row = $result->fetch_assoc()) {
                 ?>
                <tr>
                  <td scope="row"><?php echo $row['ord_id'] ?></td>
                  <td><?php echo $row['ord_qty'] ?></td>
                  <td><?php echo $row['ord_amt'] ?></td>
                  <td><?php echo $row['ord_txnDate'] ?></td>
                  <td>
                    <form method="POST" class="d-inline" id="updateStatus">
                      <select class="form-control"  name="selectStatus">
                        
                        <?php 
                        foreach($vals as $status)
                        {
                          $status=trim($status, "''");
                          if($status == $row['ord_status'])
                          {
                        ?>
                          <option value="<?php echo $status ?>" selected><?php echo $status ?></option>
                        <?php
                          }
                          else{
                        ?>
                          <option value="<?php echo $status ?>" ><?php echo $status ?></option>
                        <?php
                          }
                        }
                        ?>
                      </select>
                  </td>
                  <td>
                      <input type="hidden" name="id" value="<?php echo $row['ord_id'] ?>">
                      <button type="submit" class="btn btn-secondary" name="update" value="update"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    </form>
                  </td>
                  <td>                    
                    <form method="POST" class="d-inline">
                      <input type="hidden" name="id" value="<?php echo $row['ord_id'] ?>">
                      <button type="submit" class="btn btn-secondary" name="view" value="view"><i class="fa fa-download" aria-hidden="true"></i></button>
                    </form>
                  </td>
                </tr>
            <?php
              } 
            ?>
            </tbody>
          </table>
        </div>

        <?php
        if(isset($_REQUEST['update'])){
          $ord_id = $_REQUEST['id'];
          // echo $_REQUEST['selectStatus'];
          $ord_status = $_REQUEST['selectStatus'];
          $sql = "UPDATE `orders` SET `ord_status` = '$ord_status' WHERE `orders`.`ord_id` = '$ord_id'";
          // echo $sql;
          // $conn->query($sql);
          if($conn->query($sql)){
            echo '<meta http-equiv="refresh" content="0;URL=?updated"/>';
          }
          else{
            echo "Query Failed";
          }
        }
        ?>

      <?php 
      }
      else {
        echo ("Data not found");
      }
      ?>

    </main>

  </div>
</div>
<!-- Body Ends -->

<?php include("dashboard/footer.inc.php") ?>
</body>
</html>