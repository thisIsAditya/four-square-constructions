<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
  session_start();
  if(!(isset($_SESSION['buyerEmail'])))
  {
    header('location:index.php');
  }
  else
  
  {

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta charset="utf-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap Integration -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script> -->

    <!-- Bootsrtap Integration Ends-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .footer-1 {
            background-color: #003566;
        }
        .footer-2 {
            background-color: #000814;
            color:whitesmoke;
        }
        .footer-box{
            color : #fff;
        }
        .footer-box p{
            border:3px solid white;
        }
        .footer-logo{
            border:4px solid white;
        }

        .products img{
            height : 150px;
        }
        .products{
            margin : 0.5rem 1rem 0.5rem 1rem;   
        }

        .search{
            background-color: #FFD60A;
        }

        

        #search-helper{
            max-width: 90%;
        }

        #search-img-icon{
            max-width : 50%;
            padding: 1rem;
            border:3px solid whitesmoke;
            border-radius: 50%;
        }

        /* Font Awesome CSS*/
        .fa {
        padding: 20px;
        font-size: 30px;
        width: 70px;
        text-align: center;
        text-decoration: none;
        border-radius: 50%;
        }

        /* Add a hover effect if you want */
        .fa:hover {
        opacity: 0.7;
        }

        /* Set a specific color for each brand */

        /* Facebook */
        .fa-facebook {
        color: white;
        }

        /* Twitter */
        .fa-twitter {
        color: white;
        }

        .fa-google {
        color: white;
        }

        .fa-linkedin {
        color: white;
        }
    </style>

	<title>Checkout | Four Square Constructions</title>
	
</head>
<body>
	<!-- Top Bar Starts -->
<section>
  <div class="container-fluid"> 
    <div class="row">
      <div class="col-lg-6 d-flex justify-content-lg-start justify-content-center">
        <p class="mt-2 text-center">Contact Us : help@foursqrconstructions.com | +91 XXXXXXXXXX</p>
      </div>

    <?php
    
    if(isset($_SESSION['is_login']) )
    {
      echo '
      <div class="col-lg-6">
      <ul class="nav justify-content-lg-end justify-content-center">
      <li class="nav-item m-1">'?>
      <?php
      if(isset($_SESSION['buyerEmail']) )
      {
        echo'<li class="nav-item m-1">
        <a href="buyer/index.php"
        <button type="button" class="btn btn-success" >
            My Profile
          </button></a></li>';
          echo'<li class="nav-item m-1">
          <a href="mycart.php"
        <button type="button" class="btn btn-success" >
            My Cart
          </button></a></li>';

      }
      else if(isset($_SESSION['sellerEmail']) )
      {
        echo'<li class="nav-item m-1">
        <a href="seller/index.php"
        <button type="button" class="btn btn-success" >
            My Profile
          </button></a></li>';
      }
      else
      {
        echo'<li class="nav-item m-1">
        <a href="admin/index.php"
        <button type="button" class="btn btn-success" >
            My Profile
          </button></a>';
      }
      ?>
      <?php
      echo '
        </li>
        <li class="nav-item m-1">
        <a href="logout.php"
            <button type="button" class="btn btn-primary" >
              Log Out
            </button></a>
        </li>
        
      </ul>
    </div>

  ';
    }
    else{
        echo '      <div class="col-lg-6">
        <ul class="nav justify-content-lg-end justify-content-center">
        <li class="nav-item m-1">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal">
                Register
              </button>
          </li>
          <li class="nav-item m-1">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
                Login
              </button>
          </li>
          
        </ul>
      </div>';
    }
    ?>


    </div>
  </div>
</section>
<section>
  <!-- Top Bar Ends -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top py-3">
    <div class="container">
      <a class="navbar-brand px-3" href="index.php">Four Square</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse mr-auto justify-content-lg-end" id="navbarSupportedContent">
        <ul class="navbar-nav  mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link mx-1" href="index.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-1" href="product.php">Shop</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-1" href="about.php">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="contact.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-1" href="privacypolicy.php">Privacy Policy</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</section>
<?php require("./components/login.inc.php"); 
	$bu_email = $_SESSION['buyerEmail'];
  $totalprice=$_REQUEST['totalprice'];
  $bu_id=$_REQUEST['bu_id'];
?>
<!-- Top bar ends -->

<div class="container">
	<div class="row my-4 justify-content-md-center">
		<div class="col-12">
			<p class="h2 text-center">Checkout</p>
		</div>
		<div class="col-md-8">
			<div class="m-2">
				<form method="post" action="PaytmKit/pgRedirect.php" >
					<table class="table table-borderless">
						<tbody>
							<tr>
								<td scope="row"><label>ORDER_ID</label></td>
								<td scope="row"><input id="ORDER_ID" tabindex="1" class="form-control"
									name="ORDER_ID" autocomplete="off"
									value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
								</td>
							</tr>
							<tr>
								<td scope="row"><label>Customer ID</label></td>
								<td scope="row"><input id="CUST_ID" tabindex="2" class="form-control" name="CUST_ID" autocomplete="off" value="<?php echo $bu_id?>" readonly></td>
							</tr>
							<tr>
								<td scope="row"><label>Customer E-mail</label></td>
								<td scope="row"><input id="CUST_ID" tabindex="2" class="form-control" name="CUST_EMAIL" autocomplete="off" value="<?php echo $bu_email ?>" readonly></td>
							</tr>
							<tr>
								<!-- <td><label>INDUSTRY_TYPE_ID ::*</label></td> -->
								<td><input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" class="form-control" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
							</tr>
							<tr>
								<!-- <td><label>Channel ::*</label></td> -->
								<td><input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" 
									 name="CHANNEL_ID" autocomplete="off" value="WEB">
								</td>
							</tr>
							<tr>
								<td scope="row"><label>Transaction Amount</label></td>
								<td scope="row"><span class="h4">&#8377;</span><input title="TXN_AMOUNT" tabindex="10"
									type="text" name="TXN_AMOUNT" class="form-control" style="width:93%;float:right;"
									value="<?php echo $totalprice ?>" readonly>
								</td>
							</tr>
							<tr>
                <td scope="row"></td>
                <td scope="row"><input value="CheckOut" type="submit"	onclick="" class="btn btn-success"></input>
                  <a href="product.php" class="btn btn-danger">Cancel</a> 
                </td>
            </tr>
						</tbody>
					</table>
					<!-- * - Mandatory Fields -->
				</form>
			</div>
		</div>
	</div>
</div>
<?php include('components/footer.inc.php');  ?>
</body>
</html>
<?php   } ?>