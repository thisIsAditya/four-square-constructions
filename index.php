<?php include("components/header.inc.php"); ?>
<body>
    <?php include("components/navbar.inc.php"); ?>
    <section class="search py-5">
        <div class="container-fluid">
             <div class="row text-center">
                <div class="col ">
                    <h2 class="py-2 mb-3">Search</h2>
                </div>
            </div>
            <div class="row">
                <!-- Column 1 starts -->
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="search-cols flex-fill p-2 m-1">
                        <img src="img/helper.png" class="img-fluid" id="search-helper">
                    </div>
                </div>
                <!-- Colunm 1 Ends -->
                <!-- Column 2 Starts -->
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="search-cols flex-fill p-2 m-1">
                        <p class="h2 text-center mb-3">Choose Address</p>
                        <form action="" class="">
                            <div class="form-group">
                                <label for="">State</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select one...</option>
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label for="">City</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select one...</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Column 2 Ends -->

                <!-- Column 3 Starts -->
                <div class="col-lg-3 d-flex align-items-center">
                    <div class="search-cols flex-fill p-2 m-1">
                        <p class="h2 text-center mb-3">Browser Product</p>
                        <form action="" class="">
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select one...</option>
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Select one...</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Column 3 Ends -->

                   <!-- Column 4 starts -->
                   <div class="col-lg-3 d-flex align-items-center">
                    <div class="search-cols flex-fill p-2 m-1 text-center">
                        <button class="btn btn-success btn-lg pe-5"> <i style="font-size :1rem;" class="fa">&#xf002;</i> SEARCH</button>
                    </div>
                </div>
                <!-- Colunm 4 Ends -->

            </div>
        </div>
    </section>

    <section class="categories px-3 py-5">
        <div class="container my-5">
            <div class="row text-center mb-4">
                <div class="col ">
                    <h2 class="py-2 mb-5">Categories</h2>
                </div>
            </div>

            <div class="row justify-content-evenly m-1">
                <div class="col-md-4 col-lg-2 col-6">
                    <div class="products mx-1 my-1 text-center">
                        <div class="card" style="width: 90%;">
                        <img src="img/bricks.jpg" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Bricks</h5>                    
                            <a href="#" class="btn btn-primary px-5">Buy</a>
                        </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-lg-2 col-6 ">
                    <div class="products mx-1 my-1 text-center">
                        <div class="card" style="width: 90%;">
                        <img src="img/cement.jpg" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Cement</h5>                    
                            <a href="#" class="btn btn-primary px-5">Buy</a>
                        </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-lg-2 col-6">
                    <div class="products mx-1 my-1 text-center">
                        <div class="card" style="width: 90%;">
                        <img src="img/ironrod.jpeg" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Iron Rod</h5>                    
                            <a href="#" class="btn btn-primary px-5">Buy</a>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-lg-2 col-6">
                    <div class="products mx-1 my-1 text-center">
                        <div class="card" style="width: 90%;">
                        <img src="img/sand.jpg" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Sand</h5>                    
                            <a href="#" class="btn btn-primary px-5">Buy</a>
                        </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-lg-2 col-6">
                    <div class="products mx-1 my-1 text-center">
                        <div class="card" style="width: 90%;">
                        <img src="img/granite.jpeg" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Granite</h5>                    
                            <a href="#" class="btn btn-primary px-5">Buy</a>
                        </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4 col-lg-2 col-6">
                    <div class="products mx-1 my-1 text-center">
                        <div class="card" style="width: 90%;">
                        <img src="img/tiles.jpg" class="card-img-top img-thumbnail" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Tiles</h5>                    
                            <a href="#" class="btn btn-primary px-5">Buy</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </section> 
<?php include("components/footer.inc.php"); ?>
<!-- Bootstrap Javascript-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>