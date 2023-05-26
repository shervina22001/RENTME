<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>RENTME</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
  <!-- MDB -->
  <link rel="stylesheet" href="css/mdb.min.css" />
  <style>
    .navbar-brand {
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .carousel-item {
      height: 100px;
      min-height: 500px;
      width: 90%;
      margin-top: 10px;
      margin-left: 60px;
      object-fit: scale-down;
      background: no-repeat center center scroll;
      -webkit-background-size: scale-down;
      -moz-background-size: scale-down;
      background-size: scale-down;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <?php include_once "navbar.php" ?>

  <!-- Horizontal Divider -->
  <hr style="height: 2px; background-color: #31241E; margin-top: 61px;">

  <!-- Carousel wrapper -->
  <div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
      <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- Inner -->
    <div class="carousel-inner rounded-5">
      <!-- Single item -->
      <div class="carousel-item active">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1811260/capsule_616x353.jpg?t=1682117049" class="d-block w-100" alt="FIFA 23" width="353" height="616" />
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>

      <!-- Single item -->
      <div class="carousel-item">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1938090/capsule_616x353_alt_assets_3.jpg?t=1684446457" class="d-block w-100" alt="COD S3" width="353" height="616" />
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>

      <!-- Single item -->
      <div class="carousel-item">
        <img src="https://cdn.cloudflare.steamstatic.com/steam/apps/1517290/capsule_616x353.jpg?t=1682430413" class="d-block w-100" alt="Battlefield 2042" width="353" height="616" />
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <!-- Inner -->

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Carousel wrapper -->

  <!--Button-->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-left">
          <a href="shop.php" class="btn btn-primary btn-lg active btn-rounded" role="button" aria-pressed="true" style="margin-top: 30px; margin-left: -30px; background-color: #D1C8C1;">Rent Now</a>
        </div>
      </div>
    </div>
  </div>

</body>

<?php include_once "scripts.php" ?>

</html>