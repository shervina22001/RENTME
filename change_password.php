<?php

include_once "connection.php";
include_once "helper.php";

function check_password($id, $password, $pdo) {
  // get password from database
  $query = "SELECT password FROM customer WHERE id_customer = :id";
  $stmt = $pdo->prepare($query);
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  $result = $stmt->fetch();
  // check if password is correct
  if (password_verify($password, $result['password'])) {
    return true;
  } else {
    return false;
  }
}

// Session start
session_start();

// Session validation
if (!isset($_SESSION['id'])) {
  echo "<script>alert('You must login first!');</script>";
  echo "<script>window.location.href='login.php';</script>";
  exit();
}

// Retrieve data from form
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Check if new password and confirm password are the same
if ($new_password != $confirm_password) {
  echo "<script>alert('New password and confirm password are not the same!');</script>";
  echo "<script>window.location.href='profile.php';</script>";
  exit();
}

// Check if old password is correct
if (!check_password($_SESSION['id'], $old_password, $pdo)) {
  echo "<script>alert('Old password is incorrect!');</script>";
  echo "<script>window.location.href='profile.php';</script>";
  exit();
}

// Hash password
$new_password = password_hash($new_password, PASSWORD_DEFAULT);

// Update password
$query = "UPDATE customer SET password = :password WHERE id_customer = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':password', $new_password);
$stmt->bindParam(':id', $_SESSION['id']);
$stmt->execute();

// Redirect to profile page
echo "<script>alert('Password changed successfully!');</script>";
echo "<script>window.location.href='profile.php';</script>";
exit();

?>