<!-- Header Section Starts -->
<?php require("components/header.inc.php"); ?>
<title>Shop | Four Square Constructions</title>
</head>
<!-- Header Section Ends -->
<?php include('./dbconnection.php'); ?>
<body>
    <!-- Navbar Starts -->
    <?php require("components/navbar.inc.php"); ?>
    <!-- Navbar Ends -->


    <section>
        <div class="container">
            <div class="row p-3 my-2">
                <div class="col-lg-4">
                    <div class="p-2 m-2">
                        <div class="text-center my-3">
                            <p class="h4">Filter</p>
                        </div>
                        <!-- Acordian Here -->
                        <div class="accordion accordion-flush my-4" id="accordionFlushExample">
                        <form method="GET">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Category
                                    </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <!-- <form method="GET"> -->
                                            <ul style="list-style:none;margin-left:-2rem;">
                                                <!-- loop here start -->
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
                                                        <li><label><input type="checkbox" name="catsort[]" 
                                                            value="<?php echo $row['cat_id'];?>"  
                                                            <?php 
                                                            if(in_array($row ['cat_id'], $checked)){ echo "checked"; } ?> />
                                                            <?php echo "&nbsp;" . $row['cat_name'];?>
                                                        </label></li> 
                                                <?php
                                                     }
                                                } 

                                                ?>
                                                <!-- Loop here Ends -->
                                            </ul>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Accordian ends -->
                        <div class="d-flex justify-content-end my-3 ">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                        </form>
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
                                                $pr_id = $row['pr_id'];
                                                 $se_name = $row['se_name'];
                                ?>              
                                                <!-- Card Code -->
                                                <div class="col-lg-4 col-sm-6">
                                                    <div class="p-1">                                    
                                                        <!-- <div id="car-holder"> -->
                                                            <div class="card" style="width: 100%;">
                                                                <img src="<?php echo (str_replace('..', '.', $row['pr_img']));?>" class="card-img-top" alt="...">
                                                                <div class="card-body">
                                                                    <h2 class="card-title"><?php echo $row['pr_name'];?></h2>
                                                                    <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['pr_origionalprice']; ?>/ <strong>Unit</strong></p></del></small>
                                                                    </br>
                                                                    <span class="font-weight-bolder">
                                                                    &#8377; <?php echo $row['pr_sellingprice']; ?>
                                                                    </span> / <strong>Unit</strong></p>
                                                                    <small>Quantity: <?php echo $row['pr_quantity']; ?></small>

                                                                    <p class="card-text">Seller : <?php echo $se_name;?></p>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <form action="productdetails.php" METHOD="GET">
                                                                        <p>Quantity: <input type="text" name="quantity" class="form-control col-lg-4 col-sm-2" required> 
                                                                        <input type="hidden" name="pr_id" value="<?php echo $row['pr_id']; ?>"></p>
                                                                        <button type="submit" name="idsubmit" value ="submit" class="btn btn-outline-primary">Check </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        <!-- </div> -->
                                                    </div>
                                                </div>
                                                <!-- Card Code ends  -->
                                <?php
                                            }
                                        }
                                    }
                                }

                                else
                                {                            
                                    $sql = "SELECT * FROM products join seller ON products.se_id = seller.se_id";
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
                                }
                                ?>
                            <!-- Card Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Footer Starts -->
     <?php
      include("components/footer.inc.php"); ?> 
    <!-- Footer Ends -->
</body>
</html>
