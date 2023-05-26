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
    <?php include_once "navbar.php" ?>

    <!-- Horizontal Divider -->
    <hr style="height: 2px; background-color: #31241E; margin-top: 61px;">

    <!-- Backgroud -->
    <div class="scaled-down" style="height: 50px;">
        <div class="col-md-12">
            <h1 style="color: #31241E; margin-top: 30px; text-align: center;">SIGN UP</h1>
        </div>
    </div>
    </div>

    <div class="container">
        <form method="post" action="signup_process.php">
            <!-- Name input -->
            <div class="form-outline mb-4" style="margin-top: 30px;">
                <input type="text" id="registerName" name="name" class="form-control" />
                <label class="form-label" for="registerName">Name</label>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="registerEmail" name="email" class="form-control" />
                <label class="form-label" for="registerEmail">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="registerPassword" name="password" class="form-control" />
                <label class="form-label" for="registerPassword">Password</label>
            </div>

            <!-- Phone Number input -->
            <div class="form-outline mb-4">
                <input type="text" id="registerNumber" name="number" class="form-control" />
                <label class="form-label" for="registerNumber">Phone Number</label>
            </div>

            <!--Address input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" id="registerAddress" name="address" rows="4"></textarea>
                <label class="form-label" for="registerAddress">Address</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-brown btn-block mb-3" style="background-color:#D1C8C1;">Sign Up</button>
        </form>
    </div>
</body>

<?php include_once "scripts.php" ?>

</html>