<?php

include_once "connection.php";
include_once "helper.php";

// Session start
session_start();

// Session validation
if (!isset($_SESSION['id'])) {
  echo "<script>alert('You must login first!');</script>";
  echo "<script>window.location.href='login.php';</script>";
  exit();
}

// Retrive the form data
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$address = $_POST['address'];

// Check if the email is already registered that belongs to another customer
$sql = "SELECT * FROM customer WHERE email = :email AND id_customer != :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email, 'id' => $_SESSION['id']]);
$user = $stmt->fetch();

if ($user) {
  echo "<script>alert('Email already registered to another customer!');</script>";
  echo "<script>window.location.href='profile.php';</script>";
  exit();
}

// Update the customer data
$sql = "UPDATE customer SET nama_customer = :name, email = :email, no_telepon = :number, alamat = :address WHERE id_customer = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $name, 'email' => $email, 'number' => $number, 'address' => $address, 'id' => $_SESSION['id']]);

// Redirect to profile page
echo "<script>window.location.href='profile.php';</script>";
exit();

?>