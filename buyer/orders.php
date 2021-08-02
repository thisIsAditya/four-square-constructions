<?php

session_start();
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
      $bu_email = $_SESSION['buyerEmail']; 
      $sql = " SELECT * FROM orders where bu_email='$bu_email' AND payment_status='TXN_SUCCESS' ";
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
                <th scope="col">Reciept</th>
              </tr>
            </thead>
            <tbody>
            <?php
               while ($row = $result->fetch_assoc()) {
            ?>
                <tr>
                  <td scope="row"><?php echo $row['ord_id'] ?></td>

                  <td><?php echo $row['ord_qty'] ?></td>
                  <td><?php echo $row['ord_amt'] ?></td>
                  <td><?php echo $row['ord_txnDate'] ?></td>
                  <td><?php echo $row['ord_status'] ?></td>
                  <td>                    
                    <form method="POST" class="d-inline" action="../invoice.php">
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