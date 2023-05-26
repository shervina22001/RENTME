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
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" aria-current="page" href="index.php">
                <img src="https://cdn-icons-png.flaticon.com/256/753/753774.png" height="35" alt="Controller" loading="lazy" style="margin-left: 5px; margin-right: 10px;">RENTME
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarExample01">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="shop.php">
                            <img src="https://cdn-icons-png.flaticon.com/256/2611/2611162.png" height="25" alt="Shop" style="margin-left: 820px; margin-right: 8px;">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <img src="https://cdn-icons-png.flaticon.com/256/10764/10764637.png" height="25" alt="Cart" style="margin-left: 5px; margin-right: 8px;">Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="https://cdn-icons-png.flaticon.com/256/2102/2102647.png" height="25" alt="Account" style="margin-left: 5px; margin-right: 8px;">Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Horizontal Divider -->
    <hr style="height: 2px; background-color: #31241E; margin-top: 61px;">

    <!-- Backgroud -->
    <div class="scaled-down" style="height: 50px;">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color: #31241E; text-align: center;">CART</h1>
            </div>
        </div>
    </div>

</body>
<!-- MDB -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Custom scripts -->
<script type="text/javascript"></script>
</html>