<?php include("components/header.inc.php"); ?>
<title>Four Square Constructions | Home</title>
</head>

<body>
    <?php include("components/navbar.inc.php"); ?>
    <section>
        <!-- <div class="container-fluid"> -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner ratio ratio-21x9">
    <div class="carousel-item active">
      <img src="image/indexCourImg2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption  d-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/indexCourImg1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption  d-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="image/indexCourImg3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption  d-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- </div> -->
    </section>
    <!-- Services -->
    <section>
        <div class="container">
            <div class="row my-4">
                <div class="col-lg-12">
                    <p class="h2 fw-bold text-center">Why Choose Us?</p>
                </div>
            </div>
            <div class="row mt-2 mb-4">
                <div class="col-lg-3 col-sm-6">
                    <div class="p-2 px-3 mb-3 border border-2 border-dark" style="height:15rem;">
                        <div>
                            <i class="fa fa-truck" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="h4 fw-bold">Fast Dilivery</p>
                            <p><small>
                                We provide fastest dilivery. Like Dhun dhun dhun dhun.. Bhag Ke!
                            </p></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="p-2 px-3 mb-3 border border-2 border-dark" style="height:15rem;">
                        <div>
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="h4 fw-bold">Best Seller</p>
                            <p><small>
                                We have best in class sellers. Jinke dada bhi seller, papa bhi seller, poora khandaan seller.
                            </p></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="p-2 px-3 mb-3 border border-2 border-dark" style="height:15rem;">
                        <div>
                            <i class="fa fa-money" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="h4 fw-bold">Unbeatable Price</p>
                            <p><small>
                                We have best prices in the market. Mummy kasam!
                            </p></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="p-2 px-3 mb-3 border border-2 border-dark" style="height:15rem;">
                        <div>
                            <i class="fa fa-archive" aria-hidden="true"></i>
                        </div>
                        <div>
                            <p class="h4 fw-bold">Quality Products</p>
                            <p><small>
                                Best quality products, because ek din mausi ne bola ki acche products becho
                            </p></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section -->
    <section class="my-5 py-5" style="background-color:#dee2e6;">
        <?php include("components/semiproduct.inc.php"); ?>
        <div class="d-flex mt-5  justify-content-center">
            <a href="product.php" class="btn btn-primary btn-lg">Shop More</a>
        </div>
        </div>
</section>
    <!-- contact Us  -->
    <section class="mb-5 py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col text-center">
                    <p class="fw-bold h2 ">Contact Us</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="p-1">
                        <form action="#" Method="POST">
                            <div class="form-group">
                                <label>Name : </label>
                                <input type="text" name="name" class="form-control">
                            </div><br>

                            <div class="form-group">
                                <label>E-mail : </label>
                                <input type="text" name="email" class="form-control">
                            </div><br>

                            <div class="form-group">
                                <label>Comments</label><br>
                                <textarea placeholder="Write here..." name="comment" class="form-control" ></textarea>
                            </div><br>

                            <div class="form-group">
                                <input type="submit" name="contactbtn" value="Submit" class="btn btn-primary">
                            </div><br>
                             <?php
                if (isset($msg)) {
                echo $msg;
                  }
                ?>      
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-1">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3608.4446263878003!2d82.91758641484658!3d25.255624283868965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e32d8078a2c2f%3A0xa6813f724988d305!2sSchool%20of%20Management%20Sciences!5e0!3m2!1sen!2sin!4v1627766719242!5m2!1sen!2sin" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Footer Starts -->
    <?php include("components/footer.inc.php"); ?>
    <!-- Bootstrap Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- jQuery library -->
    <script src="js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="js/popper.min.js"></script>
    <!--Ajax-->
    <script type="text/javascript" src="js/ajaxrequest.js"></script>
</body>
</html>
<?php
if (isset($_REQUEST['contactbtn'])) {
    if (($_REQUEST['name'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['comment'] == ""))
    {
    $msg = ' <div class="alert alert-warning col-sm-6 ml-5 mt-2">All Fields Are Required....!</div> ';
    }
    else{
        $name=$_REQUEST['name'];
        $email=$_REQUEST['email'];
        $comment=$_REQUEST['comment'];
        $sql = "INSERT INTO `contactus`(`contact_name`, `contact_email`, `contact_comment`) VALUES ('$name','$email','$comment')";
        if ($conn->query($sql) == TRUE) {
      $msg = ' <div class="alert alert-success col-sm-6 ml-5 mt-2">Message sentSuccessfully....!</div> ';
      echo "<script>location.href='index.php';</script>";
    } else {
      $msg = ' <div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to sent message....!</div> ';
    }
  }
    }
  ?>

  