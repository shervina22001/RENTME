<?php

include_once "connection.php";
include_once "helper.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
    <!-- Navbar -->
    <?php include_once "navbar.php" ?>

    <!-- Horizontal Divider -->
    <hr style="height: 2px; background-color: #31241E; margin-top: 61px;">

    <!-- Backgroud -->
    <div class="scaled-down" style="height: 50px;">
        <div class="col-md-12">
            <h1 style="color: #31241E; margin-top: 30px; text-align: center;">LOG IN</h1>
        </div>
    </div>
    </div>

    <div class="container">
        <form method="post" action="login_process.php">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="loginEmail" name="email" class="form-control" />
                <label class="form-label" for="loginEmail">Email</label>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="loginPassword" name="password" class="form-control" />
                <label class="form-label" for="loginPassword">Password</label>
            </div>

            <!-- Log In button -->
            <button type="submit" class="btn btn-brown btn-block mb-4" style="background-color:#D1C8C1;">Log in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Doesn't have an account yet? <a href="register.php" style="color: #D1C8C1;">Register</a></p>
            </div>
        </form>
    </div>
</body>

<?php include_once "scripts.php" ?>

</html>