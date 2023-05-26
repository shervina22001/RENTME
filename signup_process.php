<?php

include_once "connection.php";
include_once "helper.php";

// Retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$number = $_POST['number'];
$address = $_POST['address'];

// Check if the email is already registered
$sql = "SELECT * FROM customer WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();

if ($user) {
    echo "<script>alert('Email already registered!');</script>";
    echo "<script>window.location.href='register.php';</script>";
    exit();
    }

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert the new user into the database
$sql = "INSERT INTO customer (nama_customer, email, password, no_telepon, alamat) VALUES (:name, :email, :password, :number, :address)";
$stmt = $pdo->prepare($sql);
$stmt->execute(['name' => $name, 'email' => $email, 'password' => $hashed_password, 'number' => $number, 'address' => $address]);

// Redirect to the home page
echo "<script>window.location.href='login.php';</script>";
exit();

?>
