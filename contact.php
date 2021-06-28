<!-- Everything about the layout of this page is set, Each Element will be responsive if the code written is not disturbed.
Just Replace the text "Here put the Map " with the actual code of map and other text with their respective codes and that will be it -->

<!-- Header Section Starts -->
<?php require("components/header.inc.php") ?>
<title>Contact Us | Four Square Constructions</title>
</head>
<!-- Header Section Ends -->

<body>
    <!-- Navbar Starts -->
    <?php require("components/navbar.inc.php") ?>
    <!-- Navbar Ends -->

    <!-- Main Conainer which keeps all the stuff in center -->
    <div class="container">
        <!-- First Row for Map and Address Starts -->
        <div class="row p-3 m-2">
            <div class="col-lg-6">
                <div class="p-2 m-2">
                    Here Put the map
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-2 m-2">
                    <address>
                        Here will be Address
                    </address>
                </div>
            </div>
        </div>

        <!-- First Row ends -->
        
         <!-- Second Row for Contact Starts -->
        <div class="row p-3 m-2">
            <div class="col">
                <div class="p-2 m-2">
                    <form action="">
                        <p class="h2">Contact Form</p>

                    </form>
                </div>
            </div>
        </div>
         <!-- Second Row ends -->
    </div>

    <!-- Footer Starts -->
    <?php include("components/footer.inc.php") ?> 
    <!-- Footer Ends -->
</body>
</html>
