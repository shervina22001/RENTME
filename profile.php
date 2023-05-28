<?php

include_once "connection.php";
include_once "helper.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php"; ?>

<body>
  <?php include_once "navbar.php"; ?>

  <!-- Horizontal Divider -->
  <hr style="height: 2px; background-color: #31241E; margin-top: 61px;">

  <!-- Background -->
  <div class="scaled-down" style="height: 50px;">
    <div class="col-md-12">
      <h1 style="color: #31241E; text-align: center;">Profile</h1>
    </div>
  </div>

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mb-3" style="max-width: 540px; margin: auto; margin-top:10px;">
          <div class="row no-gutters">
            <div class="col">
              <div class="card-body">
                <form method="post" action="edit_profile.php">
                  <?php
                  $id = $_SESSION['id'];
                  $query = "SELECT * FROM customer WHERE id_customer = :id";
                  $stmt = $pdo->prepare($query);
                  $stmt->execute(['id' => $id]);
                  $user = $stmt->fetch();

                  $name = $user['nama_customer'];
                  $email = $user['email'];
                  $number = $user['no_telepon'];
                  $address = $user['alamat'];
                  ?>
                  <!-- Name input -->
                  <div class="form-outline mb-4" style="margin-top: 30px;">
                    <input type="text" id="registerName" name="name" class="form-control" value="<?= $name; ?>" />
                    <label class=" form-label" for="registerName">Name</label>
                  </div>

                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" id="registerEmail" name="email" class="form-control" value="<?= $email; ?>" />
                    <label class="form-label" for="registerEmail">Email</label>
                  </div>

                  <!-- Phone Number input -->
                  <div class="form-outline mb-4">
                    <input type="text" id="registerNumber" name="number" class="form-control" value="<?= $number; ?>" />
                    <label class="form-label" for="registerNumber">Phone Number</label>
                  </div>

                  <!--Address input -->
                  <div class="form-outline mb-4">
                    <textarea class="form-control" id="registerAddress" name="address" rows="4"><?= $address; ?></textarea>
                    <label class="form-label" for="registerAddress">Address</label>
                  </div>

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-brown btn-block mb-3" style="background-color:#D1C8C1;">Edit Profile</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="card mb-3" style="max-width: 540px; margin: auto;">
          <div class="row no-gutters">
            <div class="col">
              <div class="card-body">
                <form method="post" action="change_password.php">
                  <!-- Old password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="oldPassword" name="old_password" class="form-control" />
                    <label class="form-label" for="oldPassword">Old Password</label>
                  </div>

                  <!-- New password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="newPassword" name="new_password" class="form-control" />
                    <label class="form-label" for="newPassword">New Password</label>
                  </div>

                  <!-- Confirm password input -->
                  <div class="form-outline mb-4">
                    <input type="password" id="confirmPassword" name="confirm_password" class="form-control" />
                    <label class="form-label" for="confirmPassword">Confirm Password</label>
                  </div>

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-brown btn-block mb-3" style="background-color:#D1C8C1;">Change Password</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

<?php include_once "scripts.php"; ?>

</html>