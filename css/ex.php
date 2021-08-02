<!-- Header Section Starts -->
<?php require("components/header.inc.php"); ?>
<title>Shop | Four Square Constructions</title>
</head>
<!-- Header Section Ends -->

<body>
<?php

include('./dbconnection.php');

?>
    <!-- Navbar Starts -->
    <?php require("components/navbar.inc.php"); ?>
    <!-- Navbar Ends -->


    <section>
        <div class="container-fluid">
            <div class="row p-3 my-2">
                <div class="col-lg-4">
                    <div class="p-2 m-2">
                        <div class="text-center my-3">
                            <p class="h4">Filter</p>
                        </div>
                        <!-- Sidebar Here -->
                        <!-- <div class="accordion accordion-flush my-4" id="accordionFlushExample"> -->
                            <!-- Categories List  -->
                            <!-- <div class="col-md-8"> -->
                                <form method="GET">
                                    <div class="card shadow mt-3">
                                        <div class="card-header">
                                            <h5>Categories <button type="submit" class="btn btn-primary btn-sm float-end">Search</button> </h5> 
                                        </div>
                                        <div class="card-body">
                                            <!-- <h6>Categories List</h6><hr> -->
                                            
                                            <?php
                                            $sql="SELECT * FROM categories";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) 
                                            { 
                                                while ($row = $result->fetch_assoc()){
                                                    $checked = [];
                                                    if(isset($_GET['catsort']))
                                                    {
                                                        $checked= $_GET['catsort'];
                                                    }
                                                
                                                ?>
                                                <div>
                                                    <input type="checkbox" name="catsort[]" value="<?php echo $row['cat_id'];  ?>"  
                                                    <?php if(in_array($row ['cat_id'], $checked)){ echo "checked"; } ?>
                                                    />  <?php echo $row['cat_name'];     ?>
                                                </div>
                                                <?php
                                            } }
                                            ?>
                                        </div>
                                    </div>
                                </form>
                            <!-- </div> -->
                        <!-- </div> -->
                        <!-- Sidebar ends -->
                    </div>
                </div>
                <div class="col-lg-8">
                <div class="container-fluid">
                        <div class="row my-2">
                    <!-- Shop Components here -->
                        <!-- Card starts -->
                        <?php  
                            if(isset($_GET['catsort']))
                            {
                            $catchecked = [];
                            $catchecked = $_GET['catsort'] ;
                            foreach($catchecked as $cat)
                            {
                                // echo $cat;
                            $sql = "SELECT * FROM products join seller on products.se_id= seller.se_id WHERE cat_id IN ($cat)";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) 
                                        {
                                        while ($row = $result->fetch_assoc()) 
                                        {
                                            $pr_id = $row['pr_id'];?>
                                        <div class="col-lg-4 col-6">
                                        <div class="p-1">
                                            <div>
                                        <div class="card" style="width: 100%;">
                                        <img src="<?php echo (str_replace('..', '.', $row['pr_img'])); ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h2 class="card-title"><?php echo $row['pr_name']; ?></h2>
                                        <p class="card-text d-inline">
                                                Price: <small><del>&#8377 <?php echo $row['pr_origionalprice']; ?>/ <strong>Unit</strong></p></del></small>
                                                <br>
                                            <span class="font-weight-bolder">
                                            &#8377 <?php echo $row['pr_sellingprice']; ?>
                                            </span> / <strong>Unit</strong></p>
                                            <small>Quantity: <?php echo $row['pr_quantity']; ?></small>
                                            <p class="card-text">Seller : <?php echo $row['se_fname'].' '.$row['se_lname'] ; ?></p>
                                        </div>
                                        <div class="card-footer">
                                        <form action="productdetails.php" METHOD="POST">
                                        <p>Quantity: <input type="text" name="quantity" class="form-control col-lg-4 col-sm-2" required> 
                                        <input type="hidden" name="pr_id" value="<?php echo $row['pr_id']; ?>"></p>
                                        <button type="submit" name="idsubmit" value ="submit" class="btn btn-outline-info">Check </a>
                                        </div>
                                        </form>
                                        </div>
                                </div>

                            </div>
                        </div>

                        <?php
                        }
                            }
                            }
                        }
                        else{                            
                        $sql = "SELECT * FROM products join seller ON products.se_id = seller.se_id";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) 
                        {
                        while ($row = $result->fetch_assoc()) 
                        {
                            $pr_id = $row['pr_id'];?>
                        <div class="col-lg-4 col-6 col">
                            <div class="p-1">
                                <div>
                                    <div class="card" style="width: 100%;">
                                        <img src="<?php echo (str_replace('..', '.', $row['pr_img'])); ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h2 class="card-title"><?php echo $row['pr_name']; ?></h2>
                                        <p class="card-text d-inline">
                                                Price: <small><del>&#8377 <?php echo $row['pr_origionalprice']; ?>/ <small><?php echo $row['pr_unit']; ?></small></p></del></small>
                                                <br>
                                            <span class="font-weight-bolder">
                                            &#8377 <?php echo $row['pr_sellingprice']; ?>
                                            </span> / <small><?php echo $row['pr_unit']; ?></small></p>
                                            <small>Quantity: <?php echo $row['pr_quantity']; ?></small>
                                            <p class="card-text">Seller Name : <?php echo $row['se_fname'].' '.$row['se_lname'] ; ?></p>
                                        </div>
                                        <div class="card-footer">
                                        <form action="productdetails.php" METHOD="POST">
                                        <p>Quantity: <input type="text" name="quantity" class="form-control col-lg-4 col-sm-2" required> 
                                        <input type="hidden" name="pr_id" value="<?php echo $row['pr_id']; ?>"></p>
                                        <button type="submit" name="idsubmit" value ="submit" class="btn btn-outline-info">Check </a>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php
                        }
                    }
                    else {
                        echo "No records found";
                        }
                    }?>
                        <!-- Card Ends -->
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Footer Starts -->
     <?php include("components/footer.inc.php"); ?> 
    <!-- Footer Ends -->
</body>
</html>


                        
                        