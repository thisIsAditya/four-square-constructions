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
                    <p class="h3 text-underline fw-bold">Product Heading</p><br>

                    <p class="h7">Price : Rs 150 / Unit</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Starts -->
    <?php include("components/footer.inc.php"); ?> 
    <!-- Footer Ends -->
</body>
</html>