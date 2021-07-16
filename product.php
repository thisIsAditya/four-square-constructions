<!-- Header Section Starts -->
<?php require("components/header.inc.php"); ?>
<title>Shop | Four Square Constructions</title>
<script>
    function changeImage(image){
        var container = document.getElementById('main-img');
        container.src = image.src;
    }
    document.addEventListener("DOMContentLoaded", function(event) {
        
    });
</script>
</head>
<!-- Header Section Ends -->

<body>
    <!-- Navbar Starts -->
    <?php require("components/navbar.inc.php"); ?>
    <!-- Navbar Ends -->

    <section>
        <div class="container">
            <div class="row my-2 py-2">
                <div class="col-lg-6">
                    <!-- Product Image slider here -->
                    <div class="product-image">
                        <img src="img/demoProduct.jpg" alt="" id="main-img" width="100%">
                        <div class="thumbnail text-center my-3">
                            <img src="img/demoProduct.jpg" alt="" onclick="changeImage(this)" width="20%" style="max-width : 100%">
                            <img src="img/demoProduct2.jpg" alt="" onclick="changeImage(this)" width="20%" style="max-width : 100%">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Product Info here -->
                    <div class="mx-4">
                        <p class="h3 text-underline fw-bold py-4 mt-3">Product Heading</p>
                    </div> 
                    <div class="mx-4">
                        <p class="h6 py-4 text-danger fw-bold ">Price : Rs 150 / Unit</p>
                    </div>
                    <div class="mx-4">
                        <p class="h7">
                        <strong class="h4 fw-bold">Description</strong>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus beatae suscipit omnis animi cumque, quis natus vel commodi libero illum, veniam officiis maxime sequi at inventore delectus quisquam aliquid maiores.</p>
                        </p>
                    </div>
                    <div class="row mx-3 py-3">
                        <div class="col-lg-3 my-2">
                            <a href="#" class="btn btn-primary">Buy Now</a>
                        </div>
                        <div class="col-lg-3 my-2">
                            <a href="#" class="btn btn-primary">Add to cart</a>
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