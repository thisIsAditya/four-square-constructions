<div class="container">
  <div class="row mb-5">
    <div class="col text-center">
      <p class="fw-bold h2 ">Shop</p>
    </div>
  </div>
  <div class="row">
<?php
include_once('dbconnection.php');
$sql = "SELECT * FROM products join seller ON products.se_id = seller.se_id limit 6";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
  while ($row = $result->fetch_assoc()) 
  {
      $pr_id = $row['pr_id'];
      $se_name = $row['se_fname'] ." ". $row['se_lname'];
?>
      <div class="col-md-4 col-sm-6">
          <div class="p-1">                                    
              <!-- <div id="car-holder"> -->
                  <div class="card" style="width: 100%;">
                      <img src="<?php echo (str_replace('..', '.', $row['pr_img']));?>" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h2 class="card-title"><?php echo $row['pr_name'];?></h2>

                          <p class="card-text d-inline">Price: <small><del>&#8377; <?php echo $row['pr_origionalprice']; ?> <strong>Unit</strong></p></del></small>
                          <br>
                          <span class="font-weight-bolder">
                          &#8377 <?php echo $row['pr_sellingprice']; ?>
                          </span> / <strong>Unit</strong></p>
                          <small>Quantity: <?php echo $row['pr_quantity']; ?></small>

                          <p class="card-text">Seller : <?php echo $se_name;?></p>
                      </div>
                      <div class="card-footer">
                          <form action="productdetails.php" METHOD="GET">
                              <p>Quantity: <input type="text" name="quantity" class="form-control col-lg-4 col-sm-2" required> 
                              <input type="hidden" name="pr_id" value="<?php echo $row['pr_id']; ?>"></p>
                              <button type="submit" class="btn btn-outline-primary">Check </button>
                          </form>
                      </div>
                  </div>
              <!-- </div> -->
          </div>
      </div>
<?php 
  }
}

?>
</div>