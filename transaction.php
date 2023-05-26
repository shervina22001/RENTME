<?php
include "connection.php";
include_once "helper.php";
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>RENTME</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
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
    <?php include_once "navbar.php" ?>

    <!-- Horizontal Divider -->
    <hr style="height: 2px; background-color: #31241E; margin-top: 61px;">


    <!DOCTYPE html>
    <html>
    <!-- Background -->
    <div class="scaled-down" style="height: 50px;">
            <div class="col-md-12">
                <h1 style="color: #31241E; text-align: center;">TRANSACTION</h1>
            </div>
        </div>
    </div>
    <!-- Flexbox for demo purpose -->
    <div class="container" style= "background-color:#D1C8C1; width: 350px;">
    <div class="d-flex">

        <!-- Element on the left -->
        <div class="px-4" style="margin-top:20px;">
            <p>Total</p>
            <p>Discount</p>
            <p>Payment Total</p>
        </div>

        <!-- Vertical divider -->
        <div class="vr" style="height: 150px;"></div>

        <!-- Element on the right -->
        <div class="px-4" style="margin-top:20px;">
            <p>
                <?php
                $total = 0;
                $cart = $_SESSION['cart'];
                foreach ($cart as $item) {
                    $total += $item['harga'];
                }
                echo "<td>" . rupiah($total) . "</td>";
                ?>
            </p>
            <tr>
                <p>
                    10%
                </p>
            </tr>
            <tr>
                <p>
                    <?php
                    $original_price = $total;
                    $discount_percentage = 10;

                    $discount_amount = ($original_price / 100) * $discount_percentage;
                    $discounted_price = $original_price - $discount_amount;

                    echo "<td>" . rupiah($discounted_price) . "</td>";
                    ?>

                </p>
            </tr>
        </div>
            </div>
    </div>
<br>
    <!-- Background -->
    <div class="contain" style="height: 50p">
            <div class="col-md-12">
                <h1 style="color: #31241E; text-align: center;">PAYMENT METHOD</h1>
            </div>
        </div>
    </div>
    <!-- Flexbox for demo purpose -->
    <div class="container" style= "background-color:#D1C8C1; width: 350px;">
    <div class="d-flex">

        <!-- Element on the left -->
        <div class="px-4" style="margin-top:20px;">
            <p>Transfer</p>
            <p>Bank</p>
            <p>Account Number  </p>
        </div>

        <!-- Vertical divider -->
        <div class="vr" style="height: 150px;"></div>

        <!-- Element on the right -->
        <div class="px-4" style="margin-top:50px;">
            <p>
                
            </p>
            <tr>
                <p>
                    Mandiri
                </p>
            </tr>
            <tr>
                <p>
                 ____________________
                </p>
            </tr>
        </div>
            </div>
    </div>



    <!--Button-->
    <div style="text-align:right">
        <div class="container">
            <div class="row">
                <div class="text-left">
                    <a href="payment.php" class="btn btn-primary btn-lg active btn-rounded" role="button"
                        aria-pressed="true"
                        style="margin-top: 20px; margin-right: -20px; background-color: #D1C8C1;">CHECK OUT</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>