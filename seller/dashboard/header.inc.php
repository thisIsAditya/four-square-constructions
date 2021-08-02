<?php require("../components/header.inc.php"); ?>
<title>Dashboard | Four Square Constructions</title>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>
<style>
  .fa {
    padding: 0px;
    font-size: 22px;
    width: 20px;
  }
  .box
  {
    position: fixed;
    bottom: 10px;
    right: 20px;
    margin-bottom: 30px;
  }
</style>
</head>
<body>  
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <div class="col-md-3 col-lg-2 me-0 px-3 mt-2">
  <a class="navbar-brand " href="../index.php">Four Square Constructions</a>
  <p class="text-muted"><strong>Seller Dashboard</strong></p>
  </div>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="../logout.php">Sign out</a>
    </div>
  </div>
  <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</header>