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